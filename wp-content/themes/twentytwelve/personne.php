<?php
/*
Template name: Import User
*/

//CONNECT & IMPORT
global $wpdb;
$pers = $wpdb->get_results("SELECT * FROM personne");
$error = array();
foreach ( $pers as $p ) {
	$date = ( $p->date1 == '6666-66-66' ) ? '2003-01-01 00:00:00' : $p->date1 . ' 00:00:00';
	if( ! $p->email || email_exists( $p->email ) ) {
		$p->email = strtolower( sanitize_title( $p->code ) ) . '@informateurjudiciaire.fr';
		$fausseemail = 1;
	}

	$user_id = wp_insert_user( array(
		'user_pass'       => $p->mdp,
		'user_login'      => $p->code,
		'user_email'      => $p->email,
		'role'            => 'subscriber',
		'user_nicename'   => $p->nom,
		'user_registered' => $date
		) );
	if(is_wp_error($user_id)) $error[] =  $user_id;

	$metas = array(
		'last_connexion' => $p->connecte,
		'societe'        => $p->societe,
		'phone1'          => $p->phone,
		'addr1'        => $p->adresse,
		'zip'             => $p->cp,
		'city'          => $p->ville,
		'typeabo' => 'Abonnement papier/internet'
		);
	if( isset( $fausseemail ) )
		$metas[ 'fausseemail' ] = $fausseemail;

	$metas = array_filter( $metas );
	
	foreach( $metas as $k => $m )
		add_user_meta( $user_id, $k, $m );

}

var_dump( $error );

?>