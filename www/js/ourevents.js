/* Our events */

//Links
$('.add-event-container').click(function(){
	window.location.href='addevent.php';
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


$('.corpus').on('click', '.bcresult', function(){
  $id = $(this).data('id');
  postForm('scheduledevent.php', {id: $id});

});



// Get events 
$(document).ready(function(){
	/* Scheduled */
	$.ajax({
        url: "includes/traitement_GET_eventsByOrga.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
            $.each(json, function(index, value){
           		if(index != "0"){
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
                  $('.flexer-scheduled').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
                }
              }
              else{
                $('.flexer-scheduled').append("<div class='noresults'><p>No event scheduled yet. Be patient.</p></div>");
              }
            });
        }
    });

    /* PAST */
    $.ajax({
        url: "includes/traitement_GET_eventsByOrgaPast.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
            $.each(json, function(index, value){
           		if(index != "0"){
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
                  $('.flexer-past').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
                }
           		}
            });
        }
    });
});