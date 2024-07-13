<x-app-layout>
    <x-slot name="header">
        <h3 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $vacancy->title }}
        </h3>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $vacancy->title}}
                </h3>

                <div class="my-6 space-y-3 grid md:grid-cols-2">
                    <p class="text-gray-800 dark:text-gray-200 font-bold">
                        Empresa: <span class="font-normal">{{$vacancy->company}}</span>
                    </p>
                    <p class="text-gray-800 dark:text-gray-200 font-bold">
                        Último día para postulParse: <span class="font-normal">{{$vacancy->last_date->toFormattedDateString()}}</span>
                    </p>
                    <p class="text-gray-800 dark:text-gray-200 font-bold">
                        Salario: <span class="font-normal">{{$vacancy->salary->salary}}</span>
                    </p>
                    <p class="text-gray-800 dark:text-gray-200 font-bold">
                        Categoria: <span class="font-normal">{{$vacancy->category->category}}</span>
                    </p>
                </div>

                <div class="grid md:grid-cols-6 gap-2 mt-10">
                    <div class="md:col-span-2">
                        <img src="{{ asset('storage/vacancies/' . $vacancy->file) }}" alt="Imagen de vacante . {{$vacancy->title}}">
                    </div>

                    <div class="md:col-span-4 px-2 mt-4 md:mt-0 md:px-10">
                        <p class="text-gray-800 dark:text-gray-200 font-bold">
                            Descripción de la vacante: {{ $vacancy->description }}
                        </p>
                    </div>
                </div>
            </div>

            @guest
                <div class="my-6 p-10 text-center text-xl bg-white dark:bg-gray-800 rounded-lg">
                    <p class="text-gray-800 dark:text-gray-200 mb-4">
                        ¿Deseas aplicar a este vacante?
                    </p>
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 dark:hover:text-indigo-500 font-bold">
                        Obten una cuenta para postulate a esta y otras vacantes
                    </a>
                </div>                
            @endguest
            
            {{-- @can('create', App\Model\Vacancy::class)
                <p>Es un reclutador</p>
            @else
            @endcan --}}
            
            {{-- Accede al policy que verifica si es un reclutador
            Con la directiva @cannot No se muestra si es un reclutador --}}
            @cannot('create', App\Model\Vacancy::class)
                <livewire:apply-vacancy :vacancy="$vacancy" />
            @endcannot
        </div>
    </div>

</x-app-layout>