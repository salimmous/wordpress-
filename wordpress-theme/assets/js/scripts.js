/**
 * Main JavaScript file for CityClub theme
 */
(function ($) {
  "use strict";

  // Initialize AOS animations
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 800,
      easing: "ease-in-out",
      once: true,
    });
  }

  // Mobile Menu Toggle
  $(".menu-toggle").on("click", function () {
    $(".main-navigation").toggleClass("active");
    $(this).attr(
      "aria-expanded",
      $(this).attr("aria-expanded") === "true" ? "false" : "true"
    );
  });

  // Close mobile menu when clicking outside
  $(document).on("click", function (e) {
    if (
      !$(e.target).closest(".main-navigation").length &&
      !$(e.target).closest(".menu-toggle").length
    ) {
      $(".main-navigation").removeClass("active");
      $(".menu-toggle").attr("aria-expanded", "false");
    }
  });

  // Hero Slider
  function initHeroSlider() {
    if ($(".hero-slide").length > 1) {
      var currentSlide = 0;
      var slideCount = $(".hero-slide").length;
      var slideInterval;

      function showSlide(index) {
        $(".hero-slide").css("opacity", "0").css("z-index", "0");
        $(".hero-slide").eq(index).css("opacity", "1").css("z-index", "10");
        $(".hero-slide-image").css("transform", "scale(1.05)");
        $(".hero-slide")
          .eq(index)
          .find(".hero-slide-image")
          .css("transform", "scale(1)");
        $(".hero-dot").removeClass("bg-[#f26f21]").addClass("bg-white/50");
        $(".hero-dot")
          .eq(index)
          .removeClass("bg-white/50")
          .addClass("bg-[#f26f21]");
        currentSlide = index;
      }

      function nextSlide() {
        showSlide((currentSlide + 1) % slideCount);
      }

      function prevSlide() {
        showSlide((currentSlide - 1 + slideCount) % slideCount);
      }

      // Initialize slider
      showSlide(0);

      // Set up auto-sliding
      slideInterval = setInterval(nextSlide, 5000);

      // Add event listeners
      $(".hero-next").on("click", function () {
        clearInterval(slideInterval);
        nextSlide();
        slideInterval = setInterval(nextSlide, 5000);
      });

      $(".hero-prev").on("click", function () {
        clearInterval(slideInterval);
        prevSlide();
        slideInterval = setInterval(nextSlide, 5000);
      });

      $(".hero-dot").on("click", function () {
        clearInterval(slideInterval);
        var index = $(this).index();
        showSlide(index);
        slideInterval = setInterval(nextSlide, 5000);
      });

      // Pause auto-sliding on hover
      $(".hero-section").hover(
        function () {
          clearInterval(slideInterval);
        },
        function () {
          slideInterval = setInterval(nextSlide, 5000);
        }
      );
    }
  }

  // Initialize hero slider
  initHeroSlider();

  // Smooth scroll for anchor links
  $("a[href*='#']")
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function (event) {
      if (
        location.pathname.replace(/^\//, "") ===
          this.pathname.replace(/^\//, "") &&
        location.hostname === this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          event.preventDefault();
          $("html, body").animate(
            {
              scrollTop: target.offset().top - 100,
            },
            1000
          );
        }
      }
    });

  // Promo Modal
  $(".hero-cta-button").on("click", function () {
    $("#promo-modal").fadeIn();
    $("body").addClass("modal-open");
  });

  $(".modal-close, .modal-overlay").on("click", function () {
    $("#promo-modal").fadeOut();
    $("body").removeClass("modal-open");
  });

  // FAQ Accordion
  $(".faq-question").on("click", function () {
    var $this = $(this);
    var $answer = $this.next(".faq-answer");
    var $icon = $this.find(".faq-icon");

    $answer.slideToggle(200);
    $this.toggleClass("active");

    if ($this.hasClass("active")) {
      $icon.html(
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>'
      );
    } else {
      $icon.html(
        '<svg xmlns="http