/* Login.js*/



//Links
$(".gotosign").click(function(){
	window.location.href="signup.php";
});
$(".logo").click(function(){
	window.location.href="index.html";
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

// Error function
function showError(message){
	$('.error1').empty();
	$('.error1').append(message);
}

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
	$type = $(this).data('type');
	if($type != ""){
		$email = $("#email").val();
		$lastpass = $('#temp_pass').val();
		$password = $("#password").val();
		if(IsEmail($email)==false){
			// ERROR bad email
			showError("Incorrect email address");
		}
		else{
			if(checkPwd($password) == true){
				$.ajax({
		            url: "includes/traitement_POST_changepass.php",
		            type: 'post',
		            dataType: "json",
		            data: {
		                email: $email,
		                password: $password,
		                lastpass: $lastpass,
		                type: $type
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
		                else if(index == "203"){
		                	window.location.href="changepass.php";
		                }
		                 else if(index == "205"){
		                	window.location.href="mycompany.php";
		                }
		                else if(index == "401"){
		                	showError("This email isn't registered !");
		                }
		                else if(index == "402"){
		                	showError("Wrong password");
		                }   
		               });
		            }
		        });
			}
		}
	}
	else{
		showError("Error, broken link.");
	}
});

// Raccourcis claviers
$("input").on('keypress',function(e) {
    if(e.which == 13) {
        $(".gotolog").click();
    }
});