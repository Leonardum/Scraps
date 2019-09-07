/* Create array with the month names for easier conversion between date objects and text. */
const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

/* Create array with the day names for easier conversion between date objects and text. */
const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];

var d = new Date(); // Get the current date & time
var currentShownMonth = d.getMonth();
var currentShownYear = d.getFullYear();


/* The variable x stands for the left-margin of the element of the first day. This depends on what day of the week the first day of the month is. The later the day of the week, the more margin there should be. The number 14.2857142857 = 100% width / 7. */
var x = 0;

function getMarginForStartingDay(a) {
    switch (a) {
        case 0:
            x = 6 * 14.2857142857;
            break;
        case 1:
            x = 0;
            break;
        case 2:
            x = 14.2857142857;
            break;
        case 3:
            x = 2 * 14.2857142857;
            break;
        case 4:
            x = 3 * 14.2857142857;
            break;
        case 5:
            x = 4 * 14.2857142857;
            break;
        case 6:
            x = 5 * 14.2857142857;
    }
}


/* The following function loads the calendar when the page loads based on the current date and time. */
function calendar() {
    
    /* Display the current month. */
    document.getElementById("monthName").innerHTML = monthNames[d.getMonth()];
    
    /* Display the current year. */
    document.getElementById("year").innerHTML = d.getFullYear();
    
    /* Set e to be the date object of the first day of this month. */
    var e = new Date(d.getFullYear(),d.getMonth(),1);
    
    getMarginForStartingDay(e.getDay());
    
    /* Get the amount of days in the current month. Since the date object in JavaScript counts the days of the month starting from 1 and not from 0 (as is normally the case for arrays), day 0 is actually the last day of the previous month. So to get the amount of days in the current month, you should get day zero of the next month. */
    e = new Date(d.getFullYear(), d.getMonth() + 1, 0);
    var amountOfDays = e.getDate();
    
    for (i = 0; i < amountOfDays; i++) {
        var newDay = document.createElement("div");
        newDay.setAttribute("class", "day");
        newDay.innerHTML = i + 1;
        
        if (i == 0) {
            newDay.setAttribute("style", "margin-left:" + x + "%;");
        }
        
        if (i == d.getDate() - 1) {
            newDay.className += " active";
        }
        
        var days = document.getElementById("days");
        days.appendChild(newDay);
    }
}


function prevNext(a) {
    if (a === "previous") {
        if (currentShownMonth == 0) {
            currentShownYear -= 1;
            currentShownMonth = 11;
        } else {
            currentShownMonth -= 1;
        }
    } else if (a === "next") {
        if (currentShownMonth == 11) {
            currentShownYear += 1;
            currentShownMonth = 0;
        } else {
            currentShownMonth += 1;
        }
    }
    
    var e = new Date(currentShownYear, currentShownMonth, 1);
    
    /* Display the month. */
    document.getElementById("monthName").innerHTML = monthNames[e.getMonth()];
    
    /* Display the year. */
    document.getElementById("year").innerHTML = e.getFullYear();
    
    getMarginForStartingDay(e.getDay());
    
    e = new Date(currentShownYear, currentShownMonth + 1, 0);
    var amountOfDays = e.getDate();
    
    
    var days = document.getElementById("days");
    while (days.firstChild) {
        days.removeChild(days.firstChild);
    }
    
    for (i = 0; i < amountOfDays; i++) {
        var newDay = document.createElement("div");
        newDay.setAttribute("class", "day");
        newDay.innerHTML = i + 1;
        
        if (i == 0) {
            newDay.setAttribute("style", "margin-left:" + x + "%;");
        }
        
        if (d.getMonth() == e.getMonth() && d.getFullYear() == e.getFullYear() && i == d.getDate() - 1) {
            newDay.className += " active";
        }
        
        days.appendChild(newDay);
    }
}


function changeMonth() {

}