/* Act.js*/

// Keypress search
function searcher(){
  $('.seemore-container').remove();
  $term = $("#searcher").val();
  $e = 0;
  $(".flexer-results").empty();
  if($term.length == 0){
    $(".flexer-results").hide();
  }
  else{
    $(".flexer-results").css({
      display: "flex"
    });
    $.ajax({
          url: "includes/traitement_GET_searchconsume.php",
          data: {term: $term},
          dataType: "json",
          method: "post",
          success: function(json) {
            $.each(json, function(index, value){
              console.log($e);
              if(value[3] != "" && value[3] != null){
                $logo = "<img src='uploads/"+value[3]+"' class='logoresult' />";
              }
              else{
                $logo = "";
              }
              $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3><p class='bcdate'>"+value[4]+"</p><p class='bctype'>"+value[0]+"</p><p class='bcdesc'>"+value[5]+"</p></div></div></div>");
              $e ++;
            });
            setTimeout(function(){
              if($e >= 3){
                $('.flexer-results').append("<div class='seemore-container' id='goformore'><p>See more results</p></div>");
              }
              else if($e == 0){
                $('.flexer-results').append("<div class='seemore-container'><p>No results</p></div>");
              }
            }, 200);
          }
      });
  }
}


$("#searcher").on('keyup',function(e) {
  // Switch text vs category 
  $(".category-container").each(function(){
    $(this).data('active', "0");
  });
  searcher();
});
function checkSelectedCateogri(){
  var passing = false;
  $(".category-container").each(function(){
    if($(this).data('active') == "1"){
      passing = true;
    }
  });
  return passing;
}



$('.flexer-results').on('click', '#goformore', function(){
  $('.seemore-container').remove();
  if(checkSelectedCateogri() == true){

    $(".category-container").each(function(){
      if($(this).data('active') == "1"){
        $txt = $(this).data('terms');
        $title = $(this).children('p').text();
        $(this).siblings().data('active', "0");
        $(this).data('active', "1");
        $('.seemore-container').remove();
        $(".flexer-results").empty();
        $(".flexer-results").css({
          display: "flex"
        });
        $e = 0;
        $.ajax({
            url: "includes/traitement_GET_searchconsumeByCategoriAll.php",
            data: {term: $txt},
            dataType: "json",
            method: "post",
            success: function(json) {
              $.each(json, function(index, value){
                console.log($e);
                if(value[3] != "" && value[3] != null){
                  $logo = "<img src='uploads/"+value[3]+"' class='logoresult' />";
                }
                else{
                  $logo = "";
                }
                $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3><p class='bcdate'>"+value[4]+"</p><p class='bctype'>"+value[0]+"</p><p class='bcdesc'>"+value[5]+"</p></div></div></div>");
                $e ++;
              });
              setTimeout(function(){
                $(".flexer-results").prepend("<div class='titleresultcatego'><h3>"+$title+"</h3></div>");
                if($e == 0){
                  $('.flexer-results').append("<div class='seemore-container'><p>No results</p></div>");
                }
              }, 200);
            }
        });
      }
    });
  }
  else{
    $term = $("#searcher").val();
    $e = 0;
    $(".flexer-results").empty();
    if($term.length == 0){
      $(".flexer-results").hide();
    }
    else{
      $(".flexer-results").css({
        display: "flex"
      });
      $.ajax({
          url: "includes/traitement_GET_searchAllconsume.php",
          data: {term: $term},
          dataType: "json",
          method: "post",
          success: function(json) {
            $.each(json, function(index, value){
              console.log($e);
              if(value[3] != "" && value[3] != null){
                $logo = "<img src='uploads/"+value[3]+"' class='logoresult' />";
              }
              else{
                $logo = "";
              }
              $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3><p class='bcdate'>"+value[4]+"</p><p class='bctype'>"+value[0]+"</p><p class='bcdesc'>"+value[5]+"</p></div></div></div>");
              $e ++;
            });
          }
      });
    }
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


$('.corpus').on('click', '.bcresult', function(){
  $id = $(this).data('id');
  postForm('oneorganization.php', {id: $id});

});


/* get favorites */
$(document).ready(function(){
  $.ajax({
    url: "includes/traitement_GET_savedOrga.php",
    data: {
    },
    dataType: "json",
    method: "post",
    success: function(json) {
      $.each(json, function(index, value){
        if(index != "0"){
          $(".flexer-favorites").append("<div class='onefav' data-id='"+index+"'><img src='uploads/"+value[1]+"' /><div class='darker'><h4>"+value[0]+"</h4><p>"+value[2]+"</p></div></div>");
        }
        else{
          $(".flexer-favorites").append("<p class='orderp'>No one yet, search for a green organization !</p>");
        }
      });
    }
  });
});


$('.corpus').on('click', '.onefav', function(){
  $idorga = $(this).data('id');
  postForm('oneorganization.php', {id: $idorga});
});


/* Get recommandations */
$(document).ready(function(){
  $.ajax({
    url: "includes/traitement_GET_recoConsume.php",
    data: {
    },
    dataType: "json",
    method: "post",
    success: function(json) {
      if(json != null){
        $.ajax({
          url: "includes/traitement_GET_interest.php",
          data: {
          },
          dataType: "json",
          method: "post",
          success: function(json2) {
            $.each(json2, function(index2, value2){
              if(index2 == "400"){
                $('.flexer-corpus').prepend("<div class='titleresultcatego'><h3>Selected for you</h3></div><div class='subtitleresultcatego'><p>Select the topics that interest you the most to benefit from personalized recommandations</p></div>");
              }
              else{
                $('.flexer-corpus').prepend("<div class='titleresultcatego'><h3>Selected for you</h3></div>");

              }
            });
          }
        });
        $.each(json, function(index, value){
         if(value[3] != "" && value[3] != null){
              $logo = "<img src='uploads/"+value[3]+"' class='logoresult' />";
            }
            else{
              $logo = "";
            }
            $('.flexer-corpus').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3><p class='bcdate'>"+value[4]+"</p><p class='bctype'>"+value[0]+"</p><p class='bcdesc'>"+value[5]+"</p></div></div></div>");
        });
      }
      
    }
  });
});


/* Search category */
$('.category-container').click(function(){
  $txt = $(this).data('terms');
  $title = $(this).children('p').text();
  $(this).siblings().data('active', "0");
  $(this).data('active', "1");
  $('.seemore-container').remove();
  $(".flexer-results").empty();
  $(".flexer-results").css({
    display: "flex"
  });
  $e = 0;
  $.ajax({
      url: "includes/traitement_GET_searchconsumeByCategori.php",
      data: {term: $txt},
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
          console.log($e);
          if(value[3] != "" && value[3] != null){
            $logo = "<img src='uploads/"+value[3]+"' class='logoresult' />";
          }
          else{
            $logo = "";
          }
          $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3><p class='bcdate'>"+value[4]+"</p><p class='bctype'>"+value[0]+"</p><p class='bcdesc'>"+value[5]+"</p></div></div></div>");
          $e ++;
        });
        setTimeout(function(){
          $(".flexer-results").prepend("<div class='titleresultcatego'><h3>"+$title+"</h3></div>");
          if($e >= 3){
            $('.flexer-results').append("<div class='seemore-container' id='goformore'><p>See more results</p></div>");
          }
          else if($e == 0){
            $('.flexer-results').append("<div class='seemore-container'><p>No results</p></div>");
          }
        }, 200);
      }
  });
});






