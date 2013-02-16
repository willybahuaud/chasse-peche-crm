<?php
/**
CREATE METABOXES
* @uses em_create_metaboxes FUNCTION to register metaboxes

* @uses em_post_type FILTER HOOK to target an existing post type instead default
*/

function em_create_metaboxes() {
	add_meta_box('em_songs', __( 'Informations sur la chanson', 'em' ), 'em_songs', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_transcript', __( 'Lyrics', 'em' ), 'em_transcript', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_url', __( 'Chemin', 'em' ), 'em_url', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box('em_playlists', __( 'Informations sur la playlist', 'em' ), 'em_playlists', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
}
add_action("admin_init", "em_create_metaboxes");



/**
SAVES METABOXES
* @uses em_save_metaboxes FUNCTION to save metaboxes
*/
function em_save_metaboxes( $post_ID ) { 

		if( isset( $_POST[ 'em_genre' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_genre = sanitize_text_field( $_POST[ 'em_genre' ] );
			update_post_meta( $post_ID, '_em_genre', $em_genre );
		}

		if( isset( $_POST[ 'em_titre' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_titre = sanitize_text_field( $_POST[ 'em_titre' ] );
			update_post_meta( $post_ID, '_em_titre', $em_titre );
		}

		if( isset( $_POST[ 'em_artiste' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$artiste = sanitize_text_field( $_POST[ 'em_artiste' ] );
			update_post_meta( $post_ID, '_em_artiste', $artiste );
		}

		if( isset( $_POST[ 'em_album' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$album = sanitize_text_field( $_POST[ 'em_album' ] );
			update_post_meta( $post_ID, '_em_album', $album );
		}

		if( isset( $_POST[ 'em_annee_album' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$annee_album = sanitize_text_field( $_POST[ 'em_annee_album' ] );
			update_post_meta( $post_ID, '_em_annee_album', $annee_album );
		}

		if( isset( $_POST[ 'em_num_piste' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$num_piste = sanitize_text_field( $_POST[ 'em_num_piste' ] );
			update_post_meta( $post_ID, '_em_num_piste', $num_piste );
		}

		if( isset( $_POST[ 'em_duree' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_duree = sanitize_text_field( $_POST[ 'em_duree' ] );
			update_post_meta( $post_ID, '_em_duree', $em_duree );
		}

		if( isset( $_POST[ 'em_vitesse' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_vitesse = sanitize_text_field( $_POST[ 'em_vitesse' ] );
			update_post_meta( $post_ID, '_em_vitesse', $em_vitesse );
		}

		if( isset( $_POST[ 'em_provider' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_provider = sanitize_text_field( $_POST[ 'em_provider' ] );
			update_post_meta( $post_ID, '_em_provider', $em_provider );
		}

		if( isset( $_POST[ 'em_date_mise_en_ligne' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_date_mise_en_ligne = sanitize_text_field( $_POST[ 'em_date_mise_en_ligne' ] );
			update_post_meta( $post_ID, '_em_date_mise_en_ligne', $em_date_mise_en_ligne );
		}

		if( isset( $_POST[ 'em_format' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_format = sanitize_text_field( $_POST[ 'em_format' ] );
			update_post_meta( $post_ID, '_em_format', $em_format );
		}

		if( isset( $_POST[ 'em_encode' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_encodage = sanitize_text_field( $_POST[ 'em_encode' ] );
			update_post_meta( $post_ID, '_em_encode', $em_encodage );
		}

		if( isset( $_POST[ 'em_awards' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$em_awards = sanitize_text_field( $_POST[ 'em_awards' ] );
			update_post_meta( $post_ID, '_em_awards', $em_awards );
		}

		if( isset( $_POST[ 'transcript' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$transcript = sanitize_text_field( $_POST[ 'transcript' ] );
			update_post_meta( $post_ID, '_em_transcript', $transcript );
		}

		if( isset( $_POST[ 'em_playlists' ] ) ) {
			check_admin_referer( 'em_playlists-save_' . $_POST[ 'post_ID' ], 'em_playlists-nonce' );
			$playlists = sanitize_text_field( $_POST[ 'em_playlists' ] );
			update_post_meta( $post_ID, '_em_playlists', $playlists );
		}

		if( isset( $_POST[ 'em_url' ] ) ) {
			check_admin_referer( 'em_songs-save_' . $_POST[ 'post_ID' ], 'em_songs-nonce' );
			$url = sanitize_text_field( $_POST[ 'em_url' ] );
			update_post_meta( $post_ID, '_em_url', $url );
		}
}
add_action( 'save_post', 'em_save_metaboxes' ); 

/**
GENESE METABOX
*/
function em_songs($post){
	$genre              = get_post_meta( $post->ID, '_em_genre', true );
	$titre              = get_post_meta( $post->ID, '_em_titre', true );
	$artiste            = get_post_meta( $post->ID, '_em_artiste', true );
	$album              = get_post_meta( $post->ID, '_em_album', true );
	$annee_album        = get_post_meta( $post->ID, '_em_annee_album', true );
	$num_piste          = get_post_meta( $post->ID, '_em_num_piste', true );
	$duree              = get_post_meta( $post->ID, '_em_duree', true );
	$vitesse            = get_post_meta( $post->ID, '_em_vitesse', true );
	$editeur            = get_post_meta( $post->ID, '_em_provider', true );
	$date_mise_en_ligne = get_post_meta( $post->ID, '_em_date_mise_en_ligne', true );
	$format             = get_post_meta( $post->ID, '_em_format', true );
	$encode             = get_post_meta( $post->ID, '_em_encode', true );
	$awards             = get_post_meta( $post->ID, '_em_awards', true );



	wp_nonce_field( 'em_songs-save_'.$post->ID, 'em_songs-nonce' );

	echo '<label style="width:200px;display:inline-block;" for="em_genre">Genre : </label><input type="text" id="em_genre" name="em_genre" value="'.$genre.'" placeholder="genre"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_titre">Titre : </label><input type="text" id="em_titre" name="em_titre" value="'.$titre.'" placeholder="titre"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_artiste">Artiste : </label><input type="text" id="em_artiste" name="em_artiste" value="'.$artiste.'" placeholder="artiste"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_album">Album : </label><input type="text" id="em_album" name="em_album" value="'.$album.'" placeholder="album"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_annee_album">Année Album : </label><input type="date" id="em_annee_album" name="em_annee_album" value="'.$annee_album.'"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_num_piste">Numéro de Piste : </label><input type="int" id="em_num_piste" name="em_num_piste" value="'.$num_piste.'" placeholder="num_piste"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_duree">Durée : </label><input type="text" id="em_duree" name="em_duree" value="'.$duree.'" placeholder="duree"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_vitesse">Vitesse : </label><input type="text" id="em_vitesse" name="em_vitesse" value="'.$vitesse.'" placeholder="Vitesse"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_provider">Editeur : </label><input type="text" id="em_provider" name="em_provider" value="'.$editeur.'" placeholder="Editeur"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_date_mise_en_ligne">Date de mise en ligne : </label><input type="date" id="em_date_mise_en_ligne" name="em_date_mise_en_ligne" value="'.$date_mise_en_ligne.'"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_format">Format : </label><input type="texte" id="em_format" name="em_format" value="'.$format.'"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_encode">Encodage : </label><input type="texte" id="em_encode" name="em_encode" value="'.$encode.'"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_awards">Awards : </label><input type="texte" id="em_awards" name="em_awards" value="'.$awards.'"><br />';

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
	wp_editor($em_transcript, 'transcript' );
}

