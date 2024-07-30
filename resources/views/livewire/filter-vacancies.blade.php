<div class="bg-white dark:bg-neutral-800 my-12 p-6 rounded-lg shadow-lg">

    <h2 class="text-3xl lg:text-4xl text-neutral-600 dark:text-neutral-300 text-center font-extrabold my-5">Buscar y Filtrar Vacantes</h2>

    <div class="max-w-7xl mx-auto">
        <form wire:submit.prevent='filter'>
            <div class="lg:grid lg:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label 
                        class="block mb-2 text-sm text-neutral-700 dark:text-neutral-300 uppercase font-bold "
                        for="termino">Término de Búsqueda
                    </label>
                    <x-text-input id="termino" type="text" wire:model="termino" placeholder="Ex., Laravel, React, Apple, Google..." class="w-full" autofocus/>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm text-neutral-700 dark:text-neutral-300 uppercase font-bold">Category</label>
                    <x-input-select class="border-neutral-300 p-2 w-full" wire:model='category'>
                        <option value="">-- Select --</option>
            
                        @foreach ($categories as $category )
                            <option value="{{ $category->id }}">{{ $category->category}}</option>
                        @endforeach
                    </x-input-select>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm text-neutral-700 dark:text-neutral-300 uppercase font-bold">Salary</label>
                    <x-input-select class="border-neutral-300 p-2 w-full" wire:model='salary'>
                        <option value="">-- Select --</option>

                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{$salary->salary}}</option>
                        @endforeach
                    </x-input-select>
                </div>
            </div>

            <div class="flex justify-end">
                <input 
                    type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full lg:w-auto"
                    value="{{ __('Search') }}"
                />
            </div>
        </form>
    </div>
</div>
