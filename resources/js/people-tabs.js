/**
 * File people-tabs.js.
 *
 * Customized script for keyboard navigation on People CPT
 * 
 * @link http://web-accessibility.carnegiemuseums.org/code/tabs/
 */

jQuery(document).ready(function($) {
	var accordionButtons = $('.accordion-controls li button');

function accordionToggle() {
  $('.accordion-controls li button').on('click', function(e) {
    $control = $(this);

    accordionContent = $control.attr('aria-controls');
    checkOthers($control[0]);

    isAriaExp = $control.attr('aria-expanded');
    newAriaExp = (isAriaExp == "false") ? "true" : "false";
    $control.attr('aria-expanded', newAriaExp);

    isAriaHid = $('#' + accordionContent).attr('aria-hidden');
    if (isAriaHid == "true") {
      $('#' + accordionContent).attr('aria-hidden', "false");
      $('#' + accordionContent).css('display', 'block');
    } else {
      $('#' + accordionContent).attr('aria-hidden', "true");
      $('#' + accordionContent).css('display', 'none');
    }
  });
};

function checkOthers(elem) {
  for (var i=0; i<accordionButtons.length; i++) {
    if (accordionButtons[i] != elem) {
      if (($(accordionButtons[i]).attr('aria-expanded')) == 'true') {
        $(accordionButtons[i]).attr('aria-expanded', 'false');
        content = $(accordionButtons[i]).attr('aria-controls');
        $('#' + content).attr('aria-hidden', 'true');
        $('#' + content).css('display', 'none');
      }
    }
  }
};

//call this function on page load
accordionToggle();


$(function(){
	var index = 0;
	var $tabs = $('a.tab');
  
	$tabs.bind(
	{
	  // on keydown,
	  // determine which tab to select
	  keydown: function(ev){
		var LEFT_ARROW = 37;
		var UP_ARROW = 38;
		var RIGHT_ARROW = 39;
		var DOWN_ARROW = 40;
  
		var k = ev.which || ev.keyCode;
  
		// if the key pressed was an arrow key
		if (k >= LEFT_ARROW && k <= DOWN_ARROW){
		  // move left one tab for left and up arrows
		  if (k == LEFT_ARROW || k == UP_ARROW){
			if (index > 0) {
			  index--;
			}
			// unless you are on the first tab,
			// in which case select the last tab.
			else {
			  index = $tabs.length - 1;
			}
		  }
  
		  // move right one tab for right and down arrows
		  else if (k == RIGHT_ARROW || k == DOWN_ARROW){
			if (index < ($tabs.length - 1)){
			  index++;
			}
			// unless you're at the last tab,
			// in which case select the first one
			else {
			  index = 0;
			}
		  }
  
		  // trigger a click event on the tab to move to
		  $($tabs.get(index)).click();
		  ev.preventDefault();
		}
	  },
  
	  // just make the clicked tab the selected one
	  click: function(ev){
		index = $.inArray(this, $tabs.get());
		setFocus();
		ev.preventDefault();
	  }
	});
  
	var setFocus = function(){
	  // undo tab control selected state,
	  // and make them not selectable with the tab key
	  // (all tabs)
	  $tabs.attr(
	  {
		tabindex: '-1',
		'aria-selected': 'false'
	  }).removeClass('selected');
  
	  // hide all tab panels.
	  $('.tab-panel').removeClass('current');
  
	  // make the selected tab the selected one, shift focus to it
	  $($tabs.get(index)).attr(
	  {
		tabindex: '0',
		'aria-selected': 'true'
	  }).addClass('selected').focus();
  
	  // handle parent <li> current class (for coloring the tabs)
	  $($tabs.get(index)).parent().siblings().removeClass('current');
	  $($tabs.get(index)).parent().addClass('current');
  
	  // add a current class also to the tab panel
	  // controlled by the clicked tab
	  $($($tabs.get(index)).attr('href')).addClass('current');
	};
  });
  
  (function() {
	// Get relevant elements and collections
	const tabbed = document.querySelector('.tabbed');
	const tablist = tabbed.querySelector('ul');
	const tabs = tablist.querySelectorAll('a');
	const panels = tabbed.querySelectorAll('[id^="section"]');
	
	// The tab switching function
	const switchTab = (oldTab, newTab) => {
	  newTab.focus();
	  // Make the active tab focusable by the user (Tab key)
	  newTab.removeAttribute('tabindex');
	  // Set the selected state
	  newTab.setAttribute('aria-selected', 'true');
	  oldTab.removeAttribute('aria-selected');
	  oldTab.setAttribute('tabindex', '-1');
	  // Get the indices of the new and old tabs to find the correct
	  // tab panels to show and hide
	  let index = Array.prototype.indexOf.call(tabs, newTab);
	  let oldIndex = Array.prototype.indexOf.call(tabs, oldTab);
	  panels[oldIndex].hidden = true;
	  panels[index].hidden = false;
	}
	
	// Add the tablist role to the first <ul> in the .tabbed container
	tablist.setAttribute('role', 'tablist');
	
	// Add semantics are remove user focusability for each tab
	Array.prototype.forEach.call(tabs, (tab, i) => {
	  tab.setAttribute('role', 'tab');
	  tab.setAttribute('id', 'tab' + (i + 1));
	  tab.setAttribute('tabindex', '-1');
	  tab.parentNode.setAttribute('role', 'presentation');
	  
	  // Handle clicking of tabs for mouse users
	  tab.addEventListener('click', e => {
		e.preventDefault();
		let currentTab = tablist.querySelector('[aria-selected]');
		if (e.currentTarget !== currentTab) {
		  switchTab(currentTab, e.currentTarget);
		}
	  });
	  
	  // Handle keydown events for keyboard users
	  tab.addEventListener('keydown', e => {
		// Get the index of the current tab in the tabs node list
		let index = Array.prototype.indexOf.call(tabs, e.currentTarget);
		// Work out which key the user is pressing and
		// Calculate the new tab's index where appropriate
		let dir = e.which === 37 ? index - 1 : e.which === 39 ? index + 1 : e.which === 40 ? 'down' : null;
		if (dir !== null) {
		  e.preventDefault();
		  // If the down key is pressed, move focus to the open panel,
		  // otherwise switch to the adjacent tab
		  dir === 'down' ? panels[i].focus() : tabs[dir] ? switchTab(e.currentTarget, tabs[dir]) : void 0;
		}
	  });
	});
	
	// Add tab panel semantics and hide them all
	Array.prototype.forEach.call(panels, (panel, i) => {
	  panel.setAttribute('role', 'tabpanel');
	  panel.setAttribute('tabindex', '-1');
	  let id = panel.getAttribute('id');
	  panel.setAttribute('aria-labelledby', tabs[i].id);
	  panel.hidden = true; 
	});
	
	// Initially activate the first tab and reveal the first tab panel
	tabs[0].removeAttribute('tabindex');
	tabs[0].setAttribute('aria-selected', 'true');
	panels[0].hidden = false;
  })();

});