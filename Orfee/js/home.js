var slideIndex = 0;
var loopSlides;

showSlides();

function showSlides(slideCount) {
    
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].className = "slide";
    }
    
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    
    if (slideCount === undefined) {
        slideIndex++;
    } else {
        slideIndex = slideCount;
        clearTimeout(loopSlides);
    }
    
    if (slideIndex > slides.length) {slideIndex = 1}
    
    slides[slideIndex-1].className += " appear";
    // Alternative to add a fde-in effect to the slides:
    // slides[slideIndex-1].className += " fade-in";
    dots[slideIndex-1].className += " active";
    
    loopSlides = setTimeout(showSlides, 5000); // Change image every 5 seconds...however, this means that this will be eecuted, even if it is already changed by a click on the indicators...so this should be aborted.
}

/* Alternative code to really make the slide-show into a carrousel:

var slideIndex = 1;
var loopSlides;
var i;

showSlides("start");

function showSlides(x) {

    var slides = document.getElementsByClassName("slide");
    var dots = document.getElementsByClassName("dot");
    
    if (x === "start") {
        
        slides[slideIndex-1].className += " start";
        dots[slideIndex-1].className += " active";
        
    } else if (x == undefined) {
        
        for (i = 0; i < slides.length; i++) {
            slides[i].className = "slide"; 
        }
        
        slides[slideIndex-1].className += " previous";
        slides[slideIndex-1].style.display = "";
        
        if (slideIndex < slides.length) {
            slides[slideIndex].className += " next";
            
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[slideIndex].className += " active";
        } else {
            slides[0].className += " next";
            
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            dots[0].className += " active";
        }
        
        slideIndex++;
        
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }
        
    } else {
        clearTimeout(loopSlides);
        
        for (i = 0; i < slides.length; i++) {
            slides[i].className = "slide";
        }
        
        slides[slideIndex-1].className += " previous";
        slides[x-1].className += " next";
        
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        dots[x-1].className += " active";
        
        slideIndex = x;
    }
    
    loopSlides = setTimeout(showSlides, 5000);
}

*/