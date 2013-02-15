<?php
/**
CREATE METABOXES
* @uses em_create_metaboxes FUNCTION to register metaboxes

* @uses em_post_type FILTER HOOK to target an existing post type instead default
*/

function em_create_metaboxes() {
	add_meta_box('em_titre', __( 'Titre' , 'em' ), 'em_titre', apply_filters( 'em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_artiste', __( 'Artiste' , 'em' ), 'em_artiste', apply_filters ('em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_album', __( 'Album' , 'em' ), 'em_album', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_annee_album', __( 'Année Album' , 'em' ), 'em_annee_album', apply_filters( 'em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_num_piste', __( 'Numéro de piste' , 'em' ), 'em_num_piste', apply_filters ('em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_genre', __( 'Genre' , 'em' ), 'em_genre', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_vitesse', __( 'Vitesse' , 'em' ), 'em_num_vitesse', apply_filters ('em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_genre', __( 'Genre' , 'em' ), 'em_genre', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_num_piste', __( 'Numéro de piste' , 'em' ), 'em_num_piste', apply_filters ('em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_genre', __( 'Genre' , 'em' ), 'em_genre', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_duree', __( 'Durée' , 'em' ), 'em_num_duree', apply_filters ('em_post_type', 'songs' ), 'side', 'default' );
	add_meta_box('em_transcript', __( 'Lyrics' , 'em' ), 'em_transcript', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_date_mise_en_ligne', __( 'Date de mise en ligne' , 'em' ), 'em_date_mise_en_ligne', apply_filters ('em_post_type', 'songs' ), 'side', 'default' );
	add_meta_box('em_provider', __( 'Provider' , 'em' ), 'em_provider', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_provider', __( 'Provider' , 'em' ), 'em_provider', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_format', __( 'Format' , 'em' ), 'em_format', apply_filters ('em_post_type', 'songs' ), 'side', 'default' );
	add_meta_box('em_editeur', __( 'Editeur' , 'em' ), 'em_editeur', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_tags', __( 'Tags' , 'em' ), 'em_tags', apply_filters ('em_post_type', 'playlists' ), 'side', 'default' );
	add_meta_box('em_tags', __( 'Tags' , 'em' ), 'em_tags', apply_filters ('em_post_type', 'songs' ), 'side', 'default' );
	add_meta_box('em_encode', __( 'Type Encodage' , 'em' ), 'em_encode', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_date_create', __( 'Date création' , 'em' ), 'em_date_create', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_date_publish', __( 'Date publication' , 'em' ), 'em_date_publish', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_awards', __( 'Awards' , 'em' ), 'em_awards', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_url', __( 'Chemin' , 'em' ), 'em_url', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_url', __( 'Chemin' , 'em' ), 'em_url', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_excerpt', __( 'Extrait' , 'em' ), 'em_excerpt', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_excerpt', __( 'Chemin' , 'em' ), 'em_excerpt', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );




}
add_action("admin_init", "em_create_metaboxes");
