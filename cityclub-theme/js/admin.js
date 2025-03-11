/**
 * Admin JavaScript for CityClub Theme Options
 */
jQuery(document).ready(function ($) {
  // Initialize color pickers
  $(".cityclub-color-picker").wpColorPicker();

  // Media uploader for logo
  $("#upload_logo_button").click(function (e) {
    e.preventDefault();
    var image = wp
      .media({
        title: "Upload Logo",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        var image_url = uploaded_image.toJSON().url;
        $("#cityclub_logo").val(image_url);
        $("#logo_preview").html(
          '<img src="' +
            image_url +
            '" style="max-width:300px;" /><br/><input id="remove_logo_button" type="button" class="button" value="Remove Logo" />',
        );
      });
  });

  // Remove logo
  $(document).on("click", "#remove_logo_button", function (e) {
    e.preventDefault();
    $("#cityclub_logo").val("");
    $("#logo_preview").empty();
  });

  // Media uploader for favicon
  $("#upload_favicon_button").click(function (e) {
    e.preventDefault();
    var image = wp
      .media({
        title: "Upload Favicon",
        multiple: false,
      })
      .open()
      .on("select", function (e) {
        var uploaded_image = image.state().get("selection").first();
        var image_url = uploaded_image.toJSON().url;
        $("#cityclub_favicon").val(image_url);
        $("#favicon_preview").html(
          '<img src="' +
            image_url +
            '" style="max-width:64px;" /><br/><input id="remove_favicon_button" type="button" class="button" value="Remove Favicon" />',
        );
      });
  });

  // Remove favicon
  $(document).on("click", "#remove_favicon_button", function (e) {
    e.preventDefault();
    $("#cityclub_favicon").val("");
    $("#favicon_preview").empty();
  });
});
