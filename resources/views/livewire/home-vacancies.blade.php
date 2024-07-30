<div class="">

    <livewire:filter-vacancies />

    <h3 class="text-center md:text-left text-3xl lg:text-4xl text-neutral-600 dark:text-neutral-300 font-bold pb-12">Vacantes disponibles</h3>


    <div class="bg-white dark:bg-neutral-800 p-6 rounded-lg shadow-xl mb-12">
        @forelse ($vacancies as $vacancy)
            <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center border-b border-neutral-300 dark:border-neutral-700 p-4">
                <div class="">
                    <a href="{{ route('vacancies.show', $vacancy)}}"  class="text-neutral-800 hover:text-neutral-700 dark:text-neutral-100 dark:hover:text-indigo-300 font-bold text-2xl">
                        {{ $vacancy->title }}
                    </a>
                    <p class="text-neutral-800 dark:text-neutral-300 text-lg">Company: <span class="font-bold">{{ $vacancy->company}}</span></p>
                    <p class="text-neutral-800 dark:text-neutral-300 text-lg">Salary: <span class="font-bold">{{ $vacancy->salary->salary}}</span></p>
                    <p class="text-neutral-800 dark:text-neutral-300 text-lg">Category: <span class="font-bold">{{ $vacancy->category->category}}</span></p>
                    <p class="text-neutral-500 dark:text-neutral-400 text-sm">Publication date: <span class="font-bold">{{ $vacancy->created_at->diffForHumans()}}</span></p>
                </div>
                <div class="my-6 lg:my-0">
                    <a href="{{ route('vacancies.show', $vacancy) }}" class="px-4 py-2 text-white font-bold  bg-indigo-600 hover:bg-indigo-700 transition-color duration-150 rounded-full">
                        See vacancy
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-xl text-neutral-800 dark:text-neutral-300">{{ __('No vacancies to show')}}</p>
        @endforelse

    </div>

    {{ $vacancies->links() }}
</div>
