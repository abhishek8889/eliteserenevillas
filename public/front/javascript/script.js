$(document).ready(function () {
  $(".gallery-content").slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    prevArrow:
      '<button class="slide-arrow prev-arrow"><i class="fa-solid fa-chevron-left"></i></button>',
    nextArrow:
      '<button class="slide-arrow next-arrow"><i class="fa-solid fa-chevron-right"></i></button>',
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 2,
        },
      },

    ],
  });

  $(".gallery-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
  });
  $(".navbar-toggler").click(function (e) {
    e.preventDefault();
    $(this).toggleClass("open");
  });
  $(".cus-drop").click(function () {
    $(this).next(".drop-menu").slideToggle();
  });
  var btn = $(".back_to_top");
  $(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
      btn.addClass("show");
    } else {
      btn.removeClass("show");
    }
  });
  btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
  });
  $(".video-btn").click(function (e) {
    e.preventDefault();
    $(this).parent().remove();
  });
  $(".drop-down").click(function () {
    $(this).next(".drop-menu").slideToggle();
    $(this).toggleClass("rotate");
  });
  $(window).on("load resize", function (event) {
    var $navbar = $("header");
    var $body = $("body");
    $body.css("padding-top", $navbar.outerHeight());
  });

  if ($(".des-p p").text().length >= 100) {
    console.log($(this).length);
  } else {
    $(".des-p").addClass("hide");
    $(".view-more").hide();
  }
  $(".view-more").click(function () {
    $(this).parent().toggleClass("active");
    if ($(this).parent().hasClass("active")) {
      $(this).html(`View Less <i class="fa-solid fa-angle-up"></i>`);
    } else {
      $(this).html(`View More <i class="fa-solid fa-angle-down"></i>`);
    }
  });
  $(function () {
    $("#datepicker").datepicker();
  });
  $(".star > i").on("mouseover", function () {
    $(this).toggleClass("far fas");
  });
  $(".search-close").click(function(e){
    e.preventDefault()
    $(this).parent().hide()
  })
  $(".my-serch").click(function(e){
    e.preventDefault()
    $(".search-bar").css("display", "flex");
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
  if (scroll >= 100) {
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
    var minDefaultValue = $('#min_price').attr('default-value') || 0;

    var maxDefaultValue = $('#max_price').attr('default-value') || 1000;
    $("#slider-range").slider({
      range: true,
      orientation: "horizontal",
      min: 0,
      max: 1000,
      values: [minDefaultValue, maxDefaultValue],
      step: 10,

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

var plus = document.querySelector(".plus");
var minus = document.querySelector(".minus");
var numb = document.querySelector(".numb");
// let x = 1;
let x = parseInt(numb.textContent);
plus.addEventListener("click", () => {
  x++;
  numb.innerHTML = x; // Update the content of the .num span directly
});

minus.addEventListener("click", () => {
  x--;
  x = x < 1 ? 1 : x;
  numb.innerHTML = x; // Update the content of the .num span directly
});

$(function () {
  $('input[name="datefilter"]').daterangepicker({
    autoUpdateInput: false,
    locale: {
      cancelLabel: "Clear",
    },
  });

  $('input[name="datefilter"]').on(
    "apply.daterangepicker",
    function (ev, picker) {
      $("#startdate").val(picker.startDate.format("MM/DD/YYYY"));
      $("#enddate").val(picker.endDate.format("MM/DD/YYYY"));
    }
  );

  $('input[name="datefilter"]').on(
    "cancel.daterangepicker",
    function (ev, picker) {
      // $(this).val("");
    }
  );
});


const $label = $(".dropdown__filter-selected");
const $options = $(".dropdown__select-option");

$options.on("click", function() {
  $label.text($(this).text());
});

// Close dropdown onclick outside
$(document).on("click", function(e) {
  const $toggle = $(".dropdown__switch");
  const $element = $(e.target);

  if ($element.is($toggle)) return;

  const $isDropdownChild = $element.closest(".dropdown__filter");

  if (!$isDropdownChild.length) {
    $toggle.prop("checked", false);
  }


});
$("#enddate").click(function () {
  $(".daterangepicker").css("left", "433px");
});
