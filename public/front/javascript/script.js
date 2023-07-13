
$(document).ready(function() {
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

  $(".gallery-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  })
   $(".navbar-toggler").click(function(e){
    e.preventDefault()
    $(this).toggleClass("open")
   })
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

// price range js

$(document).ready(function () {
  $("#price-range-submit").hide();

  $("#min_price,#max_price").on("change", function () {
    $("#price-range-submit").show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());

    if (min_price_range > max_price_range) {
      $("#max_price").val(min_price_range);
    }

    $("#slider-range").slider({
      values: [min_price_range, max_price_range],
    });
  });

  $("#min_price,#max_price").on("paste keyup", function () {
    $("#price-range-submit").show();

    var min_price_range = parseInt($("#min_price").val());

    var max_price_range = parseInt($("#max_price").val());

    if (min_price_range == max_price_range) {
      max_price_range = min_price_range + 100;

      $("#min_price").val(min_price_range);
      $("#max_price").val(max_price_range);
    }

    $("#slider-range").slider({
      values: [min_price_range, max_price_range],
    });
  });

  $(function () {
    $("#slider-range").slider({
      range: true,
      orientation: "horizontal",
      min: 0,
      max: 10000,
      values: [0, 10000],
      step: 100,

      slide: function (event, ui) {
        if (ui.values[0] == ui.values[1]) {
          return false;
        }

        $("#min_price").val(ui.values[0]);
        $("#max_price").val(ui.values[1]);
      },
    });

    $("#min_price").val($("#slider-range").slider("values", 0));
    $("#max_price").val($("#slider-range").slider("values", 1));
  });

  $("#slider-range,#price-range-submit").click(function () {
    var min_price = $("#min_price").val();
    var max_price = $("#max_price").val();

    $("#searchResults").text(
      "Here List of products will be shown which are cost between " +
        min_price +
        " " +
        "and" +
        " " +
        max_price +
        "."
    );
  });
});

// lot range js

$(document).ready(function () {
  $("#price-range-submit").hide();

  $("#min_lot,#max_lot").on("change", function () {
    $("#price-range-submit").show();

    var min_lot_range = parseInt($("#min_lot").val());

    var max_lot_range = parseInt($("#max_lot").val());

    if (min_lot_range > max_lot_range) {
      $("#max_lot").val(min_lot_range);
    }

    $("#lot_slider-range").slider({
      values: [min_lot_range, max_lot_range],
    });
  });

  $("#min_lot,#max_lot").on("paste keyup", function () {
    $("#price-range-submit").show();

    var min_lot_range = parseInt($("#min_lot").val());

    var max_lot_range = parseInt($("#max_lot").val());

    if (min_lot_range == max_lot_range) {
      max_lot_range = min_lot_range + 100;

      $("#min_lot").val(min_lot_range);
      $("#max_lot").val(max_lot_range);
    }

    $("#lot_slider-range").slider({
      values: [min_lot_range, max_lot_range],
    });
  });

  $(function () {
    $("#lot_slider-range").slider({
      range: true,
      orientation: "horizontal",
      min: 0,
      max: 10000,
      values: [0, 10000],
      step: 100,

      slide: function (event, ui) {
        if (ui.values[0] == ui.values[1]) {
          return false;
        }

        $("#min_lot").val(ui.values[0]);
        $("#max_lot").val(ui.values[1]);
      },
    });

    $("#min_lot").val($("#lot_slider-range").slider("values", 0));
    $("#max_lot").val($("#lot_slider-range").slider("values", 1));
  });

  $("#lot_slider-range,#price-range-submit").click(function () {
    var min_lot = $("#min_lot").val();
    var max_lot = $("#max_lot").val();

    $("#searchResults").text(
      "Here List of products will be shown which are cost between " +
        min_lot +
        " " +
        "and" +
        " " +
        max_lot +
        "."
    );
  });
});

var plus = document.querySelector(".plus")
var minus = document.querySelector(".minus")
var numb = document.querySelector(".numb")
let x = 0

plus.addEventListener("click" , ()=>{
  numb.innerHTML = `<span class='num'>${x}</span>`;
   x++;
 
})

minus.addEventListener("click" , ()=>{
  x--
  x = x <0 ? 0 : x
  numb.innerHTML = `<span class='num'>${x}</span>`
})

$(function() {

  $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });

  $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});
