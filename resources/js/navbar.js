jQuery(document).ready(function($) {
    var menuContainer = $('.menu-container');
    var menuToggle = menuContainer.find('.menu-button');
    var siteHeaderMenu = menuContainer.find('#site-header-menu');
    var siteNavigation = menuContainer.find('#site-navigation');

    // Toggles the menu button.
    (function() {

        if (!menuToggle.length) {
            return;
        }

        // Add aria-expanded attribute to the menu.
        menuToggle.add(siteNavigation).attr('aria-expanded', 'false');

        // Toggle the menu button.
        menuToggle.on('click', function() {

            // Add toggled-on class.
            $(this).add(siteHeaderMenu).toggleClass('toggled-on');

            // Add aria-expanded attribute value to the menu.
            $(this).add(siteNavigation)
                .attr('aria-expanded', $(this)
                    .add(siteNavigation).attr('aria-expanded') === 'false' ? 'true' : 'false');
        });
    })();

    // Add the dropdown toggle button to menu items that have children menu items.
    $('.menu-item-has-children > a').not(this).each(function() {

        // Get link text to prepend to screen reader text.
        var linkText = $(this).text();

        // Define screen reader text.
        var screenReaderText = {
            "expand": ": submenu",
            "collapse": ": submenu"
        };

        // Set submenu button with screen reader text
        var dropdownToggle = $('<button />', {
                'class': 'dropdown-toggle',
                'aria-expanded': false,
                'type': 'button'
            })
            .append($('<span />', {
                'class': 'screen-readers',
                text: linkText + screenReaderText.expand
            }));

        // Add submenu button after link
        $(this).after(dropdownToggle);
    });

    // Adds aria attribute to the site menu.
    siteHeaderMenu.find('.menu-item-has-children').attr('aria-haspopup', 'true');

    // Toggles the submenu when dropdown toggle button is clicked.
    siteHeaderMenu.find('.dropdown-toggle').click(function(e) {

        // close open submenus and reset attributes.
        $('.dropdown-toggle').not(this).each(function() {
            $(this).removeClass('toggled-on');
            $(this).nextAll('.sub-menu').removeClass('toggled-on');
            $(this).attr('aria-expanded', $(this).hasClass('toggled-on') === 'false' ? 'true' : 'false');
        });

        // open current submenu and set attributes.
        e.preventDefault();
        $(this).toggleClass('toggled-on');
        $(this).nextAll('.sub-menu').toggleClass('toggled-on');

        $(this).attr('aria-expanded', $(this).attr('aria-expanded') === 'false' ?
            'true' : 'false');
    });

    // Adds a class to sub-menus for styling.
    $('.sub-menu .menu-item-has-children').parent('.sub-menu').addClass('has-sub-menu');

    // Keyboard navigation.
    $('.menu-item a, button.dropdown-toggle').on('keydown', function(e) {

        if ([37, 38, 39, 40, 27].indexOf(e.keyCode) == -1) {
            return;
        }

        switch (e.keyCode) {

            case 27: // escape key

                $(this).parents('ul').first().prev('.dropdown-toggle.toggled-on').focus();
                $(this).parents('ul').first().prev('.dropdown-toggle.toggled-on').click();

                break;

            case 37: // left key
                e.preventDefault();
                e.stopPropagation();

                if ($(this).hasClass('dropdown-toggle')) {
                    $(this).prev('a').focus();
                } else {
                    if ($(this).parent().prev().children('button.dropdown-toggle').length) {
                        $(this).parent().prev().children('button.dropdown-toggle').focus();
                    } else {
                        $(this).parent().prev().children('a').focus();
                    }
                }

                if ($(this).is('ul ul ul.sub-menu.toggled-on li:first-child a')) {
                    $(this).parents('ul.sub-menu.toggled-on li').children('button.dropdown-toggle').focus();
                }

                break;

            case 39: // right key
                e.preventDefault();
                e.stopPropagation();

                if ($(this).next('button.dropdown-toggle').length) {
                    $(this).next('button.dropdown-toggle').focus();
                } else {
                    $(this).parent().next().children('a').focus();
                }

                if ($(this).is('ul.sub-menu .dropdown-toggle.toggled-on')) {
                    $(this).parent().find('ul.sub-menu li:first-child a').focus();
                }

                break;


            case 40: // down key
                e.preventDefault();
                e.stopPropagation();

                if ($(this).next().length) {
                    $(this).next().find('li:first-child a').first().focus();
                } else {
                    $(this).parent().next().children('a').focus();
                }

                if (($(this).is('ul.sub-menu a')) && ($(this).next('button.dropdown-toggle').length)) {
                    $(this).parent().next().children('a').focus();
                }

                if (($(this).is('ul.sub-menu .dropdown-toggle')) && ($(this).parent().next().children('.dropdown-toggle').length)) {
                    $(this).parent().next().children('.dropdown-toggle').focus();
                }

                break;


            case 38: // up key
                e.preventDefault();
                e.stopPropagation();

                if ($(this).parent().prev().length) {
                    $(this).parent().prev().children('a').focus();
                } else {
                    $(this).parents('ul').first().prev('.dropdown-toggle.toggled-on').focus();
                }

                if (($(this).is('ul.sub-menu .dropdown-toggle')) && ($(this).parent().prev().children('.dropdown-toggle').length)) {
                    $(this).parent().prev().children('.dropdown-toggle').focus();
                }

                break;

        }
    });
});

jQuery(document).ready(function($) {
    $('#primary-menu button.dropdown-toggle').on("click", function(e) {
        e.stopPropagation();
        if ($(this).is("li")) {
            if ($(this).hasClass('opened')) {
                $(this).addClass('closed');
            } else {
                $(this).removeClass('closed');
            }
            $(this).siblings().children('.sub-menu').removeClass('visible');
            $(this).siblings().removeClass('current-menu-parent opened');
            $(this).toggleClass('current-menu-parent opened');
            $(this).children('.sub-menu').toggleClass('visible');
        } else {
            if ($(this).parent().hasClass('opened')) {
                $(this).parent().addClass('closed');
            } else {
                $(this).parent().removeClass('closed');
            }
            $(this).parent().siblings().children('.sub-menu').removeClass('visible');
            $(this).parent().siblings().removeClass('current-menu-parent');
            $(this).parent().children('.sub-menu').toggleClass('visible');
            $(this).parent().toggleClass('current-menu-parent opened');
        }
		if ($('ul.has-sub-menu ul.sub-menu').hasClass('toggled-on')) {
			$(this).closest('ul.has-sub-menu').addClass('toggled-on');
		}
    });
});