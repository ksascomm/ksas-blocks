/**
 * File isotope.js.
 *
 * Customized isotope script for Classrooms Template
 */
jQuery(document).ready(function($) {
    // initially hide noresult box on page load
    $("#noResult").hide();

    var filter = $('#filters');
    var suche = $('#id_search');
    var qsRegex;
    var buttonFilter;

	var $grid = $("#isotope-list").isotope({
        itemSelector: '.item',
        filter: function() {
            // console.log(searchResult);
            var searchResult = qsRegex ? $(this).text().match(qsRegex) : true;
            var buttonResult = buttonFilter ? $(this).is(buttonFilter) : true;

            return searchResult && buttonResult;
        }
    });


    // use value of search field to filter
    var quicksearch = suche.keyup(debounce(function() {
        qsRegex = new RegExp(quicksearch.val(), 'gi');
        $grid.isotope();
              // display message box if no filtered items

      if (!$grid.data("isotope").filteredItems.length) {
        $("#noResult").show();
      } else {
        $("#noResult").hide();
      }
    }, 200));


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
            timeout = setTimeout(delayed, threshold || 100);
        };
    }

    filter.change(function() {
        var filters = [];

        filter.filter(':checked').each(function() {
            filters.push(this.value);
        });
        //filters = filters.join(', '); 	//OR
        filters = filters.join(''); //AND
        buttonFilter = filters;
        $grid.isotope();
    });

    // filter with selects and checkboxes
    var $checkboxes = $('.js-radio-button-group input');
    //var $output = $('.output');

    $checkboxes.change(function() {
        // map input values to an array
        var inclusives = [];
        // inclusive filters from checkboxes
        $checkboxes.each(function(i, elem) {
            // if checkbox, use value if checked
            if (elem.checked) {
                inclusives.push(elem.value);
            }
        });

        // combine inclusive filters
        var filterValue = inclusives.length ? inclusives.join('') : '*';

       // $output.text(filterValue);
        $grid.isotope({
            filter: filterValue
        });
    });

});