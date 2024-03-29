$(document).ready(function(){
    $("p").hide(); // Initially hide the paragraph
  
    $(".welcome button").click(function(){
      $("p").toggle();
    });
  });
