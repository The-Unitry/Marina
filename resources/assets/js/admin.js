$(document).ready(function() {
    $('#datatable').DataTable({
        'language': {
            'url': '//cdn.datatables.net/plug-ins/1.10.11/i18n/Dutch.json'
        },
        'order': [ 0, 'desc' ]
    });
});

$('.datepicker').datepicker({
    language: "nl",
    todayHighlight: true,
    format: "yyyy-mm-dd"
});

$(document).ready(function() {
    $('.clickable-row').click(function() {
        window.document.location = $(this).data('href');
    });

    $('#alert').fadeTo(2000, 500).slideUp(500, function(){
        $('#success-alert').alert('close');
    });
});

CKEDITOR.replace('body', {});
CKEDITOR.replace('description', {});
