<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Issue
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
        <a class=" m-4 NHaasGroteskDSPro-65Md border-b border-black" href="{{ route('admin.issues') }}">BACK TO ISSUES</a>

            <div class="p-4 sm:p-8 bg-SelectColor">
                    <section>
                        <header class="lg:px-4">
                            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                {{ __('Edit Issue') }}
                            </h2>

                            <p class="mt-1 text-sm HalyardDisplay text-black dark:text-black">
                                {{ __("Update issue details") }}
                            </p>
                        </header>

                        <div class="h-full w-full flex justify-between flex-col sm:flex-row">
                            <form method="post" action="{{ route('issues.update', $issues->id) }}" class="lg:w-1/2  lg:px-4 space-y-6  lg:border-r-2 border-black" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <hr class="  border-black dark:border-black">

                                <div>
                                    <p class="orpheusproMedium" for="title" :value="__('Title')">Title</p>
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title', $issues->title)" required autofocus autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                <hr class="  border-black dark:border-black">

                                <div class="mt-6">
                                    <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Cover Image</p>
                                    <input type="file" :value="old('image_path', $issues->image_path)" name="image_path"
                                        id="image_path" class="mt-1 block w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                                    <img src="{{ $issues->image_path }}" class="h-40 py-2" alt="">
                                </div>

                                <hr class="  border-black dark:border-black">

                                <div>
                                    <p class="orpheusproMedium" for="published" :value="__('published')">Published</p>
                                    <textarea id="published" name="published"
                                        class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                                        :value="old('published', $issues->published)" required autofocus
                                        autocomplete="published">{{ $issues->published }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('published')" />
                                </div>

                                <hr class="  border-black dark:border-black">

                                <div class="">
                                    <p class="orpheusproMedium" for="featuring" :value="__('featuring')">Featuring</p>
                                    <textarea id="featuring" name="featuring"
                                        class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                                        :value="old('featuring', $issues->featuring)" required autofocus
                                        autocomplete="featuring">{{ $issues->featuring }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('featuring')" />
                                </div>

                          
                                 <hr class="  border-black dark:border-black">

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>


                                </div>
                            </form>
                            
                            @if($issuesImages->isEmpty())

                                <div class="lg:w-1/2 lg:px-4 w-full h-full flex items-center justify-center  bg-SelectColor">
                                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeatureImage')" id="add-issue-button"
                                        class="fixed mt-16 top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
                                        Add Image
                                    </button>
                                    <div class="text-center text-black lg:px-32 p-10 relative z-10">
                                        <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">
                                           Theres No Image for this Issue yet </h3>
                                    </div>
                                </div>
                            @else
                            <div class="lg:w-1/2 lg:px-10 container-fluid mx-auto">
                                     <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeatureImage')" id="add-issue-button"
                                        class="fixed mt-16 top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
                                        Add Image
                                    </button>
                                <h3 class="text-xl leading-none pb-6 font-semibold orpheusproMedium">
                                           Story images</h3>
                                    
                                <hr class="  border-black dark:border-black">
                                <div class=" flex flex-wrap mt-6">
                                    @foreach($issuesImages as $issuesImages)
                                        <div class="flex lg:w-1/3 w-1/2 px-4 py-2 ßflex-end flex-wrap">
                                            <div class="w-full relative gallerSec">
                                                <div
                                                    class="absolute galleryOverlay inset-0 bg-black opacity-0 transition-opacity duration-300">
                                                </div> <!-- Black overlay -->
                                                <img alt="issuesImages" class="block w-full h-full object-cover object-center"
                                                    src="{{ $issuesImages->image_path }}" />
                                                <div class="absolute inset-0 flex justify-center items-center text-white opacity-0 hover:opacity-100 transition-opacity duration-300"
                                                    style="font-weight:800; background-color: rgba(0, 0, 0, 0.2);">
                                                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $issuesImages->id }}')"
                                                        class="text-sm py-2 underline DINAlternateBold mx-2 p-2 rounded-full bg-white text-black">EDIT</button>
                                                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $issuesImages->id }}')"
                                                        class="text-sm py-2 underline DINAlternateBold  p-2 rounded-full bg-SelectRed text-black">Delete</button>

                                                </div>
                                            </div>
                                        </div>
                                        <x-modal name="{{ $issuesImages->id }}" focusable>
                                            <!-- Modal Content -->
                                            <form method="post"
                                                action="{{ route('issuesImage.update', $issuesImages->id) }}"
                                                class="p-6 bg-SelectColor" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')

                                                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                                    {{ __('Edit Issues Images Section') }} Image {{ $issuesImages->id }}
                                                </h2>

                                                <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                                    {{ __('Edit the details for this section below') }}
                                                </p>


                                                <div class="mt-6">
                                                    <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Image</p>
                                                    <input type="file" name="image_path" id="image_path" class="mt-1 block w-full" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
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
                                        

                                        <x-modal name="delete{{ $issuesImages->id }}" focusable>
                                            <!-- Modal Content -->
                                            <form method="post" action="{{ route('issuesDelete.destroy', $issuesImages->id) }}" class="p-6 bg-SelectColor">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                                    {{ __('Delete Issue') }} Image {{ $issuesImages->id }}
                                                </h2>

                                                <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                                    {{ __('Are you sure you want to delete image') }}
                                                </p>



                                                <div class="mt-6 flex justify-end">
                                                    <x-secondary-button x-on:click="$dispatch('close')">
                                                        {{ __('Cancel') }}
                                                    </x-secondary-button>

                                               
                                                    <x-danger-button class="ml-3">
                                                        {{ __('Delete Image') }}
                                                    </x-danger-button>
                                                </div>
                                            </form>

                                        </x-modal>
                                    @endforeach

                                </div>
                            </div>
                            @endif

                        </div>

                        
                    </section>
            </div>
        </div>
    </div>


        <!-- MODALS MODALS MODALS MODALS -->
        <x-modal name="addFeatureImage" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('issuesImage.store') }}" class="p-6 bg-SelectColor"
            enctype="multipart/form-data">
            @csrf


            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Add a new Image ') }}
            </h2>


            <div class="mt-6 hidden">
                <p class="orpheusproMedium" for="issue_id" :value="__('issue_id')">Id</p>
                <x-text-input id="issue_id"  name="issue_id" type="text" class="mt-1 block w-full" required autofocus
                    autocomplete="issue_id"  value="{{ $issues->id }}" />
                <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
            </div>


            <div class="mt-6">
                <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Image</p>
                <input type="file" name="image_path" id="image_path" class="mt-1 block w-full" required/>
                <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
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
