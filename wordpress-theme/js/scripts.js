/**
 * Main JavaScript file for CityClub theme
 */
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Mobile Menu Toggle
    $(".menu-toggle").on("click", function () {
      $(".main-navigation").toggleClass("active");
      $(this).attr(
        "aria-expanded",
        $(this).attr("aria-expanded") === "true" ? "false" : "true",
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

    // FAQ Accordion
    $(".faq-question").on("click", function () {
      var $this = $(this);
      var $answer = $this.next(".faq-answer");
      var $icon = $this.find(".faq-icon");

      $answer.slideToggle(200);
      $this.toggleClass("active");

      if ($this.hasClass("active")) {
        $icon.html(
          '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd" /></svg>',
        );
      } else {
        $icon.html(
          '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" /></svg>',
        );
      }
    });

    // Testimonial Carousel
    if ($(".testimonial-carousel").length) {
      var currentSlide = 0;
      var totalSlides = $(".testimonial-item").length;

      // Show the first slide
      $(".testimonial-item").eq(0).addClass("active");
      $(".testimonial-dot").eq(0).addClass("active");

      // Next slide
      $(".testimonial-next").on("click", function () {
        goToSlide((currentSlide + 1) % totalSlides);
      });

      // Previous slide
      $(".testimonial-prev").on("click", function () {
        goToSlide((currentSlide - 1 + totalSlides) % totalSlides);
      });

      // Dot navigation
      $(".testimonial-dot").on("click", function () {
        var index = $(this).index();
        goToSlide(index);
      });

      function goToSlide(index) {
        $(".testimonial-item")
          .removeClass("active")
          .eq(index)
          .addClass("active");
        $(".testimonial-dot")
          .removeClass("active")
          .eq(index)
          .addClass("active");
        currentSlide = index;
      }
    }

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
              1000,
            );
          }
        }
      });
  });
})(jQuery);
