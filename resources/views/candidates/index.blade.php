<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-neutral-800 dark:text-neutral-200 leading-tight">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-neutral-900 dark:text-neutral-100">

                    <h2 class="text-3xl text-center font-bold mb-10">
                        Candidates for the vacancy <span class="font-normal text-indigo-600 dark:text-indigo-400">{{ $vacancy->title}}</span>
                    </h2>

                    <div class="md:flex md:flex-col justify-center p-5">
                        <ul class="">
                            @forelse ($candidates as $candidate )
                                <div class="p-3 border-b border-neutral-300 dark:border-neutral-700 flex items-center">
                                    <div class="flex-1">
                                        <p class="text-neutral-800 dark:text-neutral-100 text-lg font-bold">{{ $candidate->user->name }}</p>
                                        <p class="text-neutral-800 dark:text-neutral-300 text-sm font-medium">{{ $candidate->user->email}}</p>
                                        <p class="text-neutral-600 dark:text-neutral-400 text-sm font-medium">{{ $candidate->created_at->diffForHumans()}}</p>
                                    </div>
                                    <div>
                                        <a
                                            href="{{ asset('storage/attached/' . $candidate->attached_file) }}"
                                            class="p-2 text-neutral-800 dark:text-neutral-200 font-bold border border-neutral-800 dark:border-neutral-500 hover:bg-neutral-300 dark:bg-neutral-700 dark:hover:bg-neutral-800 rounded-full"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                            >
                                            See CV
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <li class="text-center text-neutral-600 dark:text-neutral-400">No hay candidatos para mostrar</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>