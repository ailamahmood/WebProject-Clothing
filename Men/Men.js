
$(document).ready(function() {
    $(".card").hover(function() {
      $(this).find(".card-img-top").fadeOut(500, function() {
        $(this).siblings(".img-hover").fadeIn(500);
      });
    }, function() {
      $(this).find(".img-hover").fadeOut(500, function() {
        $(this).siblings(".card-img-top").fadeIn(500);
      });
    });
  });