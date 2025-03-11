/**
 * CityClub Demo Import JavaScript
 */
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Import demo button click
    $(".cityclub-import-demo-button").on("click", function () {
      var demoId = $(this).data("demo-id");
      showImportModal(demoId);
    });

    // Close modal
    $(".cityclub-import-modal-close, .cityclub-import-close-button").on(
      "click",
      function () {
        $(".cityclub-import-modal").hide();
      },
    );

    // Show import modal
    function showImportModal(demoId) {
      // Reset modal state
      $(".cityclub-import-progress").show();
      $(".cityclub-import-complete").hide();
      $(".cityclub-import-error").hide();
      $(".cityclub-import-progress-message").text(
        cityclubDemoImport.importingText,
      );

      // Show modal
      $(".cityclub-import-modal").show();

      // Start import
      importDemo(demoId);
    }

    // Import demo
    function importDemo(demoId) {
      $.ajax({
        url: cityclubDemoImport.ajaxUrl,
        type: "POST",
        data: {
          action: "cityclub_import_demo",
          nonce: cityclubDemoImport.nonce,
          demo_id: demoId,
        },
        beforeSend: function () {
          updateProgress(10, "Preparing import...");
        },
        success: function (response) {
          if (response.success) {
            updateProgress(100, "Import complete!");
            setTimeout(function () {
              $(".cityclub-import-progress").hide();
              $(".cityclub-import-complete").show();
            }, 1000);
          } else {
            showError(response.data.message);
          }
        },
        error: function (xhr, status, error) {
          showError("An error occurred during import: " + error);
        },
        xhr: function () {
          var xhr = new window.XMLHttpRequest();
          xhr.upload.addEventListener(
            "progress",
            function (evt) {
              if (evt.lengthComputable) {
                var percentComplete = (evt.loaded / evt.total) * 100;
                updateProgress(
                  percentComplete,
                  "Importing... " + Math.round(percentComplete) + "%",
                );
              }
            },
            false,
          );
          return xhr;
        },
      });

      // Simulate progress for better UX
      simulateProgress();
    }

    // Simulate progress
    function simulateProgress() {
      var progress = 10;
      var interval = setInterval(function () {
        progress += Math.floor(Math.random() * 5) + 1;
        if (progress >= 90) {
          clearInterval(interval);
          progress = 90;
        }
        updateProgress(progress, "Importing... " + progress + "%");
      }, 1000);
    }

    // Update progress
    function updateProgress(percent, message) {
      $(".cityclub-import-progress-bar").css("width", percent + "%");
      $(".cityclub-import-progress-message").text(message);
    }

    // Show error
    function showError(message) {
      $(".cityclub-import-progress").hide();
      $(".cityclub-import-error").show();
      $(".cityclub-import-error-message").text(message);
    }
  });
})(jQuery);
