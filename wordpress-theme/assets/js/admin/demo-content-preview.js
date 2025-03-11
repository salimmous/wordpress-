/**
 * Demo Content Preview JavaScript
 */
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Add preview button to demo import screen
    if ($(".cityclub-demo-import-wrap").length) {
      // Initialize preview functionality
      $(".cityclub-demo-item").each(function () {
        var $item = $(this);
        var $previewBtn = $item.find(".cityclub-demo-actions a").first();

        $previewBtn.on("click", function (e) {
          e.preventDefault();
          var previewUrl = $(this).attr("href");
          window.open(previewUrl, "_blank");
        });
      });
    }
  });
})(jQuery);
