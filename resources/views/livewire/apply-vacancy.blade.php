<div class="my-6 p-10 text-lg bg-white dark:bg-gray-800 rounded-lg">
    {{-- <p class="text-gray-800 dark:text-gray-200">Formulario para aplicar a vacante</p> --}}

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

            <x-primary-button id="apply" class="w-full justify-center my-6">
                {{ __('Apply vacancy') }}
            </x-primary-button>
            
        </form>
    @endif


    @push('scripts')
        <script>
            // const button = document.querySelector('#apply');

            // let count = 0;

            // button.addEventListener('click', function () {
            //     count++;
            //     console.log(count);
            //     if(count > 1) {
            //         button.disabled = true;
            //         console.log('button has ben disabled');
            //     }            
            // });
        </script>
    @endpush
</div>


