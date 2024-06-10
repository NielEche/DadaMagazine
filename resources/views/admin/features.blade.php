<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Admin Stories
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
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">STORIES PAGE</h3>
                <p class="text-lg px-6 pb-8 HalyardDisplay">
                    Welcome to the Admin Stories Page, manage your stories below
                </p>
            </div>
        </div>

    </div>


    <hr class="  border-black dark:border-black">

    <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addFeature')" id="add-feature-button"
        class="fixed mt-16 top-4 right-4 bg-black  DINAlternateBold underline text-white px-4 py-2 rounded">
        Add Story
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


    @if($features->isEmpty())

        <div class="w-full h-full flex items-center justify-center  bg-SelectColor">
            <div class="text-center text-black lg:px-32 p-10 relative z-10">
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">
                    No Stories recorded</h3>
            </div>
        </div>
    @else


        <div class="bg-SelectColor py-10">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex justify-between flex-wrap">
                    @foreach($features as $feature)
                        <div class="flex-initial w-80 pt-4">
                            <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                                <div class=" text-center">
                                    <img src="{{ $feature->image_path }}" alt="Image"
                                        class="object-contain storiesBox" />
                                    <p class="text-base pt-3 HaasGroteskDSPro-65Md" style="font-weight:800;">
                                        {{ $feature->title }} </p>
                                    <p class="HalyardDisplay pb-2">
                                     {!! strlen(strip_tags($feature->content)) > 100 ? substr(strip_tags($feature->content), 0, 100) . '...' : strip_tags($feature->content) !!}
                                    </p>
                                    <div class="flex justify-between border-t  border-black dark:border-black pt-4">
                                        <a href="{{ route('features.edit', $feature->id) }}"
                                            class="text-sm DINAlternateBold">Edit</a>
                                        <a href="{{ route('features.edit', $feature->id) }}"
                                            class="text-sm DINAlternateBold">Add images</a>
                                        <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'delete{{ $feature->id }}')"
                                            class="text-sm DINAlternateBold">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <x-modal name="delete{{ $feature->id }}" focusable>
                            <!-- Modal Content -->
                            <form method="post" action="{{ route('features.destroy', $feature->id) }}" class="p-6 bg-SelectColor">
                                @csrf
                                @method('delete')

                                <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                    {{ __('Delete Story') }} 
                                </h2>

                                <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                    {{ __('Are you sure you want to delete story') }}
                                </p>



                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        {{ __('Cancel') }}
                                    </x-secondary-button>

                                
                                    <x-danger-button class="ml-3">
                                        {{ __('Delete Story') }}
                                    </x-danger-button>
                                </div>
                            </form>

                        </x-modal>
                    @endforeach
                </div>
                <div class=" text-center space-y-1 mt-9">
                    <a href="#" class="text-lg underline DINAlternateBold py-4"
                        style="font-weight:900;">{{ $features->links() }}</a>
                </div>
            </div>
        </div>
    @endif



    <!-- MODALS MODALS MODALS MODALS -->
    <x-modal name="addFeature" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('features.store') }}" class="p-6 bg-SelectColor"
            enctype="multipart/form-data">
            @csrf


            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Add a new story ') }}
            </h2>

            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                {{ __('Please add details of new magazine story below') }}
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

              <!-- Tab Content
            <div class="border-b mt-6">
             
                <nav class="flex">
                   
                    <button
                        class="orpheusproMedium tab-button px-4 py-2  text-gray-700 font-semibold border-b-2 border-transparent hover:border-black focus:outline-none focus:border-black"
                        data-tab="tab-1">
                        Select a Tag
                    </button>

                  
                    <button
                        class="orpheusproMedium tab-button px-4 py-2  text-gray-700 font-semibold border-b-2 border-transparent hover:border-black focus:outline-none focus:border-black"
                        data-tab="tab-2">
                        Type a Tag
                    </button>
                </nav>
            </div>

          
            <div class="mt-6">
               
                <div class="tab-content hidden" id="tab-1">
                    <div class="w-full px-2">
                        <p class="orpheusproMedium" for="tags" :value="__('tags')">Select a Tag</p>

                        @if($tags->isEmpty())
                            <p>No tags available</p>
                        @else
                            <select id="tags" name="tags"
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="">Select a Tag</option> 
                                @foreach($tags as $tag)
                                    <option value="{{ $tag }}"
                                        {{ old('tags') == $tag ? 'selected' : '' }}>
                                        {{ $tag }}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>

     
                <div class="tab-content hidden" id="tab-2">
                    <div class="w-full px-2">
                        <p class="orpheusproMedium" for="new_tag" :value="__('New Tag')">New Tag</p>
                        <x-text-input id="new_tag" name="new_tag" type="text" class="mt-1 block w-full" autofocus
                            autocomplete="tags" />
                        <x-input-error class="mt-2" :messages="$errors->get('new_tag')" />
                    </div>
                </div>
            </div>
            -->

            <!-- JavaScript to handle tab switching -->
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    // Get all tab buttons
                    const tabButtons = document.querySelectorAll(".tab-button");
                    // Get all tab contents
                    const tabContents = document.querySelectorAll(".tab-content");

                    // Add click event listeners to tab buttons
                    tabButtons.forEach((button) => {
                        button.addEventListener("click", () => {
                            // Hide all tab contents
                            tabContents.forEach((content) => {
                                content.style.display = "none";
                            });

                            // Show the selected tab content
                            const tabId = button.getAttribute("data-tab");
                            document.getElementById(tabId).style.display = "block";
                        });
                    });
                });

            </script>



            <div class="mt-6 ">
                <p class="orpheusproMedium" for="credit" :value="__('credit')">Credits</p>
                <textarea id="credit" name="credit"
                    class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                    required autofocus autocomplete="credit"></textarea>

                <x-input-error class="mt-2" :messages="$errors->get('credit')" />
            </div>



              <!-- 
            <div class="mt-6 hidden">
                <p class="orpheusproMedium" for="caption" :value="__('caption')">First Paragraph / summary</p>
                <textarea id="caption" name="caption"
                    class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                    required autofocus autocomplete="caption" value="null"></textarea>

                <x-input-error class="mt-2" :messages="$errors->get('caption')" />
            </div>

            -->

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

                <textarea name="content" class="editor" id="editor"></textarea>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/super-build/ckeditor.js"></script>

            <script>
                ClassicEditor
                    .create(document.querySelector('#editor'))
                    .then(editor => {
                        editor.model.document.on('change:data', () => {
                            // Update the hidden textarea with CKEditor data
                            document.querySelector('textarea[name="editorData"]').value = editor.getData();
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
                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript',
                            'superscript', 'removeFormat', '|',
                            'bulletedList', 'numberedList', 'todoList', '|',
                            'outdent', 'indent', '|',
                            'undo', 'redo',
                            '-',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                            'alignment', '|',
                            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock',
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
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy',
                                '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake',
                                '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum',
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
