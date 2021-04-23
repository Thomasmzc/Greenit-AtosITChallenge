/* Organization's profile */
function createlink(element, b) {
  this.setAttribute("onclick", b); // or just this.href = b;
}
//Get infos user
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_infosOrganization.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
           		if(index == "200"){
                $('.companyname').append(value[0]);
                $('.location').append("<img src='assets/img/locato.png' class='imgtype'/> "+value[6]);
                $('#location').val(value[6]);
                
                $('.description-content').append(value[2]);
                $('#description').append(value[2]);
                if(value[8] != null){
                  $('.website-content').append("Website: "+value[8]);
                  $('#website').val(value[8]);
                }
                else{
                  $('.website-content').append("Website: ");
                }
                if(value[1] != null){
                  if(value[3] == "Company"){
                     $('.secteur').append("<img src='assets/img/shop.png' class='imgtype'/> "+value[1]);
                  }
                  else{
                     $('.secteur').append("<img src='assets/img/value.png' class='imgtype'/> "+value[1]);
                  }
                 
                  $('#typeof').empty();
                  $('#typeof').append(value[1]);
                  $('#typeof').css({
                    color: "#000000"
                  });
                  $('#typeof').data('val', value[1]);
                }
                else{
                  $('.secteur').append(value[3]);
                }
                if(value[4] != null){
                  $('.mail-content').append("Email: "+value[4]);
                  $('#email').val(value[4]);
                }
                else{
                  $('.mail-content').append("Email: ");
                }
                if(value[9] != "" && value[9] != null){
                  $('.linkedin').data('link', value[9]);
                  $('#linkedin').val(value[9]);
                }
                else{
                  $('.linkedin').hide();
                }
                if(value[10] != "" && value[10] != null){
                  $('.instagram').data('link', value[10]);
                  $('#instagram').val(value[10]);
                }
                else{
                  $('.instagram').hide();
                }
                if(value[11] != "" && value[11] != null){
                  $('.facebook').data('link', value[11]);
                  $('#facebook').val(value[11]);
                }
                else{
                  $('.facebook').hide();
                }
                if(value[5] != null){
                  $('.bloc_logo').empty();
                  $('.bloc_logo').append("<img src='uploads/"+value[5]+"' class='ppicture' />");
                  $('.bloc_logo').append("<p>Change your logo</p>");
                }
           		}
           });
        }
    });
});

/* Avort cropping */
$('.close').click(function(){
  $('.darkness').hide();
  $('.modal-content').hide();
  $("#imgprofil_container").val("");
});
$('#avortcrop').click(function(){
  $('.darkness').hide();
  $('.modal-content').hide();
  $("#imgprofil_container").val("");
});


// change picture
$('.bloc_logo').click(function(){
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
            aspectRatio: 14/9,
            strict: true,
            autoCropArea: 1,
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
          url: 'includes/traitement_POST_pictureOrganization.php',
          type: 'post',
          dataType: "json",
          data: formData,
          contentType: false,
          processData: false,
          success: function(json){
           $.each(json, function(index, value){
              if(index == "200"){
                $('.bloc_logo').empty();
                $('.bloc_logo').append("<img src='uploads/"+value+"' class='ppicture' />");
                $('.bloc_logo').append("<p>Change your logo</p>");
                $('.imgprofil').remove();
                $('.teamcontainer').prepend("<img src='uploads/"+value+"' class='imgprofil' />")
              }
           });
          }
        });
      },1);
    }
  });
});


/* Switchers */
$('#gotoedit').click(function(){
  $('.text-top-container').hide();
  $('.text-top-editor').show();
  $('.description-text').hide();
  $('.description-text-editor').show();
  $('.contact-flex').hide();
  $('.contact-editor').show();
  $('.reseau-flex').hide();
  $('.reseau-editor').show();
  $(this).hide();
  $('.containerbtneditor').css({
    display: "flex"
  });
});
$('#gotodiscard').click(function(){
  location.reload(true);
});

// Save top editing 
$('#savetopeditor').click(function(){
  $location = $("#location").val();
  $secteur = $(".spansector").data('val');
  $description = $("#description").html().trim()
  .replace(/<br\s*\/*>/ig, '\n') 
  .replace(/(<(p|div))/ig, '\n$1') 
  .replace(/(<([^>]+)>)/ig, "");
  $website = $("#website").val();
  $email = $("#email").val();
  $linkedin = $("#linkedin").val();
  $instagram = $("#instagram").val();
  $facebook = $("#facebook").val();
  $.ajax({
        url: 'includes/traitement_POST_infoOrgaTop.php',
        type: 'post',
        dataType: "json",
        data: {
          location: $location,
          secteur: $secteur,
          description: $description,
          website: $website,
          email: $email,
          linkedin: $linkedin,
          instagram: $instagram,
          facebook: $facebook
        },
        success: function(json){
         $.each(json, function(index, value){
            if(index == "200"){
              location.reload(true);
            }
         });
        }
     });
});

// Contenteditable placeholder effect
jQuery(function($){
    $("[contenteditable]").focusout(function(){
        var element = $(this);        
        if (!element.text().trim().length) {
            element.empty();
        }
    });
});
// Click img link reseau
$('.imglink').on('click', function(){
  $link = $(this).data('link');
  openInNewTab($link);
});

/* Autocomplete Industry */
$(function(){
    var availableTags = [
      "Arts and entertainment",
      "Automotive",
      "Beauty and fitness",
      "Books and literature",
      "Business and industrial markets",
      "Computers and electronics",
      "Finance",
      "Food and drink",
      "Games",
      "Healthcare",
      "Hobbies and leisure",
      "Home and garden",
      "Internet and telecom",
      "Jobs and education",
      "Law and government",
      "News",
      "Online communities",
      "People and society",
      "Pets and animals",
      "Real estate",
      "Reference",
      "Science",
      "Shopping",
      "Sports",
      "Travel",
      "Waste and recycling",
      "Other"
    ];
    $.each(availableTags, function(index, value){
      $('.choice-typeof').children('ul').append("<li class='selectortypeof' data-sec='"+value+"'>"+value+"</li>");
    });
    
  });
// Span animation to select
$(document).ready(function(){
  $("#typeof").click(function(){
    $(".choice-typeof").toggle();
  });
  $(".choice-typeof").on("click",'.selectortypeof', function(){
    $val = $(this).text();
    $form = $(this).data('sec');
    $('#typeof').empty();
    $('#typeof').append($val);
    $('#typeof').css({
      color: "#000000"
    });
    $('#typeof').data('val', $val);
    $(".choice-typeof").hide();

  });
});

/* KEYWORDS */
 /* Get interests */
function getInterest(){
  $('.flexer_interest').empty();
  $('.flexerinteresteditor').empty();
  $.ajax({
      url: "includes/traitement_GET_myAllInterestsOrga.php",
      type: 'post',
      dataType: "json",
      data: {
      },
      success: function(json) {
         $.each(json, function(index, value){
              $('.flexerinteresteditor').append("<div class='oneinterest "+value[2]+"' data-color='"+value[1]+"'><p>"+value[0]+"</p></div>");
              if(value[2] == "selectedinterest"){
                $('.keywords').append("<div class='oneinterest "+value[2]+"' data-color='"+value[1]+"'><p>"+value[0]+"</p></div>")
              }
          });
      }
  });

  setTimeout(function(){ 
    $('.selectedinterest').each(function(){
      $datacolor = $(this).data('color');
      $(this).css({
        "background-color": $datacolor,
        color: "#FFFFFF"
      });
    });
  }, 800);
}
getInterest();
/* color interest effect */
  $('.flexerinteresteditor').on('mouseover', '.noselectinterest', function(){
    $datacolor = $(this).data('color');
    $(this).css({
      "background-color": $datacolor,
      color: "#FFFFFF"
    });
  });
  $('.flexerinteresteditor').on('mouseout', '.noselectinterest', function(){
    $datacolor = $(this).data('color');
    $(this).css({
      "background-color": "#FFFFFF",
      color: "#000000"
    });
  });

  /* Add interest */
  $('.flexerinteresteditor').on('click', '.noselectinterest', function(){
    $(this).removeClass('noselectinterest');
    $name = $(this).text();
    $.ajax({
        url: "includes/traitement_POST_addInterestsOrga.php",
        type: 'post',
        dataType: "json",
        data: {
          name: $name
        },
        success: function(json) {
           $.each(json, function(index, value){
                
            });
        }
    });
    $(this).addClass('selectedinterest');
  });

  /* remove interest */
  $('.flexerinteresteditor').on('click', '.selectedinterest', function(){
    $(this).removeClass('selectedinterest');
    $name = $(this).text();
    $.ajax({
        url: "includes/traitement_POST_delInterestsOrga.php",
        type: 'post',
        dataType: "json",
        data: {
          name: $name
        },
        success: function(json) {
           $.each(json, function(index, value){
                
            });
        }
    });
    $(this).addClass('noselectinterest');
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

// Website link 
function openInNewTab(url) {
 window.open(url, '_blank').focus();
}