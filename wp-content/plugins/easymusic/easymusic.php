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
CREATE SONGS, PLAYLIST & TAXONOMIES
* @uses em_register_cpt FUNCTION to register the CPT

* @uses em_songs_post_type FILTER HOOK to target an existing post type instead creating one
* @uses songs_args FILTER HOOK to modify songs property 
* @uses em_playlist_post_type FILTER HOOK to target an existing post type instead creating one
* @uses playlists_args FILTER HOOK to modify songs property 
*/
function em_register_cpt() {

	//SONGS
	if( apply_filters( 'em_songs_post_type', 'songs' ) == 'songs' ) {
		$songs_args = array(
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
			'supports' 	=> array( 'title', 'editor', 'thumbnail','excerpt' )
			);
		register_post_type( 'songs', apply_filters( 'songs_args', $songs_args ) ); 
	}

	//PLAYLISTS
	if( apply_filters( 'em_playlist_post_type', 'playlists' ) == 'playlists' ) {
		$playlists_args = array(
			'label' => __( 'Playlists', 'em' ),
			'labels' => array(
				'name'          => __( 'Playlists', 'em' ),
				'singular_name' => __( 'Playlist', 'em' ),
				'all_items'		=> __( 'All playlists', 'em' ),
				'add_new'       => __( 'Add playlist', 'em' ),
				'add_new_item'  => __( 'Add a new playlist', 'em' ),
				'edit_item'     => __( 'Edit playlist', 'em' ),
				'new_item'      => __( 'Add a playlist', 'em' ),
				'view_item'     => __( 'View playlist', 'em' )
				),
			'public' 	=> true,
			'supports' 	=> array( 'title', 'editor', 'thumbnail', 'excerpt' )
			);
		register_post_type( 'playlists', apply_filters( 'playlists_args', $playlists_args ) ); 
	}

	//GENRE
	$em_genre_args = array(
		'label' => __( 'music-genre', 'em' ),
		'labels' => array(
			'name' => __( 'Musical genre', 'em' )
			),
		'public' => true,
		'hierarchical' => true
		);
	register_taxonomy('em_genre', array( apply_filters( 'em_album_post_type', 'songs' ), apply_filters( 'em_songs_post_type', 'songs' ) ), apply_filters( 'em_genre_args', $em_genre_args ) );

	//ARTIST
	$em_artist_args = array(
		'label' => __( 'artist', 'em' ),
		'labels' => array(
			'name' => __( 'Artist', 'em' )
			),
		'public' => true,
		'hierarchical' => false
		);
	register_taxonomy('em_artist', array( apply_filters( 'em_album_post_type', 'songs' ), apply_filters( 'em_songs_post_type', 'songs' ) ), apply_filters( 'em_artist_args', $em_artist_args ) );

	//ALBUM
	$em_album_args = array(
		'label' => __( 'album', 'em' ),
		'labels' => array(
			'name' => __( 'Album', 'em' )
			),
		'public' => true,
		'hierarchical' => false
		);
	register_taxonomy('em_album', array( apply_filters( 'em_album_post_type', 'songs' ), apply_filters( 'em_songs_post_type', 'songs' ) ), apply_filters( 'em_album_args', $em_album_args ) );

	// ADD A SPECIFIC IMAGE SIZE
	add_image_size( 'em-size', 100, 100, true );
}
add_action( 'init', 'em_register_cpt' );

/**
METABOXES
*/
include( EM_PLUGIN_PATH . 'metaboxes.php');

/**
CONNEXION SOUNDCLOUD
*/
function em_connexion_sound_cloud() {
	wp_register_script(
		'soundcloud',
		'http://connect.soundcloud.com/sdk.js',
		false, '1.0', true
	);
	wp_register_script(
		'get-soundcloud',
		EM_PLUGIN_URL . '/js/get-soundcloud.js',
		array( 'soundcloud', 'jquery' ), '1.0', true
	);
	wp_register_script(
		'get-jamendo',
		EM_PLUGIN_URL . '/js/get-jamendo.js',
		array( 'jquery' ), '1.0', true
	);
	wp_enqueue_script( 'jquery' );
}    
 
add_action( 'admin_enqueue_scripts', 'em_connexion_sound_cloud' );
