 $(document).ready(function () {
     $(".home-page a").css({
         "color": "#aa1612",
         "font-family": "helvetica neue,Helvetica,Arial,sans-serif",
        "font-size": "17px",
        "font-weight": "bolder"
     });
     $(".o-page a").css({
         "color": "#aa1612"
         
     });
      $("nav .main input").css({
                 "color": "#aa1612 !important",
                  
             });
    
     /*$("#search-1").hide();*/
     // declare variable
     var scrollTop = $("#n-search-top");
     var scrollInput = $("nav .main input::placeholder");
     var scrollNavTop = $("#nav1");

     $(window).scroll(function () {
         // declare variable
         var topPos = $(this).scrollTop();

         // if user scrolls down - show scroll to top button
         if (topPos > 100) {
             $(scrollTop).css({
                 "transition": "width 2s linear 1s"
             });
             $(".home-page").css({
                 "background-color": "#fff",
                 "border-bottom": "2px solid #c2262a"
             });
             $("nav").css({
                 "border-bottom": "2px solid #c2262a"
             });
             
             $(".home-page a").css({
                 "color": "#aa1612",
                 "font-family": "helvetica neue,Helvetica,Arial,sans-serif",
                 "font-size": "17px",
                 "font-weight": "bolder"
                  
             });
             $(scrollTop).css({
                 "background-color": "#e5e5e5",
                 "border": "1px solid #eee"
             });
             
             /*placeholder*/
             $(scrollInput).css({"color" : "000 !important"});
             $("nav .main input::placeholder").css({
                 "color": "#000 !important",
                 "opacity": "1"
             });
             /*placeholder*/

         } else {
             $(scrollTop).css({
                 "background-color": "#fcfcfcab",
                 "border": "unset",
                 "color": "#000"
             });
             $(".home-page").css({
                 "background-color": "#fcfcfcab",
                 "border-bottom": "2px solid #eee"
             });
             $("nav").css({
                 "border-bottom": "2px solid #eee"
             });
             $(".home-page a").css({
                 "color": "#aa1612",
                 "font-family": "helvetica neue,Helvetica,Arial,sans-serif",
                 "font-size": "17px",
                 "font-weight": "bolder"
             });
         }

     });
  
 });
//    /*******login*******/
// $(document).ready(function () {
//     $('.n-signup').hide();
//     $(function () {
//         $('[data-toggle="tooltip"]').tooltip()
//     })
//     $("#n-signup").click(function(){
//     $('.n-login').hide();
//     $('.n-signup').show();
//   });
//     $("#n-login").click(function(){
//     $('.n-signup').hide();
//     $('.n-login').show();
//   });
// });
//    /*******login*******/
$(window).load(function() {
  $('.post-module').hover(function() {
    $(this).find('.description').stop().animate({
      height: "toggle",
      opacity: "toggle"
    }, 300);
  });
});
