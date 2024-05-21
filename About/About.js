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


$(document).ready(function () {

    //ANIMATE TEAM MEMBERS
    $("#animateTeam").click(function () {
        $(this).parent().find(".row").slideUp(500).slideDown(500);
    });

    //ANIMATE OUR SERVICES
    $("#animateServices").click(function () {
        $(this).parent().find(".row").fadeOut(500).fadeIn(500);
    });
});