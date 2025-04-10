<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TransactionIndex;
use App\Livewire\ShowTransaction;
use App\Livewire\TransactionCreate;
use App\Livewire\TransactionEdit;
use App\Livewire\AccountImport;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('transactions', TransactionIndex::class)->name('transactions.index');
    Route::get('transactions/create', TransactionCreate::class)->name('transactions.create');
    Route::get('transactions/{transaction}', ShowTransaction::class)->name('transactions.show');
    Route::get('transactions/{transaction}/edit', TransactionEdit::class)->name('transactions.edit');
    
    Route::get('/import/accounts', App\Livewire\AccountImport::class)->name('import.accounts');
});
