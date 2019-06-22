$(document).ready(function() {
  var scroll = function() {
    $(".scrollHolder").animate({ bottom: "0" }, 2000, function() {
      $(".scrollHolder").animate({ bottom: "30" }, 1500, function() {
        scroll();
      });
    });
  };
  scroll();

  $(".scrollHolder").click(function() {
    $('section#Portfolio').animate({
      height: $('section#Portfolio').get(0).scrollHeight
  }, 1000, function(){
      $(this).height('auto');
  });
  $('body,html').animate({scrollTop:"200px"},10);
  });
});
