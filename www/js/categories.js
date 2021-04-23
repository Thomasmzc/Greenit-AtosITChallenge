

//Links
$(".gotolog").click(function(){
  window.location.href="login.php";
});
$(".gotosign").click(function(){
  window.location.href="signup.php";
});
$('.gotocompany').click(function(){
  window.location.href='company.php';
});
/* Get labels */
$(document).ready(function(){
    $.ajax({
        url: "includes/traitement_GET_labels.php",
        type: 'post',
        dataType: "json",
        data: {
        },
        success: function(json) {
           $.each(json, function(index, value){
                $category = value[0];
                $('#label'+$category).css({
                    display: "flex"
                });
                $('#label'+$category).append("<img src='assets/img/labels/"+value[2]+"' alt='"+value[1]+"' />");
           });
        }
    });
});


/* Sub menu */
$('.navcatego').click(function(){
    $nbrcatego = $(this).data('category');
    $(this).siblings().removeClass('activesub');
    $(this).addClass('activesub');
    $('html, body').animate({
        scrollTop: $("#slide"+$nbrcatego).offset().top
    }, 2000);
});


/* go back */
$('.return-container').click(function(){
    window.location.href='index.html';
});


/* Menu automation */
$.fn.isInViewport = function() {
  var elementTop = $(this).offset().top + 200;
  var elementBottom = elementTop + ($(this).outerHeight())/2;

  var viewportTop = $(window).scrollTop();
  var viewportBottom = viewportTop + $(window).height();

  return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(window).on('resize scroll', function() {

  $('.slide').each(function() {
      var nbr = $(this).data('nbrslide');
    if ($(this).isInViewport()) {
      $('#navcat'+nbr).addClass('activesub');
    } else {
      $('#navcat'+nbr).removeClass('activesub');
    }
  });
});