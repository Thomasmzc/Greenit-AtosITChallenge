/* Public.js 
Contient tout ce qui est partageable sur l'espace public de green'it
*/


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
// Burger navigation
$('.gotocompanynav').click(function(){
	window.location.href='company.php';
});
$('.gotopersonav').click(function(){
	window.location.href='index.html';
});

// Links

$('.logo').click(function(){
	window.location.href='index.html';
});
$('.logonav').click(function(){
	window.location.href='index.html';
});
