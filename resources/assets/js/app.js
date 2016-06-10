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

        $('.frame[data-frameload="true"]').each(function() {
        	$(this).wrap('<div class="frame-wrapper"></div>');
        	$(this).after('<div class="frame-loader"></div>');
        	$(this).on('load', function() {
	            $(this).parent().find('.frame-loader').animate({
	            	opacity: 0,
	            	backgroundSize: '100px'
	            }, 500, function() {
	            	$(this).remove();
	            });
	        })
        });
	});
});
