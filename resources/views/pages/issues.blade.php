<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight NHaasGroteskDSPro-65Md">
            Issues
        </h2>
    </x-slot>






    <!--<div class="bg-SelectColor py-2 ">
        <div class="pt-6 lg:pb-0 pb-6">
            <a href="#" class="lg:pr-20 lg:text-7xl text-5xl px-4 leading-none wobble-text NHaasGroteskDSPro-65Md">Browse the
                full range of our stories from our Issues archive!
            </a>
            <div class="lg:mt-20 mt-12 lg:block ">
                <img class=" ml-4 lg:ml-6 animate-bounce w-16 h-16 ..." src="https://res.cloudinary.com/nieleche/image/upload/v1695653640/down-arrow_o4bylz.png" alt="">
            </div>
            
        </div>
    </div>-->



    <hr class="border-black dark:border-black">
    <div class="pb-4 bg-SelectColor">
        <div class=" mx-auto px-6 lg:px-8">

            <div class="flex justifySM justify--between  flex-wrap">
                @foreach($issues as $issue)
                    <div class="flex-initial w-80 pt-4 reveal">
                        <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                            <div class=" text-center">
                                <a class="text-sm text-red" href="{{ route('issuesPage.edit', ['issuesPage' => $issue->id]) }}">
                                    <img src="{{$issue->image_path}}"
                                        alt="Image" class="object-contain storiesBox" />
                                        <p class="text-base pt-2 pb-0 mb-0 BaskervilleBT" style="font-weight:800;">{{$issue->title}}</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if(isset($groupedImages[$issue->id]))
                        @foreach($groupedImages[$issue->id] as $image)
                        <div class="flex-initial w-80 pt-4 reveal">
                            <div class="relative space-y-1 py-4 border-b  border-black dark:border-black">
                                <div class=" text-center">
                                    <a class="text-sm text-red"  href="{{ route('issuesPage.edit', ['issuesPage' => $issue->id]) }}">
                                        <img src="{{$image->image_path}}"
                                            alt="Image" class="object-contain storiesBox" />
                                        <p class="text-base pt-2 pb-0 mb-0 BaskervilleBT" style="font-weight:800;">{{$issue->title}}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                    
                @endforeach
              
            </div>


        </div>
    </div>

    <style>
        .tickerwrapper {
            /* the outer div */
            position: relative;
            left: 0%;
            width: 99.9%;
            overflow: hidden;
        }

        ul.list {
            position: relative;
            display: inline-block;
            list-style: none;
          
        }

       
        ul.list li {
            float: left;
            padding-left: 20px;
        }

    
        @media screen and (max-width: 750px) {
            .justifySM{
                justify-content:center;
            }
        }

    </style>


    <!--<div class="tickerwrapper lg:pt-0 pt-4">
        <ul class='list  py-2  bg-SelectGreen'>
            <li class='listitem'>
                  <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                  <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
            <li class='listitem'>
                    <a href="#" target="_blank" class=" text-6xl lg:p-8 p-2 py-4  footerDadaTitle text-black MinionPro-Regular">GET ISSUE 1 NOW</a>
            </li>
        </ul>
    </div>-->


    <hr class=" border-black dark:border-black">

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


        var $tickerWrapper = $(".tickerwrapper");
var $list = $tickerWrapper.find("ul.list");
var $clonedList = $list.clone();
var listWidth = 10;

$list.find("li").each(function (i) {
			listWidth += $(this, i).outerWidth(true);
});

var endPos = $tickerWrapper.width() - listWidth;

$list.add($clonedList).css({
	"width" : listWidth + "px"
});

$clonedList.addClass("cloned").appendTo($tickerWrapper);

//TimelineMax
var infinite = new TimelineMax({repeat: -1, paused: true});
var time = 40;

infinite
  .fromTo($list, time, {rotation:0.01,x:0}, {force3D:true, x: -listWidth, ease: Linear.easeNone}, 0)
  .fromTo($clonedList, time, {rotation:0.01, x:listWidth}, {force3D:true, x:0, ease: Linear.easeNone}, 0)
  .set($list, {force3D:true, rotation:0.01, x: listWidth})
  .to($clonedList, time, {force3D:true, rotation:0.01, x: -listWidth, ease: Linear.easeNone}, time)
  .to($list, time, {force3D:true, rotation:0.01, x: 0, ease: Linear.easeNone}, time)
  .progress(1).progress(0)
  .play();

//Pause/Play		
$tickerWrapper.on("mouseenter", function(){
	infinite.pause();
}).on("mouseleave", function(){
	infinite.play();
});

    </script>


</x-app-layout>
