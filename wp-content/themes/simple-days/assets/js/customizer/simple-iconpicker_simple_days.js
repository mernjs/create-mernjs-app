( function( $ ) {
    var whichInput = 0;

    jQuery(document).ready(function(){
      for (var i=1; i<=11; i++) {
        jQuery('#_customize-input-simple_days_menu_bar_h_icon_' + i).iconpicker('#_customize-input-simple_days_menu_bar_h_icon_' + i);
        jQuery('#_customize-input-simple_days_menu_bar_f_icon_' + i).iconpicker('#_customize-input-simple_days_menu_bar_f_icon_' + i);
        jQuery('#customize-control-simple_days_menu_bar_h_icon_' + i).children('label').after('<button class="menu_icon_clear" type="button" data-inputbox="#_customize-input-simple_days_menu_bar_h_icon_' + i + '">' + simple_days_localize.localize_clear + '</button>');
        jQuery('#customize-control-simple_days_menu_bar_f_icon_' + i).children('label').after('<button class="menu_icon_clear" type="button" data-inputbox="#_customize-input-simple_days_menu_bar_f_icon_' + i + '">' + simple_days_localize.localize_clear + '</button>');
        jQuery('#customize-control-simple_days_menu_bar_h_icon_' + i).addClass('menu_icon_row');
        jQuery('#customize-control-simple_days_menu_bar_f_icon_' + i).addClass('menu_icon_row');
        jQuery('#customize-control-simple_days_menu_bar_h_icon_after_' + i).addClass('menu_icon_row menu_icon_after');
        jQuery('#customize-control-simple_days_menu_bar_f_icon_after_' + i).addClass('menu_icon_row menu_icon_after');
        jQuery('#customize-control-simple_days_menu_bar_h_icon_' + i).children('label').addClass('menu_icon_select');
        jQuery('#customize-control-simple_days_menu_bar_f_icon_' + i).children('label').addClass('menu_icon_select');
        jQuery('#_customize-input-simple_days_menu_bar_h_icon_' + i).addClass('menu_icon_textbox');
        jQuery('#_customize-input-simple_days_menu_bar_f_icon_' + i).addClass('menu_icon_textbox');


      }
      jQuery('.menu_icon_clear').on('click', function() {
        var clear_box = jQuery(this).attr('data-inputbox');
        jQuery(clear_box).val('none').change();
      });
    });

} )( jQuery );