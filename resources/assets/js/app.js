$(document).ready(function () {
	var date = new Date();

    $('.input-daterange').datepicker({
        language: "nl",
        todayHighlight: true,
        startDate: date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear()
    });
});
