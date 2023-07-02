 $(document).ready(function(){

	// Open dropdown menu on click
	$(".dropdown_items").click(function () {
   		$(this).toggleClass("active");
	});

	// Choose flag on click
	$(".dropdown_items ul li a").click(function () {
		let countryCode = $(this).attr('data-code');
		let countryFlag = $(this).attr('data-country-flag');
		let digits = $(this).attr('data-format');
		$("#numPhone").attr('maxlength',parseInt(countryCode.replace('+','').length) + parseInt(digits) + 2);
		$(".dropdown_items .flag:first").remove();
		$(".dropdown_items").prepend(`<span data-code='${countryCode}' data-country-flag='${countryFlag}' data-format='${digits}' class='flag flag-${countryFlag}'></span>`);
		$("#numPhone").val(`${countryCode} `);
	});

	// Select country from array
	$("#numPhone").keyup(function(){
		let numPhone = $(this).val();
		let codeOfCountries = $.makeArray($('.dropdown_items ul li a'));
		let codeLength = numPhone.length;

		// Get a code country from phone number
		for (let x = 4; x >= 2;x--)  {
		  for (let value of codeOfCountries) {
		    if (numPhone.substring(0, x) == $(value).attr('data-code') && $(value).attr('data-code').length === codeLength) {
				let countryCode = $(value).attr('data-code');
				let countryFlag = $(value).attr('data-country-flag');
				let digits = $(value).attr('data-format');
			    $("#numPhone").val(`${countryCode} `);
			    $("#numPhone").attr('maxlength',parseInt(countryCode.replace('+','').length) + parseInt(digits) + 2);
			    $(".dropdown_items .flag:first").remove();
				$(".dropdown_items").prepend(`<span data-code='${countryCode}' data-country-flag='${countryFlag}' data-format='${digits}' class='flag flag-${countryFlag}'></span>`);
			    break;
		    }
		  }
		}
	});

	// Submit data to server 
	$("#formNumPhone").submit(function (event) {

		// preparing data for server side PHP
	    const formData = {
	      countryCode: $(".dropdown_items span").attr('data-code'),
	      countryFlag: $(".dropdown_items span").attr('data-country-flag'),
	      numberPhone: $("#numPhone").val(),
	      digits: $(".dropdown_items span").attr('data-format')
	    };

	    // send data to server
		$.ajax({
			type: "POST",
			url: "./assets/functions.php",
			data: formData,
			cache: false,						
			success: function(response){
				let data = $.parseJSON(response);
				if (data.success) 
				{
					$(".res").html('');
					$('.res').css({'display':'block','color':'green'});
					$('.res').append('<li> Valid number </li>');
				}
				if (!data.success) 
				{
					$(".res").html('');
					$('.res').css({'display':'block','color':'tomato'});
					for (let obj in data.errors) {
						$(".res").append('<li>' + data.errors[obj]+ '</li>');
					}
				}
			}
		});
		event.preventDefault();
	});
});
