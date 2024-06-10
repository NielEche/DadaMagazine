<header class="md:invisible lg-hide" style="z-index:100;" id="stickyHeader">

    <style>
        @media screen and (min-width: 644px) {
        .lg-hide {
            display:none !important;
        }
        }
    </style>

    <nav x-data="{ open: false }" class="bg-black dark:border-gray-700"  style="box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
        <!-- Primary Navigation Menu -->
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-12">
             

                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a class="md:font-bold text-3xl" href="{{ route('admin.dashboard') }}">
                           <img src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171325/DADA_MAGAZINE_LOGO_2_da1fla_q5n9la.svg" alt="DADA LOGO">
                        </a>
                    </div>

                  

                <!-- Hamburger -->
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-white dark:text-white-500 hover:text-white-500 dark:hover:text-white-400 hover:bg-white-100 dark:hover:bg-white-900 focus:outline-none focus:bg-white-100 dark:focus:bg-white-900 focus:text-white-500 dark:focus:text-white-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
            

            <!-- Responsive Settings Options -->
       
            <div class="py-2 space-y-1 border-t border-white-200 dark:border-white-600">
                <x-responsive-nav-link style="color:white;" href="{{ route('admin.feature') }}">
                    stories
                </x-responsive-nav-link>
            </div>
            <div class="py-2 space-y-1 border-t border-white-200 dark:border-white-600">
                <x-responsive-nav-link style="color:white;" href="{{ route('admin.issues') }}">
                    issues
                </x-responsive-nav-link>
            </div>
            <div class="py-2 space-y-1 border-t border-white-200 dark:border-white-600">
                <x-responsive-nav-link style="color:white;" href="{{ route('admin.club') }}">
                    shop
                </x-responsive-nav-link>
            </div>
            <div class="py-2 space-y-1 border-t border-white-200 dark:border-white-600">
              <x-responsive-nav-link style="color:white;" href="{{ route('admin.about') }}">
                  about
              </x-responsive-nav-link>
            </div>
        </div>
    </nav>

</header>

<aside style="z-index:100; width:10%;" id="default-sidebar" class=" fixed top-0 left-0 z-40 w-40 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
   <div class="h-full px-3 py-4 overflow-y-auto bg-black ">
      <ul class="space-y-2 font-medium">
       
         <li class="py-4">
            <a class="md:font-bold text-3xl" href="{{ route('home') }}">
                <img src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171325/DADA_MAGAZINE_LOGO_2_da1fla_q5n9la.svg" alt="DADA LOGO">
            </a>
         </li>
         <li class="py-6 text-center">
             <x-nav-link style="color:white;" href="{{ route('admin.dashboard') }}" :active="request()->routeIs('features')">
                    home
                </x-nav-link>
        </li>
         <li class="py-6 text-center">
            <x-nav-link style="color:white;" href="{{ route('admin.feature') }}" :active="request()->routeIs('features')">
                stories
            </x-nav-link>
         </li>
         <li class="py-6 text-center">
            <x-nav-link style="color:white;" href="{{ route('admin.about') }}" :active="request()->routeIs('features')">
                about
            </x-nav-link>
         </li>
         <li class="py-6 text-center">
            <x-nav-link style="color:white;" href="{{ route('admin.issues') }}" :active="request()->routeIs('issues')">
            issues
            </x-nav-link>
         </li>
         <li class="py-6 text-center">
            <x-nav-link style="color:white;" href="{{ route('admin.club') }}" :active="request()->routeIs('club')">
                shop
            </x-nav-link>
         </li>
      </ul>
   </div>
</aside>

