/* ADD EVENT */

// Select location first 
$('.fgo').click(function(){
  $type = $(this).data('type');
  if($type == "online"){
    $('.corpus0').hide();
    $('.corpus').show();
    $('#location').val('online');
    document.getElementById('location').disabled = true;
  }
  else{
    $('.corpus0').hide();
    $('.corpus').show();
    $('#location').val('');
    document.getElementById('location').disabled = false;
  }
});


// Send form
$("#submit").click(function(){
  $('.error').empty();
  // Required fields
  $title = $("#name").val();
  $location = $("#location").val();
  $date_start = $("#datestart").val();
  $hour_start = $("#hourstart").val();
  $description = $("#description").html().trim()
  .replace(/<br\s*\/*>/ig, '\n') 
  .replace(/(<(p|div))/ig, '\n$1') 
  .replace(/(<([^>]+)>)/ig, "");
  $topic = $('#typeof').data('val');
  var d1 = new Date().setHours(0,0,0,0);
  var d2 = new Date($date_start);
  console.log(d1+" // "+d2);
  //optional
  $photo = $(".bloc_add_photo").data('img');
  $date_end = $("#dateendt").val();
  $hour_end = $("#hourend").val();

  var d3 = new Date($date_end);



  if($title.length > 1 && $location.length > 1 && $date_start.length == 10 && $hour_start.length == 5 && $topic.length > 1){
    if(d1 <= d2){
      if($date_end.length == 10 && d3 <= d2){
        showError("Your ending date should be at least 1 day after your starting date.");
      }
      else{
        var h1 = $hour_start+":00";
        if($hour_end.length == 5){
          var h2 = $hour_end+":00";
        }
        if($hour_end.length == 5 && h1 >= h2){
          showError("Your ending time should be after your starting time.");
        }
        else{
          if($description.length > 49){
            $(".corpus").hide();
            $(".corpus2").show();
            $("#submit2").click(function(){
              $('.error').empty();
              $linkwebsite = $("#linkwebsite").val();
              $linkregis = $("#linkregis").val();

              $openness = 0;
              $private = $(".private").data('selec');
              if($private == "0"){
                $public = $(".public").data('selec');
                if($public == "0"){
                  showError("You have to choose between private and public event");
                }
                else{
                  $openness = "public";
                }
              }
              else{
                 $openness = "private";
              }

              $payment = 0;
              $paying = $(".paying").data('selec');
              if($paying == "0"){
                $free = $(".free").data('selec');
                if($free == "0"){
                  showError("You have to choose between paying and free event");
                }
                else{
                  $payment = "free";
                }
              }
              else{
                $payment = "paying";
              }

              $timing = 0;
              $onetime = $(".onetime").data('selec');
              if($onetime == "0"){
                $regular = $(".regular").data('selec');
                if($regular == "0"){
                  showError("You have to choose between onetime and regular event");
                }
                else{
                  $timing = "regular";
                }
              }
              else{
                $timing = "onetime";
              }

              $physical = 0;
              $effort = $('.eff1').data('selec');
              if($effort == "0"){
                $effort = $('.eff2').data('selec');
                if($effort == "0"){
                  $effort = $('.eff3').data('selec');
                  if($effort == "0"){
                    $effort = $('.eff4').data('selec');
                    if($effort == "0"){
                      $effort = $('.eff5').data('selec');
                      if($effort == "0"){
                        showError("You have to select a level of physical effort");
                      }
                      else{
                        $physical = 5;
                      }
                    }
                    else{
                      $physical = 4;
                    }
                  }
                  else{
                    $physical = 3;
                  }
                }
                else{
                  $physical = 2;
                }
              }
              else{
                $physical = 1;
              }

              setTimeout(function(){
                if($physical > 0 && $timing != 0 && $payment != 0 && $openness != 0){
                  if($photo.length < 1){
                    $photo = "basic.png";
                  }
                  $.ajax({
                    url: 'includes/traitement_POST_event.php',
                    type: 'post',
                    dataType: "json",
                    data:{
                      title: $title,
                      location: $location,
                      date_start: $date_start,
                      date_end: $date_end,
                      hour_start: $hour_start,
                      hour_end: $hour_end,
                      description: $description,
                      topic: $topic,
                      photo: $photo,
                      website: $linkwebsite,
                      registration: $linkregis,
                      physical: $physical,
                      timing: $timing,
                      payment: $payment,
                      openness: $openness
                    },
                    success: function(json){
                     $.each(json, function(index, value){
                        if(index == "200"){
                          window.location.href='ourevents.php';
                        }
                     });
                    }
                 });
                }
              }, 500);

            });
          }
          else{
            showError("Your description should be longer (at least 50 characters).");
          }
        }
      }
    }
    else{
      showError("You can't choose a starting date in the past");
    }
  }
  else{
    showError("All fields are required.");
  }
});

// Effect select left characteristics
$('.divcarac').click(function(){
  $(this).siblings().data('selec', "0");
  $(this).data('selec', "1");

  $img = $(this).siblings().children('img').data('out');
  $(this).siblings().children('img').attr('src', $img);

  $imgadd = $(this).children('img').data('on');
  $(this).children('img').attr('src', $imgadd);

  $color= $(this).data('color');
  $(this).css({
    "background-color": $color,
    color: "#FFFFFFF"
  });
  $(this).siblings().css({
    "background-color": "#FFFFFFF",
    color: $color
  });
});
// Effect select right characteristics
$('.card-effort').click(function(){
  $(this).siblings().data('selec', "0");
  $(this).data('selec', "1");
  $color= "#00B34B";
  $('.roundeff').css({
    "background-color": "#DDDDDD",
  });
  $(this).children('.roundeff').css({
    "background-color": $color,
  });
  
});



// Error function
function showError(message){
  $('.error').empty();
  $('.error').append(message);
}

// Contenteditable placeholder effect
jQuery(function($){
    $("[contenteditable]").focusout(function(){
        var element = $(this);        
        if (!element.text().trim().length) {
            element.empty();
        }
    });
});

// Show ends inputs
$('#addendD').click(function(){
  $("#blcdateendt").toggle();
  if($(this).text() == 'Remove the end date'){
    $("#dateendt").val("");
  }
  $(this).text(function(i, v){
       return v === 'Add an end date' ? 'Remove the end date' : 'Add an end date'
    });
});
$('#addendH').click(function(){
  $("#blchourend").toggle();
  if($(this).text() == 'Remove the end hour'){
    $("#hourend").val("");
  }
  $(this).text(function(i, v){
       return v === 'Add an end hour' ? 'Remove the end hour' : 'Add an end hour'
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
$('.bloc_add_photo').click(function(){
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
            aspectRatio: 26/14,
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
          url: 'includes/traitement_VERIF_pictureEVENT.php',
          type: 'post',
          dataType: "json",
          data: formData,
          contentType: false,
          processData: false,
          success: function(json){
           $.each(json, function(index, value){
              if(index == "200"){
                $('.bloc_add_photo').empty();
                $('.bloc_add_photo').data("img", value);
                $('.bloc_add_photo').append("<img src='uploads/"+value+"' class='ppicture' />");
                $('.bloc_add_photo').append("<p>Change your logo</p>");
              }
           });
          }
        });
      },1);
    }
  });
});


// Characters remaining
$("#name").keyup(function(){
   var maxlimit = 60;
   var field = $(this).val();
   var countfield = $('.explains');
   if (field.length > maxlimit ) {
      $(this).val(field.substring( 0, maxlimit ));
      return false;
   } 
   else {
      $remaining = maxlimit - field.length;
      countfield.empty();
      countfield.text($remaining +" characters remaining.");
   }
});



// LImit hours to numbers
$('.time').keyup(function (e) { 
    this.value = this.value.replace(/[^0-9\:]/g,'');
    if(this.value.length == 2 && e.keyCode != 46 && e.keyCode != 8){
      this.value = this.value+":";
    }
});
/* Go back */
$('.return-container').click(function(){
  $('.corpus2').hide();
  $('.corpus').show();
});
$('.return-container2').click(function(){
  $('.corpus').hide();
  $('.corpus0').show();
});
// Span animation to select
$('#typeof').click(function(){
  $(".choice-typeof").toggle();
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

});
/* DATE PICKER */
$(document).on("focus", ".datepickiing", function(){

    $(this).datepicker({
        altField: "#datepicker",
        minDate: 0,
        firstDay: 1,
        closeText: 'Close',
        prevText: 'Previous',
        nextText: 'Next',
        currentText: 'Today',
        monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        monthNamesShort: ['Jan.', 'Feb.', 'March', 'April', 'May', 'June', 'July.', 'Aug.', 'Sept.', 'Oct.', 'Nov.', 'Dec.'],
        dayNames: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
        dayNamesShort: ['Sun.', 'Mon.', 'Tue.', 'Wed.', 'Thu.', 'Fri.', 'Sat.'],
        dayNamesMin: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
        weekHeader: 'Week',
        dateFormat: 'mm/dd/yy'
    });
});