(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */

  var initializeBlock = function ($block) {
    new Swiper(".slider", {
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      preloadImages: false,
      lazy: true,
      keyboard: {
        enabled: true,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  };

  // Initialize each block on page load (front end).
  $(document).ready(function () {
    $(".slider").each(function () {
      initializeBlock($(this));
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=slider", initializeBlock);
  }
})(jQuery);
