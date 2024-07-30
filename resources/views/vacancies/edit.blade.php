<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Edit Vacancy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-900 dark:text-neutral-100">
                    <h2 class="text-3xl text-center font-bold mb-10">
                        {{ __('Edit Vacancy: ') }}
                        <span class="font-normal">{{$vacancy->title}}</span>
                    </h2>
                    <div class="md:flex justify-center p-5">
                        {{-- Componente de livewire --}}
                        <livewire:edit-vacancy :vacancy="$vacancy"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>