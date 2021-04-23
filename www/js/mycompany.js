/* Mycompany.js*/

// Links
$('.parameters').click(function(){
  window.location.href='parameters.php';
});
$('.bfl1').click(function(){
  window.location.href='professional_profile.php';
});
$('.bfl2').click(function(){
    window.location.href='companypage.php';
});
$('.bfl3').click(function(){
    window.location.href='ourevents.php';
});
$('.bfl4').click(function(){
    window.location.href='dashboard.php';
});

//Get name
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_infosTeamUser.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
           		if(index == "200"){
            		$('.insname').append(" "+value[0]+" "+value[1]);
           		}
           });
        }
    });
});

/* Switch help */
$('#gotohelp').click(function(){
  $('.corpus').hide();
  $('.corpus2').show();
});
$('.return-container').click(function(){
  $('.corpus').show();
  $('.corpus2').hide();
});

/* Placeholder message */
jQuery(function($){
    $("[contenteditable]").focusout(function(){
        var element = $(this);        
        if (!element.text().trim().length) {
            element.empty();
        }
    });
});


// Send message
$("#sendmsg").click(function(){
  $msg = $('.contentmsg').text();
  $('.returnmsg').empty();
  if($msg.length > 0){
    $.ajax({
        url: "includes/traitement_POST_sendMsgToSupport.php",
        type: 'post',
        dataType: "json",
        data: {
          msg: $msg
        },
        success: function(json) {
           $.each(json, function(index, value){
              if(index == "200"){
                $('.returnmsg').append("Our team received your message, we will keep you in touch as soon as possible by email.");
                $('.contentmsg').empty();
              }
              else{
                $('.returnmsg').append("Internal error, try again later.");
                $('.returnmsg').css({
                  color: "red"
                });
              }
           });
        }
    });
  }
  else{
    $('.returnmsg').append("Your message can't be empty.");
    $('.returnmsg').css({
      color: "red"
    });
  }
});