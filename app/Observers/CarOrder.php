<?php

namespace App\Observers;

use App\Models\Order;
use App\Mail\orderedMail;
use Illuminate\Support\Facades\Mail;

class CarOrder
{
    /**
     * Handle the Order "created" event.
     */
    public function created(Order $order): void
    {
        info('Loading');
        Mail::to($order->customer->email)->send(new orderedMail($order));

    }

    /**
     * Handle the Order "updated" event.
     */
    public function updated(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "deleted" event.
     */
    public function deleted(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     */
    public function restored(Order $order): void
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     */
    public function forceDeleted(Order $order): void
    {
        //
    }
}
