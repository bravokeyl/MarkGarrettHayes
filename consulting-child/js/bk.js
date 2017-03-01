jQuery(document).ready(function ($) {
  "use strict";
  // $(".request_callback .bk-firstname").attr('required','required');
  // $(".request_callback .bk-phonenumber").attr('required','required');
  // $(".request_callback .bk-organisation").attr('required','required');
  // $(".wpcf7-form").validate({
  //      rules: {
  //         firstname: "required",
  //      },
  //         messages: {
  //         firstname: "Please include your name.",
  //      },
  //  });
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      var stop = target.offset().top;
      // console.log(target.selector);
      if("#home-request-form" == target.selector){
        stop = parseInt(target.offset().top)-110;
      }
      if (target.length) {
        $('html, body').animate({
          scrollTop: stop
        }, 1000);
        return false;
      }
    }
  });
});
