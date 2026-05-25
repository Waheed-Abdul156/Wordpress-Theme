jQuery(document).ready(function($){

    $('.upload_logo_button').click(function(e){

        e.preventDefault();

        var image = wp.media({

            title: 'Upload Logo',

            multiple: false

        }).open()

        .on('select', function(){

            var uploaded = image.state().get('selection').first();

            var url = uploaded.toJSON().url;

            $('#site_logo').val(url);

        });

    });

});