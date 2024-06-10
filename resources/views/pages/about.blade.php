<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            About Us
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


    @foreach($aboutUs as $about)

    <div class="bg-SelectColor">
        <div class="pt-6">
            <a href="#" class="lg:text-8xl text-5xl px-4 leading-none wobble-text NHaasGroteskDSPro-65Md">{{$about->about}}
            </a>
        </div>
    </div>
    @endforeach

    <hr class=" border-black dark:border-black">


    <div class="bg-SelectColor">
        <div class="max-w-7xl mx-auto px-6 lg:py-20 py-10 lg:px-8 reveal">
            <h3 class="text-3xl leading-none py-0 orpheusproMedium font-semibold">Team</h3>
            <div class="flex justify-between flex-wrap">

            @foreach($teams as $team)
                <div class="flex-initial w-80 py-2">
                    <div class="relative space-y-1 py-4">
                        <div class=" text-left">
                            <p class="text-base MinionPro-Regular" style="font-weight:800;">{{$team->name}}</p>
                            <p class="BaskervilleBT">{{$team->role}}</p>
                        </div>
                    </div>
                </div>
            @endforeach



            </div>
        </div>

        <hr class=" border-black dark:border-black">

        <div id="editor" class="reveal w-full h-full flex items-left justify-start max-w-7xl mx-auto px-6 lg:py-20 py-10 lg:px-8">
            <div class="text-black">
                <h3 class="text-3xl leading-none pb-8 orpheusproMedium font-semibold">EDITOR’S NOTE</h3>
                @foreach($editorNotes as $editorNotes)
                <p class="text-4body BaskervilleBT" >
                    {!! $editorNotes->content !!}
                </p>
                @endforeach
            </div>
        </div>

        <hr class=" border-black dark:border-black">

        <div class=" max-w-7xl mx-auto px-6 lg:py-20 py-10 lg:px-8 reveal" id="contact">
            <div class="text-black">
          
                    <h3 class="text-3xl leading-none pb-8 font-semibold orpheusproMedium">GET IN TOUCH</h3>
                <div class="flex w-full flex-wrap justify-between">
                    <p class="text-xl py-2 BaskervilleBT" >
                        <a href="mailto:contact@thedadagallery.com">contact@thedadamagazine.com</a>
                    </p>
                    <div class="flex justify-between py-2">
                       <a target="_blank" href="https://www.instagram.com/thedadamagazine/"><img class="w-5 h-5 mr-12" src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696172377/insta_eyfwfq.png" alt="instagram"></a>
                      <!-- <a target="_blank" href="https://www.instagram.com/thedadamagazine/"><img class="w-6 h-6 mr-12" src="https://res.cloudinary.com/nieleche/image/upload/v1694088398/43-twitter-512_utavzw.webp" alt="instagram"></a>-->
                       <a target="_blank" href="https://www.youtube.com/@Polartics/videos"><img class="w-6 h-6 mr-12" src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696173228/youtube_pxafsb.png" alt="youtube"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr class=" border-black dark:border-black">

    <div class="bg-SelectColor border-b-2 border-black dark:border-black">
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

</x-app-layout>
