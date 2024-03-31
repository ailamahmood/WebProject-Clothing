$(document).ready(function () {
    $("#animateTeam").click(function () {
        $(this).parent().find(".row").slideUp(500).slideDown(500);
    });




    $("#animateServices").click(function () {
        $(this).parent().find(".row").fadeOut(500).fadeIn(500);
    });
});