<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="flex justify-center text-black py-4 ">
        <a class="md:font-bold text-3xl" href="{{ route('home') }}">
            <img src="https://res.cloudinary.com/nieleche/image/upload/v1694223892/DADA_MAGAZINE_LOGO_pibvie.svg" alt="DADA LOGO">
         </a>
    </div>
    <hr class="  border-black dark:border-black">
   

    <form class="py-6" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-white border-white dark:border-white text-black shadow-sm focus:ring-black dark:focus:ring-black dark:focus:ring-offset-black" name="remember">
                <span class="ml-2 text-sm text-gray-600 NHaasGroteskDSPro-65Md dark:text-black">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button >
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <hr class="  border-black dark:border-black">
    <div class="flex items-center justify-between mt-4">

        @if (Route::has('password.request'))
            <a class="DINAlternateBold underline text-sm text-black dark:text-black hover:text-gray-600 dark:hover:text-gray-500 " href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <a class="DINAlternateBold flex justify-end py-2 text-black text-sm" href="{{ route('register') }}">Register</a>

    </div>
</x-guest-layout>
