{{-- x-guest-layout render from app/View/Components/GuestLayout.php --}}
<x-guest-layout>
    <p class="text-center text-gray-700 dark:text-gray-300 font-bold text-xl mb-4">
        Create Account
    </p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Rol select --}}
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Account type')" />
            <select
                name="rol"
                id="rol"
                class="w-full mt-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            >
                <option value="" default>-- Seleccionar --</option>
                <option value="1">Recruiter - Publicar vacantes</option>
                <option value="2">Developer - Buscar empleo</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between my-4">
            {{-- @if (Route::has('password.request'))
            @endif --}}

            <x-guest-links href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </x-guest-links>

            <x-guest-links href="{{ route('login') }}">
                {{ __('You have an account?') }}
            </x-guest-links>

        </div>

        <x-primary-button class="w-full justify-center my-4">
            {{ __('Create account') }}
        </x-primary-button>
    </form>
</x-guest-layout>
