/* Login.js*/



//Links
$(".logo").click(function(){
	window.location.href="index.html";
});
$(".gotoperso").click(function(){
	window.location.href="index.html";
});
$(".gotosign").click(function(){
	window.location.href="signup.php";
});
$('.gotocompany').click(function(){
	window.location.href='company.php';
});
// Error function
function showError1(message){
	$('.error1').empty();
	$('.error1').append(message);
}
function showError2(message){
	$('.error2').empty();
	$('.error2').append(message);
}

// Success popup function
function showSuccess(message){
	$('.error2').empty();
	$('.error2').append(message);
	$('.error2').css({
		color: "#00B34B"
	});
}
// GET FACTS
	// Run function get fact
	$(document).ready(function(){
		getfact();
		setInterval(function(){ getfact(); }, 5000);
	});

	// Function get fact
function getfact(){
	$('.fact-container').fadeOut(300);
	setTimeout(function(){
		$('.fact-container').empty();
		$.ajax({
	        url: "includes/traitement_GET_randomFact.php",
	        type: 'post',
	        dataType: "json",
	        data: {
	        },
	        success: function(json) {
	           $.each(json, function(index, value){
	            $('.fact-container').append(value);
	            $('.fact-container').fadeIn(400);
	           });
	        }
	    });
    }, 300);
}
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
		showError1("Incorrect email address");
	}
	else{
		if($password.length > 7){
			$.ajax({
	            url: "includes/traitement_POST_connexion.php",
	            type: 'post',
	            dataType: "json",
	            data: {
	                email: $email,
	                password: $password
	            },
	            success: function(json) {
	               $.each(json, function(index, value){
	                if(index == "200"){
	                    window.location.href="account.php";
	                }
	                else if(index == "201"){
	                	window.location.href="requirements.php";
	                }
	                else if(index == "202"){
	                	window.location.href="requirements.php?state=2";
	                }
	                else if(index == "2021"){
	                	window.location.href="personal_settings.php";
	                }
	                else if(index == "203"){
	                	window.location.href="changepass.php";
	                }
	                else if(index == "401"){
	                	showError1("Email address doesn't exist in our database");
	                }
	                else if(index == "402"){
	                	showError1("Wrong password");
	                }   
	               });
	            }
	        });
		}
		else{
			showError1("All the fields are required");
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
	$('.left_side2').show();
	$('.left_side').hide();
});
$('.return').click(function(){
	$('.left_side').show();
	$('.left_side2').hide();
});
$('.gotosend').click(function(){
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
                type: "membre"
            },
            success: function(json) {
               $.each(json, function(index, value){
                if(index == "200"){
                	$('.popup').hide();
                    showSuccess("An email have been sent to you")
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