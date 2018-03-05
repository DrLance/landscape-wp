jQuery('#top_menu').hide();
jQuery(document).ready(function ($) {


    $('.responsive').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });


    $('.single-item').slick({});
    let $topMenu = $('#top_menu');
    let $descriptionSlide = $('#description_slide');

    if($descriptionSlide.length > 0) {
        $descriptionSlide.hide();
    }

    if($topMenu.length > 0) {


        let top = $topMenu.offset().top;

        $(document).on('scroll', function () {
            if ($(document).scrollTop() >= top) {
                if (!$topMenu.hasClass('fixed-top')) {
                    $topMenu.addClass('fixed-top');
                    $topMenu.show();
                }
            } else {
                $topMenu.removeClass('fixed-top');
                $topMenu.attr("style", "display: none !important");
            }
        });
    }

});
