<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function getList() {
        return response()->json(Category::orderByDesc('id')->get(),200);
    }
}
