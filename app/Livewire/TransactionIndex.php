<?php

namespace App\Livewire;

use App\Models\Transaction;
use Livewire\Component;
use Livewire\Attributes\Computed;

class TransactionIndex extends Component
{
    #[Computed]
    public function transactions() {
        $query = Transaction::query();

        return $query->paginate(15);
    }
    
    public function delete(Transaction $transaction) {
        $transaction->delete();
        unset($this->transactions);
    }
    
    public function render()
    {
        return view('livewire.transaction-index');
    }
}
