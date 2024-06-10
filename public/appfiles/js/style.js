window.addEventListener('scroll', () => {
    const header = document.getElementById('stickyHeader');
    const headerHeight = header.clientHeight;

    if (window.scrollY >= headerHeight) {
        header.classList.add('sticky-top');
    } else {
        header.classList.remove('sticky-top');
    }
});


// public/js/carousel.js
const images = document.querySelectorAll('.carousel-container img');
const nextButton = document.querySelector('.carousel-next');
const prevButton = document.querySelector('.carousel-prev');
let currentImageIndex = 0;

function showImage(index) {
  images.forEach((image, i) => {
    if (i === index) {
      image.classList.remove('hidden');
    } else {
      image.classList.add('hidden');
    }
  });
}

function nextImage() {
  currentImageIndex = (currentImageIndex + 1) % images.length;
  showImage(currentImageIndex);
}

function prevImage() {
  currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
  showImage(currentImageIndex);
}

nextButton.addEventListener('click', nextImage);
prevButton.addEventListener('click', prevImage);


setInterval(nextImage, 4000); // Adjust the interval as needed



/* FadeIn Scroll */
$(document).ready(function() {
    
    /* Every time the window is scrolled ... */
    $(window).scroll( function(){
    
        /* Check the location of each desired element */
        $('.fade').each( function(i){
            
            var bottom_of_object = $(this).position().top + $(this).outerHeight();
            var bottom_of_window = $(window).scrollTop() + $(window).height();
            
            /* If the object is completely visible in the window, fade it it */
            if( bottom_of_window > bottom_of_object ){
                
                $(this).animate({'opacity':'1'},500);
                    
            }
            
        }); 
    
    });
    
});


$(document).ready(function() {
  /* Every time the window is scrolled ... */
  $(window).scroll(function() {
      /* Check the location of each desired element */
      $('.slide-in').each(function(i) {
          var bottom_of_object = $(this).position().top + $(this).outerHeight();
          var bottom_of_window = $(window).scrollTop() + $(window).height();
          
          /* If the object is completely visible in the window, animate the slide-in effect */
          if (bottom_of_window > bottom_of_object) {
              $(this).animate({
                  'opacity': '1',
                  'left': '0' // Slide in from the front left (adjust as needed)
              }, 500);
          }
      });
  });
});



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


$(window).scroll(function() {
  $(".animation .anm_mod").each(function() {
   const position = $(this).offset().top;
   const scroll = $(window).scrollTop();
   const windowHeight = $(window).height();
   if (scroll > position - windowHeight) {
    $(this).addClass("active");
   }
   if (scroll < 100) {
    $(this).removeClass("active");
   }
  });
 });
 
 $(function() {
  $('a[href^="#"]').click(function() {
   const speed = 800;
   const href = $(this).attr("href");
   const target = $(href == "#" || href == "" ? "html" : href);
   const position = target.offset().top;
   $("html, body").animate({ scrollTop: position }, speed, "swing");
   return false;
  });
 });
 


// When the user scrolls down 50px from the top of the document, resize the header's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  var headerElement = document.getElementById("header");
  if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    headerElement.style.width = "100px";
    headerElement.style.paddingLeft = "0px";
    headerElement.style.paddingRight = "0px";
    if (window.innerWidth > 768) {
      headerElement.style.left = "46%";
    } else {
      headerElement.style.left = "0"; // Align left on small screens
    }
   
  } else {
    headerElement.style.width = "97vw";
    headerElement.style.paddingLeft = "5.5vw";
    headerElement.style.paddingRight = "5.5vw";
    headerElement.style.textAlign = "center"; 
    headerElement.style.left = "0"; // Align center on larger screens
  }
}

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