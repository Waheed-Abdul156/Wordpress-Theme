jQuery(document).ready(function($){

    $(document).on('click', '.upload_logo_button', function(e){

        e.preventDefault();

        var mediaUploader = wp.media({
            title: 'Upload Logo',
            button: {
                text: 'Use this logo'
            },
            multiple: false
        });

        mediaUploader.on('select', function(){
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('#site_logo').val(attachment.url);
        });

        mediaUploader.open();

    });

});