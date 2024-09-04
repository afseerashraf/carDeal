<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
   
    public function store(Request $request){
        $order = new Order();
        $order->car_id = $request->carid;
        $order->agent_id = $request->agent_id;
        $order->customer_id = $request->customer_id;
        $order->amount = $request->amount;
        $order->save();
       
    }
   
}
