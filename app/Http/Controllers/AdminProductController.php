<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index', [
            'products'=>Product::paginate(25),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Category::pluck('name', 'id'),
            'users'=>User::pluck('id','id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $product_id = Product::create($request->all())->id;
        //Add photos
        if($request->file('photo')!=null) {
            foreach ($request->file('photo') as $pic) {
                $photo = new Photo();
                if ($file = $pic) {
                    $data['photo_id'] = $photo->photoUpload($pic, 'product_', $product_id);
                } else {
                    $data['photo_id'] = null;
                }
            }
        }
        return back()->with('msg', 'Product has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', [
            'product'=>Product::findOrFail($product->id),
            'categories' => Category::pluck('name', 'id'),
            'users'=>User::pluck('id','id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title'=>'required',
        ]);
        $product = Product::findOrFail($product->id);
        $product->update($request->all());
        return back()->with('msg', 'Product has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $product->delete();
        return back()->with('msg', 'Product has been deleted');
    }
}
