<?php
/*
Plugin Name: Custom Rest API
Description: DO NOT DISABLE/REMOVE THIS... this plugin is essential for android app!
Version:     1.1
Author:      Ahmad Givekesh
Author URI:  baboon.ir
License:     Apache v2.0
License URI: http://www.apache.org/licenses/LICENSE-2.0
*/

add_action( 'rest_api_init', function () {
	
	register_rest_route( 'givekesh', '/posts', array(
		'methods' => 'GET',
		'callback' => 'get_feeds',
	) );
} );

add_action( 'rest_api_init', function () {

	register_rest_route( 'givekesh', '/posts/(?P<id>\d+)', array(
		'methods' => 'GET',
		'callback' => 'get_post_by_id',
		'args' => array(
			'id' => array(
				'validate_callback' => function($param, $request, $key) {
					return is_numeric( $param );
				}
			),
		),
	) );
} );

function get_post_by_id($data){
	
	$post_by_id = get_post($data['id']);

	if(empty ($post_by_id) )
		return new WP_Error( 'OPS...', 'Post Not Found.', array( 'status' => 404 ) );
	
		$author_id = $post_by_id->post_author;
		$feed['id'] = $post_by_id->ID;
		$feed['date'] = $post_by_id->post_date;		
		$feed['title'] = array('rendered' => $post_by_id->post_title);
		$feed['content'] = array('rendered' => $post_by_id->post_content);
		$feed['excerpt'] = array('rendered' => my_trim_excerpt( $post_by_id->post_content));
		$feed['author_info'] = array(
			"id" => $author_id, 
			"display_name" => get_the_author_meta('display_name', $author_id),
			"avatar_url"=> get_avatar_url($author_id));
		$feed['image'] = array(
			'source_url' => get_site_url().wp_get_attachment_url(get_post_thumbnail_id($post_by_id->ID)));

	return $feed;
}

function get_feeds() {

	$posts = get_posts( array(
			'post_type' => 'post',
			'posts_per_page' => isset($_GET['per_page']) ? $_GET['per_page'] : 10,
			's' => isset($_GET['search']) ? $_GET['search'] : '',
			'offset' => isset($_GET['page']) ? ($_GET['page'] - 1) * 10: 0,
			'category_name' => isset($_GET['category_name']) ? $_GET['category_name'] : '',
			) );
			
	if(empty ($posts) )
		return new WP_Error( 'OPS...', 'Something Went Wrong In Our End! Please Try Later.', array( 'status' => 404 ) );
	

	$i = 0;

	foreach($posts as $post){
		$author_id = $post->post_author;
		$feeds[$i]['id'] = $post->ID;
		$feeds[$i]['date'] = $post->post_date;		
		$feeds[$i]['title'] = array('rendered' => $post->post_title);
		$feeds[$i]['content'] = array('rendered' => $post->post_content);
		$feeds[$i]['excerpt'] = array('rendered' => my_trim_excerpt( $post->post_content));
		$feeds[$i]['author_info'] = array(
			"id" => $author_id, 
			"display_name" => get_the_author_meta('display_name', $author_id),
			"avatar_url"=> get_avatar_url($author_id));
		$feeds[$i++]['image'] = array(
			'source_url' => get_site_url().wp_get_attachment_url(get_post_thumbnail_id($post->ID)));					
	}

	return $feeds;
}

function my_trim_excerpt( $text, $length = 55, $more = ' [&hellip;]'  ){
     $text = strip_shortcodes( $text );
     $text = apply_filters( 'the_content', $text );
     $text = str_replace(']]>', ']]&gt;', $text);

     $excerpt = wp_trim_words( $text, $length, $more );
     return $excerpt;
}