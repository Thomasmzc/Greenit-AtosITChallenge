/* Login.js*/



//Links
$('.gotosignup').click(function(){
	window.location.href='signupcompany.php';
});
$('.return-container').click(function(){
	$data = $(this).data('to');
	if($data == "1"){
		$('.marger-container').show();
		$('.return-container').data('to', '0');
		$('.marger-container2').hide();
	}
	else{
		window.location.href='company.php';
	}
	
});

// Error function
function showError(message){
	$('.text-error').empty();
	$('.text-error').append(message);
}
function showError2(message){
	$('.text-error2').empty();
	$('.text-error2').append(message);
}
// Success popup function
function showSuccess(message){
	$('.text-success').empty();
	$('.text-success').append(message);
	$('.popsuccess').show();
	$('#darkness').show();
}
$('.close-success').click(function(){
	$('.popsuccess').hide();
	$('#darkness').hide();
});

// Post signup 
	// Function verif email format
function IsEmail(email) {
  	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  	if(!regex.test(email)) {
    	return false;
  	}
  	else{
    	return true;
  	}
}
// Traitement BDD
$(".gotolog").click(function(){
	$email = $("#email").val();
	$password = $("#password").val();
	if(IsEmail($email)==false){
		// ERROR bad email
		showError("Incorrect email address");
	}
	else{
		if($password.length > 7){
			$.ajax({
	            url: "includes/traitement_POST_connexioncompany.php",
	            type: 'post',
	            dataType: "json",
	            data: {
	                email: $email,
	                password: $password
	            },
	            success: function(json) {
	               $.each(json, function(index, value){
	                if(index == "200"){
	                    window.location.href="mycompany.php";
	                }
	                else if(index == "401"){
	                	showError("Email address doesn't exist in our database");
	                }
	                else if(index == "402"){
	                	showError("Wrong password");
	                }   
	               });
	            }
	        });
		}
		else{
			showError("All the fields are required");
		}
	}
});

// Raccourcis claviers
$("input").on('keypress',function(e) {
    if(e.which == 13) {
        $(".gotolog").click();
    }
});

// Récupération MDP
$('.forgotlink').click(function(){
	$('.marger-container2').show();
	$('.return-container').data('to', '1');
	$('.marger-container').hide();
});
$('.return').click(function(){
	$('.marger-container').show();
	$('.return-container').data('to', '0');
	$('.marger-container2').hide();
});
$('.gotosend').click(function(){
	$('.success_message').empty();
	$email = $("#emailForgot").val();
	if(IsEmail($email)==false){
		// ERROR bad email
		showError2("Incorrect email address");
	}
	else{
		$.ajax({
            url: "includes/traitement_SEND_recuperationMDP.php",
            type: 'post',
            dataType: "json",
            data: {
                email: $email,
                type: "orga"
            },
            success: function(json) {
               $.each(json, function(index, value){
                if(index == "200"){
                    $('.success_message').append("An email have been sent to you");
                }
                else if(index == "400"){
                	showError2("Email address doesn't exist in our database");
                }
                else if(index == "401"){
                	showError2("Server error, please try again later");
                }   
               });
            }
        });
	}
});
// POPUP
$('#darkness').click(function(){
	$('.popup').hide();
	$(this).hide();
});