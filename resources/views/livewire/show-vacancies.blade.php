<div class="bg-white dark:bg-neutral-800 overflow-hidden shadow-sm sm:rounded-lg">

    <div class="p-6 text-neutral-900 dark:text-neutral-100">

        @forelse ($vacancies as $vacancy )
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center border-b border-neutral-300 dark:border-neutral-700 py-6">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('vacancies.show', $vacancy->id) }}" class="font-extrabold text-2xl text-neutral-800 hover:text-indigo-600 dark:text-white dark:hover:text-indigo-400">
                        {{ $vacancy->title }}
                    </a>
                    <p href="#" class="font-bold text-xl text-neutral-600 dark:text-neutral-300">
                        {{ $vacancy->company }}
                    </p>
                    <p href="#" class="text-neutral-500 dark:text-neutral-400">
                        Último día para postular: {{ $vacancy->last_date->format('d/m/Y') }}
                    </p>
                </div>
    
                <div class="flex flex-col items-stretch gap-3 mt-4">

                    {{-- Show candidates --}}
                    <a href="{{ route('candidates.index', $vacancy)}}" class="bg-neutral-700 dark:bg-neutral-500 hover:bg-neutral-800 hover:dark:bg-neutral-600 px-4 py-2 text-white text-center rounded ">
                        <span class="font-bold text-yellow-500">
                            {{ '(' . $vacancy->candidate->count() . ') '}}
                        </span>
                        {{ __('Candidates') }}
                    </a>

                    {{-- Edit vacancy --}}
                    <a href="{{ route('vacancies.edit', $vacancy) }}" class="bg-blue-700 hover:bg-blue-800 px-4 py-2 text-white text-center rounded ">
                        {{__('Edit')}}
                    </a>

                    {{-- Delete vacancy --}}
                    <button wire:click="$dispatch('showAlert', {vacancyId: {{ $vacancy->id}} })" class="bg-red-600 dark:bg-red-700 hover:bg-red-700 hover:dark:bg-red-800 px-4 py-2 text-white text-center rounded ">
                        {{__('Delete')}}
                    </button>
                </div>
            </div>
        @empty
            <div class="flex flex-col space-y-6">
                <p class="text-center text-xl p-6">
                    {{ __('No vacancies to show') }}
                </p>
                <a href="{{ route('vacancies.create') }}" class="text-indigo-600 hover:text-indigo-700 text-center">
                    {{ __('Start by creating create a vacancy') }}
                </a>                
            </div>
        @endforelse

        <div class="mt-6">
            {{ $vacancies->links()}}
        </div>
    </div>


    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
        <script>
            Livewire.on('showAlert', (vacancyId) => {
                // const {vacancy} = vacancyObj;
                // alert(id);
                console.log(vacancyId);

                Swal.fire({
                    title: `Esta acción no se puede revertir!`,
                    text: `Eliminar la vacante?`,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        //enviar evento hacia el ShowVacancies.php
                        Livewire.dispatch('deleteVacancy', vacancyId);

                        Swal.fire({
                            title: "Vacante eliminada!",
                            text: "Se ha eliminado correctamente",
                            icon: "success"
                        });
                    }
                  });
            });


        </script>
    @endpush
</div>

