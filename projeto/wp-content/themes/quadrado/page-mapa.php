<?php get_header(); ?>

<?php 
	$counter				= 0;
	$page_index				= 0;
	$posts_types			= array('lugares');

	$places					= query_posts( array( 'post_type' => $posts_types, 'posts_per_page' => '1000', 'orderby' => 'menu_order', 'order' => 'ASC' ) );

	for ($i = 0; $i < count($places); ++$i) {
		$lat_long										= get_field('localizacao', $places[$i]->ID);
		$link_do_post									= get_field('link_do_post_sobre_o_lugar', $places[$i]->ID);
		$imagem											= get_field('imagem', $places[$i]->ID);
		$horario_de_funcionamento						= get_field('horario_de_funcionamento', $places[$i]->ID);
		$categories										= wp_get_post_categories($places[$i]->ID);
		$cats											= array();

		foreach($categories as $c){
			$cat										= get_category( $c );
			$category_link								= get_category_link($c);
			$cats[]										= array( 'name' => $cat->name, 'slug' => $cat->slug, 'permalink' => esc_url( $category_link ) );
		}

		$places[$i]->localizacao						= $lat_long;
		$places[$i]->link_do_post						= $link_do_post;
		$places[$i]->imagem								= $imagem;
		$places[$i]->horario_de_funcionamento			= $horario_de_funcionamento;
		$places[$i]->categories							= $cats;
	}

	$json_pages				= json_encode($places);
?>

		<script>
			var places_data = <?php echo $json_pages; ?>;

			function ready(fn) {
				if (document.readyState != 'loading'){
					fn();
				} else {
					document.addEventListener('DOMContentLoaded', fn);
				}
			}

			ready(function () {
				MM.GoogleMaps(document.getElementById('google__map'), places_data);
			});
		</script>

			<main role="main" class="map">
				<section class="block__post">
					<div class="center">
						<div class="row">
							<div class="col-m-12">
								<div class="block__post--title">
									<h1>mapa do quadrado</h1>

									<div class="block__post--category align-right">
										<!-- <a href="#this" class="btn btn-default2">filtro do mapa</a> -->
									</div>

									<div class="block__post--time"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="bg-white">
						<div class="block__map">
							<div class="center">
								<div id="google__map" class="block__map--google">
									<img src="<?php bloginfo('template_url'); ?>/img/fke/mapa.png" alt="Google Maps - ONDE">
								</div>
							</div>
						</div>
					</div>
				</section>
			</main>

<?php get_footer(); ?>

