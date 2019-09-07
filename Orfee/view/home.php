<?php
include_once('header.html');
?>

<body onload="addOpenSelectEventListeners(); addCloseSelectEventListeners(); addOptionSelectEventListeners();">
	<a name="top"></a>
    
    
    <div id="wrapper">
        <div class="slideshow-container">
            
            <div class="slide">
                <img src="./images/piano.jpg" style="width:100%">
                <h1 class="homepageTitle">Orfee</h1>
                <h2 class="homepageSubTitle">Music to your ears</h2>
            </div>
            
            <div class="slide">
                <img src="./images/sing.jpg" style="width:100%">
                <h1 class="homepageTitle">Orfee</h1>
                <h2 class="homepageSubTitle">Always the right atmosphere</h2>
            </div>
            
            <div class="slide">
                <img src="./images/concert.jpg" style="width:100%">
                <h1 class="homepageTitle">Orfee</h1>
                <h2 class="homepageSubTitle">Order us now for your event:</h2>
            </div>
			
			<div style="position:absolute; top:35%; left:50%;">
				<div style="position:relative; left:-200px;">
                    
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="width: 400px;">
                        
                        <div class="userInput">
                            <input type="hidden" id="date" name="startDate">
                            <input type="text" id="datepicker1" class="datepicker <?php if (isset($startDateErr)) {echo "invalid";} ?>" readonly placeholder="Date">
                        </div>
						
						<div class="userInput">
							<input type="text" name="location" placeholder="City, Town, ZIP code" value="<?php if (isset($location)) {echo $location;} ?>" class="<?php if (isset($locationErr)) {echo "invalid";} else if (isset($location)) {echo "valid";} ?>">
						</div>
						
						<div class="userInput">
							<input type="text" name="email" placeholder="E-mail" value="<?php if (isset($email)) {echo $email;} ?>" class="<?php if (isset($emailErr)) {echo "invalid";} else if (isset($email)) {echo "valid";} ?>">
						</div>
						
						<div class="userInput">
							<input type="text" name="phone" placeholder="Phone number (optional)" value="<?php if (isset($phone)) {echo $phone;} ?>" class="<?php if (isset($phoneErr)) {echo "invalid";} else if (isset($phone)) {echo "valid";} ?>">
						</div>
						
						<input type="hidden" name="action" value="home">
						
						<div style="position:absolute; left:50%; padding-top: 1rem;">
							<div style="position:relative; left:-50%;">
								<input type="submit" name="submit" value="Book" style="width: 400px; height: 3rem;">
							</div>
						</div>
					</form>
				</div>
			</div>
            
            <div class="carousel-indicators">
                <div class="dot" onclick="showSlides(1)"></div>
                <div class="dot" onclick="showSlides(2)"></div>
                <div class="dot" onclick="showSlides(3)"></div>
            </div>
            
        </div>
    </div>
	
	<div class="homeContent topShadow">
		<div class="row platina">
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">Who we are</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="#top"><button class="oval">About</button></a>
					</div>
				</div>
			</div>
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">Where we've been</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="#top"><button class="oval">Gallery</button></a>
					</div>
				</div>
			</div>
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">What we play</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="#top"><button class="oval">Repertoire</button></a>
					</div>
				</div>
			</div>
			<div class="col-l3 valuePropositionBox">
				<p class="valuePropositionTitle goldText">If we are available</p>
                <p class="valuePropositionParagraph">Find out more about who we are, what we do and why we do it.</p>
                <div class="valuePropositionButtonFrame">
					<div class="valuePropositionButton">
						<a href="index.php?action=calendar"><button class="oval">Calendar</button></a>
					</div>
				</div>
			</div>
		</div>
				
		<div class="row">
			<div class="col-l12 footer">
				<p>
					<a class="textLink" href="index.php?action=terms" target="_blank">Terms of service & Privacy Policy</a>
					<a class="textLink" href="index.php?action=contact" target="_blank">Contact us</a>
				</p>
				<p>All rights reserved © 2018 Orfee</p>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="./js/main.js"></script>
	<script type="text/javascript" src="./js/home.js?v01"></script>
	
</body>

<script>
	$(function() {
		$( ".datepicker" ).datepicker();
		
		// Sets the chosen date format to something like 16 June 2016.
		$( ".datepicker" ).datepicker( "option", "dateFormat", "dd MM yy" );
		
		// Sets the first day to 1 (Sunday is the default setting).
		$( ".datepicker" ).datepicker( "option", "firstDay", 1 );
		
		// Sets the number of months displayed for selection.
		$( ".datepicker" ).datepicker( "option", "numberOfMonths", 2 );
		
		// Store today's date and set it as minimum for the event start date.
		var today = new Date();
		$( "#datepicker1" ).datepicker("option","minDate", today);
		
		// Put the selected date into the altField.
		$( "#datepicker1" ).datepicker( "option", "altField", "#startDate" );
		
		// Make sure the altField contains the right date format.
		$( "#datepicker1" ).datepicker( "option", "altFormat", "yy-mm-dd" );
		
		/* Set the start date as minimum date for the end date and as maximum date for the subscription date. */
		$( "#datepicker1" ).datepicker( "option", "onSelect", function(selected){$("#datepicker2").datepicker("option","minDate", selected); $("#datepicker3").datepicker("option","maxDate", selected);} );
		
		// Put the selected date into the altField.
		$( "#datepicker2" ).datepicker( "option", "altField", "#endDate" );
		
		// Make sure the altField contains the right date format.
		$( "#datepicker2" ).datepicker( "option", "altFormat", "yy-mm-dd" );
		
		// Put the selected date into the altField.
		$( "#datepicker3" ).datepicker( "option", "altField", "#subDeadline" );
		
		// Make sure the altField contains the right date format.
		$( "#datepicker3" ).datepicker( "option", "altFormat", "yy-mm-dd" );
		
		// Set today's date as minimum for the event subscription deadline.
		$( "#datepicker3" ).datepicker("option","minDate", today);
	});
</script>


<?php
include_once('footer.html');
?>