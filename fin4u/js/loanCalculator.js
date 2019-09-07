const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var currentDay = new Date();
var currentMonth = currentDay.getMonth();
var currentYear = currentDay.getFullYear(); //returns a number


var startMonth = document.getElementById("startMonth");
startMonth.placeholder = monthNames[currentMonth];

var startYear = document.getElementById("startYear");
startYear.placeholder = currentYear;


function calcMonthlyPayments() {
    var i;
    
    var l = document.getElementById("totalPrice").value;
    l = l.replace(/,/g, '.'); //replace any comma with a period.
    l = parseFloat(l);
    
    var p = document.getElementById("principal").value;
    p = p.replace(/,/g, '.'); //replace any comma with a period.
    p = parseFloat(p);
    
    var t = parseInt(document.getElementById("term").value);
    var f = document.getElementById("termType").value;
    
    switch (f) {
        case "":
            break;
        case "Years":
            break;
        case "Months":
            t = t / 12;
            break;
    }
    
    if (startMonth.value == "") {
        var month = currentMonth;
    } else {
        var month = parseInt(startMonth.parentNode.getElementsByTagName('select')[0].value);
    }

    if (startYear.value == "") {
        var year = currentYear;
    } else {
        var year = parseFloat(startYear.value);
    }
    
    var r = document.getElementById("interest").value;
    r = r.replace(/,/g, '.'); //replace any comma with a period.
    r = parseFloat(r);
    r = r/100;
    
    var compoundTypes = document.getElementsByName("compoundType");
    
    for (i = 0; i < compoundTypes.length; i++) {
        if (compoundTypes[i].checked == true) {
            var compoundType = compoundTypes[i].value;
        }
    }
    
    var x;
    var y = 0;
    
    if (compoundType == "continuous") {
        
        var e = 2.71828182845904; // number of Euler
        
        for (i = 1; i < ((t * 12) + 1); i++) {
            
            // the operator for "to the power of" is **
            x = e ** (r * (t - i/ 12));
            
            y = y + x;
            
        }
        
        x = p * e ** (r * t);
        
        x = x/y;
        
    } else if (compoundType == "monthly") {
        
        for (i = 1; i < ((t * 12) + 1); i++) {
            
            x = (1 + r/ 12) ** (t * 12 - i);
            
            y = y + x;
            
        }
        
        x = p * (1 + r/ 12) ** (t * 12);
        
        x = x/y;
        
    } else if (compoundType == "yearly") {
        
        for (i = 1; i < ((t * 12) + 1); i++) {
            
            x = (1 + r) ** (t - i/12);
            
            y = y + x;
            
        }
        
        x = p * (1 + r) ** (t);
        
        x = x/y;
    }
    
    
    var j = document.getElementById("tax").value;
    j = j.replace(/,/g, '.');
    
    if (document.getElementById("taxPercent").checked) {
        j = l * parseFloat(j)/100;
    } else {
        j = parseFloat(j);
    }
    
    
    var n = document.getElementById("insurance").value;
    n = n.replace(/,/g, '.');
    
    if (document.getElementById("insurancePercent").checked) {
        n = l * parseFloat(n)/100;
    } else {
        n = parseFloat(n);
    }
    
    var v = document.getElementById("other").value;
    v = v.replace(/,/g, '.');
    v = parseFloat(v);
    
    
    var o = document.getElementById("rent").value;
    if (o != "") {
        o = o.replace(/,/g, '.'); //replace any comma with a period.
        o = parseFloat(o);
    }
    
    
    
    /* Show the monthly costs. */
    var a = document.getElementById("monthlyDebt");
    a.innerHTML = Math.round(x * 100) / 100;
    
    a = document.getElementById("monthlyTax");
    a.innerHTML = formatNumber(j/12);
    
    a = document.getElementById("monthlyInsurance");
    a.innerHTML = formatNumber(n/12);
    
    a = document.getElementById("otherMonthlyCost");
    a.innerHTML = formatNumber(v);
    
    a = document.getElementById("monthlyCosts");
    a.innerHTML = formatNumber(x + j/12 + n/12 + v);
    
    
    /* Show the annual costs. */
    a = document.getElementById("annualDebt");
    a.innerHTML = formatNumber(x*12);
    
    a = document.getElementById("annualTax");
    a.innerHTML = formatNumber(j);
    
    a = document.getElementById("annualInsurance");
    a.innerHTML = formatNumber(n);
    
    a = document.getElementById("otherAnnualCost");
    a.innerHTML = formatNumber(v * 12);
    
    a = document.getElementById("annualcosts");
    a.innerHTML = formatNumber(x * 12 + j + n + v * 12);
    
    
    /* Show the profits, if applicable. */
    if (o != "") {
        a = document.getElementById("monthlyProfit");
        a.innerHTML = formatNumber(o -(x + j/12 + n/12 + v));

        a = document.getElementById("annualProfit");
        a.innerHTML = formatNumber(o * 12 -(x * 12 + j + n + v * 12));
        
        a = document.getElementById("profitOverview");
        a.style.display = "block";
    }
    
    
    /* Show the annual costs. */
    a = document.getElementById("total");
    var z = Math.round(x * t * 12);
    a.innerHTML = formatNumber(z);
    
    a = document.getElementById("totalInterest");
    a.innerHTML = formatNumber(z-p);
    
    a = document.getElementById("payoffDate");
    a.innerHTML = monthNames[(month + t * 12)%12 -1] + " " + String(Math.round(year + t));
    
    
    
    
    var k = document.getElementById("amortizationTable");
    var q = p; // To calculate the evolving principal as paybacks happen.
    var s = r; // To calculate the converted interest rates if needed.
    var u;
    
    if (compoundType == "continuous") {
        s = (e ** (r/12) - 1) * 12 ;
    } else if (compoundType == "monthly") {
        s = r;
    } else if (compoundType == "yearly") {
        s = ((1+r) ** (1/12) - 1) * 12;
    }
    
    while (k.childNodes.length > 2) {
        k.removeChild(k.lastChild);
    }
    
    for (i = 1; i < ((t * 12 * 5) + 1); i++) {
        var h = document.createElement("div");
        h.setAttribute("class","col-lfive col-mfive col-sfive center customCell");
        
        var m;
        
        if (i % 5 == 1) {
            
            // Create a row element to place the "table" divs in and
            m = document.createElement("div");
            
            /* Make sure that every second row has a different background color. Since we are already only looking at i % 4 = 1, we can easily determine the start of every second row as being where i % 8 = 5. E.g.: if i = 13, then 13 % 4 = 1 and 13 % 8 = 5. */
            if (i % 10 == 6) {
                m.setAttribute("class","row silver");
            } else {
                m.setAttribute("class","row");
            }
            
            if (month == 12)  {
                month = 0;
                year += 1;
            }
            
            /* Add a bottom border to the final row of each year. Since we are already only looking at i % 4 = 1, we can easily determine the start of every twelfth div as i % 48 = 45. E.g.: if i = 93, then 93 % 4 = 1 and 93 % 48 = 45. */
            if (month == 11 && i != (t * 12 * 5) - 4) {
                m.setAttribute("style","border-bottom: 2px solid rgba(197, 179, 88, 1);");
            }
            
            
            if (i == 1 || month == 0) {
                h.innerHTML = monthNames[month] + " (" + year + ")";
            } else {
                h.innerHTML = monthNames[month];
            }
            
            month += 1;
            m.append(h);
            
        } else if (i % 5 == 2) {
            
            h.innerHTML = String(Math.round(q * s / 12));
            
            m.append(h);
            
        } else if (i % 5 == 3) {
            
            u = (x - (q * s / 12));
            h.innerHTML = String(Math.round(u));
            
            m.append(h);
            
        } else if (i % 5 == 4) {
            
            q = q - u;
            h.innerHTML = String(Math.round(q));
            
            m.append(h);
            
        } else if (i % 5 == 0) {
            if (i == t * 12 * 5) {
                h.innerHTML = "100 %";
            } else {
                h.innerHTML = formatNumber(100*(l - q) / l) + " %";
            }
            
            m.append(h);
            k.append(m);
        }
    }
    
    var showButton = document.getElementById("amortizationButton");
    if (showButton == null) {
        showButton = document.createElement("button");
        showButton.setAttribute("class","center");
        showButton.setAttribute("id","amortizationButton");
        showButton.setAttribute("onclick","showAmortization();");
        showButton.setAttribute("style","display: block; margin:auto;");
        showButton.innerHTML = "Show amortization table";
        
        document.getElementById("showTableButton").append(showButton);
    }
}


function showAmortization() {
    var a = document.getElementById("amortizationTable");
    if (a.style.display === "none") {
        a.style.display = "block";
        document.getElementById("amortizationButton").innerHTML = "Hide amortization table";
        goTo('amortizationTable');
    } else {
        a.style.display = "none";
        document.getElementById("amortizationButton").innerHTML = "Show amortization table";
    }
}