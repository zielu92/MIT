<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class ApiOrderController extends Controller
{
    public function orderProduct(Request $request) {
        Order::create($request->all());
        return response()->json(['success'=>true],200);
    }
}
