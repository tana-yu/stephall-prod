jQuery(document).ready(function($){
    $('.upload-pdf-button').on('click', function(e){
        e.preventDefault();

        let button = $(this);
        let target = $('#' + button.data('target'));

        // メディアフレームを開く
        let frame = wp.media({
            title: 'PDFを選択',
            library: { type: 'application/pdf' },
            button: { text: 'このPDFを選択' },
            multiple: false
        });

        frame.on('select', function(){
            let attachment = frame.state().get('selection').first().toJSON();
            target.val(attachment.url);
        });

        frame.open();
    });
});
