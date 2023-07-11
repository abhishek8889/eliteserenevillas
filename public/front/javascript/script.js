
jQuery(document).ready(function($) {
    $('.gallery-content').slick({
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      prevArrow: '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
      nextArrow: '<button class="slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></button>',
      responsive: [
        {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2
        }
      },
      {
         breakpoint: 400,
         settings: {
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 4
         }
      },
    ]
  });
});

// read more & less 
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "view more"; 
    moreText.style.display = "none";
    moreText.style.border = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "view less"; 
    moreText.style.display = "inline";
    moreText.style.border = "none";
  }

}

// fixed header
jQuery(window).scroll(function () {
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 200) {
    jQuery(".site-header").addClass("fixed-header");
  } else {
    jQuery(".site-header").removeClass("fixed-header");
  }
});

