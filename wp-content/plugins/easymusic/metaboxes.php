<?php
/**
CREATE METABOXES
* @uses em_create_metaboxes FUNCTION to register metaboxes

* @uses em_post_type FILTER HOOK to target an existing post type instead default
*/

function em_create_metaboxes() {
	add_meta_box('em_songs', __( 'Informations sur la chanson' , 'em' ), 'em_songs', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_transcript', __( 'Lyrics' , 'em' ), 'em_transcript', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	// add_meta_box('em_provider', __( 'Editeur de la musique' , 'em' ), 'em_provider', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	// add_meta_box('em_date_create', __( 'Date création' , 'em' ), 'em_date_create', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	// add_meta_box('em_date_publish', __( 'Date publication' , 'em' ), 'em_date_publish', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_url', __( 'Chemin' , 'em' ), 'em_url', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	// add_meta_box('em_url', __( 'Chemin' , 'em' ), 'em_url', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box('em_playlists', __( 'Informations sur la playlist' , 'em' ), 'em_playlists', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	//add_meta_box('em_titre', __( 'Titre' , 'em' ), 'em_titre', apply_filters( 'em_post_type', 'playlist' ), 'normal', 'default' );



}
add_action("admin_init", "em_create_metaboxes");



/**
SAVES METABOXES
* @uses em_save_metaboxes FUNCTION to save metaboxes
*/
function em_save_metaboxes( $post_ID ) { 
	if( ( !defined( 'DOING_AJAX' ) || !DOING_AJAX ) )return $post_ID;

	if( isset( $_POST[ 'em_genre' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_genre' ] );
		update_post_meta( $post_ID, '_em_genre', $em_genre );
	}

		if( isset( $_POST[ 'em_titre' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_titre' ] );
		update_post_meta( $post_ID, '_em_titre', $titre );
	}

	if( isset( $_POST[ 'em_artiste' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_artiste' ] );
		update_post_meta( $post_ID, '_em_artiste', $artiste );
	}

	if( isset( $_POST[ 'em_album' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_album' ] );
		update_post_meta( $post_ID, '_em_album', $album );
	}

	if( isset( $_POST[ 'em_annee_album' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_annee_album' ] );
		update_post_meta( $post_ID, '_em_annee_album', $annee_album );
	}

	if( isset( $_POST[ 'em_num_piste' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_num_piste' ] );
		update_post_meta( $post_ID, '_em_num_piste', $num_piste );
	}

	if( isset( $_POST[ 'em_duree' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_duree' ] );
		update_post_meta( $post_ID, '_em_duree', $em_duree );
	}

	if( isset( $_POST[ 'em_vitesse' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_vitesse' ] );
		update_post_meta( $post_ID, '_em_vitesse', $em_vitesse );
	}

	if( isset( $_POST[ 'em_editeur' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_editeur' ] );
		update_post_meta( $post_ID, '_em_editeur', $em_editeur );
	}

	if( isset( $_POST[ 'em_date_mise_en_ligne' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_date_mise_en_ligne' ] );
		update_post_meta( $post_ID, '_em_date_mise_en_ligne', $em_date_mise_en_ligne );
	}

	if( isset( $_POST[ 'em_format' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_format' ] );
		update_post_meta( $post_ID, '_em_format', $em_format );
	}

	if( isset( $_POST[ 'em_encode' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_encode' ] );
		update_post_meta( $post_ID, '_em_encode', $em_encode );
	}

	if( isset( $_POST[ 'em_awards' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_awards' ] );
		update_post_meta( $post_ID, '_em_awards', $em_awards );
	}


		if( isset( $_POST[ 'em_transcript' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_transcript' ] );
		update_post_meta( $post_ID, '_em_transcript', $em_genre );
	}

		if( isset( $_POST[ 'em_playlists' ] ) ) {
		check_admin_referer( 'em_playlists-save_' . $_POST[ 'post_ID' ], 'em_playlists-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_playlists' ] );
		update_post_meta( $post_ID, 'em_playlists', $em_genre );
	}

			if( isset( $_POST[ 'em_url' ] ) ) {
		check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
		$em_genre = sanitize_text_field( $_POST[ 'em_url' ] );
		update_post_meta( $post_ID, 'em_url', $em_genre );
	}


}
add_action( 'save_post', 'em_save_metaboxes' ); 

/**
GENESE METABOX
*/
function em_songs($post){
	$genre = get_post_meta($post->ID,'_em_genre',true);
	$titre= get_post_meta($post->ID,'_em_titre',true);
	$artiste = get_post_meta($post->ID,'_em_artiste',true);
	$album = get_post_meta($post->ID,'_em_album',true);
	$annee_album = get_post_meta($post->ID,'_em_annee_alumb',true);
	$num_piste = get_post_meta($post->ID,'em_num_piste',true);
	$duree = get_post_meta($post->ID,'em_duree',true);
	$vitesse = get_post_meta($post->ID,'em_vitesse',true);
	$editeur = get_post_meta($post->ID,'em_provider',true);
	$date_mise_en_ligne = get_post_meta($post->ID,'em_date_mise_en_ligne',true);
	$format = get_post_meta($post->ID,'em_format',true);
	$encode = get_post_meta($post->ID,'em_encode',true);
	$awards = get_post_meta($post->ID,'em_awards',true);



	wp_nonce_field( 'em_songs-save_'.$post->ID, 'em_songs-nonce' );

	echo 'Genre : <input type="text" name="em_genre" value="'.$genre.'" placeholder="genre"><br />';
	echo 'Titre : <input type="text" name="em_titre" value="'.$titre.'" placeholder="titre"><br />';
	echo 'Artiste : <input type="text" name="em_artiste" value="'.$artiste.'" placeholder="artiste"><br />';
	echo 'Album : <input type="text" name="em_album" value="'.$album.'" placeholder="album"><br />';
	echo 'Année Album : <input type="date" name="em_annee_album" value="'.$annee_album.'"><br />';
	echo 'Numéro de Piste : <input type="int" name="em_num_piste" value="'.$num_piste.'" placeholder="num_piste"><br />';
	echo 'Durée : <input type="text" name="em_duree" value="'.$duree.'" placeholder="duree"><br />';
	echo 'Vitesse : <input type="text" name="em_annee_album" value="'.$vitesse.'" placeholder="Vitesse"><br />';
	echo 'Editeur : <input type="text" name="em_provider" value="'.$editeur.'" placeholder="Editeur"><br />';
	echo 'Date de mise en ligne : <input type="date" name="em_date_mise_en_ligne" value="'.$date_mise_en_ligne.'"><br />';
	echo 'Format : <input type="texte" name="em_format" value="'.$format.'"><br />';
	echo 'Encodage : <input type="texte" name="em_encode" value="'.$encode.'"><br />';
	echo 'Awards : <input type="texte" name="em_awards" value="'.$awards.'"><br />';

}


function em_playlists($post){

	$titre = get_post_meta($post->ID,'_em_titre',true);

	wp_nonce_field( 'em_playlists-save_'.$post->ID, 'em_playlists-nonce' );

	echo '<input type="text" name="em_titre" value="'.$titre.'"><br />';
}

function em_url($post){


	$em_url = get_post_meta($post->ID,'_em_url',true);

	wp_nonce_field( 'em_url-save_'.$post->ID, 'em_url-nonce' );
	echo '<input type="text" size="100" name="em_url" value="'.$em_url.'"><br />';

}

function em_transcript($post){
	$em_transcript = get_post_meta($post->ID,'_em_transcript',true);


	wp_nonce_field( 'em_transcript-save_'.$post->ID, 'em_transcript-nonce' );
	echo '<textarea style="width:100%;" name="em_transcript" value="'.$em_transcript.'">Lyrics</textarea><br />';




}

