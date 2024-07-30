<div class="md:w-1/2 mx-auto">
    <form action="" class="space-y-4" wire:submit.prevent='create_vacancy'>
        <div>
            <x-input-label for="title" :value="__('Vacancy title')" class="mb-2"/>
            <x-text-input id="title" type="text" wire:model="title" :value="old('title')" placeholder="Vacancy title" class="block mt-1 w-full" autofocus/>

            @error('title')
                <livewire:show-alert :message="$message" />
            @enderror
        </div>

        {{-- Show select salaries --}}
        <div>
            <x-input-label for="salary" :value="__('Vacancy salary')" class="mb-2" />
            <x-input-select wire:model='salary'>
                <option value="">-- Select --</option>
                @foreach ( $salaries as $salary)
                    <option value="{{ $salary->id }}">{{ $salary->salary}}</option>
                @endforeach
            </x-input-select>

            @error('salary')
                <livewire:show-alert :message="$message" />
            @enderror
        </div>

        {{-- Show select categories --}}
        <div>
            <x-input-label for="category" :value="__('Vacancy category')" class="mb-2" />
            <x-input-select wire:model='category'>
                <option value="">-- Select --</option>
                @foreach ($categories as $category )
                    <option value="{{ $category->id }}">{{ $category->category}}</option>
                @endforeach
            </x-input-select>

            @error('category')
                <livewire:show-alert :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="company" :value="__('Company name')" class="mb-2" />
            <x-text-input id="company" type="text" wire:model="company" :value="old('company')"
                placeholder="E.g. Apple, Google, Microsoft" class="block mt-1 w-full" />
            @error('company')
                <livewire:show-alert :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="last_date" :value="__('Last date for apply')" class="mb-2" />
            <x-text-input id="last_date" type="date" wire:model="last_date" :value="old('last_date')"
                class="block mt-1 w-full" />
            @error('last_date')
                <livewire:show-alert :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="description" :value="__('Vacancy description')" class="mb-2" />
            <x-input-textarea id="description" wire:model="description" cols="30" rows="10" class="w-full">
                {{ old('description') }}
            </x-input-textarea>
            @error('description')
                <livewire:show-alert :message="$message" />
            @enderror
        </div>

        <div>
            <x-input-label for="file" :value="__('File')" class="mb-2" />
            <x-text-input id="file" type="file" wire:model="file" class="block mt-1 w-full" accept="image/*" />
            @error('file')
                <livewire:show-alert :message="$message" />
            @enderror

            <div class="my-5">
                @if($file)
                    Selected file:
                    <img src="{{ $file->temporaryUrl() }}" alt="img_tmp">
                    {{-- @dump($file)--}}
                @endif
            </div>
        </div>

        <div>
            <x-primary-button class="w-full justify-center my-6">
                {{ __('Create vacancy') }}
            </x-primary-button>
        </div>
    </form>
</div>
