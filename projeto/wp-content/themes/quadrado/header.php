<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title><?php bloginfo('name'); ?>  <?php
			if ( is_single() ) { ?> &raquo; <?php single_post_title(); }
			elseif ( is_home() || is_front_page() ) { ?> &raquo; <?php print ' Home' ; }//bloginfo('description'); }
			elseif ( is_page() ) { ?> &raquo; <?php single_post_title(''); }
			elseif ( is_search() ) { ?> &raquo; <?php print ' | Resultado da busco por ' . wp_specialchars($s); }
			elseif ( is_404() ) { ?> &raquo; <?php print ' | Página não encontrada'; }
			else { ?> &raquo; <?php wp_title('|'); }
		?></title>
		<?php $noCache = getdate(); ?>
		<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
		<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; <?php bloginfo('charset'); ?>" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="all" type="text/css" />

		<!-- PARA QUE A MEDIA QUERIES FUNCIONE NO IE8 -->
		<!--[if lt IE 9]>
		<script src="<?php bloginfo('template_url'); ?>/js/plugins/css3-mediaqueries.js"></script>
		<![endif]-->

		<!-- FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Martel:400,200,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Amatic+SC:400,700' rel='stylesheet' type='text/css'>

		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon_pq.png">

		<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/base.css?<?php echo $noCache; ?>" />
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css?<?php echo $noCache; ?>" />
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jQuery.fullcalendar.css" media="screen" />
		<!--[if IE]><link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css?<?php echo $noCache; ?>" media="screen" /><![endif]-->

		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9;">
		<![endif]-->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<script>
			var events_data = '';
		</script>
		<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
	</head>
<!--[if !IE]>  -->
	<body <?php body_class( $class ); ?>>
<!-- <![endif]-->
<!--[if IE 9]>
	<body class="ie9">
<![endif]-->
<!--[if IE 10]>
	<body class="ie10">
<![endif]-->
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '893441747436681',
				xfbml      : true,
				version    : 'v2.5'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/pt_BR/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<div id="global">
		<!-- IMAGEM DE BACKGROUND EM DESTAQUE -->
		<!-- <div class="header__image--post header__image--post-random">
			<img src="<?php echo $imagem_de_fundo['url'] ?>" class="header__image--post-preloading" alt="<?php echo $imagem_de_fundo['title'] ?>">
			<img src="<?php echo $imagem_de_fundo['url'] ?>" alt="<?php echo $imagem_de_fundo['title'] ?>">
		</div> -->
		<?php 
			$post_gallery = get_post_gallery(6185, false);

			//var_dump($post_gallery['src'][0]);
		?>

		<div class="header__image--post">
			<img src="<?php echo $post_gallery['src'][0]; ?>" alt="Quadrado Brasilia">
		</div>


		<header class="header">
			<div class="center">
				<div class="row">
					<div class="col-m-12 align-right header__top">
						<div class="header__search">
							<a href="#this" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>

							<form name="search" class="form-search" action="<?php bloginfo('home'); ?>/" method="get">
								<input type="search" name="s" id="s" class="form-style" placeholder="O que deseja buscar?" value="<?php echo wp_specialchars($s, 1); ?>">
							</form>
						</div>

						<div class="header__social">
							<a href="https://www.facebook.com/QuadradoBrasilia/" target="_blank" class="btn btn-default btn-facebook"><i class="fa fa-facebook"></i></a>
						</div>

						<a href="<?php echo get_permalink( get_page_by_path('contato')); ?>" class="btn btn-default btn-contact">contato</a>

						<a href="<?php echo get_permalink( get_page_by_path('sobre-a-gente')); ?>" class="btn btn-default btn-about">sobre a gente</a>
					</div>
				</div>

				<div class="row">
					<div class="col-m-3 align-center">
						<h1 class="header__logo"><a href="<?php bloginfo('url'); ?>">Quadrado Brasilia a cidade é do tamanho que a gente quer</a></h1>
					</div>
				</div>
			</div>

			<div class="header__menu--second">
				<div class="center">
					<div class="col-m-2">
						<a href="<?php bloginfo('url'); ?>" class="header__menu--logo"><span>Quadrado Brasilia</span></a>
					</div>

					<div class="col-m-7">
						<nav class="header__menu--links">
							<div class="dropdown">
								<a href="<?php echo get_permalink( get_page_by_path('todos-posts')); ?>">todos os posts <i class="fa fa-angle-down"></i></a>

								<ul>
									<li><a href="<?php bloginfo('url'); ?>/artes">artes</a></li>
									<li><a href="<?php bloginfo('url'); ?>/eu-acho">eu acho</a></li>
									<li><a href="<?php bloginfo('url'); ?>/feiras">feira</a></li>
									<li><a href="<?php bloginfo('url'); ?>/mesa">mesa</a></li>
									<li><a href="<?php bloginfo('url'); ?>/passeio">passeio</a></li>
									<li><a href="<?php bloginfo('url'); ?>/pessoas">pessoas</a></li>
									<li><a href="<?php bloginfo('url'); ?>/pistas">pista</a></li>
									<li><a href="<?php bloginfo('url'); ?>/sacolas">sacola</a></li>
								</ul>
							</div>

							<a href="<?php echo get_permalink( get_page_by_path('mapa')); ?>">mapa do quadrado</a>
							<a href="<?php echo get_permalink( get_page_by_path('agenda')); ?>">agenda</a>
							<a href="<?php echo get_permalink( get_page_by_path('sobre-a-gente')); ?>">sobre a gente</a>
							<a href="<?php echo get_permalink( get_page_by_path('contato')); ?>">contato</a>
						</nav>
					</div>

					<div class="col-m-3 align-right">
						<div class="header__search">
							<a href="search-result.php" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>

							<form name="search" class="form-search" action="<?php bloginfo('home'); ?>/" method="get">
								<input type="search" name="s" id="s" class="form-style" placeholder="O que deseja buscar?" value="<?php echo wp_specialchars($s, 1); ?>">
							</form>
						</div>

						<div class="header__social">
							<a href="#this" class="btn btn-default btn-facebook"><i class="fa fa-facebook"></i></a>
						</div>
					</div>
				</div>
			</div>

			<!-- <div class="header__overlay"></div> -->
		</header>