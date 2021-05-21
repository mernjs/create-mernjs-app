<?php

$mod = get_theme_mod( 'simple_days_footer_menu_layout','2');
?>

<footer id="site_f">
	<?php if( $mod == '1' && has_nav_menu('secondary') ) simple_days_footer_menu(); ?>
	<div class="<?php  if ( !is_active_sidebar( 'footer-1' ) && !is_active_sidebar( 'footer-2' ) && !is_active_sidebar( 'footer-3' )) {echo 'no_bg';}else{echo 'f_widget_wrap';} ?>">
		<div class="wrap_frame fw_con f_box jc_sb f_wrap f_col100">

			<div class="f_widget_L"><?php dynamic_sidebar('footer-1'); ?></div>

			<div class="f_widget_C"><?php dynamic_sidebar('footer-2'); ?></div>

			<div class="f_widget_R"><?php dynamic_sidebar('footer-3'); ?></div>

		</div>

		<?php 
		if(get_theme_mod( 'simple_days_back_to_top_button',true)){ ?>
			<a class='to_top non_hover tap_no' href="#"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>
			<?php
		} ?>
	</div>
	<?php if( $mod == '2' && has_nav_menu('secondary') ) simple_days_footer_menu(); ?>
	<div class="credit_wrap">
		<?php simple_days_credit_area(); ?>
	</div>
	<?php if( $mod == '3' && has_nav_menu('secondary') ) simple_days_footer_menu(); ?>
</footer>
<?php
if(is_active_sidebar( 'search_widget' )) simple_days_header_search_widget();
wp_footer(); ?>

  <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/600c5cbba9a34e36b96f905e/1eso4ml15';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
