<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;

class ShowTransaction extends Component
{
    public Transaction $transaction;

    public function mount(Transaction $transaction) {
        $this->transaction = $transaction->load('user');
    }
    
    public function render()
    {
        return view('livewire.show-transaction');
    }
}
