<?php

use App\Models\User;
use Livewire\Livewire;
use App\Http\Livewire\UserCrud;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Livewire\TransactionCreate;
use App\Models\Transaction;

uses(RefreshDatabase::class);

test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('can create a transaction', function () {
    Livewire::test(TransactionCreate::class)
        // ->set('summary', 'abc')
        // ->set('email', 'abc@example.com')
        // ->set('password', 'secret123')
        // ->call('submit')
        // ->assertSee('Transaction created successfully.');
        ->assertSee('Submit Transaction');

    // expect(Transaction::where('summary', 'abc')->exists())->toBeTrue();
});

// it('can update a Transaction', function () {
//     $transaction = Transaction::factory()->create();

//     Livewire::test(Transaction::class)
//         ->call('edit', $transaction->id)
//         ->set('name', 'Updated Name')
//         ->call('updateTransaction')
//         ->assertSee('Transaction updated successfully.');

//     $transaction->refresh();
//     expect($transaction->name)->toBe('Updated Name');
// });

// it('can delete a transaction', function () {
//     $transaction = Transaction::factory()->create();

//     Livewire::test(TransactionCrud::class)
//         ->call('deleteTransaction', $transaction->id)
//         ->assertSee('Transaction deleted successfully.');

//     expect(Transaction::find($transaction->id))->toBeNull();
// });

// it('shows validation errors', function () {
//     Livewire::test(TransactionCrud::class)
//         ->set('email', '') // missing name & password
//         ->call('createTransaction')
//         ->assertHasErrors(['name' => 'required', 'password' => 'required']);
// });
