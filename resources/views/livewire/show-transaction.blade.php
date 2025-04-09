<div class="p-6 max-w-xl mx-auto bg-white rounded shadow-md text-black">
    <h2 class="text-2xl font-semibold mb-4">Transaction Details</h2>

    <div class="mb-2">
        <strong>User:</strong> {{ $transaction->user->name ?? 'N/A' }}
    </div>

    <div class="mb-2">
        <strong>Amount:</strong> ₹{{ number_format($transaction->amount, 2) }}
    </div>

    <div class="mb-2">
        <strong>summary:</strong> {{ ucfirst($transaction->summary) }}
    </div>

    <div class="mb-2">
        <strong>Status:</strong> {{ ucfirst($transaction->status ?? 'pending') }}
    </div>

    <div class="mb-2">
        <strong>Date:</strong> {{ $transaction->created_at->format('d M Y, h:i A') }}
    </div>
</div>
