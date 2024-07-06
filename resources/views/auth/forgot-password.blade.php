{{-- x-guest-layout render from app/View/Components/GuestLayout.php --}}
<x-guest-layout>

    <p class="text-center text-gray-700 dark:text-gray-300 font-bold text-xl mb-4">
        Reset password
    </p>
    
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>
        
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between my-4">
            {{-- @if (Route::has('password.request'))
            @endif --}}

            <x-guest-links href="{{ route('login') }}">
                {{ __('You have an account?') }}
            </x-guest-links>

            <x-guest-links href="{{ route('register') }}">
                {{ __('You still don\'t have an account?') }}
            </x-guest-links>

        </div>

        <x-primary-button class="w-full justify-center my-4">
            {{ __('Email password reset link') }}
        </x-primary-button>
    </form>
</x-guest-layout>
