<?php
session_start();
include_once('header.html');

/*
$user = user::isLoggedIn();
if (!$user || $user->getId() === NULL) {
    session_unset();
    session_destroy();
    header("Location: index.php?action=logIn");
}
*/

// Define the error variable and set to empty.
$err = "";

/* check whether the form has been submitted using the POST method. */
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$name = cleanInput($_POST['name']);
	if (isset($_POST['type'])) {
		$type = cleanInput($_POST['type']);
	}
	if (isset($_POST['kitchen'])) {
		$kitchen = cleanInput($_POST['kitchen']);
	}
	$description = cleanInput($_POST['description']);
	$website = cleanInput($_POST['website']);
	if (isset($_POST['vegetarian'])) {
		$vegetarian = 1;
	} else {
		$vegetarian = 0;
	}
	if (isset($_POST['vegan'])) {
		$vegan = 1;
	} else {
		$vegan = 0;
	}
	if (isset($_POST['liveEntertainment'])) {
		$liveEntertainment = 1;
	} else {
		$liveEntertainment = 0;
	}
	if (isset($_POST['parking'])) {
		$parking = 1;
	} else {
		$parking = 0;
	}
	$street = cleanInput($_POST['street']);
	(int) $number = cleanInput($_POST['number']);
	(int) $zip = cleanInput($_POST['zip']);
	$city = cleanInput($_POST['city']);
	if (isset($_POST['province'])) {
		$province = cleanInput($_POST['province']);
	}
	
	
	if (empty($name)) {
		$name = NULL;
		$nameErr = "Please, provide a name for your establishment.";
		$err = true;
	}
	if (empty($type)) {
		$typeErr = "Please, select what type of establishment you are running.";
		$err = true;
	}
	if (empty($kitchen)) {
		$kitchenErr = "Please, select what kitchen your are mainly serving in your establishment.";
		$err = true;
	}
	if (empty($description)) {
		$description = NULL;
		$descriptionErr = "Please, describe what makes your establishment unique .";
		$err = true;
	}
	// Check if the description is not longer than 270 characters.
	if (strlen($description) > 270) {
		$descriptionErr = "This description exceeds the maximum of 270 characters! Kindly shorten it.";
		$err = true;
	}
	if (empty($website)) {
		$website = NULL;
	}
	if (empty($street)) {
		$streetErr = "Please, fill in the street name.";
		$err = true;
	}
	if (empty($number)) {
		$numberErr = "Please, fill in the street number.";
		$err = true;
	}
	if (empty($zip)) {
		$zipErr = "Please, fill in the zip code.";
		$err = true;
	}
	if (empty($city)) {
		$cityErr = "Please, fill in the city name.";
		$err = true;
	}
	if (empty($province)) {
		$provinceErr = "Please, select a province.";
		$err = true;
	}
}

if (isset($_POST["submit"]) && !$err) {
	
	$address = new address(NULL, NULL, $street, $number, $zip, $city, $province, NULL, "Bulgaria");
	$existingAddresses = $address->compare_address();
	if ($existingAddresses[0] == 1) {
		$addressId = $existingAddresses[1];
	} else {
		$addressId = $address->save();
	}
	
	$establishment = new establishment(NULL, $name, $type, $kitchen, $description, $website, $vegetarian, $vegan, $liveEntertainment, $parking, $addressId);
	
	/*
	$_SESSION['establishment'] = serialize($establishment); */
	
	$establishment->save();
	
	/*
	header("Location: index.php?action=home"); */
}

?>

<body onload="addOpenSelectEventListeners(); addCloseSelectEventListeners(); addOptionSelectEventListeners(); addCheckBoxEventListeners()">
	
	<div style="position:absolute; left:50%; padding-top: 1rem;">
		<div style="position:relative; left:-50%;">
			
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				
				<div class="userInput">
					<input type="text" name="name" placeholder="Establisment name" value="<?php if (isset($name)) {echo $name;} ?>" class="<?php if (isset($nameErr)) {echo "invalid";} else if (isset($name)) {echo "valid";} ?>">
				</div>
				
				<div class="userInput">
					<div class="select-wrapper" id="selectWrapper1">
						<span class="caret">▼</span>
						<input class="selectInput <?php if (isset($typeErr)) {echo "invalid";} ?>" id="selectInput1" readonly="true" value="" placeholder="Select the type of your establishment" style="" type="text">
						<ul id="select1" class="dropdown-content select-dropdown" style="display: none;">
							<li class="disabled" id="option1">Choose your option</li>
							<li class="option">Pub</li>
							<li class="option">Restaurant</li>
							<li class="option">Karaoke</li>
						</ul>
						<select id="actualSelect1" name="type">
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
						<input class="selectInput <?php if (isset($kitchenErr)) {echo "invalid";} ?>"  id="selectInput2" readonly="true" value="" placeholder="Select what kitchen your establishment serves" style="" type="text">
						<ul id="select2" class="dropdown-content select-dropdown" style="display: none;">
							<li class="disabled" id="option2">Choose your option</li>
							<li class="option">Bulgarian</li>
							<li class="option">Chinese</li>
							<li class="option">Italian</li>
							<li class="option">Indian</li>
						</ul>
						<select id="actualSelect2" name="kitchen">
						  <option value="" disabled="" selected="">Choose your option</option>
							<option value="bulgarian">Bulgarian</option>
							<option value="chinese">Chinese</option>
							<option value="italian">Italian</option>
							<option value="indian">Indian</option>
						</select>
					</div>
				</div>
				
				<div class="userInput">
					<textarea id="description" name="description" placeholder="Give a brief description of the establishment you are running" rows="9" maxlength="270" class="<?php if (isset($descriptionErr)) {echo "invalid";} else if (isset($description)) {echo "valid";} ?>" onkeyup="countdown('description', 270, 'charsLeft')"><?php if (isset($description)) {echo $description;} ?></textarea>
					<br>
					<span id="charsLeft" class="charCountDown">Characters left: 270</span>
				</div>
				
				<div class="userInput">
					<input type="url" name="website" placeholder="website" value="<?php if (isset($webpage)) {echo $webpage;} ?>">
				</div>
				
				<div class="userInput">
					<div class="checkboxWrapper">
						<input type="checkbox" name="vegetarian" value="true" <?php if(isset($vegetarian) && $vegetarian === 1) {echo "checked";} ?>>
						<span class="checkboxText">We offer vegetarian dishes</span>
					</div>
					<div class="checkboxWrapper">
						<input type="checkbox" name="vegan" value="true" <?php if(isset($vegan) && $vegan === 1) {echo "checked";} ?>>
						<span class="checkboxText">We offer vegan dishes</span>
					</div>
					<div class="checkboxWrapper">
						<input type="checkbox" name="liveEntertainment" value="true" <?php if(isset($liveEntertainment) && $liveEntertainment === 1) {echo "checked";} ?>>
						<span id="hello" class="checkboxText">We offer live entertainment</span>
					</div>
					<div class="checkboxWrapper">
						<input type="checkbox" name="parking" value="true" <?php if(isset($parking) && $parking === 1) {echo "checked";} ?>>
						<span class="checkboxText">We offer parking spots exclusively for our customers</span>
					</div>
				</div>
				
				
				<div class="userInput">
					<input type="text" name="street" placeholder="Street name" value="<?php if (isset($street)) {echo $street;} ?>" class="<?php if (isset($streetErr)) {echo "invalid";} else if (isset($street)) {echo "valid";} ?>">
					<!--
					<span class="error"> * <?php if (isset($streetErr)) {echo $streetErr;} ?></span>
					-->
				</div>
				
				<div class="userInput">
					<input type="text" name="number" placeholder="Street number" value="<?php if (isset($number)) {echo $number;} ?>" class="<?php if (isset($numberErr)) {echo "invalid";} else if (isset($number)) {echo "valid";} ?>">
				</div>
				
				<div class="userInput">
					<input type="text" name="zip" placeholder="zip" value="<?php if (isset($zip)) {echo $zip;} ?>" class="<?php if (isset($zipErr)) {echo "invalid";} else if (isset($zip)) {echo "valid";} ?>">
				</div>
				
				<div class="userInput">
					<input type="text" name="city" placeholder="city" value="<?php if (isset($city)) {echo $city;} ?>" class="<?php if (isset($cityErr)) {echo "invalid";} else if (isset($city)) {echo "valid";} ?>">
				</div>
				
				<div class="userInput">
					<div class="select-wrapper" id="selectWrapper3">
						<span class="caret">▼</span>
						<input class="selectInput <?php if (isset($provinceErr)) {echo "invalid";} ?>"  id="selectInput3" readonly="true" value="" placeholder="Select a provice" style="" type="text">
						<ul id="select3" class="dropdown-content select-dropdown" style="display: none;">
							<li class="disabled" id="option3">Choose your option</li>
							<li class="option">Antwerpen</li>
							<li class="option">Brabant Wallon</li>
							<li class="option">Brussels</li>
							<li class="option">Hainaut</li>
							<li class="option">Liège</li>
							<li class="option">Limburg</li>
							<li class="option">Luxembourg</li>
							<li class="option">Namur</li>
							<li class="option">Oost-Vlaanderen</li>
							<li class="option">Vlaams-Brabant</li>
							<li class="option">West-Vlaanderen</li>
						</ul>
						<select id="actualSelect3" name="province">
							<option selected disabled hidden value=""></option>
							<option value="Antwerpen">Antwerpen</option>
							<option value="Brabant wallon">Brabant wallon</option>
							<option value="Brussels">Brussels</option>
							<option value="Hainaut">Hainaut</option>
							<option value="Liège">Liège</option>
							<option value="Limburg">Limburg</option>
							<option value="Luxembourg">Luxembourg</option>
							<option value="Namur">Namur</option>
							<option value="Oost-Vlaanderen">Oost-Vlaanderen</option>
							<option value="Vlaams-Brabant">Vlaams-Brabant</option>
							<option value="West-Vlaanderen">West-Vlaanderen</option>
						</select>
					</div>
				</div>
				
				<input type="hidden" name="action" value="admin">
				
				<div class="userInput">
					<input type="submit" name="submit" value="Add establishment" style="width: 400px; height: 3rem;">
				</div>
				
			</form>
			
		</div>
	</div>
	
</body>

<script type="text/javascript" src="./js/admin.js"></script>
<script type="text/javascript" src="./js/main.js?v49"></script>

<?php
include_once('footer.html');
?>