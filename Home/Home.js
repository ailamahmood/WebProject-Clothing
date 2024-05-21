//TOGGLE WELCOME

$(document).ready(function () {
    $("p").hide();                 // Initially para hide

    $(".welcome button").click(function () {
        $("p").toggle();
    });
});


//CHANGE WELCOME ON HOVER

$(document).ready(function () {
    // Function to handle button hover
    $(".welcome button").hover(function () {
        $(this).css({
            'background': 'rgba(255, 255, 255, 0.664)',
            'color': 'black',
            'text-shadow': '2px 2px 2px rgba(0, 0, 0, 0.137)'
        });
    }, function () {
        // Revert to original styles on mouse leave
        $(this).css({
            'background': '',
            'color': '',
            'text-shadow': ''
        });
    });
    // Function to handle button click
    $(".welcome button").click(function () {
        // Apply styles when button is clicked
        $(this).css({
            'background': 'rgba(255, 255, 255, 0.664)',
            'color': 'black',
            'text-shadow': '2px 2px 2px rgba(0, 0, 0, 0.137)'
        });
    });
});


//GET EMAIL

$(document).ready(function () {
    $("#emailButton").click(function () {
        var emailAddress = $(".footer-i.f3 input[type='email']").val();    // Get the email address

        if (emailAddress.includes("@")) {
            alert("Email address: " + emailAddress + " has been submitted!");
        } else {
            alert("Invalid email address! Please enter a valid email address.");
        }

        $(".footer-i.f3 input[type='text']").val('');       // Clear after submission
    });
});


//MODAL IMAGE

$(document).ready(function () {
    // Get all images
    var carouselItems = $('.carousel-item img');
    var popularProductImages = $('.popular-products .products-item img');
    var mostRatedProductImages = $('.most-rated .products-item img');
    var modalImg = $('#modalImage');
    var captionText = $('#caption');

    // Function to handle click on carousel items
    carouselItems.click(function () {
        modalImg.attr('src', $(this).attr('src'));
        captionText.text($(this).attr('alt'));
        $('#myModal').modal('show');
    });

    // Function to handle click on popular product images
    popularProductImages.click(function () {
        modalImg.attr('src', $(this).attr('src'));
        captionText.text($(this).attr('alt'));
        $('#myModal').modal('show');
    });

    // Function to handle click on most rated product images
    mostRatedProductImages.click(function () {
        modalImg.attr('src', $(this).attr('src'));
        captionText.text($(this).attr('alt'));
        $('#myModal').modal('show');
    });

    // Close modal when the close button is clicked
    $('.modal .btn-close').click(function () {
        $('#myModal').modal('hide');
    });
});


//EVENT HANDLING ON DISCOUNT NEWS

$(document).ready(function () {
    $('.discount-news').mouseenter(function () {
        $(this).css({
            'background-color': 'rgba(0, 0, 0, 0.404)', 
            'color': 'white' 
        });
    }).mouseleave(function () {
        $(this).css({
            'background-color': 'rgba(255, 255, 255, 0.986)', 
            'color': 'black' 
        });
    });
});