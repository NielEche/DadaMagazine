<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Issues
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

        
    <div class="h-fulll bg-SelectColor">
        <div class="text-center py-20">
            <a href="#" class="text-5xl video-title px-2 pb-3 leading-none MinionPro-Regular" style="font-weight:900;">{{ $issues->title }}</a>
            <div class="flex justify-center items-center">
                <img src="{{ $issues->image_path }}"
                    alt="Image" class="object-contain storiesBox py-2" />
            </div>

            <p class="text-base pt-2 BaskervilleBT" style="font-weight:800;">{{ $issues->published }}</p>
        </div>
    </div>

    <hr class="reveal border-black dark:border-black">



    <div class="py-2 bg-SelectColor">
        <div class="max-w-7xl mx-auto px-2 lg:px-8">
   
   
        <div class="w-full h-full flex items-center justify-center">
            <div class="text-center text-black lg:px-32 p-10 relative z-10 reveal">
                <h3 class="text-3xl leading-none pb-8 font-semibold MinionPro-Regular">Featuring:</h3>
                <p class="text-base pb-8 BaskervilleBT">
                    {{ $issues->featuring }}
                </p>
            </div>
        </div>



            @if($issuesImages->isEmpty())
            @else
            <div class="flex justify-between flex-wrap pb-6">
                @foreach($issuesImages as $issuesImages)
                <div class="flex-initial lg:w-80 w-full reveal">
                    <div class="relative py-4">
                        <div class=" text-center"> 
                            <a class="text-sm text-red">
                                <img src="{{ $issuesImages->image_path }}"
                                alt="Image" class="object-contain storiesBox" />
                            
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @endif

        </div>
    </div>

    <hr class=" border-black dark:border-black">

</x-app-layout>
