<?php
/***
 *
 * This is the front page for racquetflex.
 * @author MHB
 * @package  Customizations
 * @subpackage Home
 *
 *
*/

add_action( 'genesis_meta', 'rflex_genesis_meta' );

//Add widget support for homepage. If no widgets active, display the default loop.


function rflex_genesis_meta() {

	if ( is_active_sidebar( 'home-top' ) || is_active_sidebar( 'homegrid-1' ) || is_active_sidebar( 'homegrid-2' ) || is_active_sidebar( 'homegrid-3' ) ) {

		//* Add home body class
		add_filter( 'body_class', 'rflex_body_class' );

		//* Remove the default Genesis loop
		remove_action( 'genesis_loop', 'genesis_do_loop' );

		//* Add home widgets
	 add_action( 'genesis_loop', 'rflex_markup' );

	}
}

function rflex_body_class( $classes ) {

		$classes[] = 'rp-home';
		return $classes;

}


function rflex_markup() {

genesis_widget_area( 'home-top', array(
		'before' => '<div class="home-top widget-area">',
		'after'  => '</div>',

	) );

echo '<div class="homegrid columns">';

genesis_widget_area( 'homegrid-1', array(
		'before' => '<div class="homegrid-1 widget-area">',
		'after'  => '</div>',
	) );


genesis_widget_area( 'homegrid-2', array(
		'before' => '<div class="homegrid-2 widget-area">',
		'after'  => '</div>',
	) );


genesis_widget_area( 'homegrid-3', array(
		'before' => '<div class="homegrid-3 widget-area">',
		'after'  => '</div></div>',
	) );

	echo '</div>';

}

genesis();
