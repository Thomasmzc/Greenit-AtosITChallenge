/* Requirements.js*/



//Links
$(".gotosignup").click(function(){
	window.location.href="signup.php";
});


//Hover effect
$('.choicecontainer').mouseover(function(){
	$data_hover = $(this).children('.icon_choice').data('hover');
	$(this).children('.icon_choice').attr('src', $data_hover);
});
$('.choicecontainer').mouseout(function(){
	$data_hover = $(this).children('.icon_choice').data('out');
	$(this).children('.icon_choice').attr('src', $data_hover);
});


// Error function
function showError(message){
    $('.text-error').empty();
    $('.text-error').append(message);
    $('.poperror').css({
        transform: "translateY(0px)"
    });
}
$('.close-error').click(function(){
    $('.poperror').css({
        transform: "translateY(300px)"
    });
});

// Verif state
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_requiredState.php",
        type: 'post',
        dataType: "json",
        success: function(json) {
           $.each(json, function(index, value){
            if(index == "200"){
                if(value == 1){
                    $(".required1").hide();
                    $('.required2').show();
                }
            }
            else {
                // Error
            }   
           });
        }
    });
});
// CHOICE 1
$('.choicecontainer1').click(function(){
	$choice = $(this).data('id');
	$.ajax({
        url: "includes/traitement_POST_required1.php",
        type: 'post',
        dataType: "json",
        data: {
            choice: $choice
        },
        success: function(json) {
           $.each(json, function(index, value){
            if(index == "200"){
            	$(".required1").hide();
            	$('.required2').show();
            }
            else {
            	showError("Server error, please try again later");
            }   
           });
        }
    });
});
// CHOICE 2
$('.choicecontainer2').click(function(){
    $choice = $(this).data('id');
    $.ajax({
        url: "includes/traitement_POST_required2.php",
        type: 'post',
        dataType: "json",
        data: {
            choice: $choice
        },
        success: function(json) {
           $.each(json, function(index, value){
            if(index == "200"){
                window.location.href='personal_settings.php';
            }
            else {
                showError("Server error, please try again later");
            }   
           });
        }
    });
});