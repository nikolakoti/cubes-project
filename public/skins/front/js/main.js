$(document).ready(function () {

    $(".navbar-nav .fa").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("fa-plus fa-close");
        $(this).parent().next(".sub-menu").slideToggle();
    });
if($(".owl-carousel").length>0){
   $('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    responsiveClass:true,
    nav:true,
    dots: false,
    navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
    responsive:{
        0:{
            items:1
        },
        768:{
            items:2
        }
    }
}); 
}
   if($("[data-fancybox]").length>0){
    $("[data-fancybox]").fancybox();
   }


});
