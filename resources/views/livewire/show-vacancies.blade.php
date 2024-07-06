<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">

        @forelse ($vacancies as $vacancy )
            <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 py-6">
                <div class="flex flex-col space-y-3">
                    <a href="{{ route('vacancies.show', $vacancy->id) }}" class="font-extrabold text-2xl text-gray-800 dark:text-white">
                        {{ $vacancy->title }}
                    </a>
                    <a href="#" class="font-bold text-xl text-gray-600 dark:text-gray-300">
                        {{ $vacancy->company }}
                    </a>
                    <a href="#" class="text-gray-500 dark:text-gray-400">
                        Último día para postular: {{ $vacancy->last_date->format('d/m/Y') }}
                    </a>
                </div>
    
                <div class="flex gap-3">

                    {{-- Show candidates --}}
                    <a href="" class="bg-gray-700 dark:bg-gray-500 hover:bg-gray-800 hover:dark:bg-gray-600 p-2 text-white rounded">
                        {{__('Candidates')}}
                    </a>

                    {{-- Edit vacancy --}}
                    <a href="{{ route('vacancies.edit', $vacancy) }}" class="bg-blue-700 hover:bg-blue-800 p-2 text-white rounded">
                        {{__('Edit')}}
                    </a>

                    {{-- Delete vacancy --}}
                    <button wire:click="$dispatch('showAlert', {vacancyId: {{ $vacancy->id}} })" class="bg-red-600 dark:bg-red-700 hover:bg-red-700 hover:dark:bg-red-800 p-2 text-white rounded">
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

