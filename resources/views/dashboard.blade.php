<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    
                    <x-nav-link 
                        class="font-semibold text-green-600"
                        :href="route('transactions.index')" :active="request()->routeIs('transactions.index')" wire:navigate>
                        {{ __('View All Transactions') }}
                    </x-nav-link>
                    
                    <br><br>
                    
                    <x-nav-link 
                        class="font-semibold text-green-600"
                        :href="route('import.accounts')" :active="request()->routeIs('import.accounts')" wire:navigate>
                        {{ __('Import Accounts') }}
                    </x-nav-link>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
