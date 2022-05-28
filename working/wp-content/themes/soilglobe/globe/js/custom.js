//mouse parallax effect
document.addEventListener("mousemove", parallax);

function parallax(e) {
    this.querySelectorAll('.bannerImgSlidePhoto').forEach(layer => {
        const speed = layer.getAttribute('data-speed')

        const x = (window.innerWidth - e.pageX * speed) / 100
        const y = (window.innerHeight - e.pageY * speed) / 100

        console.log(x, y);
        layer.style.transform = 'rotateY(' + x + 'deg) rotateX(' + y + 'deg)'
    })
}

$(document).ready(function() {
    /*$('.tab-a').click(function(event) {
        event.preventDefault();
        $(".tab").fadeOut("fast").removeClass('tab-active');
        //$(".tab[data-id='" + $(this).attr('data-id') + "']").addClass("tab-active");
        $(".tab[id='" + $(this).attr('href') + "']").fadeIn("fast").addClass("tab-active");
        $("body").append('<div class="tabOverlay"></div>');
        $(".tabOverlay").addClass("tabOverlayActive");
        $(".tab-a").removeClass('active-a');
        $(this).parent().find(".tab-a").addClass('active-a');
    });*/

    //menu button
    $(".menuBtn").click(function() {
        $(".navigationBlock").addClass("navigationBlockActive");
    });
    $(".navigationBlockCloseBtn").click(function() {
        $(".navigationBlock").removeClass("navigationBlockActive");
    });

    //banner slider
    $('.sliderCarouselSet1').owlCarousel({
        navigation: true,
        pagination: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 5000,
        addClassActive: true,
        transitionStyle: "fade",
        //transitionStyle: "fadeUp",
        //transitionStyle: "goDown"
        //transitionStyle: "backSlide"
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    //target link slide on click
    $('.scrollDownBtn a').click(function() {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 0
        }, 1000);
        return false;
    });

    //positioned parallax element
    function parallax() {
        var scrolled = $(window).scrollTop();
        $('.overviewBg > div').css('top', -(scrolled * 0.35) + 'px');
        $('.parallaxSection2Active .parallaxSection2Parallax1 > div').css('right', +(scrolled * 0.75) + 'px');
        $('.parallaxSection2Active .parallaxSection2Parallax2 > div').css('right', +(scrolled * 0.65) + 'px');
        $('.parallaxSection2Active .parallaxSection2Parallax3 > div').css('right', +(scrolled * 0.55) + 'px');
    }
    $(window).scroll(function(e) {
        parallax();
    });

    //servicesSlider
    $('#servicesSlider,#recentWorksSlider').owlCarousel({
        navigation: true,
        pagination: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 5000,
        addClassActive: true,
        transitionStyle: "fade",
        //transitionStyle: "fadeUp",
        //transitionStyle: "goDown"
        //transitionStyle: "backSlide"
        navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
    });

    //testimonialSlider
    $('#testimonialSlider').owlCarousel({
        navigation: false,
        pagination: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        autoPlay: 8000,
        addClassActive: true,
        autoHeight: true
    });

    //owl carousal settings
    $("#ourservicesSlider").owlCarousel({
        autoPlay: 7000, //Set AutoPlay to 3 seconds         
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 1],
        addClassActive: true,
        navigation: true,
        addClassActive: true,
        navigationText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ]
    });

    // gallery block
    $("body").append('<div class="galleryWrapperContainer"></div>');
    $(".galleryWrapperContainer").append('<div class="galleryWrapperContainerCloseBtn"></div>');
    $(".galleryWrapperContainer").append('<div class="galleryWrapperContainerModal"></div>');
    $(".galleryWrapperContainer .galleryWrapperContainerModal").append('<div class="galleryWrapperContainerModalInner"></div>');
    $(".galleryBtn").click(function(event) {
        event.preventDefault();
        $(".galleryWrapperContainer").fadeIn("fast");
        $(this).find("div.mediaBlockBg:first").clone().appendTo(".galleryWrapperContainerModalInner");
    });
    $(".galleryWrapperContainer .galleryWrapperContainerCloseBtn").click(function() {
        $(".galleryWrapperContainerModalInner div.mediaBlockBg").remove();
        $(".galleryWrapperContainer").fadeOut("fast");
    });

    //scrollUp
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.scroll-to-top').fadeIn();
            $(".menuBtn").addClass("menuBtnScrolled");
            $(".footer-social").addClass("footer-socialScrolled");
        } else {
            $('.scroll-to-top').fadeOut();
            $(".menuBtn").removeClass("menuBtnScrolled");
            $(".footer-social").removeClass("footer-socialScrolled");
        }
    });
    $('.scroll-to-top').click(function() {
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

});