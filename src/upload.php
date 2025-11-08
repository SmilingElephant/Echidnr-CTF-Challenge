<!DOCTYPE html>
<html>
<head>
<title>
Echidnr - file upload
</title>
</head>
<body>

<?php
//Declare constants
define("MAX_FILESIZE",2000000); //Size of a megabyte in bytes

//Set up upload path
$uploadDir = "images/";
$uploadFile = $uploadDir . basename($_FILES["uploadFile"]["name"]);

//Init success variable
$uploadPermitted = false;

//Get the file's extension
$fileType = strtolower(pathinfo($uploadFile,PATHINFO_EXTENSION));

// --- File Validation ---
//Check for submission
if(isset($_POST["Submit"])) {

	//Check the file exists and was uploaded successfully
	if (isset($_FILES["uploadFile"]) && $_FILES["uploadFile"]["error"] == 0) {
		echo "File " . htmlspecialchars(basename($_FILES["uploadFile"]["name"])) . " ingested successfully.<br>";
		
		//Check file extension
		if($fileType == "jpg" or $fileType == "png" or $fileType == "jpeg" or $fileType == "gif") {
		echo "File type " . $fileType . " is valid.<br>";

			//Check image size
			$imgSize = getimagesize($_FILES["uploadFile"]["tmp_name"]);
			//Need to check both mime type and size to validate - see https://www.php.net/manual/en/function.getimagesize.php
			$contentType = mime_content_type($_FILES["uploadFile"]["tmp_name"]);

			if($imgSize !== false and substr($contentType,0,5) == "image") {
				echo "Image verified - " . $imgSize["mime"] . ".<br>";

				//Check whether this file already exists
				if(!file_exists($uploadFile)) {
					echo "File is new - accepted.<br>";

					//Check file size
					if ($_FILES["uploadFile"]["size"] < MAX_FILESIZE) {
						echo "File size is acceptable.<br>";

							//All checks passed, flag the upload as permitted
							$uploadPermitted = true;

					//Size else
					} else {
						echo "File is too large - images must be " . MAX_FILESIZE . " bytes or less.<br>";
					}

				//Existing file else
				} else {
					echo "File already exists!<br>";
				}

			//Size and mime type else
			} else {
				echo "File is not a valid image. Please upload an image.<br>";
			}

		//Extension else
		} else {
			echo "File type " . $fileType . " is invalid. Files must be jpg, png, jpeg or gif.<br>";
		}

	//Upload success else
	} else {
		echo "No file selected or file was not uploaded successfully. Please try again with a valid image.<br>";
	}
}
// --- End File Validation ---

//If the file is valid, attempt to complete the upload
if ($uploadPermitted) {
	if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $uploadFile)) {
		//Success
		echo htmlspecialchars(basename($_FILES["uploadFile"]["name"])). " has been uploaded succesfully!<br>";
	} else {
		//Failure
		echo "Error uploading file - contact tech support.<br>";
	}
}

//Navigation links
echo "<a href='/'>Go back<br></a>";
echo "<a href='/images/'>View uploaded images<br></a>";

?>
</body>
</html>
