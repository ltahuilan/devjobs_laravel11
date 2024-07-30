<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-900 dark:text-neutral-100">
                    <h2 class="text-3xl text-center font-bold mb-10">{{ __('Notifications for ' . auth()->user()->name) }}
                    </h2>
    
                    @forelse ($notifications as $notification )
                        <div class="md:flex md:justify-between md:items-center border-b-2 border-neutral-700 p-2">
                            <div>
                                <p class="text-lg">Nueva notificacion de la vacante
                                    <span class="font-bold">
                                        {{ $notification->data['vacancy_title'] }}
                                </p>
                                </span>
                                <p class="text-sm text-neutral-600 dark:text-neutral-400 py-2">{{ $notification->created_at->diffForHumans()}}</p>
                            </div>
        
                            <div
                                class="bg-indigo-700 hover:bg-indigo-800 p-3 md:p-2 text-white text-center rounded-lg my-4 md:mb-0 transition ease-in-out duration-150">
                                <a href="{{ route('candidates.index', $notification->data['vacancy_id']) }}">{{ __('See candidates') }}</a>
                            </div>
                        </div>
                    @empty
                        <p class="text-sm text-center">No hay notificaciones nuevas para mostrar</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>