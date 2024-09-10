<?php

namespace App\Observers;

use App\Mail\CustomerMail;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;

class CustomerObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
