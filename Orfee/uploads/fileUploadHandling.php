<?php
session_start();
require('../model/database.php');
require('../model/user_object.php');
require('../model/file_object.php');

$user = user::isLoggedIn();
if(!$user) {
    session_unset();
    session_destroy();
    header("Location: ../index.php?action=logIn");
}

$action = filter_input (INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input (INPUT_GET, 'action');
}
$userId = filter_input (INPUT_POST, 'userId');
if ($userId == NULL) {
	$userId = filter_input (INPUT_GET, 'userId');
}
$studentId = filter_input (INPUT_POST, 'studentId');
if ($studentId == NULL) {
	$studentId = filter_input (INPUT_GET, 'studentId');
}
$organisationId = filter_input (INPUT_POST, 'organisationId');
if ($organisationId == NULL) {
	$organisationId = filter_input (INPUT_GET, 'organisationId');
}
$companyId = filter_input (INPUT_POST, 'companyId');
if ($companyId == NULL) {
	$companyId = filter_input (INPUT_GET, 'companyId');
}
$skillId = filter_input (INPUT_POST, 'skillId');
if ($skillId == NULL) {
	$skillId = filter_input (INPUT_GET, 'skillId');
}
$eventId = filter_input (INPUT_POST, 'eventId');
if ($eventId == NULL) {
    $eventId = filter_input (INPUT_GET, 'eventId');
}
$senderPage = filter_input (INPUT_POST, 'senderPage');
if ($senderPage == NULL) {
    $senderPage = filter_input (INPUT_GET, 'senderPage');
}

/* $_FILES is a super global associative array variable containing the information about the uploaded files. $_FILES['userFile'] is the 'userFile' element of the $_FILES array and is in itself an associative array: Array ( [name] => Untitled.png [type] => image/png [tmp_name] => C:\xampp\tmp\php19F2.tmp [error] => 0 [size] => 178338 ). This can be a 2-dimensional array in case multiple files are uploaded in the same form. */

// define variables and set to empty values.
$err = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['userFile'])) {
	$uploadDir = './files/profilePictures/';
	$name = $user->getId() . $user->getFirstName() . $user->getLastName() . " - " . basename($_FILES['userFile']['name']);
	$uploadPath = $uploadDir . $name;
	
	// Check if filesize exceeds 524288 bytes (= 0.5M).
	if ($_FILES['userFile']['size'] > 524288) {
		$sizeErr = "file is larger than 512kB";
		$err = true;
	}
	
	// Check the file type with the mime information provided by the browser.
	$allowed = array("image/jpg","image/jpeg","image/png");
	$fileType = $_FILES['userFile']['type'];
	if (!in_array($fileType, $allowed)) {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	// Check the file type based on the extension of the file.
	$allowedExtension = array("jpg", "jpeg", "png");
	$fileExtension = pathinfo($uploadPath, PATHINFO_EXTENSION);
	if (!in_array($fileExtension, $allowedExtension)) {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	/* The function getimagesize returns file information when called on the filelocation and filename of an image. This information is returned in the form of an associative array: Array ( [0] => 1600 [1] => 900 [2] => 3 [3] => width="1600" height="900" [bits] => 8 [mime] => image/png ). */
	$check = getimagesize($_FILES["userFile"]["tmp_name"]);
	if($check !== false) {
		if (!in_array( $check["mime"], $allowed)) {
			$typeErr = "unsupported file type";
			$err = true;
		}
	} else {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	/* Conceal the filename in the upload url by hashing. */
	$uploadFile = hash('md5', $name);
	$uploadPath = $uploadDir . $uploadFile . "." . $fileExtension;
	
	if (!$err && move_uploaded_file($_FILES['userFile']['tmp_name'], $uploadPath)) {
		// Attempt to get an existing user file
		$userFile = userFile::get_imageOfUploader('user', $user->getId());
		// Attempt to get the id of the existing user file
		$test = $userFile->getId();
		// If the file exists delete it and replace it with the new one.
		if (!empty($test)) {
			/* Turn file url into array: [., uploads, files, profilePictures, userFile] . */
			$oldFile = explode ( "/", $userFile->getUrl());
			/* Remove element 1 ('uploads') out of file array: [., files, profilePictures, userFile] . */
			array_splice($oldFile, 1, 1);
			// Turn the file array into string: "./files/profilePictures/userFile" .
			$oldFile = implode("/", $oldFile);
			/* Delete the file with url "./files/profilePictures/userFile" (as it can be found from the current script). */
			unlink($oldFile);
			$userFile->setName(basename($_FILES['userFile']['name']));
			$userFile->setUrl("./uploads/files/profilePictures/" . $uploadFile . "." . $fileExtension);
			$userFile->save();
		// If an old file doesn't exist, make a new one.
		} else {
			$userFile = new userFile(NULL, basename($_FILES['userFile']['name']), 'image', "user", $user->getId(), NULL, NULL, "./uploads/files/profilePictures/" . $uploadFile . "." . $fileExtension);
			$userFile->save();
		}
		header("Location: ../index.php?action=$action&userId=$userId&studentId=$studentId&organisationId=$organisationId&skillId=$skillId&eventId=$eventId&senderPage=$senderPage");
	} else {
		unlink($_FILES['userFile']['tmp_name']);
		echo "<p>Your file could not be moved to the server. Please try to upload your picture again.</p>";
		echo "<p>The following error occured: $sizeErr, $typeErr!<p>";
	}
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['orgLogo'])) {
	$uploadDir = './files/organiserLogos/';
	$name = $organisationId . " - " . basename($_FILES['orgLogo']['name']);
	$uploadPath = $uploadDir . $name;
	
	if ($_FILES['orgLogo']['size'] > 524288) {
		$sizeErr = "file is larger than 512kB";
		$err = true;
	}
	
	$allowed = array("image/jpg","image/jpeg","image/png");
	$fileType = $_FILES['orgLogo']['type'];
	if (!in_array($fileType, $allowed)) {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	$allowedExtension = array("jpg", "jpeg", "png");
	$fileExtension = pathinfo($uploadPath, PATHINFO_EXTENSION);
	if (!in_array($fileExtension, $allowedExtension)) {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	$check = getimagesize($_FILES["orgLogo"]["tmp_name"]);
	if($check !== false) {
		if (!in_array( $check["mime"], $allowed)) {
			$typeErr = "unsupported file type";
			$err = true;
		}
	} else {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	/* Conceal the filename in the upload url by hashing. */
	$uploadFile = hash('md5', $name);
	$uploadPath = $uploadDir . $uploadFile . "." . $fileExtension;
	
	if (!$err && move_uploaded_file($_FILES['orgLogo']['tmp_name'], $uploadPath)) {
		$orgLogo = userFile::get_imageOfUploader('eventOrg', $organisationId);
		$test = $orgLogo->getId();
		if (!empty($test)) {
			$oldFile = explode ( "/", $orgLogo->getUrl());
			array_splice($oldFile, 1, 1);
			$oldFile = implode("/", $oldFile);
			unlink($oldFile);
			$orgLogo->setName(basename($_FILES['orgLogo']['name']));
			$orgLogo->setUrl("./uploads/files/organiserLogos/" . $uploadFile . "." . $fileExtension);
			$orgLogo->save();
		} else {
			$orgLogo = new userFile(NULL, basename($_FILES['orgLogo']['name']), 'image', "eventOrg", $organisationId, NULL, NULL, "./uploads/files/organiserLogos/" . $uploadFile . "." . $fileExtension);
			$orgLogo->save();
		}
		header("Location: ../index.php?action=eventOrganisation&organisationId=$organisationId");
	} else {
		unlink($_FILES['orgLogo']['tmp_name']);
		echo "<p>Your file could not be moved to the server. Please try to upload your picture again.</p>";
		echo "<p>The following error occured: $sizeErr, $typeErr!<p>";
	}
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['companyLogo'])) {
	$uploadDir = './files/companyLogos/';
	$name = $companyId . " - " . basename($_FILES['companyLogo']['name']);
	$uploadPath = $uploadDir . $name;
	
	if ($_FILES['companyLogo']['size'] > 524288) {
		$sizeErr = "file is larger than 512kB";
		$err = true;
	}
	
	$allowed = array("image/jpg","image/jpeg","image/png");
	$fileType = $_FILES['companyLogo']['type'];
	if (!in_array($fileType, $allowed)) {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	$allowedExtension = array("jpg", "jpeg", "png");
	$fileExtension = pathinfo($uploadPath, PATHINFO_EXTENSION);
	if (!in_array($fileExtension, $allowedExtension)) {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	$check = getimagesize($_FILES["companyLogo"]["tmp_name"]);
	if($check !== false) {
		if (!in_array( $check["mime"], $allowed)) {
			$typeErr = "unsupported file type";
			$err = true;
		}
	} else {
		$typeErr = "unsupported file type";
		$err = true;
	}
	
	/* Conceal the filename in the upload url by hashing. */
	$uploadFile = hash('md5', $name);
	$uploadPath = $uploadDir . $uploadFile . "." . $fileExtension;
	
	if (!$err && move_uploaded_file($_FILES['companyLogo']['tmp_name'], $uploadPath)) {
		$companyLogo = userFile::get_imageOfUploader('company', $companyId);
		$test = $companyLogo->getId();
		if (!empty($test)) {
			$oldFile = explode ( "/", $companyLogo->getUrl());
			array_splice($oldFile, 1, 1);
			$oldFile = implode("/", $oldFile);
			unlink($oldFile);
			$companyLogo->setName(basename($_FILES['companyLogo']['name']));
			$companyLogo->setUrl("./uploads/files/companyLogos/" . $uploadFile . "." . $fileExtension);
			$companyLogo->save();
		} else {
			$companyLogo = new userFile(NULL, basename($_FILES['companyLogo']['name']), 'image', "company", $companyId, NULL, NULL, "./uploads/files/companyLogos/" . $uploadFile . "." . $fileExtension);
			$companyLogo->save();
		}
		header("Location: ../index.php?action=company&companyId=$companyId");
	} else {
		unlink($_FILES['companyLogo']['tmp_name']);
		echo "<p>Your file could not be moved to the server. Please try to upload your picture again.</p>";
		echo "<p>The following error occured: $sizeErr, $typeErr!<p>";
	}
}

?>