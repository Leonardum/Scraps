<?php
include_once('header.html');
?>

<body onload="addOpenSelectEventListeners(); addCloseSelectEventListeners(); addOptionSelectEventListeners();">
	
	<div id="left-sidebar" class="col-4 left-sidebar">
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" style="width: 100%;">
			
			<div class="userInput">
				<input type="text" name="location" placeholder="City, ZIP code, neighbourhood" value="<?php if (isset($location)) {echo $location;} ?>" class="<?php if (isset($locationErr)) {echo "invalid";} else if (isset($location)) {echo "valid";} ?>">
			</div>
			
			<div class="userInput">
				<div class="select-wrapper" id="selectWrapper1">
					<span class="caret">▼</span>
					<input class="selectInput" id="selectInput1" readonly="true" value="" placeholder="Choose your option" style="" type="text">
					<ul id="select1" class="dropdown-content select-dropdown" style="display: none;">
						<li class="disabled" id="option1">Choose your option</li>
						<li class="option">Pub</li>
						<li class="option">Restaurant</li>
						<li class="option">Karaoke</li>
					</ul>
					<select id="actualSelect1">
					  <option value="" disabled="" selected="">Choose your option</option>
					  <option value="pub">Pub</option>
					  <option value="restaurant">Restaurant</option>
					  <option value="karaoke">Karaoke</option>
					</select>
				</div>
			</div>
			
			<div class="userInput">
				<div class="select-wrapper" id="selectWrapper2">
					<span class="caret">▼</span>
					<input class="selectInput"  id="selectInput2" readonly="true" value="" placeholder="Choose your option" style="" type="text">
					<ul id="select2" class="dropdown-content select-dropdown" style="display: none;">
						<li class="disabled" id="option2">Choose your option</li>
						<li class="option">Bulgarian</li>
						<li class="option">Chinese</li>
						<li class="option">Italian</li>
						<li class="option">Indian</li>
					</ul>
					<select id="actualSelect2">
					  <option value="" disabled="" selected="">Choose your option</option>
						<option value="bulgarian">Bulgarian</option>
						<option value="chinese">Chinese</option>
						<option value="italian">Italian</option>
						<option value="indian">Indian</option>
					</select>
				</div>
			</div>
			
			<div class="userInput">
				<div id="slidecontainer">
					<input type="range" min="1" max="150" value="20" class="slider" id="priceRange">
					<p id="price" style="text-align: center; font-size: 20px;">Price per person: <span id="priceTag">20BGN</span></p>
				</div>
			</div>

			<input type="hidden" name="action" value="home">
			
			<input type="submit" name="submit" value="Search" style="width: 100%; height: 3rem; margin-top: 1rem;">
			
		</form>
		
	</div>
	
	<div class="col-16 middle-column">
		<div id="navigation" class="navigation">
			<h1 style="color: rgba(197, 179, 88, 1); margin: 0 0 0 10px;">We found 37 results for your search:</h1>
		</div>
		
		<div id="content" class="col-20 content">
			<div class="row mobileFlex">
				<div id="eventList" class="col-20 masonry sidebarContent" style="order:2;">
					
					
					<div class="eventBox" style="display:inline-block;">
						<a href="https://www.skillsbridger.com" target="_blank">
							<p class="name">Restaurant Feya</p>
						</a>
						<div class="col-20">
							<div class="dpPic">
								<img class="dpPic" style="inherit" src="./images/feya.png">
							</div>
						</div>
						<div id="info1">
							<div class="col-20 kitchen">
								<p style="text-transform: uppercase;">Traditional Bulgarian kitchen</p>
								<p>Price per person: 20-50 BGN</p>
							</div>
							<div class="col-20 addressBox">
								<p>ул. Гатьо Шишков 13А,<br>1407 Кръстова вада,<br>София</p>
							</div>
							<div id="sponsors1" class="col-20 sponsors">
								<p>Freya proudly serves:</p>
								<div class="inbev">
									<img src="./images/stellaArtois.png" class="inbev">
								</div>
								<div class="hoegaarden">
									<img src="./images/hoegaarden.png" class="hoegaarden">
								</div>
								<div class="inbev">
									<img src="./images/leffe.png" class="inbev">
								</div>
							</div>
							<div class="col-20 reservation" style="">
								<a href="#">
									<button class="eventbox-button" style="width:120px;">See more</button>
								</a>
								<a href="#">
									<button class="eventbox-button action" style="width:120px;">Book table</button>
								</a>
							</div>
						</div>
					</div>
					
					
					<div class="eventBox" style="display:inline-block;">
						<a href="http://www.skillsbridger.com" target="_blank">
							<p class="name">Restaurant chez moi</p>
						</a>
						<div class="col-20">
							<div class="dpPic">
								<img class="dpPic" style="inherit" src="./images/feya.png">
							</div>
						</div>
						<div id="info1">
							<div class="col-20 kitchen"><p style="text-transform: uppercase;">Traditional Bulgarian kitchen</p>
								<p>Price per person: 20-50 BGN</p>
							</div>
							<div id="address1" class="col-20 addressBox">
								<p>ул. Гатьо Шишков 13А,<br>1407 Кръстова вада,<br>София</p>
							</div>
							<div id="sponsors1" class="col-20 sponsors">
								<p>Freya proudly serves:</p>
								<div class="inbev">
									<img src="./images/stellaArtois.png" class="inbev">
								</div>
								<div class="hoegaarden">
									<img src="./images/hoegaarden.png" class="hoegaarden">
								</div>
								<div class="inbev">
									<img src="./images/leffe.png" class="inbev">
								</div>
							</div>
							<div class="col-20 reservation" style="">
								<a href="index.php?action=studentEventOverview&amp;eventId=4&amp;senderPage=learningEvents">
									<button class="eventbox-button" style="width:120px;">See more</button>
									<button class="eventbox-button" style="width:120px;">Book table</button>
								</a>
							</div>
						</div>
						<input id="eventRegion1" type="hidden" value="Brussels">
					</div>
					
					
					<div class="eventBox" style="display:inline-block;">
						<a href="http://www.skillsbridger.com" target="_blank">
							<p class="name">Restaurant Graphite</p>
						</a>
						<div class="col-20">
							<div class="dpPic">
								<img class="dpPic" style="inherit" src="./images/graphite.png">
							</div>
						</div>
						<div id="info1">
							<div class="col-20 kitchen"><p style="text-transform: uppercase;">Traditional Bulgarian kitchen</p>
								<p>Price per person: 12-35 BGN</p>
							</div>
							<div id="address1" class="col-20 addressBox">
								<p>ул. Три уши 2,<br>1000 София,<br>София</p>
							</div>
							<div id="sponsors1" class="col-20 sponsors">
								<p>Graphite proudly serves:</p>
								<div class="inbev">
									<img src="./images/stellaArtois.png" class="inbev">
								</div>
							</div>
							<div class="col-20 reservation" style="">
								<a href="index.php?action=studentEventOverview&amp;eventId=4&amp;senderPage=learningEvents">
									<button class="eventbox-button" style="width:120px;">See more</button>
									<button class="eventbox-button" style="width:120px;">Book table</button>
								</a>
							</div>
						</div>
						<input id="eventRegion1" type="hidden" value="Brussels">
					</div>
					
					
					<div class="eventBox" style="display:inline-block;">
						<a href="http://www.skillsbridger.com" target="_blank">
							<p class="name">Some name cafe</p>
						</a>
						<div class="col-20">
							<div class="dpPic">
								<img class="dpPic" style="inherit" src="./images/feya.png">
							</div>
						</div>
						<div id="info1">
							<div class="col-20 kitchen"><p style="text-transform: uppercase;">Traditional Bulgarian kitchen</p>
								<p>Price per person: 20-50 BGN</p>
							</div>
							<div id="address1" class="col-20 addressBox">
								<p>ул. Гатьо Шишков 13А,<br>1407 Кръстова вада,<br>София</p>
							</div>
							<div id="sponsors1" class="col-20 sponsors">
								<p>Freya proudly serves:</p>
								<div class="inbev">
									<img src="./images/stellaArtois.png" class="inbev">
								</div>
								<div class="hoegaarden">
									<img src="./images/hoegaarden.png" class="hoegaarden">
								</div>
								<div class="inbev">
									<img src="./images/leffe.png" class="inbev">
								</div>
							</div>
							<div class="col-20 reservation" style="">
								<a href="index.php?action=studentEventOverview&amp;eventId=4&amp;senderPage=learningEvents">
									<button class="eventbox-button" style="width:120px;">See more</button>
									<button class="eventbox-button" style="width:120px;">Book table</button>
								</a>
							</div>
						</div>
						<input id="eventRegion1" type="hidden" value="Brussels">
					</div>
					
					
					<div class="eventBox" style="display:inline-block;">
						<a href="http://www.skillsbridger.com" target="_blank">
							<p class="name">Mamma Mia Restaurant</p>
						</a>
						<div class="col-20">
							<div class="dpPic">
								<img class="dpPic" style="inherit" src="./images/mamaMia.png">
							</div>
						</div>
						<div id="info1">
							<div class="col-20 kitchen"><p style="text-transform: uppercase;">Italian</p>
								<p>Price per person: 15-40 BGN</p>
							</div>
							<div id="address1" class="col-20 addressBox">
								<p>ул. Цар Иван Шишман 39,<br>1000 София,<br>София</p>
							</div>
							<div id="sponsors1" class="col-20 sponsors">
								<p>Mamma Mia proudly serves:</p>
								<div class="inbev">
									<img src="./images/stellaArtois.png" class="inbev">
								</div>
								<div class="inbev">
									<img src="./images/leffe.png" class="inbev">
								</div>
							</div>
							<div class="col-20 reservation" style="">
								<a href="index.php?action=studentEventOverview&amp;eventId=4&amp;senderPage=learningEvents">
									<button class="eventbox-button" style="width:120px;">See more</button>
									<button class="eventbox-button" style="width:120px;">Book table</button>
								</a>
							</div>
						</div>
						<input id="eventRegion1" type="hidden" value="Brussels">
					</div>
					
					
					<div class="eventBox" style="display:inline-block;">
						<a href="http://www.skillsbridger.com" target="_blank">
							<p class="name">Ommenom place</p>
						</a>
						<div class="col-20">
							<div class="dpPic">
								<img class="dpPic" style="inherit" src="./images/feya.png">
							</div>
						</div>
						<div id="info1">
							<div class="col-20 kitchen"><p style="text-transform: uppercase;">Traditional Bulgarian kitchen</p>
								<p>Price per person: 20-50 BGN</p>
							</div>
							<div id="address1" class="col-20 addressBox">
								<p>ул. Гатьо Шишков 13А,<br>1407 Кръстова вада,<br>София</p>
							</div>
							<div id="sponsors1" class="col-20 sponsors">
								<p>Freya proudly serves:</p>
								<div class="inbev">
									<img src="./images/stellaArtois.png" class="inbev">
								</div>
								<div class="hoegaarden">
									<img src="./images/hoegaarden.png" class="hoegaarden">
								</div>
								<div class="inbev">
									<img src="./images/leffe.png" class="inbev">
								</div>
							</div>
							<div class="col-20 reservation" style="">
								<a href="index.php?action=studentEventOverview&amp;eventId=4&amp;senderPage=learningEvents">
									<button class="eventbox-button" style="width:120px;">See more</button>
									<button class="eventbox-button" style="width:120px;">Book table</button>
								</a>
							</div>
						</div>
						<input id="eventRegion1" type="hidden" value="Brussels">
					</div>
					
					
				</div>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" src="./js/home.js"></script>
	<script type="text/javascript" src="./js/main.js"></script>
	
</body>

<?php
include_once('footer.html');
?>