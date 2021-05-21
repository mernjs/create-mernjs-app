<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif;
wp_head();
?>
</head>
<body <?php body_class(); ?> ontouchstart="">
	<?php wp_body_open(); ?>
	<input id="t_menu" class="dn" type="checkbox" />

	<?php
    //over header widget
	if( is_active_sidebar( 'over_header' ))  get_template_part( 'template-parts/header/header','over' );
	?>
	<header id="h_wrap" class="f_box f_col shadow_box h_sticky">
		<?php get_template_part( 'template-parts/header/header_style', get_theme_mod( 'simple_days_menu_layout','1') ); ?>
	</header>
	<?php
	if ( has_nav_menu('sub')) {
		simple_days_sub_menu();
	}
	?>




	<?php




//alert box
	if( get_theme_mod( 'simple_days_alert_box',false) ) get_template_part( 'template-parts/header/header','alertbox' );
//Header image
	if( (is_home() || is_front_page() ) && get_header_image() ) get_template_part( 'template-parts/header/header','image' );

	if( is_active_sidebar( 'under_header' )) get_template_part( 'template-parts/header/header','under' );
