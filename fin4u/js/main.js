window.addEventListener('DOMContentLoaded', function(){
    addOpenSelectEventListeners();
    addCloseSelectEventListeners();
    addOptionSelectEventListeners();
    addRadioEventListeners();
    addCheckBoxEventListeners();
    addRangeEventListeners();
    addTextareaEventListeners();
});


/* -----------------------------------------------------------------------------
1.  General
----------------------------------------------------------------------------- */

/* This function serves to make sure the code that binds the bubbeling event doesn't need to figure out which to use and can work in every browser. */
function addBubbleEvent(element, eventName, callback) {
    if (element.addEventListener) {
        element.addEventListener(eventName, callback, false);
    } else if (element.attachEvent) {
        element.attachEvent("on" + eventName, callback);
    }
}


/* This function serves to make sure the code that binds the capturing event doesn't need to figure out which to use and can work in every browser. */
function addCaptureEvent(element, eventName, callback) {
    if (element.addEventListener) {
        element.addEventListener(eventName, callback, true);
    } else if (element.attachEvent) {
        element.attachEvent("on" + eventName, callback);
    }
}


/* This function hides an element if it is shown and unhides it if it s not. The argument for this function is the id of the element shat should be hidden. It should be passed as a string! */
function hide(elementId) {
    'use strict';
    var element = document.getElementById(elementId);
    if (element.style.display === "none") {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}


/* This function scrolls (smoothly) to the correct place on the page when a link or button is clicked. */
function goTo(x) {
    var y = document.getElementById(x);
    y.scrollIntoView({block: 'start', behavior: 'smooth' });
}


/* -----------------------------------------------------------------------------
2.  Formats
----------------------------------------------------------------------------- */

// This function makes the first letter of a string a capital letter.
String.prototype.capitalize = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}


/* This function formats a given number (e.g.: 49874132.93219) to a string of the following pattern: xx xxx xxx.xx format. It also rounds the second decimal up or down depending on the third decimal, if this exists. */
function formatNumber(x) {
    
    var a = String(x);
    
    // Replace any comma with a period and remove empty spaces.
    a = a.replace(/,/g, '.')
    a = a.replace(/\s/g, '');
    
    a = String(Math.round(parseFloat(a) * 100)/100);
    
    // Get the index of the period.
    placeOfPeriod = a.lastIndexOf('.');
    
    if (placeOfPeriod === -1) {
        var b = a;
        var c = '';
    } else {
        var b = a.substring(0,placeOfPeriod);
        var c = a.substring(placeOfPeriod);
    }
    
    switch (b.length % 3) {
        case 0:
            b = b.replace(/(\d{3})/g, ' $1'); // Add a space in front of ever group of 3 characters.
            b = b.replace(/^\s+|\s+$/g, ''); // Remove the space at the start.
            break;
            
        case 1:
            var e;
            var f;
            e = b.substring(0,1);
            f = b.substring(1);
            f = f.replace(/(\d{3})/g, ' $1');
            b = e + f;
            break;
            
        case 2:
            var e;
            var f;
            e = b.substring(0,2);
            f = b.substring(2);
            f = f.replace(/(\d{3})/g, ' $1');
            b = e + f;
    }
    
    a = b + c;
    return a;
}


/* -----------------------------------------------------------------------------
3.  Text areas
----------------------------------------------------------------------------- */

/* On loading the page, make sure that all text areas have the event listeners attached to them to display the countdown of available characters. */
function addTextareaEventListeners() {
	var textareas = document.getElementsByTagName("textarea"); 
	var i;
	for (i = 0; i < textareas.length; i++) {
        
		var textarea = textareas[i];
        var x = textarea.maxLength;
        
        if (x != -1) {
            
            textarea.parentNode.getElementsByTagName('span')[0].innerHTML = "Characters left: " + x;
            
            addCaptureEvent(textarea, "input", countdown);
            
        } else {
            textarea.parentNode.className = "userInput";
        }
	}
}

/* Shows the amount of characters that are left to type in a text area. The only parameter that needs to be passed is the amount of allowed characters. */
function countdown() {
    
    var x = this.maxLength;
	var charsTyped = this.value.length;
    
	var charsLeft = x - charsTyped;
	this.parentNode.getElementsByTagName('span')[0].innerHTML = "Characters left: " + charsLeft;
}


/* -----------------------------------------------------------------------------
4.  Check boxes
----------------------------------------------------------------------------- */

/* On loading the page, make sure that all check box text has the event listeners attached to them to tick the corresponding check box when clicked. */
function addCheckBoxEventListeners() {
	var checkboxTexts = document.getElementsByClassName('checkboxText');
	var i;
	for (i = 0; i < checkboxTexts.length; i++) {
		var checkboxText = checkboxTexts[i];

		addCaptureEvent(checkboxText, "mousedown", tickbox);
	}
}

function tickbox() {
	'use strict';
	var event = event || window.event;
    var i = 0;
    
    for (i = 0; i < this.parentNode.childElementCount; i++) {
        if (this.parentNode.children[i] == this) {
            var checkbox = this.parentNode.children[i-1];
            if (checkbox.checked) {
                checkbox.checked = false;
            } else {
                checkbox.checked = true;
            }
        }
    }
}


/* -----------------------------------------------------------------------------
5.  Radio buttons
----------------------------------------------------------------------------- */

/* On loading the page, make sure that all radio button text has the event listeners attached to them to select the corresponding radio button when clicked. */
function addRadioEventListeners() {
	var radioTexts = document.getElementsByClassName('radioText');
	var i;
	for (i = 0; i < radioTexts.length; i++) {
		var radioText = radioTexts[i];

		addCaptureEvent(radioText, "mousedown", radioButton);
	}
}

function radioButton() {
	'use strict';
	var event = event || window.event;
    var i = 0;
    
    for (i = 0; i < this.parentNode.childElementCount; i++) {
        if (this.parentNode.children[i] == this) {
            this.parentNode.children[i-1].checked = true;
        }
    }
}


/* -----------------------------------------------------------------------------
6.  Selects
----------------------------------------------------------------------------- */

/* On loading the page, make sure that all selects have the event listeners attached to them to open the select options when clicked. */
function addOpenSelectEventListeners() {
	var selectWrappers = document.getElementsByClassName('selectWrapper');
	var i;
	for (i = 0; i < selectWrappers.length; i++) {
		var selectWrapper = selectWrappers[i];

		addCaptureEvent(selectWrapper, "click", showSelect);
		/* No need to pass anything as a parameter in the 'showSelect' callback function, as the function used for addEventListener will automatically have 'this' bound to the current element. Therefore, you can access 'this' in the callback function. */
	}
}

function showSelect() {
	'use strict';
	
	/* Get the height of the document before making the select visible in order to know if the select should be expanded towards the bottom or towards the top of the docuument. */
	var documentHeight = document.documentElement.scrollHeight;
    var selectInput = this.getElementsByTagName('input')[0];
	var select = this.getElementsByTagName('ul')[0];
    
	if (select.style.display === "none") {
		select.style.display = "block";
	} else {
        select.style = "display: block;";
    }
	
	// Get how far down the select menu extends (in y-axis value).
	var selectHeight = select.getBoundingClientRect().bottom + window.scrollY;
	/* = hight from the top of the viewport to the bottom of the select + hight from the top of the document to the place where the viewport is scrolled */
	
	/* If the select extends further down than the document itself, make sure the select menu is made smaller and has a scroll bar. */
	if (selectHeight > documentHeight) {
        
        select.style.maxHeight = documentHeight - selectInput.getBoundingClientRect().bottom + "px";
        select.style.overflow = "auto";
        
        /* This code will instead have the select extend to the top, rather than to the bottom.
		select.style.top = "auto";
		select.style.bottom = "0px";
		
		var optionCount = select.childElementCount;
		var option1 = select.children[0];
		var lastOption = select.children[optionCount-1];
		if (option1.innerHTML === "Choose option") {
			select.insertBefore(option1, lastOption.nextSibling);
		}
        */
	}
}

/* On loading the page, make sure that when clicked outside a select, any open select is closed. */
addCaptureEvent(window, "click", function (event) {hideSelects(event);});
function hideSelects(event) {
	'use strict';
    
	var event = event || window.event;
    
	if (event.target.class != 'option') {
		var selectWrappers = document.getElementsByClassName('selectWrapper');
		var i;
		for (i = 0; i < selectWrappers.length; i++) {

			var select = selectWrappers[i].getElementsByTagName('ul')[0];
			
			if (select.style.display === "block") {
				select.style.display = "none";
			}
            
            /*
			if (select.style.top === "auto") {
				select.style.top = "0px";
			}
			if (select.style.bottom === "0px") {
				select.style.bottom = "auto";
			}
			
			var optionCount = select.childElementCount;
			var lastOption = select.children[optionCount-1];
			if (lastOption.innerHTML === "Choose your option") {
				var option1 = select.children[0];
				select.insertBefore(lastOption,option1);
			}
            */
		}
	}
}

/* On loading the page, make sure that all the disabled options of the selects (= usually the first options) have the event listeners attached to them to close the select they are part of when clicked. */
function addCloseSelectEventListeners() {
	var selectOptionsOne = document.getElementsByClassName('disabled');
	var i;
	for (i = 0; i < selectOptionsOne.length; i++) {
		var selectOptionOne = selectOptionsOne[i];

		addCaptureEvent(selectOptionOne, "click", hideSelect);
	}
}

function hideSelect() {
	'use strict';
    
	var select = this.parentNode;
	if (select.style.display === "block") {
		select.style.display = "none";
	}
	
    /*
	if (select.style.top === "auto") {
		select.style.top = "0px";
	}
	
	if (select.style.bottom === "0px") {
		select.style.bottom = "auto";
	}
	
	var optionCount = select.childElementCount;
	var lastOption = select.children[optionCount-1];
	if (lastOption.innerHTML === "Choose your option") {
		var option1 = select.children[0];
		select.insertBefore(lastOption,option1);
	}
    */
}

/* Makes sure that when the select options are clicked, that the selected option is displayed in the selectInput and that the correct option is selected in the actual select. */
function addOptionSelectEventListeners() {
	var selectWrappers = document.getElementsByClassName('selectWrapper');
    
	var i;
	for (i = 0; i < selectWrappers.length; i++) {
        
        var select = selectWrappers[i].getElementsByTagName('ul')[0];
        var optionCount = select.childElementCount;

		for (j = 0; j < optionCount; j++) {
			var option = select.children[j];
			addCaptureEvent(option, "click", selectOption);
		}
	}
}


function selectOption() {
	'use strict';
	var event = event || window.event;
	
	var selectWrapper = this.parentNode.parentNode;
	
    var select = selectWrapper.getElementsByTagName('ul')[0];
    var actualSelect = selectWrapper.getElementsByTagName('select')[0];
    var selectInput = selectWrapper.getElementsByTagName('input')[0];
	
	var optionCount = select.childElementCount;
	var i;
	for (i = 0; i < optionCount; i++) {
		if (select.children[i] == this) {
			selectInput.value = select.children[i].innerHTML;
            
            if (actualSelect != undefined) {
                actualSelect.selectedIndex = i;
            }
		}
	}
	
	select.style.display = "none";
}


/* -----------------------------------------------------------------------------
7.  Ranges
----------------------------------------------------------------------------- */

/* On loading the page, make sure that all ranges have the event listeners attached to them to display their value. */
function addRangeEventListeners() {
	var ranges = document.querySelectorAll("input[type=range]"); 
	var i;
	for (i = 0; i < ranges.length; i++) {
        
		var range = ranges[i];
        range.parentNode.getElementsByClassName("rangeValue")[0].innerHTML = range.value;
        
		addCaptureEvent(range, "input", rangeValue);
	}
}

/* Shows the current value of the range in the corresponding span. */
function rangeValue() {
	this.parentNode.getElementsByTagName('span')[0].innerHTML = this.value;
}


/* -----------------------------------------------------------------------------
8.  Resonsiveness and media queries (see SB & modify)
----------------------------------------------------------------------------- */