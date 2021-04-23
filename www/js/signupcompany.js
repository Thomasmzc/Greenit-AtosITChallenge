/* Signup.js*/



//Links
$('.gotolog').click(function(){
	window.location.href='logincompany.php';
});
$('.return-container').click(function(){
	$data = $(this).data('state');
	if($data == "0"){
		window.location.href='company.php';
	}
	else if($data == "1"){
		$('.left_container1').css({
			display: "flex"
		});
		$('.left_container2').hide();
		$('.return-container').data('state', "0");
	}
	else if($data == "3"){
		$('.left_container1').css({
			display: "flex"
		});
		$('.left_container4').hide();
		$('.return-container').data('state', "0");
	}
	else if($data == "2"){
		$('.left_container2').css({
			display: "flex"
		});
		$('.left_container3').hide();
		$('.return-container').data('state', "0");
	}
	
});

// Select account type animation
$('.bloc_selected').click(function(){
	// Effacer tout
	$('.bloc_selected').each(function(){
		$(this).removeClass('selected');
		$(this).data('selected', "0");
	});
	// selection du bloc ciblé
	$(this).addClass("selected");
	$(this).data('selected', "1");
});

// Select account type treatment
$('#submit1').click(function(){
	$('.error1').empty();
	$dataselected = $(".selected").data('type');

	if($dataselected == "company"){
		$('.left_container1').hide();
		$('.return-container').data('state', "1");
		$('.left_container2').css({
			display: "flex"
		});
	}
	else if($dataselected == "join"){
		$('.left_container1').hide();
		$('.return-container').data('state', "3");
		$('.left_container4').css({
			display: "flex"
		});
	}
	else{
		//error
		$('.error1').append("You have to select an account type.");
	}
});

// Span animation to select
$('#typeof').click(function(){
	$(".choice-typeof").toggle();
	var topposition = $(this).offset().top();
	var leftposition = $(this).offset().left();
	$(".choice-typeof").css({
		top: topposition,
		left: leftposition
	});
});
$('.selectortypeof').click(function(){
	$val = $(this).text();
	$form = $(this).data('form');
	$('#typeof').empty();
	$('#typeof').append($val);
	$('#typeof').css({
		color: "#000000"
	});
	$('#typeof').data('val', $val);
	$(".choice-typeof").hide();
	$('.hiddeninput').hide();
	if($form == "siret"){
		$("#siret").show();
	}
	else if($form == "rna"){
		$("#rnaorsiret").show();
	}

});

// LImit siret to numbers
$('#siret').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
// Save new organization account business informations
$("#submit2").click(function(){
	$email = $("#email").val();
	$siret = $("#siret").val();
	$raison = $("#raison").val();
	$type = $("#typeof").data('val');
	$rna = $("#rnaorsiret").val();
	if(IsEmail($email)==false){
		// ERROR bad email
		showError('error2',"Incorrect email address");
	}
	else{
		if($raison.length > 1 && $siret.length > 1 && $type.length > 5 || $raison.length > 1 && $rna.length > 1 && $type.length > 5){
			if($type == "Company" || $type == "Association" || $type == "Public organization"){
				// Test siret valide
				if($type == "Association"){
					$siret = $rna;
				}
			  	$.ajax({
					url: 'includes/traitement_siret.php',
					type: 'post',
		            dataType: "json",
		            data: {
		               siret: $siret,
		               type: $type
		            },
					success: function(json){
						$.each(json, function(index, value) {
							if(index == '402'){
								showError('error2',"Incorrect siret number.");
			            		$result = false;
							}
							else if(index == '401'){
								showError('error2',"An organization is already registered with this SIRET number.");
			            		$result = false; // Proposer de contacter support, et s'envoyer un mail pour vérification
							}
							else{
								$activity = value[0];
								$effectif = value[1];
								$address = value[2];
								$cityzip = value[3];
								$longitud = value[4];
								$latitud = value[5];
								// Envoi inscription
				    			$('.left_container1').hide();
								$('.left_container2').hide();
								$('.left_container3').css({
									display: "flex"
								});
								$('.return-container').data('state', "2");
								$("#submit3").click(function(){
									$fname = $("#fname").val();
									$lname = $("#lname").val();
									$phone = $("#phone").val();
									$password = $("#password").val();
									if($fname.length > 1 && $lname.length > 1 && $phone.length > 7){
										if(checkPwd($password) == true){
											$.ajax({
									            url: "includes/traitement_POST_signupcompany.php",
									            type: 'post',
									            dataType: "json",
									            data: {
									                email: $email,
									                raison: $raison,
									                type: $type,
									                siret: $siret,
									                fname: $fname,
									                lname: $lname,
									                phone: $phone,
									                password: $password,
									                activity: $activity,
													effectif: $effectif,
													address: $address,
													cityzip: $cityzip,
													longitud: $longitud,
													latitud: $latitud
									            },
									            success: function(json) {
									               $.each(json, function(index, value){
									                if(index == "200"){
									                    window.location.href="mycompany.php"
									                }
									                else if(index == "401"){
									                	showError('error3',"Email already registered");
									                }     
									               });
									            }
									        });
										}
										else{
											showError('error3',"Your password should have at least 8 characters containing at least 1 letter and 1 number.");
										}
									}
									else{
										showError('error3',"All fields are required");
									}
								});
							}
						});
					}
				});
			}
			else{
				showError('error2',"Please select an organization's type");
			}
		}
		else{
			showError('error2',"All fields are required");
		}
	}
	
});



// Raccourcis claviers
$("input").on('keypress',function(e) {
    if(e.which == 13) {
        $(this).parent().children('button').click();
    }
});


// Join 
	// Effect code
	$('bloc_container_onecode').click(function(){
		$(this).children('input').click();
	});
	
	var regexln = /^[0-9A-Za-z]+$/;
	$(document).ready(function(){
		$(".inputs").keyup(function () {
		    if($(this).val().length == 1) {
		      	$(this).parent().next().children('input').focus();
		    }
		});
	});
	$('.inputs').focus(function(){
		$(this).parent().children('div').addClass('border-bottom-onecodeselected');
		$(this).parent().children('div').removeClass('border-bottom-onecodedeselected');
	});
	$('.inputs').on('keyup', function(event){
	    $val = $(this).val();
	    if(!regexln.test($val)) {
	    	$(this).val('');
	  	}
	  	else{
	    	$(this).val($val.toUpperCase());
	  	}
	});
	$('.inputs').focusout(function(){
		if($(this).val().length == 0){
			$(this).parent().children('div').addClass('border-bottom-onecodedeselected');
			$(this).parent().children('div').removeClass('border-bottom-onecodeselected');
		}
	});
	// Submit the code and email
	$('#submit4').click(function(){
		$email = $("#emailjoin").val();
		$code = $("#cd1").val()+$("#cd2").val()+$("#cd3").val()+$("#cd4").val()+$("#cd5").val()+$("#cd6").val();
		var verif = 0;
		if(IsEmail($email)==false){
			// ERROR bad email
			showError('error4',"Incorrect email address");
		}
		else{
			if($code.length == 6){
				// SEND to verification
				$.ajax({
		            url: "includes/traitement_POST_verifJoinCode.php",
		            type: 'post',
		            dataType: "json",
		            data: {
		                email: $email,
		                code: $code
		            },
		            success: function(json) {
		               $.each(json, function(index, value){
		                if(index == "200"){
		                	$(".left_container4").hide();
		                	$('.left_container5').show();
		                	verif = 1;
		                }
		                else{
		                	showError('error4',value);
		                }     
		               });
		            }
		        }); 
			}
			else{
				showError('error4',"Wrong code");
			}
		}
		$('#submit5').click(function(){
			if(verif == 1){
				$fname = $("#fnamej").val();
				$lname = $("#lnamej").val();
				$phone = $("#phonej").val();
				$password = $("#passwordj").val();
				if($fname.length > 1 && $lname.length > 1 && $phone.length > 7){
					if(checkPwd($password) == true){
						$.ajax({
				            url: "includes/traitement_POST_signupTeam.php",
				            type: 'post',
				            dataType: "json",
				            data: {
				                email: $email,
				                fname: $fname,
				                lname: $lname,
				                phone: $phone,
				                password: $password
				            },
				            success: function(json) {
				               $.each(json, function(index, value){
				                if(index == "200"){
				                    window.location.href="mycompany.php"
				                }
				                else if(index == "401"){
				                	showError('error5',"Email already registered");
				                }     
				               });
				            }
				        });
					}
					else{
						showError('error5',"Your password should have at least 8 characters");
					}
				}
				else{
					showError('error5',"All fields are required");
				}
			}
		});
	});

// Error function
function showError(div, message){
	$('.'+div).empty();
	$('.'+div).append(message);
}

/* Hide hidden input */
$(document).ready(function(){
	$('.hiddeninput').hide();
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
