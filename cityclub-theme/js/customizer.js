/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

(function ($) {
  // Site title and description.
  wp.customize("blogname", function (value) {
    value.bind(function (to) {
      $(".site-title a").text(to);
    });
  });

  wp.customize("blogdescription", function (value) {
    value.bind(function (to) {
      $(".site-description").text(to);
    });
  });

  // Header text color.
  wp.customize("header_textcolor", function (value) {
    value.bind(function (to) {
      if ("blank" === to) {
        $(".site-title, .site-description").css({
          clip: "rect(1px, 1px, 1px, 1px)",
          position: "absolute",
        });
      } else {
        $(".site-title, .site-description").css({
          clip: "auto",
          position: "relative",
        });
        $(".site-title a, .site-description").css({
          color: to,
        });
      }
    });
  });

  // Primary color.
  wp.customize("cityclub_primary_color", function (value) {
    value.bind(function (to) {
      // Update CSS variables or specific elements
      document.documentElement.style.setProperty("--primary-color", to);

      // Update specific elements
      $(
        ".site-logo span.city, .site-logo sup, .main-navigation a:hover, .main-navigation a::after, .feature-content h4, .stats span, .section-subtitle",
      ).css("color", to);
      $(".btn, .feature-icon, .promo-badge").css("background-color", to);
      $(".location-finder").css("border-color", to);
    });
  });

  // Secondary color.
  wp.customize("cityclub_secondary_color", function (value) {
    value.bind(function (to) {
      // Update CSS variables or specific elements
      document.documentElement.style.setProperty("--secondary-color", to);

      // Update specific elements
      $(".site-logo span.club").css("color", to);
    });
  });

  // Copyright text.
  wp.customize("cityclub_copyright_text", function (value) {
    value.bind(function (to) {
      $(".copyright").html(to);
    });
  });
})(jQuery);
