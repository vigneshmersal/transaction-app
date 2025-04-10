<div class="m-auto w-full mb-4 text-black">
    <div class="mb-3 flex justify-between items-center">
        @can('create', App\Models\Transaction::class)
        <a
            href="{{ route('transactions.create') }}"
            class="text-blue-500 hover:text-blue-700"
            wire:navigate
        >
            Create Transactions
        </a>
        @endcan
    </div>
    @if (session('status'))
        <div class="text-center bg-green-700 text-gray-200">
            {{ session('status') }}
        </div>
    @endif
    <div class="my-3">
        {{$this->transactions->links()}}
    </div>
    <table class="w-full">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th class="px-6 py-3">Summary</th>
                <th class="px-6 py-3">Amount</th>
                <th class="px-6 py-3">Status</th>
                <th class="px-6 py-3">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($this->transactions as $transaction)
                <tr wire:key="{{$transaction->id}}" class="border-b border-gray-700">
                    <td class="px-6 py-3">{{$transaction->summary}}</td>
                    <td class="px-6 py-3">{{$transaction->amount}}</td>
                    <td class="px-6 py-3">{{$transaction->status}}</td>
                    <td class="px-6 py-3">
                        <a class="p-2"
                            href="/transactions/{{$transaction->id}}"
                            wire:navigate
                        >View</a>
                        @can('update', $transaction)
                            <a class="p-2"
                                href="/transactions/{{$transaction->id}}/edit"
                                wire:navigate
                            >Edit</a>
                            <button class="p-2 bg-red-700 hover:bg-red-900 rounded-sm"
                            wire:click="delete({{$transaction->id}})"
                            wire:confirm="Are you sure you want to delete this transaction?"
                            >
                                Delete
                            </button>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{$this->transactions->links()}}
    </div>
</div>
