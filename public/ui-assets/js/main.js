$(document).ready(function () {

    var owl1 = $('.owl-one');
    owl1.owlCarousel({
        items: 1,
        margin: 30,
        stagePadding: 30,
        smartSpeed: 450,
        autoplayTimeout: 5000,
        loop: true,
        dots: false,
        autoplay: true,
        nav: true
    });

    $(".tog-icon").on("click", function () {
        $(this).find(".fas").toggleClass("fa-times")
    })
    $(".vol-btn").on("click", function () {
        $(this).find(".fas").toggleClass("fa-plus")
    })
    var myUpButton = $("div.up");
    $(window).scrollTop() > 120 ? myUpButton.fadeIn() : myUpButton.fadeOut();
    $(window).on("scroll", function () {
        $(window).scrollTop() > 120 ? myUpButton.fadeIn() : myUpButton.fadeOut();
    });

    myUpButton.click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

});