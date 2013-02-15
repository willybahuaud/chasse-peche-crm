<?php
/*
Plugin Name: Easy Music
Plugin URI: http://wabeo.fr
Description: Share your playlists from SoundCloud
Version: The Plugin's Version Number, e.g.: 1.0
Author: Confridin, One div, willy bahuaud
Author URI: http://wabeo.fr
License: A "Slug" license name e.g. GPL2
*/

/**
DEFINE
* @var EM_PLUGIN_URL define for url of easy music
*/

DEFINE( 'EM_PLUGIN_URL', trailingslashit( WP_PLUGIN_URL ) . basename( dirname( __FILE__ ) ) );
DEFINE( 'EM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

/**
LOAD EASY MUSIC
*/

function em_lang_init() {
	load_plugin_textdomain( 'em', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'init', 'em_lang_init' );

/**
CREATE SONGS CPT
* @uses em_register_songs FUNCTION to register the CPT

* @uses em_post_type FILTER HOOK to target an existing post type instead creating one
* @uses songs_args FILTER HOOK to modify songs property 
*/
function em_register_songs() {
	if( apply_filters( 'em_post_type', 'songs' ) == 'songs' ) {
		$places_args = array(
			'label' => __( 'Songs', 'em' ),
			'labels' => array(
				'name'          => __( 'Songs', 'em' ),
				'singular_name' => __( 'Song', 'em' ),
				'all_items'		=> __( 'All songs', 'em' ),
				'add_new'       => __( 'Add song', 'em' ),
				'add_new_item'  => __( 'Add a new song', 'em' ),
				'edit_item'     => __( 'Edit song', 'em' ),
				'new_item'      => __( 'Add a song', 'em' ),
				'view_item'     => __( 'View song', 'em' )
				),
			'public' 	=> true,
			'supports' 	=> array( 'title', 'editor', 'thumbnail' )
			);
		register_post_type( 'songs', apply_filters( 'songs_args', $songs_args ) ); 
	}
//compositeur, interpret, anne
//taxo type music
	// ADD A SPECIFIC IMAGE SIZE
	add_image_size( 'em-size', 100, 100, true );
}
add_action( 'init', 'em_register_songs' );

/**
METABOXES
*/
include( EM_PLUGIN_PATH . 'metaboxes.php' );

/**
CONNEXION SOUNDCLOUD
*/


function em_connexion_sound_cloud() {
	wp_register_script(
		'connectsound',
		plugins_url('/js/connectsound.js', __FILE__),
		array( 'jquery' ), '1.0', true );
	);
	wp_register_script( 'tinysong', EM_PLUGIN_URL . '/em_get_songs_datas.js', array( 'jquery' ), $ver = false, $in_footer = false);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tinysong' );
}    
 
add_action('wp_enqueue_scripts', 'em_connexion_sound_cloud');

