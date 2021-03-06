<?php
/**
CREATE METABOXES
* @uses em_create_metaboxes FUNCTION to register metaboxes

* @uses em_post_type FILTER HOOK to target an existing post type instead default
*/

function em_create_metaboxes() {
	add_meta_box( 'em_songs', __( 'Informations sur la chanson', 'em' ), 'em_songs', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box( 'em_transcript', __( 'Lyrics', 'em' ), 'em_transcript', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box( 'em_url', __( 'Chemin', 'em' ), 'em_url', apply_filters( 'em_post_type', 'songs' ), 'normal', 'default' );
	add_meta_box( 'em_information', __( 'Informations sur la playlist', 'em' ), 'em_information', apply_filters( 'em_post_type', 'playlists' ), 'normal', 'default' );
	add_meta_box( 'em_retrieve', __( 'Retrieve songs', 'em' ), 'em_retrieve', apply_filters( 'em_post_type', 'songs' ), 'side', 'high' );
	add_meta_box( 'em_playlist', __( 'Playlists liées', 'em' ), 'em_playlist', apply_filters( 'em_post_type', 'songs' ), 'side', 'high' );
	add_meta_box( 'em_song_link', __( 'Chansons de la playlist', 'em'), 'em_song_link', apply_filters( 'em_post_type', 'playlists' ), 'side', 'high' );
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
			check_admin_referer( 'em_transcript-save_' . $_POST[ 'post_ID' ], 'em_transcript-nonce' );
			$transcript = sanitize_text_field( $_POST[ 'transcript' ] );
			update_post_meta( $post_ID, '_em_transcript', $transcript );
		}

 

		if( isset( $_POST[ 'em_playlist' ] ) ) {

		check_admin_referer( 'em_playlist-save_' . $_POST[ 'post_ID' ], 'em_playlist-nonce' );
			
			$playlist = get_post_meta($post_ID, '_em_playlist', true);
			if(!$playlist)$playlist = array();
			$playlist[] = sanitize_text_field( $_POST[ 'em_playlist' ] );
			update_post_meta( $post_ID, '_em_playlist', $playlist );
		}



		if( isset( $_POST[ 'em_song_link' ] ) ) {
			check_admin_referer( 'em_song_link-save_' . $_POST[ 'post_ID' ], 'em_song_link-nonce' );
			$em_song_link = sanitize_text_field( $_POST[ 'em_song_link' ] );
			update_post_meta( $post_ID, '_em_song_link', $em_song_link );
		}

		if( isset( $_POST[ 'information' ] ) ) {
			check_admin_referer( 'em_information-save_' . $_POST[ 'post_ID' ], 'em_information-nonce' );
			$information = sanitize_text_field( $_POST[ 'information' ] );
			update_post_meta( $post_ID, '_em_information', $information );
		}

		if( isset( $_POST[ 'em_url' ] ) ) {
			check_admin_referer( 'em_url-save_' . $_POST[ 'post_ID' ], 'em_url-nonce' );
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
	



	wp_nonce_field( 'em_songs-save_' . $post->ID, 'em_songs-nonce' );

	echo '<label style="width:200px;display:inline-block;" for="em_genre">Genre : </label><input type="text" id="em_genre" name="em_genre" value="' . $genre . '" placeholder="genre"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_titre">Titre : </label><input type="text" id="em_titre" name="em_titre" value="' . $titre . '" placeholder="titre"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_artiste">Artiste : </label><input type="text" id="em_artiste" name="em_artiste" value="' . $artiste . '" placeholder="artiste"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_album">Album : </label><input type="text" id="em_album" name="em_album" value="' . $album . '" placeholder="album"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_annee_album">Année Album : </label><input type="date" id="em_annee_album" name="em_annee_album" value="' . $annee_album . '"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_num_piste">Numéro de Piste : </label><input type="int" id="em_num_piste" name="em_num_piste" value="' . $num_piste . '" placeholder="num_piste"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_duree">Durée : </label><input type="text" id="em_duree" name="em_duree" value="' . $duree . '" placeholder="duree"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_vitesse">Vitesse : </label><input type="text" id="em_vitesse" name="em_vitesse" value="' . $vitesse . '" placeholder="Vitesse"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_provider">Editeur : </label><input type="text" id="em_provider" name="em_provider" value="' . $editeur . '" placeholder="Editeur"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_date_mise_en_ligne">Date de mise en ligne : </label><input type="date" id="em_date_mise_en_ligne" name="em_date_mise_en_ligne" value="' . $date_mise_en_ligne . '"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_format">Format : </label><input type="texte" id="em_format" name="em_format" value="' . $format . '"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_encode">Encodage : </label><input type="texte" id="em_encode" name="em_encode" value="' . $encode . '"><br />';
	echo '<label style="width:200px;display:inline-block;" for="em_awards">Awards : </label><input type="texte" id="em_awards" name="em_awards" value="' . $awards . '"><br />';
	

}

function em_song_link ( $post ){

	$em_song_link = get_post_meta( $post->ID, '_em_song_link', true );
	// print_r($em_song_link);
	wp_nonce_field( 'em_song_link-save_' . $post->ID, 'em_song_link-nonce' );


	$songs = array(
		'post_type'=>'songs',
		'meta_key'=>'_em_playlist',
		'meta_query'=>array(
			array(
				'key'=>'_em_playlist',
				'value' => $post->ID,
				'compare'=> '=',
				)
			)
		);

	 $query = new WP_Query($songs);

		echo'<ul>';

		while ( $query->have_posts() ) :
		$query->the_post();
		echo '<li class="tag_playlist">'.get_the_title().'</li>'; 
		endwhile;
		echo '</ul>';


}

function em_playlist ( $post ){
	// echo "Liste des playlists liées<br />";
	$em_playlist = get_post_meta( $post->ID, '_em_playlist', true );
	wp_nonce_field( 'em_playlist-save_' . $post->ID, 'em_playlist-nonce' );

	//REQUETE QUI RECUPERE LES PLAYLISTS LIEES A LA CHANSON
	if( ! empty($em_playlist) ):
	foreach($em_playlist as $p) :
		$title_playlist = get_the_title($p);
		// echo '<br />';
		echo '<div class="tag_playlist" style="background:#dedede; border-radius:5px; padding:5px; border:1px solid #888; width:95%;">'.$title_playlist.'</div>'; 
	endforeach; 
	endif;

	echo '<hr>';

	echo 'Lier à une playlist <br />';

	//REQUETE QUI RECUPERE LES PLAYLISTS POUR LA LIAISON 

	$playlists = get_posts('posts_per_page=-1&post_type=playlists');
	echo '<select style="width:250px;" name="em_playlist">'; // JE SAIS C CRADE
	if($playlists):
	  	foreach($playlists as $p) :
				echo '<option value="'.$p->ID.'">'.$p->post_title.'</option>'; 
		endforeach; 
	endif;
	echo '</select>';

}



function em_transcript( $post ) {
	$em_transcript = get_post_meta( $post->ID, '_em_transcript', true );
	wp_nonce_field( 'em_transcript-save_' . $post->ID, 'em_transcript-nonce' );
	wp_editor($em_transcript, 'transcript', array( 'media_buttons' => false ) );
}

function em_information( $post ) {
	$em_information = get_post_meta( $post->ID, '_em_information', true );
	wp_nonce_field( 'em_information-save_' . $post->ID, 'em_information-nonce' );
	wp_editor($em_information, 'information', array( 'media_buttons' => false ) );
}

function em_url( $post ) {
	$em_url = get_post_meta( $post->ID, '_em_url', true );
	wp_nonce_field( 'em_url-save_' . $post->ID, 'em_url-nonce' );
	echo '<input type="text" size="100" name="em_url" value="' . $em_url . '"><br />';
}



function em_retrieve( $post ) {

	echo '<div id="em-import-tabs" class="categorydiv">';

	echo '<ul class="category-tabs">';
	echo '    <li class="tabs"><a href="#soundcloud">SoundCloud</a></li>';
	echo '    <li><a href="#grooveshark">Grooveshark</a></li>';
	// echo '    <li><a href="#tabs-3">Third</a></li>';
	echo '</ul>';

		//Retrieve from Jamendo

		//Retrieve from SoundCLoud
		echo '<div id="soundcloud" class="tabs-panel">';
			echo '<h4>' . __( 'What are you looking for ?', 'em' ) . '</h4>';
			echo '<input type="search" style="width:100%;" id="em-search" placeholder="my search on SoundCloud...">';
			echo '<p><input type="radio" name="search-type" class="search-type" id="search-type-track" value="track" checked> <label for="search-type-track">' . __( 'Songs', 'em' ) . '</label><br/>';
			echo '<input type="radio" name="search-type" class="search-type" id="search-type-artist" value="user"> <label for="search-type-artist">' . __( 'Users', 'em' ) . '</label></p>';
			echo '<button id="search-to-soundcloud" class="button-secondary" style="margin-bottom:1em;">' . __( 'Search to SoundCloud', 'em' ) . '</button>';
		echo '</div>';

		//Retrieve from Grooveshark
		echo '<div id="grooveshark" class="tabs-panel" style="display:none;">';
			echo '<h4>' . __( 'What are you looking for ?', 'em' ) . '</h4>';
			echo '<input type="search" style="width:100%;" id="em-search-gs" placeholder="my search on Grooveshark...">';
			echo '<p><input type="radio" name="search-type-gs" class="search-type-gs" id="search-type-track-gs" value="title" checked> <label for="search-type-track-gs">' . __( 'Title', 'em' ) . '</label><br/>';
			echo '<input type="radio" name="search-type-gs" class="search-type-gs" id="search-type-artist-gs" value="artist"> <label for="search-type-artist-gs">' . __( 'Artist', 'em' ) . '</label><br/>';
			echo '<input type="radio" name="search-type-gs" class="search-type-gs" id="search-type-album-gs" value="album"> <label for="search-type-album-gs">' . __( 'Album', 'em' ) . '</label></p>';
			echo '<button id="search-to-grooveshark" class="button-secondary" style="margin-bottom:1em;">' . __( 'Search to Grooveshark', 'em' ) . '</button>';
		echo '</div>';

	echo '</div>';

	// wp_enqueue_script( 'get-jamendo' );
	wp_enqueue_script( 'get-soundcloud' );
	wp_localize_script( 'get-soundcloud', 'emsc', array(
		'defaultImg' => EM_PLUGIN_URL . '/img/gifs_07.gif',
		'apikey'     => 'cc1adde6d38da9d175c6959e26752262'
		) );

	wp_enqueue_script( 'get-grooveshark' );
	wp_localize_script( 'get-grooveshark', 'emgs', array(
		'defaultImg' => EM_PLUGIN_URL . '/img/gifs_07.gif',
		'artist'     => __( 'Artist', 'em' ),
		'album'      => __( 'Album', 'em' )
		) );

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-ui-tabs' );
	wp_enqueue_script( 'em-tabs' );

}

function em_area(){
	echo '<div id="em-import-box" class="em-import-box" style="display:none;"><div class="em-import-content media-modal wp-core-ui">';

		//close
		echo '<a class="media-modal-close" id="em-close-area" href="#" title="' . __( 'Close', 'em' ) . '"><span class="media-modal-icon"></span></a>';

		//menu
		echo '<div class="media-frame-menu">';
			echo '<div class="media-menu">';
				echo '<a href="#" class="media-menu-item active">' . __( 'Select a song, then chose import options', 'em' ) . '</a>';
				echo '<div class="separator"></div>';
				
				echo '<div class="em-import-sidebar"><ul>';
					echo '<li><input type="checkbox" value="all" id="em-import-all"> <label for="em-import-all">' . __( 'Import all information', 'em' ) . '</label></li>';
				echo '</ul>';

				echo '<button id="em-launch-import" class="em-launch-button button button-primary button-large">' . __( 'Import', 'em' ) . '</button></div>';
			echo '</div>';
		echo '</div>';

		//titre
		echo '<div class="media-frame-title em-import-title"><h1>' . __( 'Import from SoundCloud', 'em' ) . '</h1></div>';

		//content
		echo '<div id="em-import-content" class="media-frame-content"></div>';

	echo '</div><div class="em-backdrop media-modal-backdrop"></div></div>';
}
add_action( 'admin_footer', 'em_area' );

function em_load_admin_scripts(){
	wp_register_style( 'em-admin-style', EM_PLUGIN_URL . '/css/admin-style.css', false, '1.0', 'all' );
	wp_enqueue_style( 'em-admin-style' );
}
add_action( 'admin_enqueue_scripts', 'em_load_admin_scripts' );