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
   
   

    <div class="bg-SelectColor py-10 ">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class=" space-y-1 border-b border-gray-200 dark:border-gray-600 text-left w-full ">
                <h3 class="MinionPro-Regular lg:text-4xl text-3xl leading-tight lg:pt-6 pb-8"
                    style="font-weight:800;">OUR SHOP
                </h3>
            </div>
            <div class="flex justify-between flex-wrap pt-10">
                @foreach($shopUpdates as $key => $shop)
                    {!! $shop->text !!}
                @endforeach
            </div>
        </div>
    </div>

    <hr class="  border-black dark:border-black">


</x-app-layout>
