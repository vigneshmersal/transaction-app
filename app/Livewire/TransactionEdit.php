<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use App\Livewire\Forms\TransactionForm;
use Livewire\WithFileUploads;

class TransactionEdit extends Component
{
    use WithFileUploads;
    
    public TransactionForm $form;
    
    public function mount(Transaction $transaction) {
        $this->form->setTransaction($transaction);
    }
    
    public function submit() {
        $this->form->update();

        session()->flash('status', 'Transactions successfully updated.');

        $this->redirect(TransactionIndex::class, navigate: true);
    }
    
    public function render()
    {
        return view('livewire.transaction-edit');
    }
}
