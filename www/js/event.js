//Links
$('.return-container').click(function(){
	history.back();
});



/* heart effect */
$('.heart-container').mouseover(function(){
	$datafav = $(this).data('fav');
	if($datafav == 0){
		$(this).children('img').attr('src', 'assets/img/hearthover.png');
	}
});
$('.heart-container').mouseout(function(){
	$datafav = $(this).data('fav');
	if($datafav == 0){
		$(this).children('img').attr('src', 'assets/img/heart.png');
	}
	else{
		$(this).children('img').attr('src', 'assets/img/heartactive.png');
	}
});

function openInNewTab(url) {
 window.open(url, '_blank').focus();
}

$(".heart-container").click(function(){
	$datafav = $(this).data('fav');
	$event = $(".corpus").data('event');
	if($datafav == 0){
		// add to fav
		$.ajax({
      url: "includes/traitement_POST_addFavEvent.php",
      data: {
      	event: $event
      },
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
        	$('.heart-container').data('fav', 1);
        	$('.heart-container').children('img').attr('src', 'assets/img/heartactive.png');
          $('.heart-container').addClass('activeh');
          $('.heart-container').children('p').empty();
          $('.heart-container').children('p').append("Remove from favorites");
        });
      }
  	});
	}
	else{
		// remove fav
		$.ajax({
      url: "includes/traitement_POST_delFavEvent.php",
      data: {
      	fav: $datafav
      },
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
        	$('.heart-container').data('fav', 0);
        	$('.heart-container').children('img').attr('src', 'assets/img/heart.png');
          $('.heart-container').removeClass('activeh');
          $('.heart-container').children('p').empty();
          $('.heart-container').children('p').append("Add to favorites");
        });
      }
  	});
	}
});


/* Add +1 view */
$(document).ready(function(){
  $event = $(".corpus").data('event');
  $.ajax({
    url: "includes/traitement_POST_eventView.php",
    data: {
      event: $event
    },
    dataType: "json",
    method: "post",
    success: function(json) {
      $.each(json, function(index, value){
      });
    }
  });
}); 


/* Go to organization's page */
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

$('.company-container').click(function(){
  $idorga = $(this).data('idorga');
  postForm('oneorganization.php', {id: $idorga});
});


// Post event click
$('.fline-container').on('click', '.register-container', function(){
  $event = $(".corpus").data('event');
  $.ajax({
    url: "includes/traitement_POST_eventClick.php",
    data: {
      event: $event
    },
    dataType: "json",
    method: "post",
    success: function(json) {
      $.each(json, function(index, value){
      });
    }
  });
});
