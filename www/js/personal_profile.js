/* Personnal profil */



//Get infos user
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_infosUser.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
           		if(index == "200"){
            		$('.insname').append(value[0]+" "+value[1]);
                $('#fname').val(value[0]);
                $('#lname').val(value[1]);
                if(value[3] != null && value[4] != null){
                  $('.inscity').append(value[3]+", "+value[4]);
                  $('#city').val(value[3]);
                  $('#country').val(value[4]);
                }
                else{
                  $('.inscity').append("City, Country");
                }
                if(value[2] != null){
                  $('.insage').append(value[2]+" years old");
                  $('#age').val(value[2]);
                }
                else{
                  $('.insage').append("Your age");
                }
                if(value[5] != null){
                  $('.img-profile').empty();
                  $('.img-profile').append("<img src='uploads/"+value[5]+"' class='ppicture' />");
                  $('.img-profile').append("<p>Change picture</p>");
                }
                if(value[6] == 1){
                  $('.level-infos').append("<img class='icon_choice' src='assets/img/leaf.png'/>");
                }
                else if(value[6] == 2){
                  $('.level-infos').append("<img class='icon_choice' src='assets/img/plant.png'/>");
                }
                else if(value[6] == 3){
                  $('.level-infos').append("<img class='icon_choice' src='assets/img/tree.png'/>");
                }
                $('#sharelink').val("https://thebigview.fr/signup?link="+value[0]+value[7]);
           		}
           });
        }
    });

    /* Get interests */
    function getInterest(){
      $('.flexer_interest').empty();
      $('.flexerinteresteditor').empty();
      $.ajax({
          url: "includes/traitement_GET_myAllInterests.php",
          type: 'post',
          dataType: "json",
          data: {
          },
          success: function(json) {
             $.each(json, function(index, value){
                  $('.flexerinteresteditor').append("<div class='oneinterest "+value[2]+"' data-color='"+value[1]+"'><p>"+value[0]+"</p></div>");
                  if(value[2] == "selectedinterest"){
                    $('.flexer_interest').append("<div class='oneinterest "+value[2]+"' data-color='"+value[1]+"'><p>"+value[0]+"</p></div>")
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
      function getpersoInterest(){
        $('.selectedinterests').empty();
        $.ajax({
            url: "includes/traitement_GET_myAllPersoInterests.php",
            type: 'post',
            dataType: "json",
            data: {
            },
            success: function(json) {
               $.each(json, function(index, value){
                    if(value[2] == "selectedinterest"){
                      $('.selectedinterests').append("<div class='selectinter' data-id='"+value[1]+"'>"+value[0]+"</div>");
                    }
                });
            }
        });
      }

      
    getInterest();
    getpersoInterest();

    /* Hide show edit engagements */
    $('.topingengage').click(function(){
      $('.flexer_interest').hide();
      $('.selector-interests_container').show();
      $(this).hide();
      $('#closerengage').css({
        display: "flex"
      });
    });
    $('#closerengage').click(function(){
      getInterest();
      $('.flexer_interest').show();
      $('.selector-interests_container').hide();
      $(this).hide();
      $('.topingengage').show();
      
    });

    
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
          url: "includes/traitement_POST_addInterests.php",
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
      $(this).removeClass('noselectinterest');
      $name = $(this).text();
      $.ajax({
          url: "includes/traitement_POST_delInterests.php",
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
          url: 'includes/traitement_POST_picture.php',
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
                $('.imgprofil').remove();
                $('.profilcontainer').prepend("<img src='uploads/"+value+"' class='imgprofil' />");
              }
           });
          }
        });
      },1);
    }
  });
});

/* edit toggle */ 
$("#gotoedit").click(function(){
  $('.profile_infos').hide();
  $(".profile_infosedit").show();
  $('#gotoedit').hide();
});
$('.discard_profiledit').click(function(){
   location.reload();
});

jQuery('#age').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
$('#country').bind('keyup',function(){ 
    this.value = this.value.replace(/[^a-zA-Z]/g,''); 
});
$('#city').bind('keyup',function(){ 
    this.value = this.value.replace(/[^a-zA-Z]/g,''); 
});

/* Save changes */
$('#submit_profiledit').click(function(){
  $('.erroreditprofil').empty();
  $age = $("#age").val();
  $location = $("#city").val();
  $country = $("#country").val();
  $fname = $("#fname").val();
  $lname = $("#lname").val();
  if($age.length > 0 && $location.length > 2 && $country.length > 2 && $fname.length > 2 && $lname.length > 2){
    $.ajax({
        url: "includes/traitement_POST_editPersonalProfile.php",
        type: 'post',
        dataType: "json",
        data: {
            age: $age,
            location: $location,
            country: $country,
            fname: $fname,
            lname: $lname
        },
        success: function(json) {
           $.each(json, function(index, value){
            if(index == "200"){
                location.reload();
            }
            else{
              $('.erroreditprofil').append("Server error, please try again later.");
            }
           });
        }
    });
  }
  else{
       $('.erroreditprofil').append("All fields are required");
    }
});

/***** INVITS ****/

// Switch invit 
$('#invit').click(function(){
  $('.corpus2').show();
  $('.corpus').hide();
});
$('.return-container').click(function(){
  $('.corpus').show();
  $('.corpus2').hide();
});
// Copy link
function CopyLink() {
  /* Get the text field */
  var copyText = document.getElementById("sharelink");

  /* Select the text field */
  copyText.select(); 
  copyText.setSelectionRange(0, 99999); /* For mobile devices */

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  $("#copylink").empty();
  $("#copylink").append("Copied");
}


// Autocomplete 
// Keypress search
$("#searcherinterests").on('keyup',function(e) {
  $arrselected = ['0'];
  $('.selectinter').each(function(){
    $id = $(this).data('id');
    $arrselected.push($id);
  });
  $term = $(this).val();
  $(".findings-container").empty();
  if($term.length == 0){

  }
  else{
    $.ajax({
          url: "includes/traitement_GET_autocompleteInterest.php",
          data: {term: $term, arr: $arrselected},
          dataType: "json",
          method: "post",
          success: function(json) {
            $.each(json, function(index, value){
              if(index == "10000"){
                $(".findings-container").append("<div><p>Sorry, no results found.</p></div>");
              }
              else{
                $(".findings-container").append("<div class='link-inte' data-id='"+value[0]+"'><p>"+value[1]+"</p></div>");
              }
            });
          }
      });
  }
});
//Select interest 
$('.findings-container').on("click", ".link-inte", function(){
  $id = $(this).data('id');
  $txt = $(this).children('p').text();
  // Insert into database
  $.ajax({
      url: "includes/traitement_POST_addPersoInterests.php",
      type: 'post',
      dataType: "json",
      data: {
        id: $id
      },
      success: function(json) {
         $.each(json, function(index, value){
              
          });
      }
  });
  $('.selectedinterests').append("<div class='selectinter' data-id='"+$id+"'>"+$txt+"</div>");
  $('.findings-container').empty();
  $('#searcherinterests').val('');
});
//Select interest 
$('.selectedinterests').on("click", ".selectinter", function(){
  $id = $(this).data('id');
  $txt = $(this).children('p').text();
  // Insert into database
  $.ajax({
      url: "includes/traitement_POST_delPersoInterests.php",
      type: 'post',
      dataType: "json",
      data: {
        id: $id
      },
      success: function(json) {
         $.each(json, function(index, value){
              
          });
      }
  });
  $(this).remove();
  $('.findings-container').empty();
  $('#searcherinterests').val('');
});
/* Google place api */
/*
let autocomplete;
function activatePlacesSearch(){
  autocomplete = new google.maps.places.Autocomplete(
   document.getElementById('city'),{
      types: ['cities'],
      componentRestrictions: {'country': ['fr']},
      fields: ['place_id', "geometry", "name"]
    }

  );
}*/