{{-- x-guest-layout render from app/View/Components/GuestLayout.php --}}
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <p class="text-center text-gray-700 dark:text-gray-300 font-bold text-xl mb-4">
        Login
    </p>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                            class="block mt-1 w-full"
                            type="email"
                            name="email"
                            :value="old('email')"
                            autofocus
                            autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-between my-4">
            {{-- @if (Route::has('password.request'))
            @endif --}}

            <x-guest-links href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </x-guest-links>

            <x-guest-links href="{{ route('register') }}">
                {{ __('You still don\'t have an account?') }}
            </x-guest-links>

        </div>

        <x-primary-button class="w-full justify-center my-4">
            {{ __('Log in') }}
        </x-primary-button>
    </form>
</x-guest-layout>
