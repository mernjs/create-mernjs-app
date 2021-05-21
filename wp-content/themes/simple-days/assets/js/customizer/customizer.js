/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */



 ( function( $ ) {
  var alert_box_border_inside;
  var alert_box_border_inside_class;
  jQuery(document).ready(function($){
    alert_box_border_inside = wp.customize.settings.values.simple_days_alert_box_border_inside;
    if(alert_box_border_inside == true){
      alert_box_border_inside_class = '#h_alert_box';
    }else{
      alert_box_border_inside_class = '#h_alert';
    }
    //console.log(alert_box_border_inside);
    if(jQuery('.page_item').length){
      jQuery('#menu_h').prepend('<li class="page_item"></li>');
    }



  });
  
  wp.customize( 'simple_days_alert_box_border_inside', function( value ) {
    value.bind( function( newval ) {
      if(newval == true){
        jQuery('#h_alert_box').css('border', jQuery('#h_alert').css('border') ) ;
        jQuery('#h_alert_box').css('display', 'inline-block' ) ;
        jQuery('#h_alert').css('border', 'none' );
        alert_box_border_inside_class = '#h_alert_box';
      }else{
        jQuery('#h_alert').css('border', jQuery('#h_alert_box').css('border') ) ;
        jQuery('#h_alert_box').css('border', 'none' );
        alert_box_border_inside_class = '#h_alert';
      }
      //console.log(newval);
      //console.log(alert_box_border_inside_class);
    } );
  } );


  // Site title and description.
  wp.customize( 'blogname', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.title_text' ).html( newval );
      jQuery( '.copyright a' ).html( newval );
    } );
  } );
  wp.customize( 'blogdescription', function( value ) {
    value.bind( function( newval ) {
      jQuery( '.tagline span' ).html( newval );
      jQuery( '.description' ).html( newval );
    } );
  } );




  
  wp.customize( 'link_hover_color', function( value ) {
    value.bind( function( newval ) {
      if(newval == ''){newval = 'inherit';}
      var temp = 'a:hover:not(.non_hover){color:' + newval + '!important;}';
      jQuery( '#body_hover_css' ).append( temp );
      //jQuery('a:hover:not(.non_hover)').css('color', newval );
    } );
  } );





  
  wp.customize( 'humberger_menu_color', function( value ) {
    value.bind( function( newval ) {
      if(newval == ''){newval = 'inherit';}
      var temp = '.humberger:before{-webkit-box-shadow:' + newval + ' 0 6px 0;box-shadow:' + newval + ' 0 6px 0;}.humberger:before,.humberger:after{background:' + newval + ';}';
      jQuery( '#body_hover_css' ).append( temp );
      //jQuery('a:hover:not(.non_hover)').css('color', newval );
    } );
  } );


  
  wp.customize( 'simple_days_wrap_flame_maxwidth', function( value ) {
    value.bind( function( newval ) {
      jQuery('.wrap_frame').css('max-width', newval + 'px' );
    } );
  } );


  
  wp.customize( 'simple_days_main_content_maxwidth', function( value ) {
    value.bind( function( newval ) {
      jQuery( '#etc_css' ).append( '@media screen and (min-width: 980px) {.contents{max-width:' + newval + 'px}}' );
    } );
  } );

  
  wp.customize( 'simple_days_sidebar_maxwidth', function( value ) {
    value.bind( function( newval ) {
      jQuery( '#etc_css' ).append( '@media screen and (min-width: 980px) {.sidebar{max-width:' + newval + 'px}}' );
      jQuery( '#etc_css' ).append( '@media screen and (min-width: 980px) {.s_widget{max-width:' + newval + 'px}}' );
    } );
  } );

  
  wp.customize( 'simple_days_sidebar_minwidth', function( value ) {
    value.bind( function( newval ) {
      jQuery( '#etc_css' ).append( '@media screen and (min-width: 980px) {.sidebar{min-width:' + newval + 'px}}' );
    } );
  } );






  
  wp.customize( 'to_top_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.to_top:hover{color:' + newval + '}';
      jQuery( '#footer_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'to_top_bg_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.to_top:hover{background:' + newval + '}';
      jQuery( '#footer_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'footer_menu_link_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '#nav_f a:hover{color:' + newval + '!important}';
      jQuery( '#footer_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'sub_menu_link_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '#nav_s a:hover{color:' + newval + '!important}';
      jQuery( '#header_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'header_menu_bg_color_hover', function( value ) {
    value.bind( function( newval ) {
      var temp = '.menu_h li:hover{background:' + newval + '!important}';
      jQuery( '#header_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'header_menu_font_color_hover', function( value ) {
    value.bind( function( newval ) {
      var temp = '.menu_h li:hover a{color:' + newval + '!important}';
      jQuery( '#header_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'header_menu_children_bg_color_hover', function( value ) {
    value.bind( function( newval ) {
      var temp = '.menu_h .children li:hover,.menu_h .sub-menu li:hover{background:' + newval + '!important}';
      jQuery( '#header_hover_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'header_menu_children_font_color_hover', function( value ) {
    value.bind( function( newval ) {
      var temp = '.menu_h .children li:hover a,.menu_h .sub-menu li:hover a{color:' + newval + '!important}';
      jQuery( '#header_hover_css' ).append( temp );
    } );
  } );



  
  wp.customize( 'simple_days_index_category_border_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.post_card_category{border:1px solid ' + newval + '}';
      jQuery( '#post_card_category_hover_css' ).append( temp );
      //jQuery('.post_card_category').css('border-color', newval );
    } );
  } );
  
  wp.customize( 'simple_days_index_category_bg_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.post_card_category:hover{background:' + newval + '}';
      jQuery( '#post_card_category_hover_css' ).append( temp );
      //jQuery('.post_card_category').css('background', newval );
    } );
  } );
  
  wp.customize( 'simple_days_index_category_text_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.post_card_category:hover{color:' + newval + '}';
      jQuery( '#post_card_category_hover_css' ).append( temp );
      //jQuery('.post_card_category').css('color', newval );
    } );
  } );
  
  wp.customize( 'simple_days_index_category_border_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.post_card_category:hover{border:1px solid ' + newval + '}';
      jQuery( '#post_card_category_hover_css' ).append( temp );
      //jQuery('.post_card_category').css('border-color', newval );
    } );
  } );





  
  wp.customize( 'simple_days_index_date_separator_color', function( value ) {
    value.bind( function( newval ) {
      jQuery('.post_date_circle span:nth-of-type(3)').css('border-top-color', newval );
    } );
  } );

  
  wp.customize( 'simple_days_index_read_more_border_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.more_read{border:1px solid ' + newval + '}';
      jQuery( '#more_read_hover_css' ).append( temp );
      //jQuery('.more_read').css('border-color', newval );
    } );
  } );

  
  wp.customize( 'simple_days_index_read_more_text_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.more_read:hover{color:' + newval + '}';
      jQuery( '#more_read_hover_css' ).append( temp );
      //jQuery('.more_read:hover').css('color', newval );
    } );
  } );
  
  wp.customize( 'simple_days_index_read_more_border_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.more_read:hover{border:1px solid ' + newval + '}';
      jQuery( '#more_read_hover_css' ).append( temp );
      //jQuery('.more_read:hover').css('border-color', newval );
    } );
  } );
  
  wp.customize( 'simple_days_index_read_more_bg_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.more_read:hover{background:' + newval + '}';
      jQuery( '#more_read_hover_css' ).append( temp );
      //jQuery('.more_read:hover').css('background', newval );
    } );
  } );

  
  wp.customize( 'simple_days_alert_box_border_type', function( value ) {
    value.bind( function( newval ) {
      jQuery(alert_box_border_inside_class).css('border-style', newval );
    } );
  } );
  wp.customize( 'simple_days_alert_box_border_color', function( value ) {
    value.bind( function( newval ) {
      jQuery(alert_box_border_inside_class).css('border-color', newval );
    } );
  } );
  wp.customize( 'simple_days_alert_box_border_width', function( value ) {
    value.bind( function( newval ) {
            //console.log(alert_box_border_inside_class);
            jQuery(alert_box_border_inside_class).css('border-width', newval );
          } );
  } );
  wp.customize( 'simple_days_alert_box_text_size', function( value ) {
    value.bind( function( newval ) {
      jQuery('#h_alert').css('font-size', newval + 'px' );
    } );
  } );


  
  wp.customize( 'simple_days_top_date_format', function( value ) {
    value.bind( function( newval ) {
      if(newval == '1'){
        jQuery('.post_date_circle').each(function() {
          jQuery(this).find('.month').insertAfter(jQuery(this).find('.day'));

        });

      }else{
        jQuery('.post_date_circle').each(function() {
          jQuery(this).find('.day').insertAfter(jQuery(this).find('.month'));

        });

      }
    } );
  } );

  
  wp.customize( 'simple_days_top_date_wrap', function( value ) {
    value.bind( function( newval ) {
      if(newval == '1'){
        jQuery('.post_date_circle').css('border-radius', '50%' );
        //jQuery('.post_date_circle').css('margin-bottom', '0' );
      }else{
        jQuery('.post_date_circle').css('border-radius', '2px' );
        //jQuery('.post_date_circle').css('margin-bottom', '2px' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'simple_days_index_date_after_day', function( value ) {
    value.bind( function( newval ) {
      if(jQuery('.post_date_circle .day .after_day').length){
        jQuery('.after_day').html(newval);
      } else {
        jQuery('.post_date_circle .day').append('<span class="after_day">'+newval+'</span>');
      }
      //console.log(newval);
      //jQuery('.post_date_circle .day').append(newval);

    } );
  } );


  
  wp.customize( 'simple_days_header_shadow', function( value ) {
    value.bind( function( newval ) {
      if(newval == true){
        jQuery('#h_wrap').css('-webkit-box-shadow', '0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2)' );
        jQuery('#h_wrap').css('box-shadow', '0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2)' );
        jQuery('#h_wrap').css('-webkit-border-radius', '2px' );
        jQuery('#h_wrap').css('border-radius', '2px' );
      }else{
        jQuery('#h_wrap').css('-webkit-box-shadow', 'none' );
        jQuery('#h_wrap').css('box-shadow', 'none' );
        jQuery('#h_wrap').css('-webkit-border-radius', '0' );
        jQuery('#h_wrap').css('border-radius', '0' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'simple_days_box_style', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'shadow'){
        jQuery('.shadow_box').css('-webkit-box-shadow', '0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2)' );
        jQuery('.shadow_box').css('box-shadow', '0 2px 2px 0 rgba(0,0,0,0.14),0 3px 1px -2px rgba(0,0,0,0.12),0 1px 5px 0 rgba(0,0,0,0.2)' );
        jQuery('.shadow_box').css('-webkit-border-radius', '2px' );
        jQuery('.shadow_box').css('border-radius', '2px' );
      }else{
        jQuery('.shadow_box').css('-webkit-box-shadow', 'none' );
        jQuery('.shadow_box').css('box-shadow', 'none' );
        jQuery('.shadow_box').css('-webkit-border-radius', '0' );
        jQuery('.shadow_box').css('border-radius', '0' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'simple_days_read_more_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.read_more_box').css('text-align', 'left' );
        jQuery('.read_more_box').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.read_more_box').css('text-align', 'right' );
        jQuery('.read_more_box').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.read_more_box').css('text-align', 'center' );
        jQuery('.read_more_box').css('display', 'block' );
      }else{
        jQuery('.read_more_box').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'simple_days_index_date_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.post_date_circle').css('left', '0' );
        jQuery('.post_date_circle').css('right', 'auto' );
        jQuery('.post_date_circle').css('display', 'block' );
        jQuery('.index_time').css('left', 'auto' );
        jQuery('.index_time').css('right', '0' );
      }else if(newval == 'right'){
        jQuery('.post_date_circle').css('left', 'auto' );
        jQuery('.post_date_circle').css('right', '0' );
        jQuery('.post_date_circle').css('display', 'block' );
        jQuery('.index_time').css('left', '0' );
        jQuery('.index_time').css('right', 'auto' );
      }else{
        jQuery('.post_date_circle').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'simple_days_index_category_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.post_card_category').css('left', '0' );
        jQuery('.post_card_category').css('right', 'auto' );
        jQuery('.post_card_category').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.post_card_category').css('left', 'auto' );
        jQuery('.post_card_category').css('right', '0' );
        jQuery('.post_card_category').css('display', 'block' );
      }else{
        jQuery('.post_card_category').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'simple_days_index_thumbnail', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.post_card_thum').css('-webkit-box-ordinal-group', '0' );
        jQuery('.post_card_thum').css('-ms-flex-order', '0' );
        jQuery('.post_card_thum').css('-webkit-order', '0' );
        jQuery('.post_card_thum').css('order', '0' );
        jQuery('.post_card_thum').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.post_card_thum').css('-webkit-box-ordinal-group', '3' );
        jQuery('.post_card_thum').css('-ms-flex-order', '3' );
        jQuery('.post_card_thum').css('-webkit-order', '3' );
        jQuery('.post_card_thum').css('order', '3' );
        jQuery('.post_card_thum').css('display', 'block' );
      }else{
        jQuery('.post_card_thum').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );

  /* 記事投稿日位置変更
  wp.customize( 'simple_days_posts_date_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.post_date').css('text-align', 'left' );
        jQuery('.post_date').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.post_date').css('text-align', 'right' );
        jQuery('.post_date').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.post_date').css('text-align', 'center' );
        jQuery('.post_date').css('display', 'block' );
      }else{
        jQuery('.post_date').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );*/
  /* 記事投稿者位置変更
  wp.customize( 'simple_days_posts_author_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.post_author').css('text-align', 'left' );
        jQuery('.post_author').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.post_author').css('text-align', 'right' );
        jQuery('.post_author').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.post_author').css('text-align', 'center' );
        jQuery('.post_author').css('display', 'block' );
      }else{
        jQuery('.post_author').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );*/
  /* 固定ページ投稿日位置変更
  wp.customize( 'simple_days_page_date_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.page_date').css('text-align', 'left' );
        jQuery('.page_date').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.page_date').css('text-align', 'right' );
        jQuery('.page_date').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.page_date').css('text-align', 'center' );
        jQuery('.page_date').css('display', 'block' );
      }else{
        jQuery('.page_date').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );*/
  /* 固定ページ投稿者位置変更
  wp.customize( 'simple_days_page_author_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.page_author').css('text-align', 'left' );
        jQuery('.page_author').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.page_author').css('text-align', 'right' );
        jQuery('.page_author').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.page_author').css('text-align', 'center' );
        jQuery('.page_author').css('display', 'block' );
      }else{
        jQuery('.page_author').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );*/

  /* パンくず位置変更
  wp.customize( 'simple_days_breadcrumbs_display', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.breadcrumb').css('text-align', 'left' );
        jQuery('.breadcrumb').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.breadcrumb').css('text-align', 'right' );
        jQuery('.breadcrumb').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.breadcrumb').css('text-align', 'center' );
        jQuery('.breadcrumb').css('display', 'block' );
      }else{
        jQuery('.breadcrumb').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );
  */

  
  /*
  wp.customize( 'simple_days_pageview_position', function( value ) {
    value.bind( function( newval ) {
      if(newval == 'left'){
        jQuery('.page_view').css('text-align', 'left' );
        jQuery('.page_view').css('display', 'block' );
      }else if(newval == 'right'){
        jQuery('.page_view').css('text-align', 'right' );
        jQuery('.page_view').css('display', 'block' );
      }else if(newval == 'center'){
        jQuery('.page_view').css('text-align', 'center' );
        jQuery('.page_view').css('display', 'block' );
      }else{
        jQuery('.page_view').css('display', 'none' );
      }
      //console.log(newval);
    } );
  } );
  */




  wp.customize( 'simple_days_footer_layout', function( value ) {
    value.bind( function( newval ) {
      if(newval == '1'){
        jQuery('#f_menu').insertBefore('.f_widget_wrap');
      }else if(newval == '2'){
        jQuery('#f_menu').insertAfter('.f_widget_wrap');
      }else if(newval == '3'){
        jQuery('#f_menu').insertAfter('.credit_wrap');
      }
      //console.log(newval);
    } );
  } );


  wp.customize( 'simple_days_sticky_header', function( value ) {
    value.bind( function( newval ) {
      if(newval == true){
        jQuery('.h_sticky').css('position', '-webkit-sticky' );
        jQuery('.h_sticky').css('position', 'sticky' );
        jQuery('.h_sticky').css('top', '0' );
        jQuery('.h_sticky').css('z-index', '9' );
      }else{
        jQuery('.h_sticky').css('position', 'static' );
        jQuery('.h_sticky').css('top', 'auto' );
        jQuery('.h_sticky').css('z-index', '0' );
      }
      //console.log(newval);
    } );
  } );

  
  wp.customize( 'search_submit_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.search_submit:hover{color:' + newval + '!important}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );
  wp.customize( 'search_submit_bg_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '.search_submit:hover{background:' + newval + '!important}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );

  
  wp.customize( 'submit_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = 'button:hover,input[type="button"]:hover,input[type="submit"]:hover{color:' + newval + '!important}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );
  wp.customize( 'submit_bg_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = 'button:hover,input[type="button"]:hover,input[type="submit"]:hover{background:' + newval + '!important}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );

  wp.customize( 'simple_days_humberger_menu_spin', function( value ) {
    value.bind( function( newval ) {
      var temp = '#t_menu:checked ~ div header div div .humberger:before{-webkit-transform:rotate(' + newval + 'deg);transform:rotate(' + newval + 'deg);}#t_menu:checked ~ div header div div  .humberger:after{-webkit-transform:rotate(-' + newval + 'deg);transform:rotate(-' + newval + 'deg)}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );
  wp.customize( 'simple_days_humberger_menu_spin_speed', function( value ) {
    value.bind( function( newval ) {
      var temp = '.humberger:before,.humberger:after{-webkit-transition:-webkit-box-shadow .1s linear,-webkit-transform ' + newval + 's;transition:box-shadow .1s linear,transform ' + newval + 's}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );


  
  wp.customize( 'yahman_add_ons_toc_link_hover_color', function( value ) {
    value.bind( function( newval ) {
      var temp = '#toc.toc a:hover{color:' + newval + '!important;}.toc_ctrl > label:hover{color:' + newval + '!important;}';
      jQuery( '#etc_css' ).append( temp );
    } );
  } );


/*
  wp.customize( 'simple_days_humberger_menu_right', function( value ) {
    value.bind( function( newval ) {
      if(newval == true){
        jQuery('.bar_box').css('right', '0' );
        jQuery('.serach_box').css('left', '0' );
        jQuery('.bar_box').css('left', 'auto' );
        jQuery('.serach_box').css('right', 'auto' );
      }else{
        jQuery('.bar_box').css('left', '0' );
        jQuery('.serach_box').css('right', '0' );
        jQuery('.bar_box').css('right', 'auto' );
        jQuery('.serach_box').css('left', 'auto' );
      }
      //console.log(newval);
    } );
  } );
  */
  
  wp.customize( 'simple_days_logo_image_width', function( value ) {
    value.bind( function( newval ) {
      jQuery('.header_logo').css('max-width', newval + 'px' );
    } );
  } );
  wp.customize( 'simple_days_logo_image_height', function( value ) {
    value.bind( function( newval ) {
      jQuery('.header_logo').css('max-height', newval + 'px' );
    } );
  } );

  
  wp.customize( 'simple_days_footer_logo_image_width', function( value ) {
    value.bind( function( newval ) {
      jQuery('.footer_logo').css('max-width', newval + 'px' );
    } );
  } );
  wp.customize( 'simple_days_footer_logo_image_height', function( value ) {
    value.bind( function( newval ) {
      jQuery('.footer_logo').css('max-height', newval + 'px' );
    } );
  } );

  
  wp.customize( 'simple_days_layout_header_height', function( value ) {
    value.bind( function( newval ) {
      if(newval != 54 ){
        jQuery( '#etc_css' ).append( '@media screen and (min-width: 980px) {#site_h{height:' + newval + 'px}}' );
      } else {
        jQuery( '#etc_css' ).append( '@media screen and (min-width: 980px) {#site_h{height:auto}}' );
      }
    } );
  } );

  wp.customize( 'simple_days_site_title_size', function( value ) {
    value.bind( function( newval ) {
      jQuery('.title_text').css('font-size', newval + 'px' );
    } );
  } );

  wp.customize( 'simple_days_site_title_font_weight', function( value ) {
    value.bind( function( newval ) {
      jQuery('.title_text').css('font-weight', newval );
    } );
  } );

  wp.customize( 'simple_days_over_header_widget_position', function( value ) {
    value.bind( function( newval ) {



      if(newval == 'space-between'){
        var temp = '.oh_con{-webkit-justify-content:space-between;justify-content:space-between;}.oh_widget{padding:10px 0;}';
      }else if(newval == 'space-around'){
        var temp = '.oh_con{-webkit-justify-content:space-around;justify-content:space-around}.oh_widget{padding:10px 0;}';
      }else if(newval == 'flex-start'){
        var temp = '.oh_con{-webkit-justify-content:flex-start;justify-content:flex-start;}.oh_widget{padding:10px 20px 10px 0;}';
      }else if(newval == 'flex-end'){
        var temp = '.oh_con{-webkit-justify-content:flex-end;justify-content:flex-end}.oh_widget{padding:10px 0 10px 20px;}';
      }else if(newval == 'center'){
        var temp = '.oh_con{-webkit-justify-content:center;justify-content:center}.oh_widget{padding:10px;}';
      }
      jQuery( '#menu_layout_position' ).append( '@media screen and (min-width: 980px) {' + temp + '}' );

    } );
  } );

  
  wp.customize( 'simple_days_footer_menu_layout', function( value ) {
    value.bind( function( newval ) {
      wp.customize.settings.values.simple_days_footer_menu_layout = newval;
      if(newval == '1'){
        jQuery('#menu_f').prependTo('#site_f');
      }else if(newval == '2'){
        jQuery('#menu_f').insertBefore('.credit_wrap');
      }else{
        jQuery('#menu_f').appendTo('#site_f');
      }


    } );
  } );


} )( jQuery );