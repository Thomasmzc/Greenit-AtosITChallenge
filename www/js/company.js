/* Company.js*/


// LINKS
$('.logo').click(function(){
	window.location.href='index.html';
});
$('.gotosign').click(function(){
	window.location.href='signupcompany.php';
});
$('.gotoperso').click(function(){
	window.location.href='index.html';
});
$('#gotostart2').click(function(){
	window.location.href='signupcompany.php';
});
$('.gotolog').click(function(){
    window.location.href='logincompany.php';
});
$('#gosigning').click(function(){
  window.location.href='signupcompany.php';
});
// SLider img
$(".slider").click(function(){
	$('.slider').each(function(){
		$(this).removeClass('active');
	});
	$(this).addClass('active');
	$imglink = $(this).data('img');
	$('.imgslider1').attr('src', $imglink);
});

// ANIMATIONS
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
// if the image in the window of browser when the page is loaded, show that image
$(document).ready(function(){

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

// Triet animation 
$(window).scroll(function() {
   var hT = $('.fourthsection').offset().top,
       hH = $('.fourthsection').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    if (wS > (hT+hH-wH) && (hT > wS) && (wS+wH > hT+hH)){
      $(".appeareffect").each(function (i) {
            var $li = $(this);
            setTimeout(function (){
                $li.addClass("fadeInL");
            }, 100 * (i + 1));
        });
        $(".pfourth").each(function (i) {
            var $li = $(this);
            setTimeout(function (){
                $li.addClass("fadeInL");
            }, 1300 * (i + 1));
        });
        setTimeout(function (){
            $('.btnfourth').addClass("fadeInB");
        }, 4200);
    }
});

// Card animation
$(window).scroll(function() {
   var hT = $('.fifthsection').offset().top,
       hH = $('.fifthsection').outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    if (wS > (hT+hH-wH) && (hT > wS) && (wS+wH > hT+hH)){
      $(".card").each(function (i) {
            var $li = $(this);
            setTimeout(function (){
                $li.addClass("fadeInB");
            }, 700 * (i + 1));
        });
    }
});

// Parallax
$e = 0;
var lastScrollTop = 0;
$(window).scroll(function() {
    var st = $(this).scrollTop();
    if (st > lastScrollTop){
       $('.img-parallax').css({transform: 'translateY(' + $e/2 +'px)'});
       if($e < 120){
            $e ++;
        }
        else{
           $e = $e - 1;
        }
       console.log($e);
    } else {
       $('.img-parallax').css({transform: 'translateY(' + $e/2 +'px)'});
        if($e > -120){
            $e = $e - 1;
        }
        else{
           $e ++; 
        }
       console.log($e);
    }
    lastScrollTop = st;   
});



// Count nd user
$(document).ready(function(){
/* Get first line datas */ 
  $.ajax({
      url: "includes/traitement_GET_usersNumber.php",
      data: {
      },
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
          if(index == "200"){
            $('#valusers').append(value);
          }
        });
      }
   });
});