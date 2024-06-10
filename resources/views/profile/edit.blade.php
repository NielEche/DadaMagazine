<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    

    <div class="py-12 bg-SelectColor">
        <div class="NHaasGroteskDSPro-65Md absolute bg-SelectRed top-0 left-0 right-0 w-full flex items-center justify-center px-11 py-4  sm:flex-row">
            
            <x-dropdown-link :href="route('dashboard')">
                dashboard
            </x-dropdown-link>

            <x-dropdown-link :href="route('profile.edit')">
                details
            </x-dropdown-link>
            
            <div class=" text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
                <!-- Logout Button -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>
                        logout
                    </>
                </form>     
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-6 ">
            <div class="p-4 sm:p-8 bg-SelectColor shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-SelectColor shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-SelectColor shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
