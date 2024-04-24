/*-------Feedbacks-------*/

$('.main__slick--feedbacks').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                autoplay: true
            }
        },
    ],
    prevArrow:'<button type="button" class="slick-prev main-arrow"><i class="fa-solid fa-angle-left"></i></button>',
    nextArrow:'<button type="button" class="slick-next main-arrow"><i class="fa-solid fa-angle-right"></i></button>'
});

/*-------Feedbacks-------*/