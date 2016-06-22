<?php get_header(); ?>

<?php 
	$counter          = 0;
	$page_index       = 0;
	$posts_types      = array('agenda');

	$page_content     = the_content();

	$events           = query_posts( array( 'post_type' => $posts_types, 'posts_per_page' => '300', 'orderby' => 'menu_order', 'order' => 'ASC' ) );

	$newEvetns        = array();

	for ($i = 0; $i < count($events); ++$i) {
		$event = $events[$i];

		$title                      = get_the_title( $event->ID );
		$link                       = get_field('link', $event->ID);
		//$adicionado_por             = get_field('adicionado_por', $event->ID);
		//$email                      = get_field('email', $event->ID);
		//$evento_id                  = get_field('evento_id', $event->ID);
		$data_inicio                = get_field('data_inicio', $event->ID);
		$data_final                 = get_field('data_final', $event->ID);
		//$local_do_evento            = get_field('local_do_evento', $event->ID);
		$cidade_estado_pais         = get_field('cidade_estado_pais', $event->ID);
		$cover                      = wp_get_attachment_url( get_post_thumbnail_id($event->ID) );

		if(count($data_inicio) >= 1) {
			$event->title               = $title;
			$event->description         = $cidade_estado_pais;
			$event->image               = $cover;
			$event->start               = $data_inicio;
			$event->end                 = $data_final;
			$event->url                 = $link;

			array_push($newEvetns, $event);
		}
	}

	$json_events                  = json_encode($newEvetns);
?>

<!-- Load Facebook SDK for JavaScript -->
	<div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				appId      : '893441747436681',
				cookie     : true,
				xfbml      : true,
				version    : 'v2.5'
			});
		};

		(function(d, s, id){
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>

	<script>
			var events_data = <?php echo $json_events; ?>;
	</script>

	<main role="main" class="calendar">
		<section class="block__post">
			<div class="center">
				<div class="row">
					<div class="col-m-12">
						<div class="block__post--title">
							<h1>agenda do quadrado</h1>

							<a href="<?php bloginfo('template_url'); ?>/inc/modal-agenda.php" class="btn btn-default btn-modal btn-send-event">sugerir um evento</a>
							<!-- <a href="<?php bloginfo('template_url'); ?>/inc/modal-agenda.php" class="btn btn-default btn-modal btn-send-event">Adicionar meus eventos</a> -->

							<div class="block__post--time"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="bg-white">
				<div class="center">
					<div class="block__fullcalendar">
						<div class="block__fullcalendar--actions align-right">
							<button type="button" class="btn btn-white-b btn-disabled btn-week">por semana</button>
							<button type="button" class="btn btn-default btn-active btn-month">por mês</button>
						</div>

						<div id="calendar"></div>

						<div class="entries">
							<?php echo $page_content; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php get_footer(); ?>