<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Stories
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

        document.addEventListener('mousemove', (e) => {
            const cursor = document.querySelector('.custom-cursor');
            cursor.style.left = e.clientX + 'px';
            cursor.style.top = e.clientY + 'px';
        });

    </script>


    <!--
    @if ($features->isNotEmpty())
        @php
            $lastFeature = $features->last();
        @endphp

        <div class="video-container hidden md:block">
            <div class="non-interactable-iframe-container">
                <img src="{{ $lastFeature->image_path }}" alt="Image" class="object-cover storiesBoxmain"/>
                <div class="black-overlay"></div>
            </div>
            <div class="VidText-overlay">
                <a href="{{$lastFeature->video_url}}" target="_blank" class="NHaasGroteskDSPro-65Md text-4xl video-title px-2 leading-none" style="font-weight:900;">{{$lastFeature->title}}</a><br> <br>
                <a href="{{$lastFeature->video_url}}" target="_blank" class="text-sm text-white my-2 DINAlternateBold">WATCH HERE</a>
            </div>
        </div>
    @endif-->

    <div
        class="hidden MinionPro-Regular font-bold absolute bg-SelectRed left-0 right-0 w-full flex items-center justify-center px-11 py-4  sm:flex-row">

        <a href="#" class="text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
            Essays
        </a>
        <a href="#" class="text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
            Interviews
        </a>
        <a href="#" class="text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
            Video
        </a>

    </div>

    <div
        class="hidden MinionPro-Regular font-bold block md:hidden absolute bg-SelectRed left-0 right-0 w-full flex items-center justify-center px-11 py-4  sm:flex-row">

        <a href="#" class="text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
            Essays
        </a>
        <a href="#" class="text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
            Interviews
        </a>
        <a href="#" class="text-base text-gray-800 dark:text-gray-200 leading-tight text-left sm:text-right px-6">
            Video
        </a>

    </div>

    <div class="bg-SelectColor py-10 ">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class=" space-y-1 border-b border-gray-200 dark:border-gray-600 text-left w-full ">
                <h3 class="MinionPro-Regular lg:text-4xl text-3xl leading-tight lg:pt-6 pb-8"
                    style="font-weight:800;">OUR STORIES
                </h3>
            </div>
            <div class="flex justify-between flex-wrap pt-4">
                @foreach($features as $key => $feature)
                    <div class="flex-initial py-6 ">
                        <a href="{{ route('storiesM.edit', $feature->id) }}" class="text-sm DINAlternateBold ">
                            <div class="relative space-y-1 pb-6 border-b border-gray-200 dark:border-gray-600">
                                <div class="relative text-left ">
                                    <img src="{{ $feature->image_path }}"
                                        alt="Image" class="object-cover storiesBoxmain" />
                                        <p class="text-2xl pt-6 MinionPro-Regular uppercase lgwidth" style="font-weight:800;">{{ $feature->title }}</p>

                                        <p class="BaskervilleBT pb-2 lgwidth">{!! strlen(strip_tags($feature->content)) > 100 ? substr(strip_tags($feature->content), 0, 100) . '...' : strip_tags($feature->content) !!}</p>
                                      
                                        <div>
                                            <a href="{{ route('storiesM.edit', $feature->id) }}" class="text-base DINAlternateBold " style="font-weight:800;">
                                            Read More
                                            </a>    
                                        </div>
                                </div>
                            
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <hr class="  border-black dark:border-black">

    @foreach($homeVideos as $key => $videos)        
        <div class="video-container hidden md:block">
            <div class="non-interactable-iframe-container">
                <iframe
                    src="https://www.youtube.com/embed/VIDEO_ID?autoplay=1&mute=1&loop=1&playlist={{$videos->embed_code}}&controls=0"
                    frameborder="0" allowfullscreen class="non-interactable-iframe"></iframe>
                <div class="black-overlay"></div>
            </div>
            <div class="VidText-overlay">
                <p class="text-sm  text-white py-1 DINAlternateBold">Feature</p> <br>
                <a href="{{$videos->video_url}}"  target="_blank"  class="NHaasGroteskDSPro-65Md text-4xl video-title px-2 leading-none" style="font-weight:900;">{{$videos->title}}</a><br> <br>
                <a href="{{$videos->video_url}}"  target="_blank"  class="text-sm text-white my-2 DINAlternateBold">WATCH HERE</a> 
            </div>
        </div>
    @endforeach
    <hr class="  border-black dark:border-black">

</x-app-layout>
