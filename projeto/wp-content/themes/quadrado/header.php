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

<!-- FONTS -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,100' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>

<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/ico/favicon.png">

<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/base.css?<?php echo $noCache; ?>" />
<link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css?<?php echo $noCache; ?>" />
<!--[if IE]><link type="text/css" rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/ie.css?<?php echo $noCache; ?>" media="screen" /><![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
	function initialize() {
		var mapCanvas = document.getElementById('map-canvas');
		var mapOptions = {
			center: new google.maps.LatLng(-15.7170862, -47.8849884),
			zoom: 17,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}

		var map = new google.maps.Map(mapCanvas, mapOptions);
		var myLatlng = new google.maps.LatLng(-15.7170862, -47.8849884);
		var image = "<?php bloginfo('template_url'); ?>/img/ico/google-maps-marker.png";

		var contentString = '<div id="content">'+
			'<p>CA 05, Lote F, Ed. San Raphael, Loja 09, Lago Norte - Brasília/DF <a href="https://www.google.com.br/maps/dir/-15.7171524,-47.8847454//@-15.7181907,-47.8825156,587m/data=!3m1!1e3" target="_blank">Traçar rota até aqui</a></p>' +
		'</div>';

		var infowindow = new google.maps.InfoWindow({
		    content: contentString
		});

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			icon: image,
			title: 'CA 05, Lote F, Ed. San Raphael, Loja 09, Lago Norte - Brasília/DF'
		});

		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});

		infowindow.open(map,marker);
	}
	google.maps.event.addDomListener(window, 'load', initialize);
</script>
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

<!-- PARA QUE A MEDIA QUERIES FUNCIONE NO IE8 -->
<!--[if lt IE 9]>
<script src="<?php bloginfo('template_url'); ?>/js/plugins/css3-mediaqueries.js"></script>
<![endif]-->

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9;">
<![endif]-->
</head>
<body <?php body_class( $class ); ?>>
	<header>
		<div class="center">
			<div class="row">
				<div class="col-m-4">
					<a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" class="logo"><img src="<?php bloginfo('template_url'); ?>/img/lgo/logo.png" alt="Quatour &raquo; espaço de ideias"></a>
				</div>

				<div class="col-m-8">
					<div class="col-m-12 align-right header__social">
						<p>Acompanhe:</p>
						<a href="https://www.facebook.com/quatuorideias" target="_blank" class="btn-facebook">facebook</a>
						<a href="https://twitter.com/QuatuorIdeias" target="_blank" class="btn-twitter">Twitter</a>
						<!-- <a href="#this" class="btn-instagram">Instagram</a>
						<a href="#this" class="btn-google">Google+</a> -->
					</div>

					<div class="col-m-12 align-right">
						<?php get_navigation(); ?>

						<!-- <nav class="header__menu">
							<a href="quem-somos.php" class="active">Quem somos</a>
							<div class="menu__subitems">
								<a href="cursos.php">Cursos
									<i class="fa fa-angle-down"></i>
								</a>

								<div class="subitems">
									<a href="curso.php">Curso 1</a>
									<a href="curso.php">Curso 2</a>
									<a href="curso.php">Curso 3</a>
									<a href="curso.php">Curso 4</a>
								</div>
							</div>
							<a href="professores.php">Professores</a>
							<a href="#this">BLOG</a>
							<a href="contato.php">CONTATOS</a>
						</nav> -->
					</div>
				</div>
			</div>
		</div>
	</header>