

<div class=" bg-SelectColor relative">
    @if(!request()->is('/'))
        <!-- This code will be rendered on all pages except the homepage -->
        <h1 class="text-center footerDadaTitle p-8 text-9xl text-black NHaasGroteskDSPro-65Md">DADA MAGAZINE</h1>
    @endif
    <!--<div class="lg:flex justify-between container mx-auto">
        <div class="max-w-2xl mx-auto  py-6">
            <p class="MinionPro-Regular pt-4 text-left text-sm uppercase " style="font-weight:800;">Apartamento Publishing
                Bruc <br>49 3-2 
                08009 Barcelona, Spain <br>
              </p>
                

                <p class="MinionPro-Regular pt-4 text-left text-sm uppercase " style="font-weight:800;">Follow us on</p>

                <div class="flex justify-between py-2">
                       <a target="_blank" href="https://www.instagram.com/thedadamagazine/"><img class="w-5 h-5 mr-12" src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696172377/insta_eyfwfq.png" alt="instagram"></a>
                </div>
           

        </div>

        <div class="max-w-2xl mx-auto px-6 lg:px-8  MinionPro-Regular font-bold py-6 ">
            <h3 class="text-sm leading-none pt-8 font-semibold orpheusproMedium ">FOR ENQUIRIES PLEASE CONTACT US AT </h3>
            <div class="flex w-full flex-wrap justify-between">
                <p class="text-base py-2 BaskervilleBT " >
                    <a href="mailto:contact@thedadagallery.com">contact@thedadamagazine.com</a>
                </p>
            
            </div>
        </div>

        <div class="max-w-2xl mx-auto px-6 lg:px-8  pt-8 ">
            <h3 class="text-sm leading-none pt-8 font-semibold orpheusproMedium ">ABOUT US </h3>
            <div class="flex w-full flex-wrap justify-between">
                <p class="text-base py-2 BaskervilleBT " >
                    <a href="mailto:contact@thedadagallery.com">DADA Magazine A compass for a new generation of art enthusiasts, with a focus on Black artists from across the globe.</a>
                </p>
            
            </div>
            <p class="pb-8 MinionPro-Regular font-bold">&copy; {{ date('Y') }} DADA MAGAZINE</p>
        </div>
    </div>-->
 

    <div class="lg:flex justify-between">
        <div class="max-w-2xl mx-auto px-6 lg:px-8 py-4">
            <h3 class="text-sm leading-none font-semibold flex lg:justify-start justify-center">For enquiries please contact us at</h3>
            <div class="flex w-full flex-wrap lg:justify-between justify-center">
                <p class="text-sm " >
                    <a href="mailto:contact@thedadagallery.com">contact@thedadamagazine.com</a>
                </p>
            </div>

            <h3 class="text-sm pt-4 leading-none font-semibold  flex lg:justify-start justify-center">Follow us on </h3>
            <div class="flex py-2 lg:justify-start justify-center">
                <a class="" target="_blank" href="https://www.instagram.com/thedadamagazine/"><img
                    class="lg:w-6 lg:h-6 w-8 h-8 "
                    src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696172377/insta_eyfwfq.png"
                    alt="instagram"></a>

                <a class="pl-6" target="_blank" href="https://www.youtube.com/@Polartics/videos"><img
                    class="lg:w-6 lg:h-6 w-8 h-8"
                    src="https://res.cloudinary.com/dwzlhkeal/image/upload/v1696173228/youtube_pxafsb.png"
                    alt="youtube"></a>
            </div>
        </div>

        <div class="max-w-2xl mx-auto px-6 lg:px-8 py-4  MinionPro-Regular">
           <div class=" flex lg:justify-end lg:w-72 pb-2 lg:px-4">
                 <p class="text-sm lg:text-right text-center ">
                   DADA Magazine A compass for a new generation of art enthusiasts, with a focus on Black artists from across the globe.
                </p>
            </div>

            <div class="flex lg:w-72 w-full font-bold lg:justify-end justify-center ">
                <a href="{{ route('about') }}" class="mx-4">about</a>
                <a href="{{ route('about') }}#contact" class="mx-4">contact</a>
                <a href="{{ route('shop') }}" class="mx-4">shop</a>
            </div>
           
        </div>

    </div>
    <div class="max-w-2xl mx-auto px-6 lg:px-8 flex justify-center pt-8">
        <p class="pb-8 MinionPro-Regular font-bold">&copy; {{ date('Y') }} DADA MAGAZINE</p>
    </div>
</div>
