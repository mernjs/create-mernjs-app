wp.customize.controlConstructor.posts_sortable = wp.customize.Control.extend( {
  ready: function() {
    var control = this;
    wp.customize.Control.prototype.ready.call( control );
    
    
    control.sortableContainer = control.container.find( 'ul.simple_days_posts_sortable_ul' ).first();

    
    control.sortableContainer.sortable({
      
      stop: function() {
        control.updateValue();
      }
    }).disableSelection().find( 'li' ).each( function() {

      // Enable/disable options when we click on the eye of Thundera.
      jQuery( this ).find( 'i.visibility' ).click( function() {
        jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
      });
    }).click( function() {

      // Update value on click.
      control.updateValue();
    });
  },
  updateValue: function() {
    var control = this,
    newValue = [];
    this.sortableContainer.find( 'li' ).each( function() {
      if ( ! jQuery( this ).is( '.invisible' ) ) {
        newValue.push( jQuery( this ).data( 'value' ) );
      }
    });
    control.setting.set( newValue );
    //console.log(newValue);
  }

} );







jQuery(function() {
  jQuery('.simple_days_posts_sortable_ul').sortable({
    opacity: 0.6,
    axis: 'y',
    update: function(event, ui) {
      var updateArray =  jQuery(this).sortable("toArray", { attribute: 'value' }).join(",");
      //console.log(updateArray);
    }


  });
});
