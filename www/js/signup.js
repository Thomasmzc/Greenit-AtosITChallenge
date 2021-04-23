/* Signup.js*/



//Links
$(".logo").click(function(){
	window.location.href="index.html";
});
$(".gotolog").click(function(){
	window.location.href="login.php";
});
$(".gotoperso").click(function(){
	window.location.href="index.html";
});
$('.gotocompany').click(function(){
	window.location.href='company.php';
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
	// Function verif password
function checkPwd(str) {
    if (str.length < 7) {
    	showError("Your password should have at least 8 characters");
        return("too_short");
    } else if (str.length > 50) {
    	showError("Your password can't have more than 50 characters");
        return("too_long");
    } else if (str.search(/\d/) == -1) {
    	showError("Your password must contains at least 1 number");
        return("no_num");
    } else if (str.search(/[a-zA-Z]/) == -1) {
    	showError("Your password must contains at least 1 letter");
        return("no_letter");
    } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
    	showError("Your password contains a not supported character");
        return("bad_char");
    }
    else{
    	return true;
    }
    
}
// Traiement BDD
$(".gotosign").click(function(){
	$email = $("#email").val();
	$fname = $("#fname").val();
	$lname = $("#lname").val();
	$password = $("#password").val();
	$linked = $(this).data('link');
	if(IsEmail($email)==false){
		// ERROR bad email
		showError("Incorrect email address");
	}
	else{
		if($fname.length > 1 && $lname.length > 1 && $password.length > 7){
			if(checkPwd($password) == true){
				$.ajax({
		            url: "includes/traitement_POST_signup.php",
		            type: 'post',
		            dataType: "json",
		            data: {
		                email: $email,
		                fname: $fname,
		                lname: $lname,
		                password: $password,
		                link: $linked
		            },
		            success: function(json) {
		               $.each(json, function(index, value){
		                if(index == "200"){
		                    window.location.href="requirements.php"
		                }
		                else if(index == "401"){
		                	showError("Email already registered");
		                }   
		               });
		            }
		        });
			}
		}
		else{
			console.log($password);
			console.log($fname);
			console.log($lname);
			if($password.length > 7){
				showError("All the fields are required");
				// ERROR VOUS DEVEZ REMPLIR TOUS LES CHAMPS
			}
			else{
				showError("Your password should have at least 8 characters");
				// ERROR LE MOT DE PASSE DOIT FAIRE AU MOINS 8 CARACTERES
			}
		}
	}
});
// Raccourcis claviers
$("input").on('keypress',function(e) {
    if(e.which == 13) {
        $(".gotosign").click();
    }
});
