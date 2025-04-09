<div class="max-w-7xl mx-auto p-6 bg-white shadow-xl rounded-2xl text-black">
    <h2 class="text-2xl font-bold mb-4">Submit Transaction</h2>

    @if (session()->has('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="submit" 
        {{-- enctype="multipart/form-data"  --}}
        class="space-y-6">

        <div>
            <label class="block font-medium text-gray-700">Summary</label>
            <input type="text" wire:model.defer="form.summary" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            @error('form.summary') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">Amount</label>
            <input type="number" step="0.01" wire:model.defer="form.amount" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500">
            @error('form.amount') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium text-gray-700">File Attachment</label>
            <input type="file" wire:model="form.file" class="mt-1 block w-full">
            @error('form.file') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <div wire:loading wire:target="form.file" class="text-sm text-gray-500 mt-1">Uploading...</div>
        </div>
        
        <div>
            <label class="block font-medium text-gray-700">Status</label>
            <select wire:model.defer="form.status" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-blue-500 focus:border-blue-500">
                <option value="pending">Pending</option>
            </select>
            @error('form.status') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <button type="submit" class="bg-blue-600 text-black px-4 py-2 rounded hover:bg-blue-700">
                Submit
            </button>
        </div>
    </form>
</div>
