
jQuery( function( $ ){
  function initColorPicker( widget ) {
    widget.find( '.color-picker' ).wpColorPicker( {
      change: _.throttle( function() { // For Customizer
        jQuery(this).trigger( 'change' );
      }, 3000 ),
      clear: _.throttle( function() { // For Customizer
        jQuery(this).trigger( 'change' );
      }, 3000 )
    });
  }

  function onFormUpdate( event, widget ) {
    initColorPicker( widget );
  }

  jQuery( document ).on( 'widget-added widget-updated', onFormUpdate );

  jQuery( document ).ready( function() {
    jQuery( '#widgets-right .widget:has(.color-picker)' ).each( function () {
      initColorPicker( jQuery( this ) );
    } );
  } );
} );