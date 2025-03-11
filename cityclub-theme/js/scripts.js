/**
 * Main JavaScript file for CityClub theme
 */
(function ($) {
  "use strict";

  // Mobile Menu Toggle
  $(".menu-toggle").on("click", function () {
    $(".main-navigation").toggleClass("active");
  });

  // Close mobile menu when clicking outside
  $(document).on("click", function (e) {
    if (
      !$(e.target).closest(".main-navigation").length &&
      !$(e.target).closest(".menu-toggle").length
    ) {
      $(".main-navigation").removeClass("active");
    }
  });

  // Smooth scroll for anchor links
  $('a[href*="#"]')
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

  // Add active class to current menu item
  var currentUrl = window.location.href;
  $(".main-navigation a").each(function () {
    if ($(this).attr("href") === currentUrl) {
      $(this).addClass("active");
    }
  });

  // Initialize AOS animation library if available
  if (typeof AOS !== "undefined") {
    AOS.init({
      duration: 800,
      easing: "ease-in-out",
      once: true,
    });
  }
})(jQuery);
