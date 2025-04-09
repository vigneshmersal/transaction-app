<?php

namespace App\Listeners;

use App\Events\TransactionCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use App\Notifications\TransactionNotification;
use Spatie\Permission\Models\Role;

class SendTransactionNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransactionCreated $event): void
    {
        // Get all users with the "Approver" role
        $approvers = User::whereHas('roles', function ($query) {
            $query->where('name', 'Approver');
        })->get();

        foreach ($approvers as $approver) {
            $approver->notify(new TransactionNotification($event->transaction));
        }
    }
}
