<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Transaction;
use App\Livewire\Forms\TransactionForm;

class TransactionCreate extends Component
{
    use WithFileUploads;
    
    public TransactionForm $form;

    public function submit() {
        $this->form->store();
        session()->flash('success', 'Transaction created successfully.');
        $this->reset();
        $this->redirectRoute('transactions.index', navigate: true);
    }

    public function render()
    {
        return view('livewire.transaction-create');
    }
}

