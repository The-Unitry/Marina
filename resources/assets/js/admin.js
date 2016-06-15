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

CKEDITOR.replace('body', {});
CKEDITOR.replace('description', {});
