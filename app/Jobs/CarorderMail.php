<?php

namespace App\Jobs;

use App\Mail\orderedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CarorderMail implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $order;
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info('Loading');
        Mail::to( $this->order->customer->email)->send(new orderedMail($this->order));
    }
}
