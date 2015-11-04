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
	return 12;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


add_action( 'init', 'register_my_menus' );

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
function fb_search_filter($query) {
	if ( !$query->is_admin && $query->is_search) {
		$query->set('post_type', array('artes', 'eu-acho', 'feiras', 'mesa', 'passeio', 'pessoas', 'pistas', 'sacolas') ); // id of page or post
	}
	return $query;
}
add_filter( 'pre_get_posts', 'fb_search_filter' );


add_theme_support( "post-thumbnails" );
add_theme_support( "nav-menus" );

add_action( "get_navigation", "get_navigation" );


?>