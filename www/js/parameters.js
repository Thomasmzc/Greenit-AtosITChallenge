/* Parameters.js*/

//links
$('.close').click(function(){
  history.back();
});
$('.blcdeco').click(function(){
	window.location.href='includes/deconnexion.php';
});

	// Function verif password
function checkPwd(str) {
    if (str.length < 7) {
    	$('.error').append("Your password should have at least 8 characters");
        return("too_short");
    } else if (str.length > 50) {
    	$('.error').append("Your password can't have more than 50 characters");
        return("too_long");
    } else if (str.search(/\d/) == -1) {
    	$('.error').append("Your password must contains at least 1 number");
        return("no_num");
    } else if (str.search(/[a-zA-Z]/) == -1) {
    	$('.error').append("Your password must contains at least 1 letter");
        return("no_letter");
    } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
    	$('.error').append("Your password contains a not supported character");
        return("bad_char");
    }
    else{
    	return true;
    }
    
}
$("#submitchange").click(function(){
	
	$('.error').empty();
	$('.success').empty();
	$password = $("#oldpass").val();
	$nwpassword = $("#newpass").val();
	$nwpassword2 = $("#newpass2").val();
	console.log('ok');
	if($password.length > 1 && $nwpassword.length > 1 && $nwpassword2.length > 1){
		console.log('1');
		if($nwpassword === $nwpassword2){
			if(checkPwd($nwpassword) == true){
				$.ajax({
		            url: "includes/traitement_POST_changePassword.php",
		            type: 'post',
		            dataType: "json",
		            data: {
		                last: $password,
		                new: $nwpassword
		            },
		            success: function(json) {
		               $.each(json, function(index, value){
		                if(index == "200"){
		                   $('.success').append("Password changed successfully.");
		                }
		                else if(index == "401"){
		                	$('.error').append("Current password is not the right one.");
		                }   
		               });
		            }
		        });
			}
		}
		else{
			$('.error').append("Your password and confirmation are different.");
		}
		
	}
	else{
		console.log('0');
		$('.error').append("All fields are required.");
	}
	
});