<?php
/**
 *
 * @package Simple Days
 */



$next_heading = '';

$judge = preg_match_all('/<!--nextpage-->.*?<h[1-6].*?>(.*?)<\/h[1-6].*?>/is', $post->post_content, $match);
if($judge){
	$str = array();
	$count = 0;
	foreach ($match[0] as $key => $value) {
		$count += substr_count( $value, '<!--nextpage-->' );
		$str[$count] = $match[1][$key];
	}

	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
	elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
	else { $paged = 1; }

	if(isset($str[$paged])){
		$next_heading = $str[$paged];
	}
}







$link_pages = wp_link_pages( array(
	'before'      => '',
	'after'       => '',
	'next_or_number'   => 'next',
	'nextpagelink'     => '<div class="next_heading">'.esc_html($next_heading).'</div><div class="next_arrow relative mla fs14">'.esc_html__( 'Next Page', 'simple-days' ).'&nbsp;<i class="fa fa-angle-double-right" aria-hidden="true"></i></div>',
	'previouspagelink' => '',
	'echo'             => 0
) );

$link_pages =  preg_replace('/<a href=".*?"><\/a>/i', '' , $link_pages);
$link_pages =  str_replace(' class="post-page-numbers"', '', $link_pages);


$link_pages =  str_replace('<a', '<a class="page_link_next post_item mb_L fw6 f_box ai_c jc_fe br3 w100" ', $link_pages);


$link_pages .= wp_link_pages( array(
	'before'      => '<nav class="page-links post_item mb_L ta_c">' . esc_html__( 'Pages:', 'simple-days' ),
	'after'       => '</nav>',
	'link_before' => '<span class="page-number">',
	'link_after'  => '</span>',
	'echo'             => 0
) );



echo $link_pages;


