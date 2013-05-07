$(document).ready(function() {
	var options2 = {
			'maxCharacterSize': 256,
			'originalStyle': 'originalTextareaInfo',
			'warningStyle' : 'warningTextareaInfo',
			'warningNumber': 40,
			'displayFormat' : '#input/#max | #words words'
	};
	
	$('#keyword').textareaCount(options2);
	//$('#form_val').ketchup();
	
	

		$('#datepicker').datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat:"yy/mm/dd",
			showOn: 'both',
			buttonText: 'Choose',
			showAnim: "drop",
			showOption : {direction:"down"}
		});

	
});	