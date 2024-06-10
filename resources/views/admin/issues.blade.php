<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Issues
        </h2>
    </x-slot>

    @if(session('success'))
        <div class="absolute top-0 left-0 mt-4 mr-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
            role="alert" id="success-message">
            <strong class="font-bold">Successful update!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        <script>
            setTimeout(function () {
                document.getElementById('success-message').style.display = 'none';
            }, 5000); // 5000 milliseconds (5 seconds)

        </script>
    @endif



    <div class="h-screen bg-SelectColor">
        <div class="w-full h-full flex items-center justify-center">
            <div class="text-center text-black lg:px-32 p-10 relative z-10">
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">ISSUES PAGE</h3>
                <p class="text-lg px-6 pb-8 HalyardDisplay">
                    Welcome to the Admin Issues Page, manage your Issues below
                </p>
            </div>
        </div>

    </div>


    <hr class="  border-black dark:border-black">

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeature')" id="add-feature-button"
        class="fixed mt-16 top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
        Add Issue
    </button>

    <!-- JavaScript to toggle button visibility -->
    <script>
        // Get the button element
        const addButton = document.getElementById('add-feature-button');

        // Add an event listener for scroll
        window.addEventListener('scroll', () => {
            // Check the scroll position
            if (window.scrollY > 100) {
                // Show the button when scrolled down
                addButton.style.display = 'block';
            } else {
                // Hide the button when at the top
                addButton.style.display = 'none';
            }
        });

    </script>


    @if($issues->isEmpty())

        <div class="w-full h-full flex items-center justify-center  bg-SelectColor">
            <div class="text-center text-black lg:px-32 p-10 relative z-10">
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">
                    No Issues recorded</h3>
            </div>
        </div>
    @else


        <div class="bg-SelectColor py-10">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex justify-between flex-wrap">
                    @foreach($issues as $issue)
                        <div class="flex-initial w-80 pt-4">
                            <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                                <div class=" text-center">
                                    <img src="{{ $issue->image_path }}" alt="Image"
                                        class="object-contain storiesBox" />
                                    <p class="text-base pt-3 HaasGroteskDSPro-65Md" style="font-weight:800;">
                                        {{ $issue->title }} </p>
                                    <p class="HalyardDisplay pb-2">
                                        {{  $issue->published  }}
                                    </p>
                                    <div class="flex justify-between border-t  border-black dark:border-black pt-4">
                                        <a href="{{ route('issues.edit', $issue->id) }}"
                                            class="text-sm DINAlternateBold">Edit</a>
                                        <a href="{{ route('issues.edit', $issue->id) }}"
                                            class="text-sm DINAlternateBold">Add images</a>
                                        <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $issue->id }}')"
                                            class="text-sm DINAlternateBold">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-modal name="delete{{ $issue->id }}" focusable>
                            <!-- Modal Content -->
                            <form method="post" action="{{ route('features.destroy', $issue->id) }}" class="p-6 bg-SelectColor">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                    {{ __('Delete Issue') }} 
                                </h2>

                                <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                    {{ __('Are you sure you want to delete Issue') }}
                                </p>



                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                
                                    <x-danger-button class="ml-3">
                                        {{ __('Delete Issue') }}
                                    </x-danger-button>
                                </div>
                            </form>

                        </x-modal>
                    @endforeach
                </div>
                <div class=" text-center space-y-1 mt-9">
                    <a href="#" class="text-lg underline DINAlternateBold py-4"
                        style="font-weight:900;">{{ $issues->links() }}</a>
                </div>
            </div>
        </div>
    @endif



    <!-- MODALS MODALS MODALS MODALS -->
    <x-modal name="addFeature" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('issues.store') }}" class="p-6 bg-SelectColor"
            enctype="multipart/form-data">
            @csrf


            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Add a new Issue ') }}
            </h2>

            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                {{ __('Please add details of new magazine Issue below') }}
            </p>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="title" :value="__('Name')">Title</p>
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" required autofocus
                    autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>


            <div class="mt-6">
                <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Cover Image</p>
                <input type="file" name="image_path" id="image_path" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
            </div>

     


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="published" :value="__('published')">Published Date</p>
                <textarea id="published" name="published"
                    class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                    required autofocus autocomplete="published"></textarea>

                <x-input-error class="mt-2" :messages="$errors->get('published')" />
            </div>



            <div class="mt-6 ">
                <p class="orpheusproMedium" for="featuring" :value="__('featuring')">Featuring</p>
                <textarea id="featuring" name="featuring"
                    class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                    required autofocus autocomplete="featuring" value="null"></textarea>

                <x-input-error class="mt-2" :messages="$errors->get('featuring')" />
            </div>

       
       

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ml-3">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </form>

    </x-modal>



    <hr class="  border-black dark:border-black">

</x-admin-layout>
