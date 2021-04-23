/* scheduled event */

//Links
$('.return-container').click(function(){
	window.location.href='ourevents.php';
});


/* Cancel event */
$('.canceler').click(function(){
  $('.corpus').hide();
  $('.corpus2').show();
});
$('.return-container2').click(function(){
  $('.corpus2').hide();
  $('.corpus').show();
});
$('#confirmdelete').click(function(){
  $("#errorpass").empty();
  $password = $("#password").val();
  $id = $(this).data('id');
  if($password.length > 7){
    $.ajax({
      url: "includes/traitement_POST_deleteEvent.php",
      type: 'post',
      dataType: "json",
      data: {
        id: $id,
        password: $password
      },
      success: function(json) {
        $.each(json, function(index, value){
          if(index == "200"){
            $("#errorpass").append("Event deleted.");
            $("#errorpass").css({
              color: "#00B34B"
            })
            setTimeout(function(){ window.location.href="ourevents.php"; }, 1500);
          }
          else{
            $("#errorpass").append("Wrong password.");
          }
        });
      }
    });
  }
  else{
    $("#errorpass").append("Wrong password.");
  }
});



// change picture
$('.photo-container').click(function(){
  $('#imgprofil_container').click();
  $('#imgprofil_container').change(function(){
    $id = $("#confirmdelete").data('id');
    var form_data = new FormData();
    var files = $('#imgprofil_container').prop('files')[0];
    form_data.append("file", files);
    $.ajax({
        url: 'includes/traitement_POST_pictureEvent.php?id='+$id,
        type: 'post',
        dataType: "json",
        data: form_data,
        contentType: false,
        processData: false,
        success: function(json){
         $.each(json, function(index, value){
            if(index == "200"){
              $('.photo-container').empty();
              $('.photo-container').append("<img src='uploads/"+value+"' class='ppicture' />");
              $('.photo-container').append("<p>Change picture</p>");
            }
         });
        }
     });
  });
});

/* Link to edit event */
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


$('.editer').click(function(){
  $id = $(this).data('id');
  postForm('editevent.php', {id: $id});

});