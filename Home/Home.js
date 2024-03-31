  //Toggle Welcome
  $(document).ready(function(){
    $("p").hide();                 // Initially para hide
  
    $(".welcome button").click(function(){
      $("p").toggle();
    });
  });


$(document).ready(function(){
    // Function to handle button hover
    $(".welcome button").hover(function(){
        $(this).css({
            'background': 'rgba(255, 255, 255, 0.664)',
            'color': 'black',
            'text-shadow': '2px 2px 2px rgba(0, 0, 0, 0.137)'
        });
    }, function(){
        // Revert to original styles on mouse leave
        $(this).css({
            'background': '',
            'color': '',
            'text-shadow': ''
        });
    });

    // Function to handle button click
    $(".welcome button").click(function(){
        // Apply styles when button is clicked
        $(this).css({
            'background': 'rgba(255, 255, 255, 0.664)',
            'color': 'black',
            'text-shadow': '2px 2px 2px rgba(0, 0, 0, 0.137)'
        });
    });
});


  //Get Email 
  $(document).ready(function() {
    $("#emailButton").click(function() {
        var emailAddress = $(".footer-i.f3 input[type='email']").val();    // Get the email address

        if (emailAddress.includes("@")) {
          alert("Email address: " + emailAddress + " has been submitted!");
      } else {
          alert("Invalid email address! Please enter a valid email address.");
      }

        $(".footer-i.f3 input[type='text']").val('');       // Clear after submission
    });
});

$(document).ready(function(){
  // Get all carousel items
  var carouselItems = $('.carousel-item img');

  // Get the modal image and caption elements
  var modalImg = $('#modalImage');
  var captionText = $('#caption');

  // Iterate through each carousel item and attach click event
  carouselItems.click(function(){
      modalImg.attr('src', $(this).attr('src'));
      captionText.text($(this).attr('alt'));
      $('#myModal').modal('show');
  });

  // Close modal when the close button is clicked
  $('.modal .btn-close').click(function(){
      $('#myModal').modal('hide');
  });
});