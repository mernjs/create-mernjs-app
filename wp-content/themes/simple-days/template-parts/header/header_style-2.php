<?php
/**
 * The template part for displaying header style 1
 *
 * @package Simple Days

 */
?>

<div id="h_flex" class="wrap_frame f_box f_col110 w100 f_row_r001">
	<div id="site_h" class="site_h f_box" role="banner">
		<div class="title_wrap f_box ai_c relative">

			<?php get_template_part( 'template-parts/header/header_title' ); ?>

		</div>


	</div>


	<div id="nav_h" class="f_box">
		<?php simple_days_primary_menu(); ?>
	</div>


	<?php

	if( is_active_sidebar( 'header_widget' )){
		?>
		<div class="hw_con f_box f_col110 ai_c jc_c f_wrap">
			<?php dynamic_sidebar( 'header_widget' ); ?>
		</div>
		<?php
	}
	if(is_active_sidebar( 'search_widget' )){

		echo '<div class="menu_box serach_box f_box ai_c dn110">';
		echo '<label for="sw" id="" class="m0 tap_no lh_1 fa fa-search serch_icon" style="font-size:20px;cursor:pointer;"></label>';
		echo '</div>';
	}
	?>


</div>
