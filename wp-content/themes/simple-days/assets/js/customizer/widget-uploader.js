jQuery(document ).ready( function(){
    function media_upload( button_class ) {
        var _custom_media = true,
            _orig_send_attachment = wp.media.editor.send.attachment;
        var file_frame;
        jQuery('body').on('click','.custom_media_upload',function(e) {
            var button_id ='#'+jQuery(this).attr( 'id' );
            var button_id_s = jQuery(this).attr( 'id' );
            //console.log(button_id);
            var self = jQuery(button_id);
            //var send_attachment_bkp = wp.media.editor.send.attachment;
            var button = jQuery(button_id);
            var id = button.attr( 'id' ).replace( '_button', '' );
            _custom_media = true;

            file_frame = wp.media.frames.file_frame = wp.media({
              //className: 'media-frame',
              //frame: 'select',
              multiple: false,
              //title: 'Select Media',
              library: {
                type: 'image'
              },
              //button: {
              //  text : 'Select'
              //}
            });


            file_frame.on( 'select', function() {
              attachment = file_frame.state().get('selection').first().toJSON();
              if ( _custom_media ) {

                    jQuery( '.' + button_id_s + '_media_id' ).val(attachment.id);
                    jQuery( '.' + button_id_s + '_media_url' ).val(attachment.url).trigger('change');
                    jQuery( '.' + button_id_s + '_media_image' ).attr( 'src',attachment.url).css( 'display','block' );
                    jQuery( '.' + button_id_s + '_placeholder' ).css( 'display','none' );
                    jQuery( '.' + button_id_s + '_remove-button' ).css( 'display','inline-block' );
              } else {
                return _orig_send_attachment.apply( button_id, [props, attachment] );
              }
            });




            file_frame.open(button);
            return false;
        });
    }

    media_upload( '.custom_media_upload' );

    jQuery('body').on('click','.custom_media_clear',function(e) {
            var button_id ='#'+jQuery(this).attr( 'id' );
            var button_id_s = jQuery(this).attr( 'id' );
            jQuery( '.' + button_id_s + '_media_id' ).val('');
            jQuery( '.' + button_id_s + '_media_url' ).val('').trigger('change');
            jQuery( '.' + button_id_s + '_media_image' ).attr( 'src','').css( 'display','none' );
            jQuery( '.' + button_id_s + '_placeholder' ).css( 'display','block' );
            jQuery( '.' + button_id_s + '_remove-button' ).css( 'display','none' );
    });



});