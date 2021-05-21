<?php
defined( 'ABSPATH' ) || exit;
?>
<div id="sidebar_left" class="sidebar f_box f_col101 f_wrap jc_sa">
	<?php dynamic_sidebar( 'sidebar-2' );
	if( is_active_sidebar( 'sidebar-left-fixed' ) ) {
		echo '<div class="fix_sidebar">';
		dynamic_sidebar( 'sidebar-left-fixed' );
		echo '</div>';
	}
	?>
</div>

