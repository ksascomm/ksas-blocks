/**
 * File isotope.js.
 *
 * Customized isotope script for People Directory Page Template
 */

jQuery(document).ready(function ($) {
  // initially hide noresult box on page load
  $("#noResult").hide();

  var qsRegex;
  var hashFilter;

  // init Isotope
  var $grid = $("#isotope-list").isotope({
    itemSelector: ".item",
    layoutMode: "fitRows",
    filter: function () {
      var $this = $(this);
      var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
      var hashResult = hashFilter ? $this.is(hashFilter) : true;
      return searchResult && hashResult;
    },
  });

  // use value of search field to filter
  var $quicksearch = $("#id_search").keyup(
    debounce(function () {
      qsRegex = new RegExp($quicksearch.val(), "gi");
      $grid.isotope();

      // display message box if no filtered items

      if (!$grid.data("isotope").filteredItems.length) {
        $("#noResult").show();
      } else {
        $("#noResult").hide();
      }
    })
  );

  // debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    var timeout;
    return function debounced() {
      if (timeout) {
        clearTimeout(timeout);
      }
      function delayed() {
        fn();
        timeout = null;
      }
      setTimeout(delayed, threshold || 100);
    };
  }

  $("#filters button").click(function (event) {
    event.preventDefault();
  });

  // Filter based on URL hash

  // 1. Wire filter buttons to generate URL hash, ie "...#filter=.design"
  // 2. Monitor changes to URL hash and trigger a function.
  // 3. Grab filter value from URL hash.
  // 4. Pass filter value to Isotope to repaint.

  // Wire filter buttons to generate URL hash, ie "...#filter=.design"
  $("#filters button").on("click", function () {
    if ($(this).hasClass("is-checked")) {
      $(this).removeClass("is-checked");
      location.hash = "filter=*";
    } else {
      //$('#filters a.button').removeClass('checked');
      var filterAttr = $(this).attr("data-filter");
      location.hash = "filter=" + encodeURIComponent(filterAttr);
      //$(this).addClass('checked');
    }
  });

  // Pass filter value to Isotope to repaint.
  function onHashChange() {
    hashFilter = getHashFilter();

    if (hashFilter) {
      $("#filters").find(".is-checked").removeClass("is-checked");
      $("#filters")
        .find('[data-filter="' + hashFilter + '"]')
        .addClass("is-checked");
      $grid.isotope();
    }
  } // onHashChange

  // Grab filter value from URL hash.
  function getHashFilter() {
    var currentHash = location.hash.match(/filter=([^&]+)/i);
    var filterValue = currentHash && currentHash[1];
    return filterValue;
  }

  onHashChange();
  // Run onHashChange any time the URL hash changes
  window.onhashchange = onHashChange;

  (function ($) {
    var $doc = $(document),
      $win = $(window);

    $win.on("load", function () {
      // document is fully loaded

      $("#isotope-list").isotope();
      // set timeout to fake 1 sec loading
      setTimeout(function () {
        $("#isotope-list").removeClass("loading");
      }, 1000);
    });
  })(jQuery);
  (function() {
    // Set searchField to the search input field.
    // Set timeout to the time you want to wait after the last character in milliseconds.
    // Set minLength to the minimum number of characters that constitutes a valid search.
    var searchField = document.querySelector('#id_search'),
      timeout = 1500,
      minLength = 3;
  
    var textEntered = false;
  
    var timer, searchText;
    
    var handleInput = function() {
      searchText = searchField ? searchField.value : '';
      if (searchText.length < minLength) {
      return;
      }
      window.dataLayer.push({
      'event': 'peopledirectoryInput',
      'searchTerm': searchText
      });
      textEntered = false;
    };
    
    var startTimer = function(e) {
      textEntered = true;
      window.clearTimeout(timer);
      if (e.keyCode === 13) {
      handleInput();
      return;
      }
      timer = setTimeout(handleInput, timeout);
    };
    
    if (searchField !== null) {
      searchField.addEventListener('keydown', startTimer, true);
      searchField.addEventListener('blur', function() {
      if (textEntered) {
        window.clearTimeout(timer);
        handleInput();
      }
      }, true);
    }
    })();
});

