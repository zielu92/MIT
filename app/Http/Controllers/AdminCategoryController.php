<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index() {
        return view('admin.categories.index', [
            'categories'=>Category::paginate(20),
        ]);
    }

    public function show($id) {

    }

    public function edit($id) {
        return view('admin.categories.edit', [
           'category'=>Category::findOrFail($id),
        ]);
    }

    public function update(Request $request, $id){
        $request->validate([
           'name'=>'required',
        ]);
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('admin/categories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:categories',
        ]);

        if($request->file('photo')!=null) {
            $photo = new Photo();
            $request['photo_id'] = $photo->photoUpload($request->file('photo'), 'category_', 0);
        }
        Category::create($request->all());
        return back()->with('msg', 'Category has been created');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('msg', 'Category has been deleted');
    }
}
