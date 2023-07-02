<?php
header("Content-type: text/html; charset=utf-8");


// get data from query
$countryCode = $_POST['countryCode'];
$countryFlag = $_POST['countryFlag'];
$phone = $_POST['numberPhone'];
$digits = $_POST['digits'];

// function for validating phone number
function validating($phone,$countryCode,$digits){

	// object of countries
	$errors = [];
	$data = new stdClass();
	$phoneLength = (strlen($phone) - strlen($countryCode) - 1);

	// get data from file data.php
	include_once 'data.php';
	$allData = $codeOfCountries;

	// autogenerate pattern to validate phone number depends by country code
	$pattern = "/[+][0-9]{1,3}[ ][0-9]{".$phoneLength."}/";
	if (!preg_match($pattern, $phone)) {
    	$errors['digits_2'] = 'Format number is incorrect.';
	}
	// if field is filled
	if (empty($phone)) {
    	$errors['phone'] = 'Number phone is required.';
	}
	if (empty($countryCode)) {
    	$errors['countryCode'] = 'Code of country is required.';
	}
	if ($digits != $phoneLength) {
		$a = array_fill(0, $digits, 'X');
    	$errors['digits'] = 'Format number is incorrect. <p> (example ) ' . $countryCode . ' ' . implode("",$a) .'</p>';
    }
    // long number
   	if ($digits < $phoneLength) {
   		$errors['digits_length'] = 'Number is too long';	
	}
	// short number
	if ($digits > $phoneLength) {
   		$errors['digits_length'] = 'Number is too short';	
	}
	// validate if code country is exist in Data Store
	foreach($allData as $_data){
		if ($_data->code == $countryCode){
			unset($errors['country']);
			break;
		}
		else $errors['country'] = 'Code of country does not exist';	
	}
	// Validation complete succesfully
	if (!empty($errors)) {
	    $data->success = false;
	    $data->errors = $errors;
	} else {
	    $data->success = true;
	    $data->message = 'Success!';
	}

	echo json_encode($data);
}

validating($phone,$countryCode,$digits);

?>