<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function create(){
        return view('order.create');
    }
    public function store(Request $request){
        $order = new Order();
        $order->car_id = $request->car_id;
        $order->agent_id = $request->agent_id;
        $order->customer_id = $request->customer_id;
        $order->amount = $request->amount;
        $order->save();
        return redirect()->route('show.orders');
    }
    public function show(){
        $orders = Order::all();
        return view('order.orders', compact('orders'));
    }
}
