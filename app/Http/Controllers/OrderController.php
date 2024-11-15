<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Observers\CarOrder;
use App\Jobs\CarorderMail;

class OrderController extends Controller
{
    
    public function store(Request $request){
        $order = new Order();
        $order->car_id = $request->car_id;
        $order->agent_id = $request->agent_id;
        $order->customer_id = $request->customer_id;
        $order->amount = $request->amount;
        $order->save();
        CarorderMail::dispatch($order);

        return redirect()->route('show.orders');
    }
    public function show(){
        $orders = Order::all();
        return view('order.orders', compact('orders'));
    }
}
