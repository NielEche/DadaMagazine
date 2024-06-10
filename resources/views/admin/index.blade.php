<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Home
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
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">HOME PAGE</h3>
                <p class="text-lg px-6 pb-8 HalyardDisplay">
                    Welcome to the Admin dashboard, manage your home page details below
                </p>
            </div>
        </div>

    </div>

    <hr class="anm_mod left fast border-black dark:border-black">

    <div class="container-fluid mx-auto pt-6  bg-SelectColor">
        <div class="text-left text-black bg-SelectColor lg:px-24 p-0 relative z-10">
            <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">
                Home slider</h3>
        </div>
        <hr class="  border-black dark:border-black">
        <div class="flex items-center px-6 py-6">
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addSlider')" id="add-slider-button"
                class="ml-auto text-xl py-4 underline DINAlternateBold border p-6 rounded-full bg-SelectRed text-black">
                Add Image
            </button>
        </div>
        <div class=" flex flex-wrap">
            @foreach($homeGallerys as $gallery)
                <div class="flex lg:w-1/3 w-1/2 flex-wrap">
                    <div class="w-full relative gallerSec">
                        <div
                            class="absolute galleryOverlay inset-0 bg-black opacity-40 transition-opacity duration-300">
                        </div> <!-- Black overlay -->
                        <img alt="gallery image" class="block h-80 w-full object-cover object-center"
                            src="{{ $gallery->image_path }}" />
                        <div class="absolute inset-0 flex justify-center items-center text-white opacity-0 hover:opacity-100 transition-opacity duration-300"
                            style="font-weight:800; background-color: rgba(0, 0, 0, 0.8);">
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $gallery->id }}')"
                                class="text-xl py-4 underline DINAlternateBold border p-6 rounded-full bg-white text-black">EDIT</button>
                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $gallery->id }}')"
                                class="text-xl py-4 underline DINAlternateBold mx-2 p-6 rounded-full bg-SelectRed text-black">Delete</button>

                        </div>
                    </div>
                </div>
                <x-modal name="{{ $gallery->id }}" focusable>
                    <!-- Modal Content -->
                    <form method="post"
                        action="{{ route('home_gallerys.update', $gallery->id) }}"
                        class="p-6 bg-SelectColor" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                            {{ __('Edit Slider Section') }} Image {{ $gallery->id }}
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

                <x-modal name="delete{{ $gallery->id }}" focusable>
                    <!-- Modal Content -->
                    <form method="post"
                        action="{{ route('galleryDelete.destroy', $gallery->id) }}"
                        class="p-6 bg-SelectColor">
                        @csrf
                        @method('delete')

                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                            {{ __('Delete Gallery') }} Image
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

    @foreach($homeIssues as $issue)
        <div class="flex flex-col bg-black sm:flex-row">
            <div class="w-full sm:w-1/2">
                <div class="lg:px-20 px-16 p-16">
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'editHomeIsuuesModal')"
                        data-bs-target="#editHomeIsuuesModal"
                        class="text-3xl underline DINAlternateBold border p-6 rounded-full bg-white"
                        style="color:#31A264;">EDIT</button>
                </div>


                <div class="text-left text-white lg:pt-0 pt-0 lg:p-20 p-16">
                    <h3 class="MinionPro-Regular lg:text-8xl text-7xl leading-tight ">{{ $issue->title }}</h3>
                    <p class="BaskervilleBT text-xl pt-4 pb-8">{{ $issue->description }}</p>
                    <a href="{{ $issue->order_url }}" target="_blank" class="text-lg underline DINAlternateBold"
                        style="font-weight:800;">ORDER ISSUE</a>
                </div>
            </div>
            <div class="w-full sm:w-1/2 lg:p-20 p-6">
                <div class="">
                    <img src="{{ asset($issue->image_path) }}" alt="issue cover">
                </div>
            </div>
        </div>
    @endforeach


    @foreach($homeVideos as $video)
        <div class="video-container ">
            <div class="non-interactable-iframe-container">
                <iframe
                    src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1&mute=1&loop=1&playlist={{ $video->embed_code }}&controls=0"
                    frameborder="0" allowfullscreen class="non-interactable-iframe"></iframe>
                <div class="black-overlay"></div>
            </div>
            <div class="VidText-overlay">
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'editHomeVideosModal')"
                    data-bs-target="#editHomeVideosModal"
                    class="text-2xl my-4 underline DINAlternateBold border p-6 rounded-full bg-white text-black">EDIT</button>
                <br>
                <a href="{{ $video->video_url }}" target="_blank"
                    class="NHaasGroteskDSPro-65Md lg:text-2xl text-sm px-0 leading-none"
                    style="font-weight:900;">{{ $video->title }}</a>
            </div>
        </div>
    @endforeach



    <!-- @foreach($homeParallaxs as $parallax)
    <div class="parallax" 
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
     url('{{ $parallax->image_path }}'); position:relative; ">
      <div class="VidText-overlay">
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'editParallaxModal')"
                    class="text-2xl my-4 underline DINAlternateBold border p-6 rounded-full bg-white text-black">EDIT</button>
        
        </div>
    </div>
@endforeach-->

    <!-- MODALS MODALS MODALS MODALS -->
    <x-modal name="editHomeIsuuesModal" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('home_issues.update', $issue->id) }}"
            class="p-6 bg-SelectColor" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Edit Home Issue Section') }}
            </h2>

            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                {{ __('Edit the details for this section below') }}
            </p>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="title" :value="__('Name')">Title</p>
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                    :value="old('title', $issue->title)" required autofocus autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div class="mt-6 ">
                <p class="orpheusproMedium" for="description" :value="__('description')">Description</p>
                <textarea id="description" name="description"
                    class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                    required autofocus
                    autocomplete="description">{{ old('description', $issue->description) }}</textarea>

                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="order_url" :value="__('order_url')">Order url</p>
                <x-text-input id="order_url" name="order_url" type="text" class="mt-1 block w-full"
                    :value="old('order_url', $issue->order_url)" required autofocus autocomplete="order_url" />
                <x-input-error class="mt-2" :messages="$errors->get('order_url')" />
            </div>

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

    <x-modal name="editHomeVideosModal" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('home_videos.update', $video->id) }}"
            class="p-6 bg-SelectColor" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Edit Video Section') }}
            </h2>

            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                {{ __('Edit the details for this section below') }}
            </p>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="title" :value="__('Title')">Title</p>
                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                    :value="old('title', $video->title)" required autofocus autocomplete="title" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>



            <div class="mt-6 ">
                <p class="orpheusproMedium" for="embed_code" :value="__('embed_code')">Embed code </p>
                <x-text-input id="embed_code" name="embed_code" type="text" class="mt-1 block w-full"
                    :value="old('embed_code', $video->embed_code)" required autofocus autocomplete="embed_code" />
                <x-input-error class="mt-2" :messages="$errors->get('embed_code')" />
            </div>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="video_url" :value="__('video_url')">Video url</p>
                <x-text-input id="video_url" name="video_url" type="text" class="mt-1 block w-full"
                    :value="old('video_url', $video->video_url)" required autofocus autocomplete="video_url" />
                <x-input-error class="mt-2" :messages="$errors->get('video_url')" />
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


    <x-modal name="editParallaxModal" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('home_parallaxs.update', $issue->id) }}"
            class="p-6 bg-SelectColor" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Edit Parallax Section') }}
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


    <!-- MODALS MODALS MODALS MODALS -->
    <x-modal name="addSlider" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('GalleryImage.store') }}" class="p-6 bg-SelectColor"
            enctype="multipart/form-data">
            @csrf


            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Add a new Image ') }}
            </h2>


            <div class="mt-6">
                <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Image</p>
                <input type="file" name="image_path" id="image_path" class="mt-1 block w-full" required />
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


</x-admin-layout>
