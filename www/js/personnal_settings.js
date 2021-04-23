/* Personnal_settings.js */


$('.logo').click(function(){
    window.location.href="index.html";
});
$('.little-explain').click(function(){
    window.location.href='privacy.php';
});

// Error function
function showError(message){
	$('.text-error').empty();
	$('.text-error').append(message);
}
jQuery('#age').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
$('#country').bind('keyup',function(){ 
    this.value = this.value.replace(/[^a-zA-Z\u00C0-\u00FF\s]/g,''); 
});
$('#location').bind('keyup',function(){ 
    this.value = this.value.replace(/[^a-zA-Z\u00C0-\u00FF\s]/g,''); 
});
// Traitement BDD
$(".gotolog").click(function(){
	$age = $("#age").val();
	$location = $("#location").val();
	$country = $("#country").val();
	if($age.length > 0 && $location.length > 2 && $country.length > 2){
		$.ajax({
            url: "includes/traitement_POST_personnalSettings.php",
            type: 'post',
            dataType: "json",
            data: {
                age: $age,
                location: $location,
                country: $country
            },
            success: function(json) {
               $.each(json, function(index, value){
                if(index == "200"){
                    window.location.href="account.php";
                }
                else{
                	showError("Server error, please try again later.");
                }
               });
            }
        });
	}
	else{
    	showError("All fields are required");
    }
		
});

// Raccourcis claviers
$("input").on('keypress',function(e) {
    if(e.which == 13) {
        $(".gotolog").click();
    }
});