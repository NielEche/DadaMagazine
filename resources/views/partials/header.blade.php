
<header class="{{ Route::currentRouteName() === 'home' ? 'sticky-bottom' : 'sticky-top ' }}  z-[100]"  style="{{ Route::currentRouteName() === 'storiesM.edit' ? 'position: relative; bottom: 0;' : 'position: ; ' }}" id="{{ Route::currentRouteName() === 'home' ? 'stickyHeader' : '' }}">
    <style>
        @media screen and (max-width: 930px) { 
            .pright{
                left: 5% !important;
            }
        }

        .pright{
            right:45% !important;
        }
    </style>
    <nav x-data="{ open: false }" class="dark:border-gray-700" >
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-2 lg:px-8">
            <div class="my-2 flex justify-between h-12">
                    <!-- Navigation Links -->
                    <div class="flex hidden space-x-8  px-3 sm:flex">
                        <div class="hidden space-x-8 sm:-my-px px-3 sm:flex">
                            <x-nav-link href="{{ route('stories') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}" style="{{ Route::currentRouteName() === 'home' ? 'color:white !important; ' : '' }}"  :active="request()->routeIs('stories')">
                                stories
                            </x-nav-link>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px px-3 sm:flex ">
                            <x-nav-link href="{{ route('issues') }}" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}" style="{{ Route::currentRouteName() === 'home' ? 'color:white !important; ' : '' }}"  :active="request()->routeIs('issues')">
                                issues
                            </x-nav-link>
                        </div>
                    </div>

                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a class="md:font-bold text-3xl" href="{{ route('home') }}">
                            @if (Route::currentRouteName() === 'home')
                            <img class="my-10 hidden" src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171325/DADA_MAGAZINE_LOGO_2_da1fla_q5n9la.svg" alt="DADA LOGO W" style="width:100px !important;">
                            @else
                                <img class="{{ Route::currentRouteName() === 'storiesM.edit' ? 'pright' : '' }}"  src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171326/DADAMAGAZINELOGO_iqqxeo.svg" alt="DADA LOGO" style="width:100px !important; {{ Route::currentRouteName() === 'storiesM.edit' ? 'position: fixed; top: 3%;' : 'position: ; ' }}">
                            @endif
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex hidden space-x-8 sm:-my-px px-3 sm:flex">

                        <div class="hidden space-x-8 sm:-my-px px-3 sm:flex">
                            <x-nav-link href="{{ route('shop') }}"  class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}" style="{{ Route::currentRouteName() === 'home' ? 'color:white !important; ' : '' }}"  :active="request()->routeIs('shop')">
                                shop
                            </x-nav-link>
                        </div>
                   
                        <div class="hidden space-x-8 sm:-my-px px-3 sm:flex ">
                            <x-nav-link class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}" style="{{ Route::currentRouteName() === 'home' ? 'color:white !important; ' : '' }}" >
                            </x-nav-link>
                        </div>

                        <!--<div class="hidden space-x-8 px-3 sm:flex" >
                            @auth
                                <x-nav-link :href="route('dashboard')" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}"  style="{{ Route::currentRouteName() === 'home' ? 'color:white !important; ' : '' }}"  :active="request()->routeIs('dashboard')">
                                    profile
                                </x-nav-link>
                            @else
                                <x-nav-link :href="route('dashboard')" class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}" style="{{ Route::currentRouteName() === 'home' ? 'color:white !important; ' : '' }}"  :active="request()->routeIs('dashboard')">
                                    sign in
                                </x-nav-link>
                            @endauth
                        </div>-->
                        <!--<div class="hidden space-x-8 sm:-my-px px-3 sm:flex">
                            <x-nav-link class="{{ Route::currentRouteName() === 'home' ? 'hover-border ' : '' }}" >
                            @if (Route::currentRouteName() === 'home')
                                <img src="https://res.cloudinary.com/nieleche/image/upload/v1694717202/Vector_cmlqr8_1_lfdhna.svg" class="h-4 w-4" alt="search">
                            @else
                                <img src="https://res.cloudinary.com/nieleche/image/upload/v1692504782/Vector_cmlqr8.svg" class="h-4 w-4 " alt="search">
                            @endif
                            </x-nav-link>
                        </div>-->
                    </div>    
                <!-- Hamburger -->
                
                <div class="-mr-2 flex items-center sm:hidden">
                        @if (Route::currentRouteName() === 'home')
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white  hover:text-white-500 dark:hover:text-white-400 hover:bg-white-100 dark:hover:bg-white-900 focus:outline-none focus:bg-white-100 dark:focus:bg-white-900 focus:text-white-500 dark:focus:text-white-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @else
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-white-500 dark:hover:text-white-400 hover:bg-white-100 dark:hover:bg-white-900 focus:outline-none focus:bg-white-100 dark:focus:bg-white-900 focus:text-white-500 dark:focus:text-white-400 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        @endif
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open} " class="hidden sm:hidden bg-SelectColor ">
            

            <!-- Responsive Settings Options -->
            <div class="py-2 space-y-1 border-t border-gray-200 dark:border-gray-600">
                <x-responsive-nav-link  :href="route('shop')">
                        shop
                </x-responsive-nav-link>
            </div>
            <div class="py-2 space-y-1 border-t border-gray-200 dark:border-gray-600">
                <x-responsive-nav-link :href="route('stories')">
                        stories
                </x-responsive-nav-link>
            </div>
            <div class="py-2 space-y-1 border-t border-gray-200 dark:border-gray-600">
                <x-responsive-nav-link :href="route('issues')">
                        issues
                </x-responsive-nav-link>
            </div>
            <!-- <div class="py-2 space-y-1 border-t border-gray-200 dark:border-gray-600">
                @auth
                    <x-responsive-nav-link :href="route('dashboard')">
                        hello {{ auth()->user()->name }} !
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('dashboard')">
                            sign in
                    </x-responsive-nav-link>
                @endauth
            </div>-->
            <!--<div class="py-2 px-5 space-y-1 border-t border-b border-gray-200 dark:border-gray-600 flex justify-between">
                <x-responsive-nav-link :href="route('profile.edit')">
                    <img src="https://res.cloudinary.com/nieleche/image/upload/v1692504782/Vector_cmlqr8.svg" class="h-4 w-4 text-black" alt="search">         
                </x-responsive-nav-link>

            </div>-->
        </div>
    </nav>
</header>
        