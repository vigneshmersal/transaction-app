<div class="text-black">
    <form wire:submit.prevent="import" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="file" class="block text-gray-700 text-sm font-bold mb-2">
                Select Excel File
            </label>
            <input type="file" wire:model="file" id="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('file')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Import Accounts
            </button>
        </div>

        @if (Session::has('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4" role="alert">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif

        @if (Session::has('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                <p>{!! Session::get('error') !!}</p>
            </div>
        @endif
        
        <div wire:loading wire:target="file" class="text-sm text-gray-500 mt-1">
            Uploading...
        </div>
    </form>
</div>
