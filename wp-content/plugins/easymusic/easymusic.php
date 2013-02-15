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
//compositeur, interpret, anne
//taxo type music
	// ADD A SPECIFIC IMAGE SIZE
	add_image_size( 'em-size', 100, 100, true );
}
add_action( 'init', 'em_register_songs' );

/**
METABOXES
*/
include( EM_PLUGIN_PATH . 'metaboxes.php');

/**
CONNEXION SOUNDCLOUD
*/


function em_connexion_sound_cloud() {
	wp_enqueue_script('jquery');

	wp_enqueue_script(
		'connectsound',
		plugins_url('/js/connectsound.js', __FILE__),
		array('jquery')

	);
}    
 
add_action('wp_enqueue_scripts', 'em_ConnexionSoundCloud');

/**
CREATE PLAYLISTS
* @uses em_register_places FUNCTION to register the CPT

* @uses em_post_type FILTER HOOK to target an existing post type instead creating one
* @uses places_args FILTER HOOK to modify places property 
*/
function em_register_playlists() {
	if( apply_filters( 'em_post_type', 'playlists' ) == 'playlists' ) {
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

	// ADD A SPECIFIC IMAGE SIZE
	add_image_size( 'em-size', 100, 100, true );
}
add_action( 'init', 'em_register_playlists' );


/**
SAVES METABOXES
* @uses nbm_save_metaboxes FUNCTION to save metaboxes
*/
function em_save_metaboxes( $post_ID ) { 
	if( isset( $_POST[ 'em_address' ] ) ) {
		check_admin_referer( 'em_coords-save_' . $_POST[ 'post_ID' ], 'em_coords-nonce' );

		$address = $_POST[ 'em_address' ];
		update_post_meta( $post_ID, '_em_address', $address );	

		// manual coords ?
		if( isset( $_POST[ 'em_do_u_define_coords' ] ) ) {		
			update_post_meta( $post_ID, '_em_do_u_define_coords', 1 );	

			// sexagesimales ?
			if( ! empty( $_POST[ 'w_degres' ] ) && ! empty( $_POST[ 'w_minutes' ] ) && ! empty( $_POST[ 'w_secondes' ] ) && ! empty( $_POST[ 'n_degres' ] ) && ! empty( $_POST[ 'n_minutes' ] ) && ! empty( $_POST[ 'n_secondes' ] ) ) {
				
				// CACULATE LONG
				// DEGRES + or - ?
				if( $_POST[ 'w_degres' ] < 0 ) {
					$longitude = -1*( -1*( intval( $_POST[ 'w_degres' ] ) ) + ( intval( $_POST[ 'w_minutes' ] )/60 ) + ( floatval( $_POST[ 'w_secondes' ] )/3600 ) );
				} else {
					$longitude = -1*( intval( $_POST[ 'w_degres' ] ) + ( intval( $_POST[ 'w_minutes' ] )/60 ) + ( floatval( $_POST[ 'w_secondes' ] )/3600 ) );
				}
				
				// CALCULATE LAT
				$latitude = ( intval( $_POST[ 'n_degres' ] ) ) + ( intval( $_POST[ 'n_minutes' ] )/60 ) + ( floatval( $_POST[ 'n_secondes' ] )/3600 );

				$coords = array( 
					'lat'  => trim( $latitude ), 
					'long' => trim( $longitude ) 
					);
				update_post_meta( $post_ID, '_em_coords', $coords );

				$coords_sexa = array(
					'w_degres'   => $_POST[ 'w_degres' ],
					'w_minutes'  => $_POST[ 'w_minutes' ],
					'w_secondes' => $_POST[ 'w_secondes' ],
					'n_degres'   => $_POST[ 'n_degres' ],
					'n_minutes'  => $_POST[ 'n_minutes' ],
					'n_secondes' => $_POST[ 'n_secondes' ]
					);
				update_post_meta( $post_ID, '_em_coords_sexa', $coords_sexa );

			// decimales ?
			} else {
				$user_coords = explode( ',', trim( $_POST[ 'em_coords' ] ) );
				$coords = array( 
					'lat'  => trim( $user_coords[0] ), 
					'long' => trim( $user_coords[1] ) 
					);
				update_post_meta( $post_ID, '_em_coords', $coords );
			}
		// auto coords
		} else {
			update_post_meta( $post_ID, '_em_do_u_define_coords', 0 );
			$coords = em_get_coords( $address );

			// COORDS RETURN A RESULT
			if( $coords != '' )
				update_post_meta( $post_ID, '_em_coords', $coords );
		}
	}
	if( isset( $_POST[ 'em-colors' ], $_POST[ 'em-letters' ] ) ) {
		check_admin_referer( 'em_icon-save_' . $_POST[ 'post_ID' ], 'em_icon-nonce' );
		update_post_meta( $post_ID, '_em_icon', array( 
			'color'  => $_POST[ 'em-colors' ], 
			'letter' => $_POST[ 'em-letters' ] 
			) );
	}

	if( isset( $_POST[ 'em_tel' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		update_post_meta( $post_ID, '_em_tel', $_POST[ 'em_tel' ] );
	}
	if( isset( $_POST[ 'em_email' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		update_post_meta( $post_ID, '_em_email', is_email( $_POST[ 'em_email' ] ) );
	}
	if( isset( $_POST[ 'em_website' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		update_post_meta( $post_ID, '_em_website', esc_url( $_POST[ 'em_website' ] ) );
	}
	if( isset( $_POST[ 'em_hours' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		update_post_meta( $post_ID, '_em_hours', esc_textarea( $_POST[ 'em_hours' ] ) );
	}
	if( isset( $_POST[ 'em_type_of_place' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		update_post_meta( $post_ID, '_em_type_of_place', sanitize_html_class( $_POST[ 'em_type_of_place' ] ) );
	}
	if( isset( $_POST[ 'em_important' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		if( $_POST[ 'em_important' ] == 'yes' ) {
			$prev = get_option( 'em_important' );
			update_post_meta( $prev, '_em_important', 2);

			update_option( 'em_important', $post_ID );
			update_post_meta( $post_ID, '_em_important', 1);
		} else {
			update_post_meta( $post_ID, '_em_important', 2);
		}
	}
	if( isset( $_POST[ 'em-size' ] ) ) {
		check_admin_referer( 'em_infos-save_' . $_POST[ 'post_ID' ], 'em_infos-nonce' );
		switch( $_POST[ 'em-size' ] ) {
			case 'large' :
				$size = 'large';
				break;
			case 'medium' :
				$size = 'medium';
				break;
			case 'small' :
				$size = 'small';
				break;
			default: '';
		}
		update_post_meta( $post_ID, '_em_size', $size );
	}
	
}
add_action( 'save_post', 'em_save_metaboxes' ); 
