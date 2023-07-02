<?php
	// JUST A FILE FOR DATA STORE
	class Country
	{
	    public $code;
	    public $flag;
	    public $name;
	    public $digits;
	}

	$codeOfCountries = array();

	$codeOfCountries[0] = new Country();
	$codeOfCountries[0]->code = '+1';
	$codeOfCountries[0]->flag = 'us';
	$codeOfCountries[0]->name = 'US';
	$codeOfCountries[0]->digits = 10;

	$codeOfCountries[1] = new Country();
	$codeOfCountries[1]->code = '+373';
	$codeOfCountries[1]->flag = 'md';
	$codeOfCountries[1]->name = 'Moldova';
	$codeOfCountries[1]->digits = 8;

	$codeOfCountries[2] = new Country();
	$codeOfCountries[2]->code = '+40';
	$codeOfCountries[2]->flag = 'ro';
	$codeOfCountries[2]->name = 'Romania';
	$codeOfCountries[2]->digits = 9;

	$codeOfCountries[3] = new Country();
	$codeOfCountries[3]->code = '+7';
	$codeOfCountries[3]->flag = 'ru';
	$codeOfCountries[3]->name = 'Russia';
	$codeOfCountries[3]->digits = 10;
?>