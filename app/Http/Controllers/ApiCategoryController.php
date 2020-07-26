<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function getList() {
        return response()->json(
            Category::orderByDesc('id')->with('Photo')->get(),200);
    }


    public function getProductsList($id) {

        return response()->json(
            Product::where('category_id', $id)->with('Photo')->get(),200);
    }
}
