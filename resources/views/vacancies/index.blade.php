<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if( session()->has('status') )
                <div class="bg-green-200 dark:bg-green-300 text-green-800 text-center p-2 my-6 shadow-lg rounded">
                    {!! session('status') !!}
                </div>
            @endif
            
            <livewire:show-vacancies />
        </div>
    </div>
</x-app-layout>