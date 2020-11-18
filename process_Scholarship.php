<!-- Example form handler for Chapter Four -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Scholarship Form</title>
</head>
<body>
	<h2> Hello </h2>
	<?php
		
		// Definition of the displayRequired function
		function displayRequired($fieldName){
			echo "The field \"$fieldName\" is required. <br/>";
		}

		// Definition of the validateInput function
		function validateInput($data, $fieldName) {
			global $errorCount;
			if(empty($data)){
				displayRequired($fieldName);
				++$errorCount;
				$retval = "";
			}
			else {
				// Only clean up the input if the data is not empty

				$retval = trim($data);
				$retval = stripslashes($retval);
			}
			// Return whatever version of $retval we have
			return $retval;
		}

		// Definition of the redisplayForm function
		function redisplayForm($firstName, $lastName){
			?>
		<h2 style = 'text-align: center; color: red;'> Scholarship Form </h2>
		<form name="scholarship" action="process_Scholarship.php" method="post">
		
		<p> <label for="fName"> First Name:  </label>
		<input type="text" name="fName" value = "<?php echo $firstName; ?>" /> </p>

		<p> <label for="lName"> Last Name:</label>
		<input type="text" name="lName" value="<?php echo $lastName; ?>"> </p>

		<p> <input type="reset" name="Clear Form"/> &nbsp;&nbsp; <input type="submit" name="Submit" value="Send Form" /> </p>

	</form>
	<?php
		}

		$errorCount = 0;
		$firstName = validateInput($_POST["fName"], "First Name");
		$lastName = validateInput($_POST["lName"], "Last Name");

		if($errorCount > 0){
			echo "Please use the \"Back\" button to re-enter the data. <br/>";
			redisplayForm($firstName, $lastName);
		}
		else {
			 echo "Thank you for filling out the scholarship form, $firstName $lastName.";
		}
	?>
</body>
</html>