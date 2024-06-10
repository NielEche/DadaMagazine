<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Admin About Us
        </h2>
    </x-slot>

    <script>
        function reveal() {
            console.log("Function called");
            var reveals = document.querySelectorAll(".reveal");

            for (var i = 0; i < reveals.length; i++) {
                var windowHeight = window.innerHeight;
                var elementTop = reveals[i].getBoundingClientRect().top;
                var elementVisible = 150;

                if (elementTop < windowHeight - elementVisible) {
                    reveals[i].classList.add("active");
                } else {
                    reveals[i].classList.remove("active");
                }
            }
        }

        window.addEventListener("scroll", reveal);

    </script>


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
                <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">ABOUT PAGE</h3>
                <p class="text-lg px-6 pb-8 HalyardDisplay">
                    Welcome to the Admin about, manage your home page details below
                </p>
            </div>
        </div>

    </div>

    <hr class="anm_mod left fast border-black dark:border-black">


    <div class="bg-SelectColor">
        <div class="pt-6">
            @foreach($aboutUs as $about)
                <div class="flex items-center px-6">
                    <button x-data="" x-on:click.prevent="$dispatch('open-modal', '{{ $about->id }}')"
                        class="ml-auto text-xl py-4 underline DINAlternateBold border p-6 rounded-full bg-SelectRed text-black">
                        EDIT
                    </button>
                </div>
                <a href="#"
                    class="lg:text-8xl text-5xl px-4 leading-none wobble-text NHaasGroteskDSPro-65Md">{{ $about->about }}</a>

                <x-modal name="{{ $about->id }}" focusable>
                    <!-- Modal Content -->
                    <form method="post" action="{{ route('aboutUs.update', $about->id) }}"
                        class="p-6 bg-SelectColor" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                            {{ __('Edit About Section') }}
                        </h2>

                        <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                            {{ __('Edit the details for this section below') }}
                        </p>

                        <div class="mt-6">
                            <p class="orpheusproMedium" for="about" :value="__('about')">About Dada</p>
                            <textarea id="about" name="about"
                                class="HalyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full h-40 resize-y"
                                required autofocus
                                autocomplete="about">{{ old('about', $about->about) }}</textarea>

                            <x-input-error class="mt-2" :messages="$errors->get('about')" />
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
            @endforeach
        </div>
    </div>


    <hr class=" border-black dark:border-black">


    <div class="bg-SelectColor">
        <div class=" mx-auto px-6 lg:py-20  lg:px-8 reveal">
            <div class="flex items-center px-6 py-6">
                <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'addTeam')" id="add-team-button"
                    class="ml-auto text-xl py-4 underline DINAlternateBold border p-6 rounded-full bg-SelectRed text-black">
                    Add Team
                </button>
            </div>
            <hr class=" border-black dark:border-black">
            <h3 class="text-3xl leading-none py-0 orpheusproMedium font-semibold pt-6 px-6">Team</h3>
            <div class="flex justify-between flex-wrap ">
                @foreach($teams as $team)
                    <div class="flex-initial w-80 py-2 px-6">
                        <div class="relative space-y-1 py-4">
                            <div class=" text-left">
                                <p class="text-base MinionPro-Regular" style="font-weight:800;">{{ $team->name }} </p>
                                <p class="BaskervilleBT">{{ $team->role }}</p>
                            </div>
                        </div>
                        <div class="flex justify-between border-t  border-black dark:border-black pt-4">
                            <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'edit{{ $team->id }}')"
                                class="text-sm DINAlternateBold">Edit</a>
                            <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'deleteT{{ $team->id }}')"
                                class="text-sm DINAlternateBold">Delete</a>
                        </div>
                    </div>
                    <x-modal class="bg" name="edit{{ $team->id }}" focusable>
                        <!-- Modal Content -->
                        <form method="post" action="{{ route('teams.update', $team->id) }}"
                            class="p-6 bg-SelectColor" enctype="multipart/form-data">
                            @csrf
                            @method('patch')

                            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                {{ __('Edit Team details') }}
                            </h2>

                            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                {{ __('Edit the details for this member below') }}
                            </p>

                            <div class="mt-6 ">
                                <p class="orpheusproMedium" for="name" :value="__('name')">Name</p>
                                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                                    :value="old('name', $team->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('name')" />
                            </div>

                            <div class="mt-6 ">
                                <p class="orpheusproMedium" for="role" :value="__('role')">Role</p>
                                <x-text-input id="role" name="role" type="text" class="mt-1 block w-full"
                                    :value="old('role', $team->role)" required autofocus autocomplete="role" />
                                <x-input-error class="mt-2" :messages="$errors->get('role')" />
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

                    <x-modal name="deleteT{{ $team->id }}" focusable>
                        <!-- Modal Content -->
                        <form method="post"
                            action="{{ route('teamDelete.destroy', $team->id) }}"
                            class="p-6 bg-SelectColor">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                                {{ __('Delete Team member') }}
                            </h2>

                            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                                {{ __('Are you sure you want to delete member') }}
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

        <hr class=" border-black dark:border-black">

        <div
            class="reveal w-full h-full flex items-left justify-start max-w-7xl mx-auto px-6 lg:py-20 py-10 lg:px-8">
            <div class="text-black">
                @foreach($editorNotes as $editorNotes)
                    <div class="w-full flex items-center px-6">
                        <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'editor{{ $editorNotes->id }}')"
                            class="ml-auto text-xl py-4 underline DINAlternateBold border p-6 rounded-full bg-SelectRed text-black">
                            EDIT
                        </button>
                    </div>
                    <h3 class="text-3xl leading-none pb-8 orpheusproMedium font-semibold">EDITOR’S NOTE</h3>

                    <p class="text-4body BaskervilleBT">
                     {!! $editorNotes->content !!}
                    </p>
            </div>


            @endforeach
        </div>
    
    </div>


    <!-- MODALS MODALS MODALS MODALS -->
    <x-modal name="addTeam" focusable>
        <!-- Modal Content -->
        <form method="post" action="{{ route('teams.store') }}" class="p-6 bg-SelectColor"
            enctype="multipart/form-data">
            @csrf


            <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                {{ __('Add a new story ') }}
            </h2>

            <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                {{ __('Please add details of new magazine story below') }}
            </p>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="name" :value="__('name')">Title</p>
                <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus
                    autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>


            <div class="mt-6 ">
                <p class="orpheusproMedium" for="role" :value="__('role')">Role</p>
                <x-text-input id="role" name="role" type="text" class="mt-1 block w-full" required autofocus
                    autocomplete="role" />
                <x-input-error class="mt-2" :messages="$errors->get('role')" />
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

    <x-modal name="editor{{ $editorNotes->id }}" focusable>
                <!-- Modal Content -->
                <form method="post" action="{{ route('editors.update', $editorNotes->id) }}"
                    class="p-6 bg-SelectColor" enctype="multipart/form-data">
                    @csrf
                    @method('patch')

                    <h2 class="text-lg NHaasGroteskDSPro-65Md text-black dark:text-black">
                        {{ __('Edit Editors Note') }}
                    </h2>

                    <p class="mt-1 HalyardDisplay text-sm text-black dark:text-black">
                        {{ __('Edit the details for this section below') }}
                    </p>

                

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
                        <p class="orpheusproMedium" for="content" :value="__('content')">Editors Note</p>

                        <textarea name="content"
                            class="editor alyardDisplay border-b-2 border-black dark:border-black my-3 focus:border-white dark:focus:border-white focus:ring-white dark:focus:ring-white rounded-md shadow-sm mt-1 block w-full resize-y"
                            id="editor">{{ $editorNotes->content }}</textarea>
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
                                    'default',
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
                                options: [10, 12, 14, 'default', 18, 20, 22],
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


    <hr class=" border-black dark:border-black">



</x-admin-layout>
