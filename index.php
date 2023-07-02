<?php
	// get data from file data.php
	include_once 'assets/data.php';
	$allData = $codeOfCountries;
?>
<?php header('Content-Type: text/html; charset=utf-8');?>
<!DOCTYPE html>
<html>
  <head>
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/flags.css">
    <script src="js/jquery-1.6.1.min.js"></script>
    <script src="js/pageScript.js"></script>
  </head>
  <body>
  	<div class="container">
  	    <p style="display:flex;justify-content:center"><a href="demo-phone-validator.zip">Download ZIP file</a></p>
  		<h3 class="infoText">Hello, I'm a number phone validator based on ajax request</h3>
  		<form id="formNumPhone" action="functions.php" method="POST">
	  		<div class="formWrapper">
			    <div class="inputWrapper">
			    	<div class="dropdown_menu">
			    		<div class="dropdown_items">
			    			<span data-code="" data-country-flag="" data-format="" class="flag flag-doesnt-exist"></span>
			    			<svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M8.122 24l-4.122-4 8-8-8-8 4.122-4 11.878 12z"/></svg>
			    			<ul>
			    				<?php 
			    					//get a code country from phone number
							  		foreach ($allData as $data){
							  			echo '<li>
											  	<a data-code="'.$data->code.'" data-country-flag="'.$data->flag.'" data-format="'.$data->digits.'" href="#home">
											  		<span class="flag flag-'.$data->flag.' flag-mini"></span>
											  		<p class="country">( '.$data->code.' ) '.$data->name.'</p>
											  	</a>
										  	</li>';
							  		}
							  	?>
							</ul>
			    		</div>
			    	</div>
			    	<div class="inputBlock">
			    		<label for="numPhone">Phone number</label>
			    		<input id="numPhone" name="numPhone" type="tel" maxlength="" placeholder="+373 ********" required="" autocomplete="off">
			    		<ul class="res"></ul>
			    	</div>
			    	<input type="submit" class="btn btn-next" value="Next">
			    </div>
			</div>
		</form>
  	</div>
  </body>
</html>