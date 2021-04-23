/* Account.js*/


// Links
$('.bfl1').click(function(){
  window.location.href='personal_profile.php';
});
$('.bfl2').click(function(){
  window.location.href='act.php';
});
$('.bfl3').click(function(){
  window.location.href='consume.php';
});
$('.parameters').click(function(){
  window.location.href='parameters.php';
});

//Get name
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
            		$('.insname').append(" "+value[0]+" "+value[1]);
           		}
           });
        }
    });
});

// Get next fav 
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_nextEventUser.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
              if(index == "200"){
                $('.date_next').append(value[9]);
                if(value[4] != "" && value[4] != null){
                $logo = "<img src='uploads/"+value[4]+"' class='logoresult' />";
                }
                else{
                  $logo = "";
                }
                /* Caracteristics format */
                if(value[6] == "onetime"){
                  $timing = "<div><img src='assets/img/hourglasscolor.png' /><p style='color: #7769E0;'>One time</p></div>";
                }
                else{
                  $timing = "<div><img src='assets/img/calendarcolor.png' /><p style='color: #7769E0;'>Regularly</p></div>";
                }
                if(value[7] == "paying"){
                  $payment = "<div><img src='assets/img/moneycolor.png' /><p style='color: #D35F44;'>Paying</p></div>";
                }
                else{
                  $payment = "<div><img src='assets/img/growthcolor.png' /><p style='color: #D35F44;'>Free</p></div>";
                }
                if(value[8] == "private"){
                  $openness = "<div><img src='assets/img/padlockcolor.png' /><p style='color: #EAD56B;'>Private</p></div>";
                }
                else{
                  $openness = "<div><img src='assets/img/unlockcolor.png' /><p style='color: #EAD56B;'>Public</p></div>";
                }
                if(value[0] == "event"){
                  $('.event-container').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
                }
              }
              else if(index == "400"){
                $('.flexertitle-event').append("<div class='noevent'><p>Our environment needs you ! <a href='act.php'>Find your next event</a> to act for the future.</div>")
              }
           });
        }
    });

    /* Link to event */
  function postForm(path, params, method) {
      method = method || 'post';

      var form = document.createElement('form');
      form.setAttribute('method', method);
      form.setAttribute('action', path);

      for (var key in params) {
          if (params.hasOwnProperty(key)) {
              var hiddenField = document.createElement('input');
              hiddenField.setAttribute('type', 'hidden');
              hiddenField.setAttribute('name', key);
              hiddenField.setAttribute('value', params[key]);

              form.appendChild(hiddenField);
          }
      }

      document.body.appendChild(form);
      form.submit();
  }


  $('.event-container').on('click', '.bcresult', function(){
    $id = $(this).data('id');
    postForm('event.php', {id: $id});

  });
});