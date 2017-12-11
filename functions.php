<?php 

// Change-Detector-XXXX - for Espresso.app

function custom_register_styles() {
	
	wp_enqueue_style( 
		'parent-style', // $handle
		get_template_directory_uri() . '/style.css' // $src 
	);

	
	$dev_mode = true;
	$host = $_SERVER['HTTP_HOST'];
	
	if ( current_user_can('edit_others_pages') ) {
		 $dev_mode = true;
	} else if ( $host != 'ms-studio.net' ) {
		 $dev_mode = true;
	}
	
	if ( $dev_mode == true ) {
	
			// DEV: the MAIN stylesheet - uncompressed
//			wp_enqueue_style( 
//					'main-style', 
//					get_stylesheet_directory_uri() . '/css/dev/00-main.css', // main.css
//					false, // dependencies
//					time() // version
//			); 
	
	} else {
	
			// PROD: the MAIN stylesheet - combined and minified
//			wp_enqueue_style( 
//					'main-style', 
//					get_stylesheet_directory_uri() . '/css/prod/styles.20170127233400.css', // main.css
//					false, // dependencies
//					null // version
//			); 
	}
	
	
	wp_enqueue_script( 
	// the MAIN JavaScript file -- development version
			'main-script',
			get_stylesheet_directory_uri() . '/js/scripts.js', // scripts.js
			array('jquery'), // dependencies
			null, // version
			true // in footer
	);


}
add_action( 'wp_enqueue_scripts', 'custom_register_styles', 10 );

function ms_change_resonant_styles() {

	wp_dequeue_style( 'resonant-google-fonts' );
	
	// Load Source Serif Pro from Google:
	
	// With News Cycle:
	
	// <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700|Source+Serif+Pro:400,700" rel="stylesheet">
	
	// With Oswald
	
	// <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700|Oswald:200,300,400,500,600,700|Source+Serif+Pro:400,700" rel="stylesheet">
	
	// Archivo:400,700
	// Archivo+Narrow
	
	
	wp_enqueue_style( 
			'source-serif-pro', 
			'https://fonts.googleapis.com/css?family=News+Cycle:400|Archivo+Narrow:600|Source+Serif+Pro:400,700', // main.css
			false, // dependencies
			null // version
	); 

}
add_action( 'wp_enqueue_scripts', 'ms_change_resonant_styles', 11 );

// Modifier titre des archives, supprimer "Category:"
// utiliser filtre: get_the_archive_title

add_filter( 'get_the_archive_title', function ( $title ) {
    if( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
});


// Disable Jetpack Photon:
// https://solvemethod.com/disable-jetpack-photon-caching-page-specific/

// Disable Photon caching in single post/media/portfolio pages
function no_photon_by_single_post_page() {
  if ( is_single() ) {
    add_filter( 'jetpack_photon_skip_image', '__return_true');
  }
  if ( is_archive() ) {
      add_filter( 'jetpack_photon_skip_image', '__return_true');
    }
}
add_action('wp', 'no_photon_by_single_post_page');

