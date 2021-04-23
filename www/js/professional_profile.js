/* professional profil */

// GET team info 
$.ajax({
      url: "includes/traitement_GET_infosFullTeam.php",
      type: 'post',
      dataType: "json",
      data: {
      },
      success: function(json) {
         $.each(json, function(index, value){
            if(index == "0"){
            }
            else{
              if(value[2] != null){
                $(".account-flexer").append("<div class='oneaccount'><div class='bloc_imgaccount' id='blcimg"+index+"'><img src='uploads/"+value[2]+"'/></div><p class='title-name'>"+value[0]+" "+value[1]+"</p><p class='status "+value[3]+"'>"+value[3]+"</p></div>");
              }
              else{
                $(".account-flexer").append("<div class='oneaccount'><div class='bloc_imgaccount' id='blcimg"+index+"'></div><p class='title-name'>"+value[0]+" "+value[1]+"</p><p class='status "+value[3]+"'>"+value[3]+"</p></div>");
              }
              if(value[3] == "online"){
                $('#blcimg'+index).css({
                  "border": "3px #00B34B solid"
                });
              }
            }
         });
      }
  });

//Get infos user
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
                $('.myname').empty();
            		$('.myname').append(value[0]+" "+value[1]);
                $('.myfunction').empty();
                $('.myfunction').append(value[4]);
                $('.myfname').empty();
                $('.myfname').append(value[0]);
                $('.myemail').empty();
                $('.myemail').append(value[3]);
                if(value[2] != null){
                  $('.img-profile').empty();
                  $('.img-profile').append("<img src='uploads/"+value[2]+"' class='ppicture' />");
                  $('.img-profile').append("<p>Change picture</p>");
                }
           		}
           });
        }
    });
});

/* CROPPER */
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

  


// change picture
$('.img-profile').click(function(){
  $('#imgprofil_container').click();
    // vars
  let result = document.querySelector('.result'),
  img_w = 150,
  img_h = document.querySelector('.img-h'),
  save = document.getElementById('crop'),
  cropped = document.querySelector('.cropped'),
  dwn = document.querySelector('.download'),
  upload = document.querySelector('#imgprofil_container');
  
  // on change show image with crop options
  upload.addEventListener('change', (e) => {
    $('.darkness').show();
    $('.modal-content').show();
    if (e.target.files.length) {
      // start file reader
      const reader = new FileReader();
      reader.onload = (e)=> {
        if(e.target.result){
          // create new image
          let img = document.createElement('img');
          img.id = 'image';
          img.src = e.target.result
          // clean result before
          result.innerHTML = '';
          // append new image
          result.appendChild(img);
          $('#image').css({
            "max-height": "50vh"
          });
          // show save btn and options
          save.classList.remove('hide');
          // init cropper
          cropper = new Cropper(img, {
            aspectRatio: 1,
            viewMode: 1,
            ready: function () {
              croppable = true;
            },
          });
        }
      };
      reader.readAsDataURL(e.target.files[0]);
    }
  });
  // save on click
  save.addEventListener('click',(e)=>{
    $('.darkness').hide();
    $('.modal-content').hide();
    e.preventDefault();
    // get result to data uri
    if (cropper) {
      canvas = cropper.getCroppedCanvas({
        imageSmoothingEnabled: true,
        imageSmoothingQuality: 'high',
      });
      canvas.toBlob(function (blob) {
        var formData = new FormData();

        formData.append('file', blob);

        console.log('formData: ',formData, 'blob', blob);
        $.ajax({
          url: 'includes/traitement_POST_pictureTeamUser.php',
          type: 'post',
          dataType: "json",
          data: formData,
          contentType: false,
          processData: false,
          success: function(json){
           $.each(json, function(index, value){
              if(index == "200"){
                $('.img-profile').empty();
                $('.img-profile').append("<img src='uploads/"+value+"' class='ppicture' />");
                $('.img-profile').append("<p>Change picture</p>");
              }
           });
          }
        });
      },1);
    }
  });
});

/* Avort cropping */
$('.close').click(function(){
  $('.darkness').hide();
  $('.modal-content').hide();
  $("#imgprofil_container").empty();
});
$('#avortcrop').click(function(){
  $('.darkness').hide();
  $('.modal-content').hide();
  $("#imgprofil_container").empty();
});

// Invit a new team member
  //Access to invitation panel on click
$('#invit').click(function(){
  $('.team-container').hide();
  $('.team-container2').show();
});
  // Goback
$('.return-container').click(function(){
  $('.team-container2').hide();
  $('.team-container').show();
  $("#email_member").val('');
});
// Send invit 
$("#submit_invit").click(function(){
  $email = $("#email_member").val();
  $('error_invit').css({
    color: "red"
  });
  $('.error_invit').empty();
  // checking email
  if(IsEmail($email)==false){
    // ERROR bad email
    $('.error_invit').append("Incorrect email address");
  }
  else{
    $.ajax({
      url: "includes/traitement_POST_invitationTeam.php",
      type: 'post',
      dataType: "json",
      data: {
        email: $email
      },
      success: function(json) {
         $.each(json, function(index, value){
            if(index == "200"){
              $('.error_invit').append("Invitation sent.");
              $('.error_invit').css({
                color: "#00B34B"
              });
            }
            else{
              $('.error_invit').append(value);
              $('.error_invit').ccs({
                color: "red"
              });
            }
         });
      }
    });
  }
});
$('#email_member').focus(function(){
  $('.error_invit').empty();
});
$('#email_member').on('keypress',function(e) {
    if(e.which == 13) {
        $('#submit_invit').click();
    }
});
// Email checking function
function IsEmail(email) {
    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(!regex.test(email)) {
      return false;
    }
    else{
      return true;
    }
}


/* subscription */
$('.upgradesub').click(function(){
  window.location.href='subscription.php';
});