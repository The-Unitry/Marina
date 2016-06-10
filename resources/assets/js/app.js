$(document).ready(function () {
	var date = new Date();

    $('.input-daterange').datepicker({
        language: "nl",
        todayHighlight: true,
        startDate: date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear()
    });

	$(document).ready(function() {
	    $('#alert').fadeTo(2000, 500).slideUp(500, function(){
	        $('#success-alert').alert('close');
	    });
	});
});
