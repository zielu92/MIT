<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {

        $stat = [];
        $stat['products'] = Product::all()->count();
        $stat['users'] = User::all()->count();
        $stat['orders'] = Order::all()->count();
        //$stat['donations'] =

        return view('admin.index', [
            'stat' => $stat,
        ]);
    }
}
