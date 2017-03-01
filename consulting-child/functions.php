<?php

add_action( 'wp_enqueue_scripts', 'consulting_child_enqueue_parent_styles' );

function consulting_child_enqueue_parent_styles() {

	wp_enqueue_style( 'consulting-style', get_template_directory_uri() . '/style.css', array( 'bootstrap' ), CONSULTING_THEME_VERSION, 'all' );
	wp_enqueue_style( 'child-style', get_stylesheet_uri(), array( 'consulting-style' ) );
	wp_enqueue_script( 'bk-custom', get_stylesheet_directory_uri() . '/js/bk.js', array( 'jquery' ), CONSULTING_THEME_VERSION, true );
}

// Allow SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  global $wp_version;
	if( $wp_version == '4.7' || ( (float) $wp_version < 4.7 ) ) {
     return $data;
  }

  $filetype = wp_check_filetype( $filename, $mimes );

  return [
      'ext'             => $filetype['ext'],
      'type'            => $filetype['type'],
      'proper_filename' => $data['proper_filename']
  ];

}, 10, 4 );

function bk_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'bk_mime_types' );

function bk_fix_svg() {
  echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'bk_fix_svg' );
