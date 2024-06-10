<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Features
        </h2>
    </x-slot>

    <script>
        document.addEventListener('mousemove', (e) => {
  const cursor = document.querySelector('.custom-cursor');
  cursor.style.left = e.clientX + 'px';
  cursor.style.top = e.clientY + 'px';
});
    </script>


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



    <div class="bg-SelectColor py-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
      

            <div class="flex justify-between flex-wrap">
                @foreach($features as $key => $feature)
                <div class="flex-initial w-80 pt-4">
                    <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                        <div class=" text-center">
                            <img src="{{ $feature->image_path }}"
                                alt="Image" class="object-contain storiesBox" />
                                <p class="text-base pt-3 uppercase orpheusproMedium" style="font-weight:800;">{{ $feature->title }}</p>
                                  <a class="text-sm text-red DINAlternateBold underline hidden" href=""></a><br>
                                <p class="HalyardDisplay pb-2">{!! strlen(strip_tags($feature->content)) > 100 ? substr(strip_tags($feature->content), 0, 100) . '...' : strip_tags($feature->content) !!}</p>
                                <a href="{{ route('singles') }}" class="text-sm DINAlternateBold">READ MORE</a>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="flex-initial w-80 pt-4 ">
                    <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                        <div class="relative text-center">
                            <img src="https://res.cloudinary.com/nieleche/image/upload/v1692635409/Screenshot_2023-08-21_at_17.28.54_sr0dnz.png"
                                alt="Image" class="object-contain storiesBox" />
                                <p class="text-base pt-3 orpheusproMedium" style="font-weight:800;">story header </p>
                                  <a class="text-sm text-red DINAlternateBold underline" href="">#essay</a><br>
                                <p class="HalyardDisplay pb-2">We’ve just got back from celebrating our latest magazine issue (#31) and publication Reza…</p>
                                <a href="{{ route('singles') }}" class="text-sm DINAlternateBold ">READ MORE</a>
                        </div>
                       
                    </div>
                </div>
                <div class="flex-initial w-80 pt-4 ">
                    <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                        <div class="relative text-center">
                            <img src="https://res.cloudinary.com/nieleche/image/upload/v1692707863/a-dada-magazine-cover_s4jvcx.webp"
                                alt="Image" class="object-contain storiesBox" />
                                <p class="text-base pt-3 orpheusproMedium" style="font-weight:800;">story header </p>
                                  <a class="text-sm text-red DINAlternateBold underline" href="">#essay</a><br>
                                <p class="HalyardDisplay pb-2">We’ve just got back from celebrating our latest magazine issue (#31) and publication Reza…</p>
                                <a href="{{ route('singles') }}" class="text-sm DINAlternateBold">READ MORE</a>
                        </div>
                    </div>
                </div>
        
                
            </div>




            <div class=" text-center space-y-1 mt-9">
                <a href="#" class="text-lg underline DINAlternateBold py-4" style="font-weight:900;">LOAD MORE</a>
            </div>
        </div>
    </div>

    <hr class="  border-black dark:border-black">

</x-app-layout>
