<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Club
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


    <div class="py-12 bg-SelectColor ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-6 ">
        <a class=" m-4 NHaasGroteskDSPro-65Md border-b border-black" href="{{ route('admin.club') }}">BACK TO SHOP</a>

            <div class="p-4 sm:p-8 bg-SelectColor">
                    <section>
                        <header class="lg:px-4">
                            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                {{ __('Edit Update') }}
                            </h2>

                            <p class="mt-1 text-sm HalyardDisplay text-black dark:text-black">
                                {{ __("Update details") }}
                            </p>
                        </header>

                        <div class="h-full w-full flex justify-between flex-col sm:flex-row">
                            <form method="post" action="{{ route('clubUpdates.update',  $clubUpdates->id) }}" class="lg:w-1/2  lg:px-4 space-y-6  lg:border-r-2 border-black" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <hr class="  border-black dark:border-black">

                                <div class="hidden">
                                    <p class="orpheusproMedium" for="title" :value="__('Title')">Title</p>
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title',  $clubUpdates->title)" autofocus autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                            

                                <div class="hidden">
                                    <p class="orpheusproMedium" for="link" :value="__('Link')">link</p>
                                    <x-text-input id="link" name="link" type="text" class="mt-1 block w-full"
                                        :value="old('link',  $clubUpdates->link)" autofocus autocomplete="link" />
                                    <x-input-error class="mt-2" :messages="$errors->get('link')" />
                                </div>

                                <div class="mt-6 hidden">
                                    <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Image</p>
                                    <input type="file" :value="old('image_path',  $clubUpdates->image_path)" name="image_path"
                                        id="image_path" class="mt-1 block w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                                    <img src="{{  $clubUpdates->image_path }}" class="h-40 py-2" alt="">
                                </div>

                              

                                <div>
                                    <p class="orpheusproMedium" for="text" :value="__('text')">Code</p>
                                    <textarea id="text" name="text"
                                        class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                                        :value="old('text',  $clubUpdates->text)" autofocus
                                        autocomplete="text">{{  $clubUpdates->text }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('text')" />
                                </div>

                          
                                 <hr class="  border-black dark:border-black">

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>


                                </div>
                            </form>
                    
                        </div>

                        
                    </section>
            </div>
        </div>
    </div>


    <hr class="  border-black dark:border-black">


</x-admin-layout>
