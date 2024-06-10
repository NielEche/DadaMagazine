<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Feature
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
        <a class=" m-4 NHaasGroteskDSPro-65Md border-b border-black" href="{{ route('admin.feature') }}">BACK TO STORIES</a>

            <div class="p-4 sm:p-8 bg-SelectColor">
                    <section>
                        <header class="lg:px-4">
                            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                {{ __('Edit Story') }}
                            </h2>

                            <p class="mt-1 text-sm HalyardDisplay text-black dark:text-black">
                                {{ __("Update story details") }}
                            </p>
                        </header>

                        <div class="h-full w-full flex justify-between flex-col sm:flex-row">
                            <form method="post" action="{{ route('features.update', $features->id) }}" class="lg:w-1/2  lg:px-4 space-y-6 lg:border-r-2 border-black" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <hr class="  border-black dark:border-black">

                                <div>
                                    <p class="orpheusproMedium" for="title" :value="__('Title')">Title</p>
                                    <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                        :value="old('title', $features->title)" required autofocus autocomplete="title" />
                                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                                </div>
                                <hr class="  border-black dark:border-black">

                                <div class="mt-6">
                                    <p class="orpheusproMedium" for="image_path" :value="__('image_path')">Cover Image</p>
                                    <input type="file" :value="old('title', $features->title)" name="image_path"
                                        id="image_path" class="mt-1 block w-full" />
                                    <x-input-error class="mt-2" :messages="$errors->get('image_path')" />
                                    <img src="{{ $features->image_path }}" class="h-40 py-2" alt="">
                                </div>

                                <hr class="  border-black dark:border-black">

                                <div>
                                    <p class="orpheusproMedium" for="credit" :value="__('credit')">Credit</p>
                                    <textarea id="credit" name="credit"
                                        class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                                        :value="old('credit', $features->credit)" required autofocus
                                        autocomplete="credit">{{ $features->credit }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('credit')" />
                                </div>

                                <hr class="  border-black dark:border-black">

                                <!--<div class="hidden">
                                    <p class="orpheusproMedium" for="caption" :value="__('caption')">Caption</p>
                                    <textarea id="caption" name="caption"
                                        class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                                        :value="old('caption', $features->caption)" required autofocus
                                        autocomplete="caption">{{ $features->caption }}</textarea>
                                    <x-input-error class="mt-2" :messages="$errors->get('caption')" />
                                </div>-->

                                <hr class="  border-black dark:border-black">

                                <style>
                                    .ck-editor__editable[role="textbox"] {
                                        /* editing area */
                                        min-height: 200px;
                                    }

                                    .ck-content .image {
                                        /* block images */
                                        max-width: 80%;
                                        margin: 20px auto;
                                    }

                                </style>


                                <div class="mt-6" id="container">
                                    <p class="orpheusproMedium" for="credit" :value="__('credit')">Story Content</p>

                                    <textarea name="content"
                                        class="editor alyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full resize-y"
                                        id="editor">{{ $features->content }}</textarea>
                                </div>
                                <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>

                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editor'))
                                        .then(editor => {
                                            editor.model.document.on('change:data', () => {
                                                // Update the hidden textarea with CKEditor data
                                                document.querySelector('textarea[name="editorData"]').value =
                                                    editor.getData();
                                            });
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });

                                </script>

                                <script>
                                    // This sample still does not showcase all CKEditor&nbsp;5 features (!)
                                    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
                                    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                                        toolbar: {
                                            items: [
                                                'exportPDF', 'exportWord', '|',
                                                'findAndReplace', 'selectAll', '|',
                                                'heading', '|',
                                                'bold', 'italic', 'strikethrough', 'underline', 'code',
                                                'subscript',
                                                'superscript', 'removeFormat', '|',
                                                'bulletedList', 'numberedList', 'todoList', '|',
                                                'outdent', 'indent', '|',
                                                'undo', 'redo',
                                                '-',
                                                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor',
                                                'highlight', '|',
                                                'alignment', '|',
                                                'link', 'insertImage', 'blockQuote', 'insertTable',
                                                'mediaEmbed', 'codeBlock',
                                                'htmlEmbed', '|',
                                                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                                'textPartLanguage', '|',
                                                'sourceEditing'
                                            ],
                                            shouldNotGroupWhenFull: true
                                        },
                                        // Changing the language of the interface requires loading the language file using the <script> tag.
                                        // language: 'es',
                                        list: {
                                            properties: {
                                                styles: true,
                                                startIndex: true,
                                                reversed: true
                                            }
                                        },
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                                        heading: {
                                            options: [{
                                                    model: 'paragraph',
                                                    title: 'Paragraph',
                                                    class: 'ck-heading_paragraph'
                                                },
                                                {
                                                    model: 'heading1',
                                                    view: 'h1',
                                                    title: 'Heading 1',
                                                    class: 'ck-heading_heading1'
                                                },
                                                {
                                                    model: 'heading2',
                                                    view: 'h2',
                                                    title: 'Heading 2',
                                                    class: 'ck-heading_heading2'
                                                },
                                                {
                                                    model: 'heading3',
                                                    view: 'h3',
                                                    title: 'Heading 3',
                                                    class: 'ck-heading_heading3'
                                                },
                                                {
                                                    model: 'heading4',
                                                    view: 'h4',
                                                    title: 'Heading 4',
                                                    class: 'ck-heading_heading4'
                                                },
                                                {
                                                    model: 'heading5',
                                                    view: 'h5',
                                                    title: 'Heading 5',
                                                    class: 'ck-heading_heading5'
                                                },
                                                {
                                                    model: 'heading6',
                                                    view: 'h6',
                                                    title: 'Heading 6',
                                                    class: 'ck-heading_heading6'
                                                }
                                            ]
                                        },
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                                        placeholder: 'add content here',
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                                        fontFamily: {
                                            options: [
                                                'BaskervilleBT',
                                                'Arial, Helvetica, sans-serif',
                                                'Courier New, Courier, monospace',
                                                'Georgia, serif',
                                                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                                'Tahoma, Geneva, sans-serif',
                                                'Times New Roman, Times, serif',
                                                'Trebuchet MS, Helvetica, sans-serif',
                                                'Verdana, Geneva, sans-serif'
                                            ],
                                            supportAllValues: true
                                        },
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                                        fontSize: {
                                            options: [10, 12, 14, 'BaskervilleBT', 18, 20, 22],
                                            supportAllValues: true
                                        },
                                        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                                        htmlSupport: {
                                            allow: [{
                                                name: /.*/,
                                                attributes: true,
                                                classes: true,
                                                styles: true
                                            }]
                                        },
                                        // Be careful with enabling previews
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                                        htmlEmbed: {
                                            showPreviews: true
                                        },
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                                        link: {
                                            decorators: {
                                                addTargetToExternalLinks: true,
                                                defaultProtocol: 'https://',
                                                toggleDownloadable: {
                                                    mode: 'manual',
                                                    label: 'Downloadable',
                                                    attributes: {
                                                        download: 'file'
                                                    }
                                                }
                                            }
                                        },
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                                        mention: {
                                            feeds: [{
                                                marker: '@',
                                                feed: [
                                                    '@apple', '@bears', '@brownie', '@cake', '@cake',
                                                    '@candy',
                                                    '@canes', '@chocolate', '@cookie', '@cotton',
                                                    '@cream',
                                                    '@cupcake', '@danish', '@donut', '@dragée',
                                                    '@fruitcake',
                                                    '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                                    '@liquorice', '@macaroon', '@marzipan', '@oat',
                                                    '@pie', '@plum',
                                                    '@pudding', '@sesame', '@snaps', '@soufflé',
                                                    '@sugar', '@sweet', '@topping', '@wafer'
                                                ],
                                                minimumCharacters: 1
                                            }]
                                        },
                                        // The "super-build" contains more premium features that require additional configuration, disable them below.
                                        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                                        removePlugins: [
                                            // These two are commercial, but you can try them out without registering to a trial.
                                            // 'ExportPdf',
                                            // 'ExportWord',
                                            'CKBox',
                                            'CKFinder',
                                            'EasyImage',
                                            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                                            // Storing images as Base64 is usually a very bad idea.
                                            // Replace it on production website with other solutions:
                                            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                                            // 'Base64UploadAdapter',
                                            'RealTimeCollaborativeComments',
                                            'RealTimeCollaborativeTrackChanges',
                                            'RealTimeCollaborativeRevisionHistory',
                                            'PresenceList',
                                            'Comments',
                                            'TrackChanges',
                                            'TrackChangesData',
                                            'RevisionHistory',
                                            'Pagination',
                                            'WProofreader',
                                            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                                            // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                                            'MathType',
                                            // The following features are part of the Productivity Pack and require additional license.
                                            'SlashCommand',
                                            'Template',
                                            'DocumentOutline',
                                            'FormatPainter',
                                            'TableOfContents',
                                            'PasteFromOfficeEnhanced'
                                        ]
                                    });

                                </script>
                                 <hr class="  border-black dark:border-black">

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>


                                </div>
                            </form>
                            <hr>
                            
                            <div class="lg:w-1/2 py-6">
                            
                                @if($featuresImages->isEmpty())
                                    <div class="lg:w-1/2 lg:px-4 w-full h-full flex items-center justify-center  bg-SelectColor">
                                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeatureImage')" id="add-feature-button"
                                            class="  top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
                                            Add Image
                                        </button>
                                        <div class="text-center text-black lg:px-32 p-10 relative z-10">
                                            <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">
                                                Theres No Image for this Story yet</h3>
                                        </div>
                                    </div>
                                    @else
                                    <div class="lg:full lg:px-10 container-fluid mx-auto">
                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeatureImage')" id="add-feature-button"
                                                class=" mt-16 top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
                                                Add Image
                                            </button>
                                        <h3 class="text-xl leading-none py-8 font-semibold orpheusproMedium">
                                                Story images</h3>
                                            
                                        <hr class="  border-black dark:border-black">
                                        <div class=" flex flex-wrap mt-6">
                                            @foreach($featuresImages as $featuresImages)
                                                <div class="flex lg:w-1/3 w-1/2 px-4 flex-end flex-wrap">
                                                    <div class="w-full relative gallerSec">
                                                        <div
                                                            class="absolute galleryOverlay inset-0 bg-black opacity-0 transition-opacity duration-300">
                                                        </div> <!-- Black overlay -->
                                                        <img alt="featuresImages" class="block w-full h-full object-cover object-center"
                                                            src="{{ $featuresImages->image_path }}" />
                                                        <div class="absolute inset-0 flex justify-center items-center text-white opacity-0 hover:opacity-100 transition-opacity duration-300"
                                                            style="font-weight:800; background-color: rgba(0, 0, 0, 0.2);">
                                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $featuresImages->id }}')"
                                                                class="text-sm py-2 underline DINAlternateBold mx-2 p-2 rounded-full bg-white text-black">EDIT</button>
                                                            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $featuresImages->id }}')"
                                                                class="text-sm py-2 underline DINAlternateBold  p-2 rounded-full bg-SelectRed text-black">Delete</button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <x-modal name="{{ $featuresImages->id }}" focusable>
                                                    <!-- Modal Content -->
                                                    <form method="post"
                                                        action="{{ route('featuresImages.update', $featuresImages->id) }}"
                                                        class="p-6 bg-SelectColor" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')

                                                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                                            {{ __('Edit Story Images Section') }} Image {{ $featuresImages->id }}
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

                                                <x-modal name="delete{{ $featuresImages->id }}" focusable>
                                                    <!-- Modal Content -->
                                                    <form method="post" action="{{ route('featuresDelete.destroy', $featuresImages->id) }}" class="p-6 bg-SelectColor">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                                            {{ __('Delete Story') }} Image {{ $featuresImages->id }}
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
                          

                                @if($featuresVideos->isEmpty())

                                    <div class="lg:w-full lg:px-4 w-full flex items-center justify-center  bg-SelectColor">
                                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeatureVideo')" id="add-feature-button"
                                            class=" top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
                                            Add Image
                                        </button>
                                        <div class="text-center text-black lg:px-32 p-10 relative z-10">
                                            <h3 class="text-3xl leading-none py-8 font-semibold orpheusproMedium">
                                                Theres No Image for this Story yet</h3>
                                        </div>
                                    </div>
                                    @else
                                    <div class="lg:w-full lg:px-10 container-fluid mx-auto pt-32">
                                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeatureImage')" id="add-feature-button"
                                            class=" py-4  right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
                                            Add Video
                                        </button>
                                        <h3 class="text-xl leading-none py-8 font-semibold orpheusproMedium">
                                            Story Video</h3>
                                        
                                        <hr class="  border-black dark:border-black">
                                    <div class=" flex flex-wrap mt-6">
                                    @foreach($featuresVideos as $featuresVideos)
                                        <div class="flex lg:w-1/3 w-1/2 px-4 flex-end flex-wrap">
                                            <div class="w-full relative gallerSec">
                                                <div
                                                    class="absolute galleryOverlay inset-0 bg-black opacity-0 transition-opacity duration-300">
                                                </div> <!-- Black overlay -->
                                                <img alt="featuresVideos" class="block w-full h-full object-cover object-center"
                                                    src="{{ $featuresVideos->video_path }}" />
                                                <div class="absolute inset-0 flex justify-center items-center text-white opacity-0 hover:opacity-100 transition-opacity duration-300"
                                                    style="font-weight:800; background-color: rgba(0, 0, 0, 0.2);">
                                                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $featuresVideos->id }}')"
                                                        class="text-sm py-2 underline DINAlternateBold mx-2 p-2 rounded-full bg-white text-black">EDIT</button>
                                                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $featuresVideos->id }}')"
                                                        class="text-sm py-2 underline DINAlternateBold  p-2 rounded-full bg-SelectRed text-black">Delete</button>

                                                </div>
                                            </div>
                                        </div>
                                        <x-modal name="{{ $featuresVideos->id }}" focusable>
                                            <!-- Modal Content -->
                                            <form method="post"
                                                action="{{ route('featuresVideos.update', $featuresVideos->id) }}"
                                                class="p-6 bg-SelectColor" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')

                                                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                                    {{ __('Edit Story Video Section') }} Image {{ $featuresVideos->id }}
                                                </h2>

                                                <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                                    {{ __('Edit the details for this section below') }}
                                                </p>


                                                <div class="mt-6">
                                                    <p class="orpheusproMedium" for="video_path" :value="__('video_path')">Video link</p>
                                                    <input type="text" name="video_path" id="video_path" class="mt-1 block w-full" />
                                                    <x-input-error class="mt-2" :messages="$errors->get('video_path')" />
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

                                        <x-modal name="delete{{ $featuresVideos->id }}" focusable>
                                            <!-- Modal Content -->
                                            <form method="post" action="{{ route('featuresVideoDelete.destroy', $featuresVideos->id) }}" class="p-6 bg-SelectColor">
                                                @csrf
                                                @method('delete')

                                                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                                    {{ __('Delete Story') }} Video {{ $featuresVideos->id }}
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
                        </div>

                        
                    </section>
            </div>
        </div>
    </div>


        <!-- MODALS MODALS MODALS MODALS -->
        <x-modal name="addFeatureImage" focusable>
            <!-- Modal Content -->
            <form method="post" action="{{ route('featuresImage.store') }}" class="p-6 bg-SelectColor"
                enctype="multipart/form-data">
                @csrf


                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                    {{ __('Add a new Image ') }}
                </h2>


                <div class="mt-6 hidden">
                    <p class="orpheusproMedium" for="feature_id" :value="__('feature_id')">Id</p>
                    <x-text-input id="feature_id"  name="feature_id" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="feature_id"  value="{{ $features->id }}" />
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


        <x-modal name="addFeatureVideo" focusable>
            <!-- Modal Content -->
            <form method="post" action="{{ route('featuresVideo.store') }}" class="p-6 bg-SelectColor"
                enctype="multipart/form-data">
                @csrf


                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                    {{ __('Add a new Image ') }}
                </h2>


                <div class="mt-6 hidden">
                    <p class="orpheusproMedium" for="feature_id" :value="__('feature_id')">Id</p>
                    <x-text-input id="feature_id"  name="feature_id" type="text" class="mt-1 block w-full" required autofocus
                        autocomplete="feature_id"  value="{{ $features->id }}" />
                    <x-input-error class="mt-2" :messages="$errors->get('video_path')" />
                </div>


                <div class="mt-6">
                    <p class="orpheusproMedium" for="video_path" :value="__('video_path')">Image</p>
                    <input type="text" name="video_path" id="video_path" class="mt-1 block w-full" required/>
                    <x-input-error class="mt-2" :messages="$errors->get('video_path')" />
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
