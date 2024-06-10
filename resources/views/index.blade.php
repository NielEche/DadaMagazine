<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Home
        </h2>
    </x-slot>

    
    @if(session('success'))
    <div class="absolute top-0 left-0 mt-4 mr-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded"
        role="alert" id="success-message">
        <strong class="font-bold">Successful update!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successMessage = @json(session('success'));

            // Show an alert box if there's a success message
            if (successMessage) {
                alert(successMessage);
            }

            // Automatically hide the success message after 5 seconds
            setTimeout(function () {
                document.getElementById('success-message').style.display = 'none';
            }, 5000); // 5000 milliseconds (5 seconds)
        });
    </script>
@endif




    <div class="mx-auto h-screen bg-SelectColor">
        <div class="carousel-container mx-auto h-full flex items-center justify-center overflow-hidden">

            @foreach($sliderItems as $Sitem)
                <div class="relative h-full ">
                    <img src="{{ $Sitem->image_path }}" alt="Image" class="w-screen h-screen w-full object-cover" />
                    <div class="absolute top-0 left-0 w-full h-full bg-black opacity-40"></div>
                </div>

            @endforeach

            <!-- Add more image elements as needed -->
        </div>
        <button
            class="carousel-prev absolute  opacity-0 left-0 top-1/2 transform -translate-y-1/2 text-white p-2 bg-black bg-opacity-0 hover:bg-opacity-75 transition duration-300 ease-in-out"
            aria-label="Previous">
        </button>
        <button
            class="carousel-next absolute  opacity-0 right-0 top-1/2 transform -translate-y-1/2 text-white p-2 bg-black bg-opacity-50 hover:bg-opacity-75 transition duration-300 ease-in-out"
            aria-label="Next">
        </button>
    </div>


    <div class="max-w-7xl lg:px-8">
        <!-- <p id="header"  class="NHaasGroteskTXPro-75Bd px-4 ">DADA</p>-->
        <img id="header" 
            src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696171325/DADA_MAGAZINE_LOGO_2_da1fla_q5n9la.svg" alt="DADA LOGO W">
    </div>


    <!--
    <div class="flex flex-col  sm:flex-row">
        <div class="w-full h-screen sm:w-1/2">
            <img id="mainImage" alt="Feature image"
                src="https://res.cloudinary.com/nieleche/image/upload/v1692620768/Copy-of-6CCADBB4-08DC-4A3A-9AD8-CD79654AE4B3-min_tu5wov.webp"
                alt="Image" class="h-full w-full object-cover" />
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const mainImage = document.getElementById('mainImage');
                const issueContainers = document.querySelectorAll('.issue-container');

                issueContainers.forEach(container => {
                    container.addEventListener('mouseenter', () => {
                        mainImage.src = container.dataset.hoverImage;
                    });

                    container.addEventListener('mouseleave', () => {
                        mainImage.src = container.dataset.defaultImage;
                    });
                });
            });

        </script>
        <div class="w-full sm:w-1/2 bg-SelectColor flex flex-col">
            <a href="#" class="sm:ml-0 p-7 space-y-1 border-b border-gray-200 dark:border-gray-600  issue-container"
                data-default-image="https://res.cloudinary.com/nieleche/image/upload/v1692620768/Copy-of-6CCADBB4-08DC-4A3A-9AD8-CD79654AE4B3-min_tu5wov.webp"
                data-hover-image="https://res.cloudinary.com/nieleche/image/upload/v1692620768/Copy-of-6CCADBB4-08DC-4A3A-9AD8-CD79654AE4B3-min_tu5wov.webp">
                <p class="text-xs DINAlternateBold">issue 2</p>
                <h3 class="orpheusproMedium text-2xl leading-tight pt-2">Painting a Dream</h3>
                <p class="text-sm font-medium HalyardDisplay">by Daniel Obasi</p>
            </a>
            <a href="#" class="sm:ml-0 p-7 space-y-1 border-b border-gray-200 dark:border-gray-600  issue-container"
                data-default-image="https://res.cloudinary.com/nieleche/image/upload/v1692620768/Copy-of-6CCADBB4-08DC-4A3A-9AD8-CD79654AE4B3-min_tu5wov.webp"
                data-hover-image="https://res.cloudinary.com/nieleche/image/upload/v1692514757/Copy_of_1C496A28-7A15-4D48-82E2-24D3AD724B2A_cgzvr5.jpg">
                <p class="text-xs DINAlternateBold">issue 2</p>
                <h3 class="orpheusproMedium text-2xl leading-tight pt-2">Painting a Dream</h3>
                <p class="text-sm font-medium HalyardDisplay">by Daniel Obasi</p>
            </a>
            <a href="#" class="sm:ml-0 p-7 space-y-1 border-b border-gray-200 dark:border-gray-600 issue-container"
                data-default-image="https://res.cloudinary.com/nieleche/image/upload/v1692620768/Copy-of-6CCADBB4-08DC-4A3A-9AD8-CD79654AE4B3-min_tu5wov.webp"
                data-hover-image="https://res.cloudinary.com/nieleche/image/upload/v1692635409/Screenshot_2023-08-21_at_17.28.54_sr0dnz.png">
                <p class="text-xs DINAlternateBold">issue 2</p>
                <h3 class="orpheusproMedium text-2xl leading-tight pt-2">Painting a Dream</h3>
                <p class="text-sm font-medium HalyardDisplay">by Daniel Obasi</p>
            </a>
            <div class="sm:ml-0 p-7 space-y-1 border-b border-gray-200 dark:border-gray-600 flex-grow">
            </div>
            <div class="sm:ml-0 p-7 space-y-1 border-gray-200 dark:border-gray-600 w-50">
                <a href="{{ route('features') }}" class="NHaasGroteskDSPro-65Md text-base leading-tight flex"><span class="pt-4 pr-4">MORE FEATURES HERE!</span> <img src="https://res.cloudinary.com/nieleche/image/upload/v1694224069/Group_103_bdduq6.svg" alt=""></a>
            </div>
        </div>
    </div>-->


    @foreach($homeIssues as $Hissue)
        <div class="flex flex-col bg-black sm:flex-row">
            <div class="w-full sm:w-1/2">
                <div class="text-left text-white lg:p-20 p-6">
                    <h3 class="MinionPro-Regular lg:text-8xl text-4xl leading-tight reveal">{{ $Hissue->title }}</h3>
                    <p class="BaskervilleBT  lg:text-base text-sm pt-1 pb-4 lg:pr-40 fade leading-tight"
                        style="font-weight:500;">{{ $Hissue->description }} </p>
                    <a href="{{ route('shop') }}" class="text-sm underline DINAlternateBold reveal"
                        style="font-weight:800;">ORDER ISSUE</a>
                </div>
                <div class="animation">
                    <hr class="anm_mod left fast  border-white dark:border-white">
                </div>

            </div>
            <div class="w-full sm:w-1/2 lg:p-20 p-6">
                <div class="">
                    <img src="{{ $Hissue->image_path }}" alt="issue cover">
                </div>
            </div>
        </div>

        <div class="bg-black">
            <div class="sm:ml-0 lg:pb-0 w-full">
                <div class="marquee-container">
                    <div class="marquee-content ">
                        <h2 href="#"
                            class="lg:text-[11rem] text-7xl leading-tight text-white MinionPro-Regular uppercase">DADA
                            MAGAZINE {{ $Hissue->title }}
                        </h2>
                    </div>
                    <!-- Repeat the above line with more feature links -->
                </div>
            </div>
        </div>
    @endforeach



    <div class="bg-SelectColor py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class=" space-y-1 border-b border-gray-200 dark:border-gray-600 reveal">
                <h3 class="MinionPro-Regular text-3xl leading-tight pb-4 " style="font-weight:800;">Latest Stories
                </h3>
            </div>

            <div class="flex justify-between flex-wrap">
                @foreach($features as $key => $feature)
                    <div class="flex-initial pt-4">
                        <a href="{{ route('storiesM.edit', $feature->id) }}" class="text-sm DINAlternateBold ">
                            <div class="relative space-y-1 border-b border-gray-200 dark:border-gray-600">
                                <div class="relative text-left reveal">
                                    <img src="{{ $feature->image_path }}" alt="Image"
                                        class="object-cover storiesBoxmain" />
                                    <div class="absolute inset-0 flex justify-center items-center text-white opacity-0 hover:opacity-100 transition-opacity duration-300"
                                        style="font-weight:800; background-color: #000;">
                                        <p class="orpheusproMedium text-base py-4 px-10">{!! strlen(strip_tags($feature->content)) > 100 ? substr(strip_tags($feature->content), 0, 100) . '...' : strip_tags($feature->content) !!}
                                        </p>
                                    </div>
                                </div>
                                <p class="MinionPro-Regular py-2 text-left text-2xl uppercase lgwidth" style="font-weight:800;">
                                {{ $feature->title }}</p>
                                <p class="orpheusproMedium text-base pb-2 lgwidth">{!! strlen(strip_tags($feature->content)) > 100 ? substr(strip_tags($feature->content), 0, 100) . '...' : strip_tags($feature->content) !!}
                                        </p>
                                <div class="pb-4">
                                    <a href="{{ route('storiesM.edit', $feature->id) }}" class="text-base DINAlternateBold  reveal" style="font-weight:800;">
                                    Read More
                                    </a>    
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- @if($key === 0)
                       <div class="vertical-line lg:block hidden"></div>
                        <style>
                            .vertical-line {
                                border-left: 1px solid #000;
                                /* Adjust the color and width as needed */
                                height: 560px;
                                /* Adjust the height of the vertical line */
                            }

                        </style> */
                    @endif-->
                @endforeach

            </div>

            <div class=" text-center space-y-1 mt-9  block">
                <a href="{{ route('stories') }}"
                    class="text-sm underline DINAlternateBold py-4 reveal" style="font-weight:900;">SEE MORE</a>
            </div>
        </div>
    </div>

    @foreach($homeVideos as $key => $videos)
    <div class="video-container hidden lg:block">
        <div class="non-interactable-iframe-container">
            <iframe
                src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1&mute=1&loop=1&playlist={{$videos->embed_code}}&controls=0"
                frameborder="0" allowfullscreen class="non-interactable-iframe"></iframe>
            <div class="black-overlay"></div>
        </div>
        <div class="VidText-overlay">
            <a href="{{$videos->video_url}}" target="_blank" class="NHaasGroteskDSPro-65Md text-4xl video-title px-2 leading-none"
                style="font-weight:900;">{{$videos->title}}</a>
        </div>
    </div>
    @endforeach


     <!--<div class="h-full w-full flex justify-center  flex-col sm:flex-row ">
       <div class="w-full sm:w-1/2 relative bg-cover bg-center py-20 px-6"
            style="background-image: url('https://res.cloudinary.com/nieleche/image/upload/v1692707863/a-dada-magazine-cover_s4jvcx.webp');">
            <div class="absolute inset-0 bg-SelectGreen opacity-90"></div>
            <div class="text-left text-white lg:px-24 lg:p-0 relative ">
                <h3 class="NHaasGroteskTXPro-75Bd text-6xl dadaclubTitle leading-none pb-8" style="font-weight: 900;">
                    <span class="bg-white colorGreen px-2">CLUB</span>DADA</h3>
                <p class="HalyardDisplay text-base lg:pr-16 pb-8">JOIN OUR WORLD. SIGN UP FOR PANELS, PARTIES AND
                    WORKSHOPS, A FREE PRINT
                    SUBSCRIPTION, THE CHANCE TO PUBLISH YOUR WORK ON DADA AND EXCLUSIVE DISCOUNTS. </p>
                <a href="{{ route('dashboard') }}"
                    class="NHaasGroteskDSPro-65Md text-base border rounded-2xl border-4 border-white text-white p-3"
                    style="font-weight: 800; border-radius:40px !important;">JOIN
                    THE CLUB</a>
            </div>
        </div>
        <div class="w-full  bg-black lg:block hidden h-full flex items-center justify-center bg-black  py-20 px-6">
            <div class="text-center text-white lg:px-10 relative z-10">
                <p class="MinionPro-Regular lg:text-6xl text-4xl pb-8 reveal">
                    DADA MAGAZINE ACTS AS A COMPASS FOR A NEW
                    GENERATION OF ART ENTHUSIASTS, WITH A
                    FOCUS ON BLACK ARTISTS FROM ACROSS THE GLOBE.
                </p>
                <a href="{{ route('about') }}#editor"
                    class="text-sm font-semibold text-right">@thedadamagazine</a>
            </div>
        </div>
    </div>-->



   <!-- <div class="parallax hidden"
        style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)),
     url('https://res.cloudinary.com/nieleche/image/upload/v1692796659/Copy_of_2CDC1773-320F-4DDF-86AB-43D463189213_i3uqxw.webp');">
    </div>-->
    <div class="animation">
        <hr class="anm_mod left fast border-black ">
    </div>

    <div class="bg-SelectColor ">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16 reveal">
            <div class="flex justify-between flex-col sm:flex-row space-y-1">
                <h3 class="py-2 NHaasGroteskDSPro-65Md text-base">SIGN UP TO OUR NEWSLETTER</h3>
            </div>
           
    

           
                <form action="{{ url('/mailing-list/subscribe') }}"  method="post">
                    @csrf
                    <div class="flex justify-between flex-col sm:flex-row">
                        <div class="w-full flex space-y-1 border-2 border-black dark:border-black border-r-0  my-3">
                            <label class="pl-4 my-3 pt-1 text-base BaskervilleBT" for="Email">Email :</label>
                            <input type="email"
                                class="my-1 border-0 bg-SelectColor outline-transparent outline-0 focus:outline-transparent" name="email"
                                style="box-shadow: none !important;">
                        </div>
                        <div class="my-3 w-full lg:w-1/5 md:w-1/3">
                            <button type="submit"
                                class="w-full DINAlternateBold py-3 text-lg border border-l-0 border-2 border-black text-black px-2">SEND</button>
                        </div>
                    </div>
                </form>
            
        </div>
    </div>

    <div class="animation">
        <hr class="anm_mod left fast border-black ">
    </div>
</x-app-layout>
