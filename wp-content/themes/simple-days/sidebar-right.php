<?php
defined( 'ABSPATH' ) || exit;
?>
<div id="sidebar_right" class="sidebar f_box f_col101 f_wrap jc_sa">
	<?php dynamic_sidebar( 'sidebar-1' );
	if( is_active_sidebar( 'sidebar-right-fixed' ) ) {
		echo '<div class="fix_sidebar">';
		dynamic_sidebar( 'sidebar-right-fixed' );
		echo '</div>';
	}
	?>
</div>

