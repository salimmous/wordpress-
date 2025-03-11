/**
 * Demo Import Admin JavaScript
 */
(function ($) {
  "use strict";

  $(document).ready(function () {
    // Install plugin
    $(".cityclub-install-plugin").on("click", function () {
      var button = $(this);
      var item = button.closest(".cityclub-plugin-item");
      var slug = item.data("slug");

      button.text(cityclubDemoImport.installing).prop("disabled", true);

      $.ajax({
        url: cityclubDemoImport.ajaxUrl,
        type: "POST",
        data: {
          action: "cityclub_install_plugin",
          slug: slug,
          nonce: cityclubDemoImport.nonce,
        },
        success: function (response) {
          if (response.success) {
            button
              .text(cityclubDemoImport.activated)
              .addClass("button-disabled");
            item
              .find(".cityclub-plugin-status")
              .html(
                '<span class="cityclub-plugin-status-active">' +
                  cityclubDemoImport.activated +
                  "</span>",
              );

            // Check if all plugins are active
            checkAllPluginsActive();
          } else {
            button.text(cityclubDemoImport.error).addClass("button-disabled");
            alert(response.data.message);
          }
        },
        error: function () {
          button.text(cityclubDemoImport.error).prop("disabled", false);
          alert("An error occurred. Please try again.");
        },
      });
    });

    // Activate plugin
    $(".cityclub-activate-plugin").on("click", function () {
      var button = $(this);
      var item = button.closest(".cityclub-plugin-item");
      var plugin = button.data("plugin");

      button.text(cityclubDemoImport.activating).prop("disabled", true);

      $.ajax({
        url: cityclubDemoImport.ajaxUrl,
        type: "POST",
        data: {
          action: "cityclub_activate_plugin",
          plugin: plugin,
          nonce: cityclubDemoImport.nonce,
        },
        success: function (response) {
          if (response.success) {
            button
              .text(cityclubDemoImport.activated)
              .addClass("button-disabled");
            item
              .find(".cityclub-plugin-status")
              .html(
                '<span class="cityclub-plugin-status-active">' +
                  cityclubDemoImport.activated +
                  "</span>",
              );

            // Check if all plugins are active
            checkAllPluginsActive();
          } else {
            button.text(cityclubDemoImport.error).addClass("button-disabled");
            alert(response.data.message);
          }
        },
        error: function () {
          button.text(cityclubDemoImport.error).prop("disabled", false);
          alert("An error occurred. Please try again.");
        },
      });
    });

    // Import demo
    $(".cityclub-import-demo-button").on("click", function () {
      var button = $(this);

      if (
        confirm(
          "Are you sure you want to import the demo content? This may overwrite your existing content.",
        )
      ) {
        button.prop("disabled", true);
        $(".cityclub-import-progress").show();

        $.ajax({
          url: cityclubDemoImport.ajaxUrl,
          type: "POST",
          data: {
            action: "cityclub_import_demo",
            nonce: cityclubDemoImport.nonce,
          },
          success: function (response) {
            if (response.success) {
              $(".cityclub-import-progress-message").text(
                cityclubDemoImport.imported,
              );
              alert("Demo content imported successfully! Refreshing page...");
              window.location.reload();
            } else {
              button.prop("disabled", false);
              $(".cityclub-import-progress").hide();
              alert(response.data.message);
            }
          },
          error: function () {
            button.prop("disabled", false);
            $(".cityclub-import-progress").hide();
            alert("An error occurred. Please try again.");
          },
        });
      }
    });

    // Check if all plugins are active
    function checkAllPluginsActive() {
      var allActive = true;

      $(".cityclub-plugin-item").each(function () {
        if (!$(this).find(".cityclub-plugin-status-active").length) {
          allActive = false;
          return false;
        }
      });

      if (allActive) {
        $(".cityclub-import-demo-button").prop("disabled", false);
      }
    }
  });
})(jQuery);
