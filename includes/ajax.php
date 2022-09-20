<?php

/**
 * NA Custom Post Type settings wrapper class
 * @see     class-nacpt-pages
 * @author  Naveed Anjum <s.naveedanjum@gmail.com>
 * @link    http://naveedanjum.info
 * @version 1.0.0 (01-Jun-2022)
 */

//function to check post type already exists with Ajax.
/**
 * @return void
 */
function npt_post_type_validation() {
	/**
	 * assigning $nounce, $slug values.
	 * @var $nounce
	 * @var $slug
	 */
	$nonce = $_POST[ 'nonce' ];
	$slug  = $_POST[ 'slug' ];
	$post_type = $_POST[ 'post_type' ];
	
	//check if $nounce value is set and verify it.
	if ( isset( $nonce ) && wp_verify_nonce( $nonce, 'npt_nonce' ) ) {
		
		/**
		 * list of existing post types.
		 * @var array[] $post_types .
		 */
		$all              = array();
		$alert = '';
		if ( $post_type == 'npt-post-type' ) {
			$additional = array( 'action' => 'action', 'author' => 'author', 'order' => 'order', 'theme' => 'theme' );
			$core    = get_post_types( array( '_builtin' => true ) );
			$public  = get_post_types( array( '_builtin' => false, 'public' => true ) );
			$private = get_post_types( array( '_builtin' => false, 'public' => false ) );
			$all      = array_merge( $additional, $core, $public, $private );
			$alert = 'Post type';
		}
		if ( $post_type == 'npt-taxonomy' ) {
			$core    = get_taxonomies( array( '_builtin' => true ) );
			$public  = get_taxonomies( array( '_builtin' => false, 'public' => true, ) );
			$private = get_taxonomies( array( '_builtin' => false, 'public' => false, ) );
			$all     = array_merge( $core, $public, $private );
			$alert = 'Taxonomy';
		}
		
		//check if $slug is empty and display error text.
		if ( in_array( $slug, $all ) ) {
			//Return data in JSON format.
			$output = json_encode( array( 'type' => 'error', 'text' => '<span class="dashicons dashicons-warning"></span> '.$alert.' slug already exists.' ) );
		} else {
			//Return data in JSON format.
			$output = json_encode( array( 'type' => 'success', 'text' => '' ) );
		}
		die( $output );
	}
}

add_action( 'wp_ajax_npt_slug_validation', 'npt_post_type_validation' );
add_action( 'wp_ajax_nopriv_npt_slug_validation', 'npt_post_type_validation' );

//function to check post type already exists with Ajax.
/**
 * @return void
 */
function check_npt_change_icon() {
	/**
	 * assigning $nounce, $icon values.
	 * @var $nounce
	 * @var $icon
	 */
	$nonce = $_POST[ 'nonce' ];
	$icon  = $_POST[ 'icon' ];
	
	//check if $nounce value is set and verify it.
	if ( isset( $nonce ) && wp_verify_nonce( $nonce, 'npt_nonce' ) ) {
		if ( $icon ) {
			//Return data in JSON format.
			$url    = npt_get_setting( 'url' );
			$output = json_encode( array(
				'type' => 'data',
				'icon' => get_npt_svg_icon( $icon, 30, '#000000' )
			) );
			die( $output );
			
		}
	}
}

add_action( 'wp_ajax_npt_icon_script', 'check_npt_change_icon' );
add_action( 'wp_ajax_nopriv_npt_icon_script', 'check_npt_change_icon' );