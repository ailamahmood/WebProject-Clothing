$(document).ready(function() {
    $(".card-container").hover(function() {
      $(this).find(".card-img-top").fadeOut(500, function() {
        $(this).siblings(".img-hover").fadeIn(500);
      });
    }, function() {
      $(this).find(".img-hover").fadeOut(500, function() {
        $(this).siblings(".card-img-top").fadeIn(500);
      });
    });
  });

  $(document).ready(function() {
    // Select the dropdown menu element
    var dropdown = $('.dropdown');
  
    // Handle click event on the dropdown toggle
    dropdown.on('click', '.dropdown-toggle', function(e) {
      $(this).parent().toggleClass('show'); // Toggle dropdown visibility
      e.preventDefault(); // Prevent default dropdown behavior
    });
  });
  