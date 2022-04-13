(function ($) {
  $(".super-menu .toggle-mobile-menu").click(function (e) {
    e.preventDefault(); // don't grab focus

    setTimeout(() => {
      if ($("body").hasClass("mobile-menu-active")) {
        $(document).on("keydown", function (e) {
          if (e.keyCode === 27) {
            $("#accessibility-close-mobile-menu").trigger("focusin");
          }
        });
        $("#smobile-menu .primary-menu li a").first().focus();
      }
    }, 25);
  });

  $(document).ready(function () {
    $("#smobile-menu #primary-menu").append(
      '<li><a href="" id="accessibility-close-mobile-menu" style="padding:0;height:0;"></a></li>'
    );

    $("#accessibility-close-mobile-menu").focusin(function (e) {
      $(".super-menu .toggle-mobile-menu").click();
      setTimeout(() => {
        $("#primary a").first().focus();
      }, 0);
      $(document).off("keydown");
    });

    $("#smobile-menu .smenu-hide").on("keydown", function (e) {
      if (e.keyCode === 9 && e.shiftKey) {
        //shift tab or enter on "menu" close menu
        $(".super-menu .toggle-mobile-menu").trigger("click");
        $(document).off("keydown");
        setTimeout(function () {
          $(".super-menu .toggle-mobile-menu").focus();
        }, 25);
      }
    });
  });
})(jQuery);
