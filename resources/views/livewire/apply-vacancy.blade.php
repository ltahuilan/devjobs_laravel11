<div class="my-6 p-10 text-lg bg-white dark:bg-neutral-800 rounded-lg">
    {{-- <p class="text-neutral-800 dark:text-neutral-200">Formulario para aplicar a vacante</p> --}}

    @if (session()->has('status'))
        <div class="bg-green-200 dark:bg-green-300 text-green-800 text-center p-2 my-6 shadow-lg rounded">
            {!! session('status') !!}
        </div>
    @else
        <form action="" wire:submit.prevent='apply_vacancy' class="md:w-1/2 mx-auto">
            <div class="">
                <x-input-label for="attached_file" :value="__('Upload your file (PDF)')" class="mb-4" />
        
                <x-text-input id="attached_file" type="file" wire:model="attached_file" class="block mt-1 w-full" accept="pdf" />
        
                @error('attached_file')
                    <livewire:show-alert :message="$message"/>
                @enderror            
            </div>

            <x-primary-button id="apply" class="w-full justify-center my-6 cursor-pointer" >
                {{ __('Apply vacancy') }}
            </x-primary-button>            
            
        </form> 
    @endif


    @push('scripts')
        <script>
            const btnApply = document.querySelector('#apply');
            const attachedFile = document.querySelector('#attached_file');

            //escuchar los cambios en el attachedFile
            attachedFile.addEventListener('change', event => {
                if(event.target.value != '') {
                    console.log('attached file tiene algo...');

                    btnApply.addEventListener('click', event => {
        
                        // event.target.disabled = true;
                        btnApply.classList.add('cursor-not-allowed');
                    });
                }
            });

        </script>
    @endpush
</div>


