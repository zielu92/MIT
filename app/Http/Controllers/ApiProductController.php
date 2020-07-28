<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function showProduct($id) {
        return response()->json(
            Product::where('id',$id)->with('Photo')->get(),200);
    }
}
