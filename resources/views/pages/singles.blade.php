<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Features
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





    <div class="">


        <div class="relative h-screen">
            <div class="parallax absolute inset-0 w-full h-full bg-cover bg-no-repeat bg-center" style="background-image: url('{{ $features->image_path }}');"></div>
            <div class=" fixed inset-0 flex items-center justify-center">
                <div class="text-center text-white px-4">
                    <!-- Your text caption goes here -->
                    <p href="#" class="text-4xl article-title leading-none MinionPro-Regular font-bold uppercase text-white">{{ $features->title }}</p>
                </div>
            </div>
            <div class="absolute top-0 left-0 w-full h-full bg-brown opacity-0"></div>
        </div>

      
        <div class=" max-w-7xl mx-auto px-4 lg:px-12 lg:py-6 py-4 bg-SelectColor relative">
    
            <div class="w-full w-2/2 relative bg-SelectColor bg-center lg:py-6 py-4 ">
                <div class="BaskervilleBT ">
                    <div class="text-left text-black text-4body relative">
                        <p class="text-4body BaskervilleBT font-bold">
                        {!! $features->content !!}
                        </p>
                    </div>
                </div>
            </div>
            <hr class="  border-black dark:border-black">

            <div class="w-full flex items-start justify-start py-6 reveal">
                <div class="text-left text-black  relative z-10">
                    <h3 class="text-xl leading-none pb-2 MinionPro-Regular">Credits</h3>
                    <p class="text-sm BaskervilleBT ">
                        {{ $features->credit }}
                    </p>

                </div>
            </div>
            <hr class="  border-black dark:border-black">

            
        @if($featuresImages->isEmpty())
        @else
            <!-- resources/views/carousel.blade.php -->
            <div class="relative right-0 bottom-0 py-6 mx-2 lg:mx-4 z-50">
                <div class="carousel-container w-full relative overflow-hidden bg-SelectColor" style="border-radius:5px;">
                    @foreach($featuresImages as $featuresImage)
                    <div class="SingleStoryslider flex justify-center" >
                        <img x-data="{ imageUrl: '{{ $featuresImage->image_path }}' }" x-on:click.prevent="$dispatch('open-modal', '{{ $featuresImage->id }}')" style="height:25rem; width:25rem;" :src="imageUrl" alt="Image 1" class="object-contain" />
                    </div>
                    <x-modal name="{{ $featuresImage->id }}" class="flex items-center justify-center mt-6" focusable>
                        <!-- Modal Content -->
                        <div class="flex items-center justify-center">
                            <svg style="height:30rem; width:30rem;" class="py-2 object-cover">
                                <image href="{{ $featuresImage->image_path }}" style="width: 100%; height:100%;" />
                            </svg>
                        </div>
                    </x-modal>
                    @endforeach
                    <div class="absolute top-0 bottom-0 flex justify-between w-full">
                        <button class="carousel-prev text-3xl text-black p-2 transition duration-300 ease-in-out " aria-label="Previous">
                            ←
                        </button>
                        <button class="carousel-next text-3xl text-black p-2 transition duration-300 ease-in-out" aria-label="Next">
                            →
                        </button>
                    </div>
                </div>
            </div>

        @endif
    
        </div>
    </div>

    <hr class="  border-black dark:border-black">





</x-app-layout>
