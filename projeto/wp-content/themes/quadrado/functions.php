<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));

function get_navigation()
{
	return include("navigation.php");
}
function the_slug() {
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'];
	return $slug;
}

function new_excerpt_more( $more ) {
	//return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Continue lendo', 'your-text-domain' ) . '</a>';

	return ' <a class="btn btn-link" href="' . get_permalink( get_the_ID() ) . '" title="' . __( 'Continue lendo', 'your-text-domain' ) . '"><i class="fa fa-arrow-right"></i></a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function custom_excerpt_length( $length ) {
	return 150;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


add_action( 'init', 'register_my_menus' );

function excerpt($limit) {
	$permalink = get_the_permalink();
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).' <a class="btn btn-link" href="'.$permalink.'"><i class="fa fa-arrow-right"></i></a>';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

function title_limit($title, $limit) {
	$title_new = explode(' ', $title, $limit);
	if (count($title_new)>=$limit) {
		array_pop($title_new);
		$title_new = implode(" ",$title_new).'...';
	} else {
		$title_new = implode(" ",$title_new);
	}
	$title_new = preg_replace('`\[[^\]]*\]`','',$title_new);
	return $title_new;
}

function content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/\[.+\]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

function register_my_menus() {
	register_nav_menus(
		array(
			'menu-1' => __( 'Menu Principal' ),
			'menu-2' => __( 'Menu 2' )
		)
	);
}

function wp_custom_breadcrumbs() {

	$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter = '/'; // delimiter between crumbs
	$home = 'Página inicial'; // text for the 'Home' link
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$before = '<span class="current">'; // tag before the current crumb
	$after = '</span>'; // tag after the current crumb

	global $post;
	$homeLink = get_bloginfo('url');

	if (is_home() || is_front_page()) {

	if ($showOnHome == 1) echo '<div class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div>';

	} else {

	echo '<div class="breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

	if ( is_category() ) {
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
		echo $before . 'categoria "' . single_cat_title('', false) . '"' . $after;

	} elseif ( is_search() ) {
		//echo $before . 'Busca por "' . get_search_query() . '"' . $after;
		echo $before . 'Resultado de busca' . $after;

	} elseif ( is_day() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time('d') . $after;

	} elseif ( is_month() ) {
		echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
		echo $before . get_the_time('F') . $after;

	} elseif ( is_year() ) {
		echo $before . get_the_time('Y') . $after;

	} elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
			$customTitle = get_the_title();
			$customTitle = str_replace('/', '', $customTitle);
		$post_type = get_post_type_object(get_post_type());
		$slug = $post_type->rewrite;
		echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . $customTitle . $after;
		} else {
		$cat = get_the_category(); $cat = $cat[0];
		$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
		echo $cats;
		if ($showCurrent == 1) echo $before . get_the_title() . $after;
		}

	} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
		$post_type = get_post_type_object(get_post_type());
		echo $before . $post_type->labels->singular_name . $after;

	} elseif ( is_attachment() ) {
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

	} elseif ( is_page() && !$post->post_parent ) {
		if ($showCurrent == 1) echo $before . get_the_title() . $after;

	} elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
		$page = get_page($parent_id);
		$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
		$parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
		echo $breadcrumbs[$i];
		if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
		}
		if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

	} elseif ( is_tag() ) {
		echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

	} elseif ( is_author() ) {
		 global $author;
		$userdata = get_userdata($author);
		echo $before . 'Articles posted by ' . $userdata->display_name . $after;

	} elseif ( is_404() ) {
		echo $before . 'Error 404' . $after;
	}

	if ( get_query_var('paged') ) {
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo __('Page') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
	}

	echo '</div>';

	}
} // end wp_custom_breadcrumbs()

function update_value() {
	// Set variables
	$input_test = $_POST['newValue'];
	$curso_id = $_POST['cursoId'];
	$input_vendido = $_POST['vendido'];

	// Check variables for fallbacks
	if (!isset($input_test) || $input_test == "") { $input_test = "Fall Back"; }
	// Update the field
	update_field('quantidade_de_alunos', $input_test, $curso_id);
	update_field('total_de_vendas', $input_vendido, $curso_id);
}
add_action( 'wp_ajax_nopriv_update_value',  'update_value' );
add_action( 'wp_ajax_update_value','update_value' );


// search filter
function fb_search_filter ($query) {
	if ( !$query->is_admin && $query->is_search) {
		$query->set('post_type', array('artes', 'eu-acho', 'feiras', 'mesa', 'passeio', 'pessoas', 'pistas', 'sacolas') ); // id of page or post
	}
	return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );

// add_action('wp_ajax_ps_get_survey_form', 'ps_get_survey_form');
// add_action('wp_ajax_nopriv_ps_get_survey_form', 'ps_get_survey_form');

// function ps_get_survey_form () {
// 	//do_shortcode( 'foo' );

// 	echo do_shortcode( '[contact-form-7 id="4549" title="Formulário de eventos"]' );
// 	die();
// }

add_action( 'init', create_function('',  'register_shortcode_ajax( "cl_contact_us", "cl_contact_us" ); '));

function register_shortcode_ajax( $callable, $action ) {
	if ( empty( $_POST['action'] ) || $_POST['action'] != $action )
		return;
	call_user_func( $callable );
}

function cl_contact_us() {
	echo do_shortcode( '[contact-form-7 id="4549" title="Formulário de eventos"]' );
	die();
}

function get_facebook_share_count($url) {
	// $fql  = "SELECT url, normalized_url, share_count, like_count, comment_count, ";
	// $fql .= "total_count, commentsbox_count, comments_fbid, click_count FROM ";
	// $fql .= "link_stat WHERE url = '".$url."'";

	//$apifql="https://api.facebook.com/method/fql.query?format=json&query=".urlencode($fql);
	$apifql="http://graph.facebook.com/?id=" . $url;
	// $json=file_get_contents_curl($apifql);
	// $json=json_decode($json);

	$max_redirs = (ini_get('open_basedir') == '' && ini_get('safe_mode' == 'Off')) ? 2 : 0;

	$ch = curl_init();

	$opt_arr = array(
		CURLOPT_URL => $apifql,
		CURLOPT_USERAGENT => $_SERVER['HTTP_USER_AGENT'],
		CURLOPT_FAILONERROR => 1,
		CURLOPT_FOLLOWLOCATION => $max_redirs > 0,
		CURLOPT_RETURNTRANSFER => 1,
		CURLOPT_TIMEOUT => 10,
	);

	curl_setopt_array( $ch, $opt_arr );

	$cont = curl_exec( $ch );

	// if (FALSE === $cont)
	// 	return new Exception(curl_error($ch), curl_errno($ch));
	if(FALSE === $cont)
		return 0;

	$json=json_decode($cont);

	return $json->share->share_count;

	curl_close();
}

function change_post_type_name($postType) {
	if($postType == 'pistas') { $postType = 'pista'; }
	else if($postType == 'eu-acho') { $postType = 'eu acho'; }
	else if($postType == 'artes') { $postType = 'arte'; }
	else if($postType == 'pessoas') { $postType = 'pessoa'; }
	else if($postType == 'sacolas') { $postType = 'sacola'; }
	else if($postType == 'feiras') { $postType = 'feira'; }

	return $postType;
}


add_theme_support( "post-thumbnails" );
add_theme_support( "nav-menus" );

add_action( "get_navigation", "get_navigation" );

function wp_create_event() {
	//echo json_encode( {'mateus': 'asdfasdf'});

	// require_once  $_SERVER["DOCUMENT_ROOT"]."/wp-load.php";
	// ini_set('display_errors', 1);
	// error_reporting('E_ALL');
	//if(isset($_POST['serialize'])) {    //validations

		if(trim($_POST['adicionado_por']) === '' || trim($_POST['email']) === '' || trim($_POST['link']) === '' || trim($_POST['evento_id']) === '') {
			$hasError = true;
		} else {
			$link                   = trim($_POST['link']);
			$adicionado_por         = trim($_POST['adicionado_por']);
			$email                  = trim($_POST['email']);
			$evento_id              = trim($_POST['evento_id']);
			$data_inicio            = trim($_POST['data_inicio']);
			$data_final             = trim($_POST['data_final']);
			$local_do_evento_lat    = trim($_POST['local_do_evento_lat']);
			$local_do_evento_long   = trim($_POST['local_do_evento_long']);
			$cidade_estado_pais     = trim($_POST['cidade_estado_pais']);
			$title                  = trim($_POST['title']);
			$content                = trim($_POST['content']);
			$cover                  = trim($_POST['cover']);
		}

		$link                   = trim($_POST['link']);
		$adicionado_por         = trim($_POST['adicionado_por']);
		$email                  = trim($_POST['email']);
		$evento_id              = trim($_POST['evento_id']);
		$data_inicio            = trim($_POST['data_inicio']);
		$data_final             = trim($_POST['data_final']);
		$local_do_evento_lat    = trim($_POST['local_do_evento_lat']);
		$local_do_evento_long   = trim($_POST['local_do_evento_long']);
		$cidade_estado_pais     = trim($_POST['cidade_estado_pais']);
		$title                  = trim($_POST['title']);
		$content                = trim($_POST['content']);
		$cover                  = trim($_POST['cover']);

		// maybe check some permissions here, depending on your app
		global $wpdb;
		//$nonce = $_POST['nonce'];

		$new_post = array(
			'post_title'             => $title,
			'post_status'            => 'draft',
			'post_type'              => 'agenda',
			'link'                   => $link,
			'email'                  => $email,
			'evento_id'              => $evento_id,
			'data_inicio'            => $data_inicio,
			'data_final'             => $data_final,
			'local_do_evento_lat'    => $local_do_evento_lat,
			'local_do_evento_long'   => $local_do_evento_long,
			'cidade_estado_pais'     => $cidade_estado_pais,
			'post_author'            => '1',
			'post_content'           => $content,
			'post_thumbnail'         => $cover
		);

		$pid = wp_insert_post($new_post);

		// Add field value
		update_field( "email", $email, $pid);
		update_field( "link", $link, $pid);
		update_field( "evento_id", $evento_id, $pid);
		update_field( "data_inicio", $data_inicio, $pid);
		update_field( "data_final", $data_final, $pid);

		$date_format = date_create($data_inicio);
		$date_format = date_format($date_format, 'Ymd');

		update_field( "evento_filtro", $date_format, $pid);

		update_post_meta($pid, 'local_do_evento', array("address" => $cidade_estado_pais, "lat" => $local_do_evento_lat, 'lng' => $local_do_evento_long));
		//update_field( "local_do_evento", array("address" => $cidade_estado_pais, "lat" => $local_do_evento_lat, 'lng' => $local_do_evento_long), $pid);
		update_field( "cidade_estado_pais", $cidade_estado_pais, $pid);
		update_field( "adicionado_por", $adicionado_por, $pid);

		if( !class_exists( 'WP_Http' ) )
			include_once( ABSPATH . WPINC. '/class-http.php' );

		$photo = new WP_Http();
		$photo = $photo->request($cover);

		$attachmentimage = wp_upload_bits( 'cover_'.$evento_id.'.jpg', null, $photo['body'], date("Y-m", strtotime( $photo['headers']['last-modified'] ) ) );

		// Check the type of file. We'll use this as the 'post_mime_type'.
		$filetype = wp_check_filetype( basename( $attachmentimage['file'] ), null );
		$wp_upload_dir = wp_upload_dir();

		$attachment = array(
			'guid'           => $wp_upload_dir['url'] . '/' . basename( $attachmentimage['file'] ),
			'post_mime_type' => $filetype['type'],
			'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $attachmentimage['file'] ) ),
			'post_content'   => '',
			'post_status'    => 'inherit'
		);

		// Insert the attachment.
		$filename = $attachmentimage['file'];
		$attach_id = wp_insert_attachment( $attachment, $filename, $pid );

		// Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
		if( !function_exists( 'wp_generate_attachment_data' ) )
			require_once(ABSPATH . "wp-admin" . '/includes/image.php');
		// Generate the metadata for the attachment, and update the database record.
		$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
		wp_update_attachment_metadata( $attach_id, $attach_data );

		set_post_thumbnail( $pid, $attach_id );

		//wp_insert_attachment( $attachment, $filename, $parent_post_id );
		// if( $pid ) {
		// 	add_post_meta( $pid, 'cpt_firstname', $firstname, true );
		// }

		// send some information back to the javascipt handler
		$response = array(
			'status'        => '200',
			'message'       => 'OK',
			//'cover'         => $filename,
			//'attachment'    => $attachmentimage,
			'new_post_ID'   => $pid
		);

		// normally, the script expects a json respone
		header( 'Content-Type: application/json; charset=utf-8' );
		echo json_encode( $response );
		wp_die();
		//exit; // important
	//}
}

add_action('wp_ajax_nopriv_wp_create_event', 'wp_create_event');
add_action('wp_ajax_wp_create_event', 'wp_create_event');


function randomGen($min, $max, $quantity) {
	$numbers = range($min, $max);
	shuffle($numbers);
	return array_slice($numbers, 0, $quantity);
}

// function fields_in_feed($content) {
//     if(is_feed()) {
//         $post_id = get_the_ID();
//         $output = '<div><h3>Find me on</h3>';
//         $output .= '<p><strong>Facebook:</strong> ' . get_post_meta($post_id, "facebook_url", true) . '</p>';
//         $output .= '<p><strong>Google:</strong> ' . get_post_meta($post_id, "google_url", true) . '</p>';
//         $output .= '<p><strong>Twitter:</strong> ' . get_post_meta($post_id, "twitter_url", true) . '</p>';  
//         $output .= '</div>';
//         $content = $content.$output;
//     }
//     return $content;
// }
// add_filter('the_content','fields_in_feed');

function myfeed_request($qv) {
	if (isset($qv['feed']))
		$qv['post_type'] = get_post_types();
	return $qv;
}
add_filter('request', 'myfeed_request');

?>
