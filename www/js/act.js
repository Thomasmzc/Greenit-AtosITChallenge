/* Act.js*/

// Keypress search
function searcher(){
  removeShorcutActive();
  $("#getcloser").data('active', 0);
  $("#getonline").data('active', 0);
  $('.seemore-container').remove();
  $term = $("#searcher").val();
  $e = 0;
  $(".flexer-results").empty();
  if($term.length == 0){
    $(".flexer-results").empty();
  }
  else{
    $(".flexer-results").css({
      display: "flex"
    });
    $.ajax({
          url: "includes/traitement_GET_searchact.php",
          data: {term: $term},
          dataType: "json",
          method: "post",
          success: function(json) {
            $.each(json, function(index, value){
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
                $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
              }
              $e++;
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
function searcherCategory($term, $title){
  removeShorcutActive();
  $('.seemore-container').remove();
  $(".flexer-results").empty();
  $(".flexer-results").css({
    display: "flex"
  });
  $e = 0;
    $.ajax({
      url: "includes/traitement_GET_searchactByCategori.php",
      data: {term: $term},
      dataType: "json",
      method: "post",
      success: function(json) {
        
        $.each(json, function(index, value){
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
            $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
          }
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
}

// Seemore category
function searcherCategoryAll($term, $title){
  removeShorcutActive();
  $('.seemore-container').remove();
  $(".flexer-results").empty();
  $(".flexer-results").css({
    display: "flex"
  });
  $e = 0;
    $.ajax({
      url: "includes/traitement_GET_searchactByCategoriAll.php",
      data: {term: $term},
      dataType: "json",
      method: "post",
      success: function(json) {
        
        $.each(json, function(index, value){
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
            $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
          }
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

$("#searcher").on('keyup',function(e) {
// Switch text vs category 
  $(".category-container").each(function(){
    $(this).data('active', "0");
  });
  searcher();
});

// Category hover effect
$(".category-container").mouseover(function(){
  $(this).children('p').hide();
  $(this).children('img').hide();
  $(this).children('span').show();
});
$(".category-container").mouseout(function(){
  $(this).children('p').show();
  $(this).children('img').show();
  $(this).children('span').hide();
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
  $ifnearactive = $("#getcloser").data('active');
  if(checkSelectedCateogri() == true){

    $(".category-container").each(function(){
      if($(this).data('active') == "1"){
        $txt = $(this).data('terms');
        if($txt == "0"){
          searcherCategoryAll("Sport", "Sport event");
        }
        else if($txt == "1"){
          searcherCategoryAll("Show", "Show");
        }
        else if($txt == "2"){
          searcherCategoryAll("Online", "Online");
        }
        else if($txt == "3"){
          searcherCategoryAll("Challenge", "Challenge");
        }
        else if($txt == "4"){
          searcherCategoryAll("Volunteer", "Volunteer");
        }
        else if($txt == "5"){
          searcherCategoryAll("Meeting", "Meeting");
        }
        else if($txt == "6"){
          searcherCategoryAll("Fair", "Fair");
        }
        else if($txt == "7"){
          searcherCategoryAll("Giveaway", "Giveaway");
        }
        else if($txt == "8"){
          searcherCategoryAll("Festival", "Festival");
        }
        else if($txt == "9"){
          searcherCategoryAll("Exhibition", "Exhibition");
        }
        else if($txt == "10"){
          searcherCategoryAll("Other", "Other");
        }
      }
    });
  }
  else if(ifnearactive == 1){

    var x = document.getElementById("demo");
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
       alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      $lat =  position.coords.latitude;
      $long = position.coords.longitude;
      $('.flexer-results').empty();
      $(".flexer-results").css({
        display: "flex"
      });
      $('#searcher').val('');
      $("#getcloser").addClass('activeshortcut2');
      $("#getonline").removeClass('activeshortcut1');
      $title = "Near me";
      $e = 0;
      $("#getcloser").data('active', 1);
      $("#getonline").data('active', 0);
      $.ajax({
        url: "includes/traitement_GET_AllclosedEvents.php",
        data: {
          lat: $lat,
          long: $long
        },
        dataType: "json",
        method: "post",
        success: function(json) {
          $.each(json, function(index, value){
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
              $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
            }
            $e++;
          });
          setTimeout(function(){
            $(".flexer-results").prepend("<div class='titleresultcatego'><h3>"+$title+"</h3></div>");
            if($e == 0){
              $('.flexer-results').append("<div class='seemore-container'><p>No results in less than 15 kilometers</p></div>");
            }
          }, 200);
        }
      });
    }
    getLocation();

    
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
          url: "includes/traitement_GET_searchactAll.php",
          data: {term: $term},
          dataType: "json",
          method: "post",
          success: function(json) {
            $.each(json, function(index, value){
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
                $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
              }
              $e++;
            });
          }
      });
    }
  }
  
});

$('.category-container').click(function(){
  $('#searcher').val('');
  $txt = $(this).data('terms');
  $(this).siblings().data('active', "0");
  $(this).data('active', "1");
  $("#getcloser").data('active', 0);
  $("#getonline").data('active', 0);
  if($txt == "0"){
    searcherCategory("Sport", "Sport event");
  }
  else if($txt == "1"){
    searcherCategory("Show", "Show");
  }
  else if($txt == "2"){
    searcherCategory("Online", "Online");
  }
  else if($txt == "3"){
    searcherCategory("Challenge", "Challenge");
  }
  else if($txt == "4"){
    searcherCategory("Volunteer", "Volunteer");
  }
  else if($txt == "5"){
    searcherCategory("Meeting", "Meeting");
  }
  else if($txt == "6"){
    searcherCategory("Fair", "Fair");
  }
  else if($txt == "7"){
    searcherCategory("Giveaway", "Giveaway");
  }
  else if($txt == "8"){
    searcherCategory("Festival", "Festival");
  }
  else if($txt == "9"){
    searcherCategory("Exhibition", "Exhibition");
  }
  else if($txt == "10"){
    searcherCategory("Other", "Other");
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
  postForm('event.php', {id: $id});

});


/* get favorites */
$(document).ready(function(){
  $.ajax({
    url: "includes/traitement_GET_savedEvents.php",
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
          $(".flexer-favorites").append("<p class='orderp'>No one yet, search for your next action for the planet !</p>");
        }
      });
    }
  });
});


$('.corpus').on('click', '.onefav', function(){
  $idevent = $(this).data('id');
  postForm('event.php', {id: $idevent});
});

$(document).ready(function(){
  // Effect select left characteristics
  $('.divcarac').click(function(){ 
    $(this).siblings().data('selec', "0");
    $(this).data('selec', "1");

    $img = $(this).siblings().children('img').data('out');
    $(this).siblings().children('img').attr('src', $img);

    $imgadd = $(this).children('img').data('on');
    $(this).children('img').attr('src', $imgadd);

    $color = $(this).data('color');

    $(this).css({
      "background-color": $color,
      "color": "#ffffff"
    });
     $(this).siblings().css({
      "background-color": "#ffffff",
      "color": $color
     });
  });
  // Effect select middle characteristics
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
  /* effect right carac */
  $('.divcarac2').click(function(){ 
    $(this).siblings().data('selec', "0");
    $(this).data('selec', "1");

    $color = $(this).data('color');

    $(this).siblings().each(function(){
       $img = $(this).children('img').data('out');
      $(this).children('img').attr('src', $img);
      $(this).css({
        "background-color": "#ffffff",
        "color": $color
      });
    });

    $imgadd = $(this).children('img').data('on');
    $(this).children('img').attr('src', $imgadd);
    $(this).css({
      "background-color": $color,
      "color": "#ffffff"
    });
     
  });
});


/* delete filters */
$('#delfilter').click(function(){
  $('.divcarac').each(function(){
    $(this).data('selec', "0");
    $color = $(this).data('color');
    $(this).css({
      "background-color": "#ffffff",
      "color": $color
    });
    $img = $(this).children('img').data('out');
    $(this).children('img').attr('src', $img);
  });
  $('.divcarac2').each(function(){
    $(this).data('selec', "0");
    $color = $(this).data('color');
    $(this).css({
      "background-color": "#ffffff",
      "color": $color
    });
    $img = $(this).children('img').data('out');
    $(this).children('img').attr('src', $img);
  });
  $('.card-effort').each(function(){
    $(this).data('selec', "0");
    $('.roundeff').css({
      "background-color": "#DDDDDD",
    });
  });
  $('#datefilter').val('');
  $.ajax({
      url: "includes/traitement_POST_sessionFilters.php",
      data: {
        duration: 0,
        dating: 0,
        physical: 0,
        timing: 0,
        payment: 0,
        openness: 0
      },
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
          if(index =="200"){
            searcher();
            $('.ffcontainer').hide();
          }
        });
      }
    });
});


/* apply filters */
$('#applyfilter').click(function(){
  if($('.private').data('selec') == "1"){
    $openness = 'private';
  }
  else if($('.public').data('selec') == "1"){
    $openness = 'public';
  }
  else{
    $openness = 0;
  }
  if($('.paying').data('selec') == "1"){
    $payment = 'paying';
  }
  else if($('.free').data('selec') == "1"){
    $payment = 'free';
  }
  else{
    $payment = 0;
  }
  if($('.onetime').data('selec') == "1"){
    $timing = 'onetime';
  }
  else if($('.regular').data('selec') == "1"){
    $timing = 'regular';
  }
  else{
    $timing = 0;
  }
  var dateReg = /^\d{2}[./-]\d{2}[./-]\d{4}$/
  $datefilter = $('#datefilter').val();
  if($datefilter.length == 10 && $datefilter.match(dateReg)){
    $dating = $datefilter;
  }
  else{
    $dating = 0;
  }
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
              $physical = 0;
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

    if($('.hours').data('selec') == "1"){
      $duration = 'hours';
    }
    else if($('.days').data('selec') == "1"){
      $duration = 'days';
    }
    else if($('.month').data('selec') == "1"){
      $duration = 'months';
    }
    else if($('.year').data('selec') == "1"){
      $duration = 'years';
    }
    else{
      $duration = 0;
    }

    // tests
    console.log("duration: "+$duration);
    console.log("datefilter: "+$dating);
    console.log("physical: "+$physical);
    console.log("timing: "+$timing);
    console.log("payment: "+$payment);
    console.log("openness: "+$openness);

    $.ajax({
      url: "includes/traitement_POST_sessionFilters.php",
      data: {
        duration: $duration,
        dating: $dating,
        physical: $physical,
        timing: $timing,
        payment: $payment,
        openness: $openness
      },
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
          if(index =="200"){
            searcher();
            $('.ffcontainer').hide();
          }
        });
      }
    });


});


/* apply filter on load */
$(document).ready(function(){
  $.ajax({
      url: "includes/traitement_GET_sessionFilters.php",
      data: {
      },
      dataType: "json",
      method: "post",
      success: function(json) {
        $.each(json, function(index, value){
          $duration = value[0];
          $dating = value[1];
          $physical = value[2];
          $timing = value[3];
          $payment = value[4];
          $openness = value[5];

          // duration
          if($duration != 0){
            $('.'+$duration).data('selec', "1");
            $colord = $('.'+$duration).data('color');
            $imgaddd = $('.'+$duration).children('img').data('on');
            $('.'+$duration).children('img').attr('src', $imgaddd);
            $('.'+$duration).css({
              "background-color": $colord,
              "color": "#ffffff"
            });
          }
          
          //dating
          if($dating != 0){
            $('#datefilter').val($dating);
          }

          //physical
          if($physical != 0){
            $('.eff'+$physical).data('selec', "1");
            $('.eff'+$physical).children('.roundeff').css({
              "background-color": "#00B34B",
            });
          }

          // timing
          if($timing != 0){
            $('.'+$timing).data('selec', "1");
            $colort = $('.'+$timing).data('color');
            $imgt = $('.'+$timing).children('img').data('on');
            $('.'+$timing).children('img').attr('src', $imgt);
            $('.'+$timing).css({
              "background-color": $colort,
              "color": "#ffffff"
            });
          }

          // payment
          if($payment != 0){
            $('.'+$payment).data('selec', "1");
            $colorp = $('.'+$payment).data('color');
            $imgp = $('.'+$payment).children('img').data('on');
            $('.'+$payment).children('img').attr('src', $imgp);
            $('.'+$payment).css({
              "background-color": $colorp,
              "color": "#ffffff"
            });
          }

          // openness
          if($openness != 0){
            $('.'+$openness).data('selec', "1");
            $coloro = $('.'+$openness).data('color');
            $imgo = $('.'+$openness).children('img').data('on');
            $('.'+$openness).children('img').attr('src', $imgo);
            $('.'+$openness).css({
              "background-color": $coloro,
              "color": "#ffffff"
            });
          }

        });
      }
    });
});


/* toogle filter */
$(".filters").click(function(){
  $('.ffcontainer').toggle();
});



/* Get recommandations */
$(document).ready(function(){
  $.ajax({
    url: "includes/traitement_GET_recoAct.php",
    data: {
    },
    dataType: "json",
    method: "post",
    success: function(json) {
      if(json != null){
        $('.flexer-corpus').prepend("");
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
            $('.flexer-corpus').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
          }
        });
      }
      
    }
  });
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


// TEST GEOLOC

$('#getcloser').click(function(){

    var x = document.getElementById("demo");
    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else {
       alert("Geolocation is not supported by this browser.");
      }
    }

    function showPosition(position) {
      $lat =  position.coords.latitude;
      $long = position.coords.longitude;
      $('.flexer-results').empty();
      $(".flexer-results").css({
        display: "flex"
      });
      $('#searcher').val('');
      $("#getcloser").addClass('activeshortcut2');
      $("#getonline").removeClass('activeshortcut1');
      $title = "Near me";
      $e = 0;
      $("#getcloser").data('active', 1);
      $.ajax({
        url: "includes/traitement_GET_closedEvents.php",
        data: {
          lat: $lat,
          long: $long
        },
        dataType: "json",
        method: "post",
        success: function(json) {
          $.each(json, function(index, value){
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
              $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
            }
            $e++;
          });
          setTimeout(function(){
            $(".flexer-results").prepend("<div class='titleresultcatego'><h3>"+$title+"</h3></div>");
            if($e >= 3){
              $('.flexer-results').append("<div class='seemore-container' id='goformore'><p>See more results</p></div>");
            }
            else if($e == 0){
              $('.flexer-results').append("<div class='seemore-container'><p>No results in less than 15 kilometers</p></div>");
            }
          }, 200);
        }
      });
    }
    getLocation();

          
});
function removeShorcutActive(){
  $("#getcloser").removeClass('activeshortcut2');
  $("#getonline").removeClass('activeshortcut1');
}

$('#getonline').click(function(){
  $(this).addClass('activeshortcut1');
  $("#getcloser").removeClass('activeshortcut2');
  $("#getcloser").data('active', 0);
  $("#getonline").data('active', 1);
  $('.flexer-results').empty();
  $(".flexer-results").css({
    display: "flex"
  });
  $('#searcher').val('');
  $title = "Online";
  $e = 0;
  $.ajax({
    url: "includes/traitement_GET_onlineEvents.php",
    data: {
    },
    dataType: "json",
    method: "post",
    success: function(json) {
      $.each(json, function(index, value){
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
          $('.flexer-results').append("<div class='event bcresult' id='eventref"+value[1]+"' data-id='"+value[1]+"' ><div class='flexer-fline-results'>"+$logo+"<div class='blctitle'><h3>"+value[2]+"</h3></div></div><div class='flexerdateresult'><div class='datecontainer'><div class='icon-container'><img src='assets/img/icon-calendar.png'/></div><p class='bcdate'>"+value[9]+"</p></div><div class='hourcontainer'><div class='icon-container'><img src='assets/img/icon-clock.png'/></div><p class='bchour'>"+value[10]+"</p></div></div><div class='locationcontainer'><div class='icon-container'><img src='assets/img/locato.png' /></div><p class='bclocation'>"+value[5]+"</p></div><div class='flexer-carac'>"+$timing+" "+$payment+" "+$openness+"</div></div>");
        }
        $e++;
      });
      setTimeout(function(){
        $(".flexer-results").prepend("<div class='titleresultcatego'><h3>"+$title+"</h3></div>");
        if($e >= 3){
          $('.flexer-results').append("<div class='seemore-container' id='goformore'><p>See more results</p></div>");
        }
        else if($e == 0){
          $('.flexer-results').append("<div class='seemore-container'><p>No results.</p></div>");
        }
      }, 200);
    }
  });
});
