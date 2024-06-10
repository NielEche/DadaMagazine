<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="h-screen bg-SelectColor">
       
        <div class="w-full h-full flex items-center justify-center">
            <div class="text-center text-black lg:px-32 p-10 relative z-10">
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">Hello: {{ Auth::user()->name }}</h3>
                <p class="text-lg px-6 pb-8 HalyardDisplay">
                   Welcome to your account dashboard, manage your account details <a class="underline DINAlternateBold" href="{{ route('profile.edit') }}" >here</a>.
                </p>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a class="underline DINAlternateBold text-xl" href="{{ route('admin.dashboard') }}">Admin Panel</a>
                @endif
            </div>
        </div>

            <div class=" NHaasGroteskDSPro-65Md absolute bg-black top-0 left-0 right-0 w-full flex items-center justify-center px-11 py-4  sm:flex-row">
              
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
    </div>

    <hr class="  border-black dark:border-black">

</x-app-layout>
