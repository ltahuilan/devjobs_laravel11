<x-app-layout>
    <div class="py-16 bg-neutral-100 dark:bg-neutral-900 overflow-hidden lg:pt-24">
        <div class=" max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl">
            <div class="relative">
                <h2 class="text-center text-4xl leading-8 font-extrabold tracking-tight text-indigo-600 sm:text-6xl">
                    Encuentra un trabajo en Tech de forma remota
                </h2>
                <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-neutral-800 dark:text-neutral-300">
                    Encuentra el trabajo de tus sueños en una empresa internacional; tenemos vacantes para Frontend Developer, Backend, DevOps, Mobile y mucho más!
                </p>
            </div>

            <div>
                <p class="text-4xl text-neutral-800 font-bold my-12">Vacantes disponibles</p>
            </div>

            <div class="bg-white dark:bg-neutral-800 p-6 mt-12 rounded-lg shadow-xl">
                @forelse ($vacancies as $vacancy)
                    <div class="flex justify-between items-center border-b border-neutral-300 dark:border-neutral-700 p-4">
                        <div class="">
                            <a href="{{ route('vacancies.show', $vacancy)}}"  class="text-neutral-800 hover:text-neutral-700 dark:text-neutral-100 dark:hover:text-indigo-300 font-bold text-2xl">
                                {{ $vacancy->title }}
                            </a>
                            <p class="text-neutral-800 dark:text-neutral-300 text-lg">Company: <span class="font-bold">{{ $vacancy->company}}</span></p>
                            <p class="text-neutral-800 dark:text-neutral-300 text-lg">Salary: <span class="font-bold">{{ $vacancy->salary->salary}}</span></p>
                            <p class="text-neutral-500 dark:text-neutral-400 text-sm">Publication date: <span class="font-bold">{{ $vacancy->created_at->diffForHumans()}}</span></p>
                        </div>
                        <div>
                            <a href="{{ route('vacancies.show', $vacancy) }}" class="px-4 py-2 text-white font-bold  bg-indigo-600 hover:bg-indigo-700 transition-color duration-150 rounded-full">
                                See vacancy
                            </a>
                            {{-- <a href="{{ route('vacancies.show', $vacancy) }}" class="px-4 py-2 text-neutral-800 dark:text-neutral-200 font-bold border border-neutral-800 dark:border-neutral-500 hover:bg-neutral-300 dark:bg-neutral-700 dark:hover:bg-neutral-800 rounded-full">
                                Apply
                            </a> --}}
                        </div>
                    </div>
                @empty
                    <p>{{ __('No vacancies to show')}}</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>