/* header private.js*/

/* Get info team user */
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_infosTeamandOrga.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
           		if(index == "200"){
                	$('.bigname-header').append(value[3]);
                	$('.littlename-header').append(value[0]+" "+value[1]);
	                if(value[2] != null){
	                  $('.imgprofil').empty();
	                  $('.imgprofil').attr('src', "uploads/"+value[2]);
	                }
           		}
           });
        }
    });


    /* Update last activity */
    $.ajax({
        url: "includes/traitement_POST_lastactivity.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
              if(index == "200"){
                
              }
           });
        }
    });
});


/*Menu hover */

$('.navli').mouseover(function(){
	$img = $(this).children('a').children('img').data('on');
	$(this).children('a').children('img').attr('src', $img);
});
$('.navli').mouseout(function(){
	$img = $(this).children('a').children('img').data('out');
	$(this).children('a').children('img').attr('src', $img);
});
$(document).ready(function(){
  $color = $('.active').data('color');
  $img = $('.active').children('a').children('img').data('on');
  $('.active').children('a').children('img').attr('src', $img);
  $('.active').css({
    "background-color": $color,
    color: "#FFFFFF"
  });
  $('.active').children('a').css({
    color: "#FFFFFF"
  });
});
/* Links */
$('.teamcontainer').click(function(){
	window.location.href='professional_profile.php';
});
$(".navhome").click(function(){
	window.location.href='mycompany.php';
});
$(".navevent").click(function(){
	window.location.href='ourevents.php';
});
$(".navcomp").click(function(){
	window.location.href='companypage.php';
});
$(".navparameters").click(function(){
  window.location.href='parameters.php';
});


// Burger menu
const navSlide = () => {
  const burger = document.querySelector(".burger");
  const nav = document.querySelector(".nav-links");
  const navlinks = document.querySelectorAll(".nav-link");

  burger.addEventListener('click', () => {
    /* Toggle */
    nav.classList.toggle('nav-active');
    /* Animation */
    navlinks.forEach((link, index) =>{
      if(link.style.animation){
        link.style.animation = "";
      }
      else{
        link.style.animation =`navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
      }
      
    });
    /* Burger Animation */
    burger.classList.toggle('toggle');
  });
}
navSlide();