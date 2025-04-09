<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Transaction;
use Livewire\Attributes\Locked;
use App\Events\TransactionCreated;

class TransactionForm extends Form
{
    public ?Transaction $transaction;
    
    public $summary;
    public $amount;
    public $file;
    public $file_path = '';
    public $status = 'pending';
    
    #[Locked]
    public int $id;

    protected $rules = [
        'summary' => 'required|string',
        'amount' => 'required|numeric',
        'file' => 'nullable|file|max:2048', // mimes:pdf,doc,docx,xls,xlsx,png,jpg
        'status' => 'required|in:pending,approved,rejected'
    ];
    
    public function store()
    {
        $this->validate();

        if ($this->file) {
            $this->file_path = $this->file->storePublicly('transactions', ['disk' => 'public']);
        }
        // $this->file_path = $this->file->store('transactions');

        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'summary' => $this->summary,
            'amount' => $this->amount,
            'file_attachment' => $this->file_path,
            'status' => $this->status,
        ]);
        
        event(new TransactionCreated($transaction));
    }
    
    public function setTransaction(Transaction $transaction) {
        $this->id = $transaction->id;
        $this->summary = $transaction->summary;
        $this->amount = $transaction->amount;
        $this->status = $transaction->status;
        $this->file_path = $transaction->file_path;

        $this->transaction = $transaction;
    }
    
    public function update() {
        $this->validate();

        if ($this->file) {
            $this->file_path = $this->file->storePublicly('transactions', ['disk' => 'public']);
        }

        $this->transaction->update(
            $this->only(['summary', 'amount', 'status', 'file_path'])
        );

        cache()->forget('published-count');
    }
}
