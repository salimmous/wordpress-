/**
 * CityClub Pro Demo Import JavaScript
 */
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Import demo button click
    $(".cityclub-pro-demo-import-btn").on("click", function () {
      var demoId = $(this).data("demo-id");
      startImport(demoId);
    });

    // Close modal
    $(".cityclub-pro-import-modal-close, .cityclub-pro-import-close-btn").on(
      "click",
      function () {
        $(".cityclub-pro-import-modal").fadeOut(200);
      },
    );

    // Start import process
    function startImport(demoId) {
      // Reset modal state
      resetModalState();

      // Show modal
      $(".cityclub-pro-import-modal").fadeIn(200);

      // Start import
      $.ajax({
        url: cityclubProImport.ajaxUrl,
        type: "POST",
        data: {
          action: "cityclub_pro_import_demo",
          nonce: cityclubProImport.nonce,
          demo_id: demoId,
        },
        success: function (response) {
          if (response.success) {
            // Start importing steps
            importSteps(response.data.steps);
          } else {
            showError(response.data.message);
          }
        },
        error: function (xhr, status, error) {
          showError("An error occurred: " + error);
        },
      });
    }

    // Import steps one by one
    function importSteps(steps) {
      var totalSteps = steps.length;
      var currentStep = 0;

      function processNextStep() {
        if (currentStep >= totalSteps) {
          // All steps completed
          updateProgress(100, cityclubProImport.steps.complete);
          setTimeout(function () {
            $(".cityclub-pro-import-progress").hide();
            $(".cityclub-pro-import-steps").hide();
            $(".cityclub-pro-import-complete").fadeIn(200);
          }, 500);
          return;
        }

        var step = steps[currentStep];
        var stepPercent = Math.round(((currentStep + 1) / totalSteps) * 100);

        // Update progress
        updateProgress(stepPercent, cityclubProImport.steps[step] || step);

        // Mark current step as active
        $(".cityclub-pro-import-step").removeClass("active");
        $(".cityclub-pro-import-step[data-step='" + step + "']").addClass(
          "active",
        );

        // Process step
        $.ajax({
          url: cityclubProImport.ajaxUrl,
          type: "POST",
          data: {
            action: "cityclub_pro_import_step",
            nonce: cityclubProImport.nonce,
            step: step,
          },
          success: function (response) {
            if (response.success) {
              // Mark step as completed
              $(".cityclub-pro-import-step[data-step='" + step + "']")
                .removeClass("active")
                .addClass("completed");

              // Process next step
              currentStep++;
              setTimeout(processNextStep, 500);
            } else {
              showError(response.data.message);
            }
          },
          error: function (xhr, status, error) {
            showError("An error occurred during step '" + step + "': " + error);
          },
        });
      }

      // Start processing steps
      processNextStep();
    }

    // Update progress
    function updateProgress(percent, message) {
      $(".cityclub-pro-import-progress-bar-inner").css("width", percent + "%");
      $(".cityclub-pro-import-progress-message").text(message);
    }

    // Show error
    function showError(message) {
      $(".cityclub-pro-import-progress").hide();
      $(".cityclub-pro-import-steps").hide();
      $(".cityclub-pro-import-error").show();
      $(".cityclub-pro-import-error-message").text(message);
    }

    // Reset modal state
    function resetModalState() {
      // Reset progress
      $(".cityclub-pro-import-progress-bar-inner").css("width", "0%");
      $(".cityclub-pro-import-progress-message").text(
        cityclubProImport.importingText,
      );

      // Show progress, hide complete/error
      $(".cityclub-pro-import-progress").show();
      $(".cityclub-pro-import-steps").show();
      $(".cityclub-pro-import-complete").hide();
      $(".cityclub-pro-import-error").hide();

      // Reset steps
      $(".cityclub-pro-import-step").removeClass("active completed");
    }
  });
})(jQuery);
