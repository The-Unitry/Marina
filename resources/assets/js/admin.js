$(document).ready(function(){
    $('#datatable').DataTable();
});

$(document).ready (function(){
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });

    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").alert('close');
    });
});