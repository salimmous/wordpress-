/**
 * Demo Content Preview JavaScript
 */
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Add preview button to demo import screen
    if ($(".ocdi__demo-import-notice").length) {
      $(".ocdi__demo-import-notice").after(
        '<div class="cityclub-demo-preview">' +
          "<h3>" +
          cityclubDemoPreview.previewTitle +
          "</h3>" +
          "<p>" +
          cityclubDemoPreview.previewDescription +
          "</p>" +
          '<div class="cityclub-demo-screenshots">' +
          '<div class="cityclub-screenshot">' +
          '<img src="' +
          cityclubDemoPreview.homeScreenshot +
          '" alt="Home Page">' +
          "<span>Home Page</span>" +
          "</div>" +
          '<div class="cityclub-screenshot">' +
          '<img src="' +
          cityclubDemoPreview.aboutScreenshot +
          '" alt="About Page">' +
          "<span>About Page</span>" +
          "</div>" +
          '<div class="cityclub-screenshot">' +
          '<img src="' +
          cityclubDemoPreview.classesScreenshot +
          '" alt="Classes Page">' +
          "<span>Classes Page</span>" +
          "</div>" +
          '<div class="cityclub-screenshot">' +
          '<img src="' +
          cityclubDemoPreview.trainersScreenshot +
          '" alt="Trainers Page">' +
          "<span>Trainers Page</span>" +
          "</div>" +
          "</div>" +
          '<a href="' +
          cityclubDemoPreview.demoUrl +
          '" class="button button-primary" target="_blank">' +
          cityclubDemoPreview.viewDemoText +
          "</a>" +
          "</div>",
      );
    }
  });
})(jQuery);
