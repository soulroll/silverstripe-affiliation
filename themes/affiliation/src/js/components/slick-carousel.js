/* Slick carousel */
$('.product-carousel').slick({
  arrows: false,
  dots: false,
  infinite: true,
  speed: 500,
  fade: true,
  autoplay: false,
  slidesToShow: 1,
  slidesToScroll: 1
});

$('.product-carousel-arrow-left').click(function(){
  $('.product-carousel').slick('slickPrev');
})

$('.product-carousel-arrow-right').click(function(){
  $('.product-carousel').slick('slickNext');
})

$('.product-carousel-navigation > div').click(function() {
  $('.product-carousel').slick('slickGoTo',$(this).index());
})
