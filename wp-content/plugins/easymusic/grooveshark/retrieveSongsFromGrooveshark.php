<?php

// KEY 
// wordpress_share

// SECRET
// 5198c918e63020eeae77e1c544c3cd1c

function em_retrieveSongsFromGrooveshark(){

	require( "class/gsAPI.php" );

	$gsapi = new gsapi( 'wordpress_share', '5198c918e63020eeae77e1c544c3cd1c' );

	$gsapi->startSession();
	//please cache this session and use setSession('session')

	$gsapi->getCountry( $_SERVER[ 'REMOTE_ADDR' ] );
	//just need to call this, it will store itself in gsapi

	require( "class/gsSearch.php" );

	$gsSearch = new gsSearch();

	/**
	WHAT DID I WANT TO SEARCH ?
	* @uses album ? artist ? title ?
	*/
	if( isset( $_POST[ 'title' ] ) )
		$gsSearch->setTitle( $_POST[ 'title' ] );

	if( isset( $_POST[ 'artist' ] ) )
		$gsSearch->setArtist( $_POST[ 'artist' ] );

	if( isset( $_POST[ 'album' ] ) )
		$gsSearch->setAlbum( $_POST[ 'album' ] );

	$results = $gsSearch->songSearchResults();

	echo json_encode( $results );
	exit;

}
add_action( 'wp_ajax_retrieveSongFromGrooveshark', 'em_retrieveSongsFromGrooveshark' );