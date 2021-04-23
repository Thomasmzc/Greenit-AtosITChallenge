/* header private.js*/

// LINKS
$('.profilcontainer').click(function(){
	window.location.href='personal_profile.php';
});
$(".navhome").click(function(){
	window.location.href='account.php';
});
$(".navact").click(function(){
	window.location.href='act.php';
});
$(".navcart").click(function(){
	window.location.href='consume.php';
});
$(".navparameters").click(function(){
  window.location.href='parameters.php';
});

/* Get info user */
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_infosUser.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
           		if(index == "200"){
                	$('.name-header').append(value[0]+" "+value[1]);
	                if(value[2] != null){
	                  $('.imgprofil').empty();
	                  $('.imgprofil').attr('src', "uploads/"+value[5]);
	                }
           		}
           });
        }
    });
});

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