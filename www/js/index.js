/* Index.js*/



//Links
$(".gotolog").click(function(){
	window.location.href="login.php";
});
$(".gotosign").click(function(){
	window.location.href="signup.php";
});
$('.gotocompany').click(function(){
	window.location.href='company.php';
});
$('#gocriteria').click(function(){
    window.location.href='categories.php';
});
$('#goevents').click(function(){
    window.location.href="eventcategories.php";
});

// Animations 
function showImages(el) {
    var windowHeight = jQuery( window ).height();
    $(el).each(function(){
        var thisPos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (topOfWindow + windowHeight - 200 > thisPos ) {
            $(this).addClass("fadeInL");
        }
    });
}
function showImagesR(el) {
    var windowHeight = jQuery( window ).height();
    $(el).each(function(){
        var thisPos = $(this).offset().top;

        var topOfWindow = $(window).scrollTop();
        if (topOfWindow + windowHeight - 200 > thisPos ) {
            $(this).addClass("fadeInR");
        }
    });
}
// if the image in the window of browser when the page is loaded, show that image
$(document).ready(function(){
    showImages('.fromleft');
    showImagesR('.fromright'); 
});

// if the image in the window of browser when scrolling the page, show that image
$(window).scroll(function() {
    showImages('.fromleft');
    showImagesR('.fromright'); 
});
// Header style
$(document).scroll(function() { 
   if($(window).scrollTop() === 0) {
        $("header").css({
            "box-shadow": "none"
        });
   }
   else{
        $("header").css({
            "box-shadow": "0 6px 12px -2px rgba(48,54,77,.12)"
        });
   }
});


// Carousel 1
var carousel = $(".carousel"),
    items = $(".item"),
    currdeg  = 0;

$(".next").on("click", { d: "n" }, rotate);
$(".prev").on("click", { d: "p" }, rotate);

function rotate(e){
  if(e.data.d=="n"){
    currdeg = currdeg - 60;
  }
  if(e.data.d=="p"){
    currdeg = currdeg + 60;
  }
  carousel.css({
    "-webkit-transform": "rotateY("+currdeg+"deg)",
    "-moz-transform": "rotateY("+currdeg+"deg)",
    "-o-transform": "rotateY("+currdeg+"deg)",
    "transform": "rotateY("+currdeg+"deg)"
  });
    items.css({
    "-webkit-transform": "rotateY("+(-currdeg)+"deg)",
    "-moz-transform": "rotateY("+(-currdeg)+"deg)",
    "-o-transform": "rotateY("+(-currdeg)+"deg)",
    "transform": "rotateY("+(-currdeg)+"deg)"
  });
}

// Carousel 2
var carousel2 = $(".carousel2"),
    items2 = $(".item2"),
    currdeg2  = 0;

$(".next2").on("click", { d: "n" }, rotate2);
$(".prev2").on("click", { d: "p" }, rotate2);

function rotate2(e){
  if(e.data.d=="n"){
    currdeg2 = currdeg2 - 60;
  }
  if(e.data.d=="p"){
    currdeg2 = currdeg2 + 60;
  }
  carousel2.css({
    "-webkit-transform": "rotateY("+currdeg2+"deg)",
    "-moz-transform": "rotateY("+currdeg2+"deg)",
    "-o-transform": "rotateY("+currdeg2+"deg)",
    "transform": "rotateY("+currdeg2+"deg)"
  });
    items2.css({
    "-webkit-transform": "rotateY("+(-currdeg2)+"deg)",
    "-moz-transform": "rotateY("+(-currdeg2)+"deg)",
    "-o-transform": "rotateY("+(-currdeg2)+"deg)",
    "transform": "rotateY("+(-currdeg2)+"deg)"
  });
}
