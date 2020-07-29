<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiProductController extends Controller
{
    public function showProduct($id) {
        return response()->json(
            Product::where('id',$id)->with('Photo')->get(),200);
    }

    public function randomProducts() {
        return response()->json(
            Product::inRandomOrder()->with('Photo')->limit(4)->get(),200);
    }
    public function storeProduct(Request $request) {
        $request->validate([
            'title'=>'required',
            'price'=>'required',
            'photo'=>'required',
        ]);
        $product_id = Product::create($request->all())->id;

        if($request->file('photo')!=null) {
            //Create new unique name
            $name = uniqid("product_") . '.' . $request->file('photo')->getClientOriginalExtension();
            //Move file to the directory
            $request->file('photo')->move('images', $name);
            //Update info to DB
            Photo::create(['path'=>$name, 'product_id'=>$product_id, 'user_id'=>$request->user_id, 'originalName'=>$request->file('photo')->getClientOriginalName()]);
        }
        return response()->json(['success'=>true],200);
    }

}
