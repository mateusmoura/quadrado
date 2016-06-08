<?php get_header(); ?>

<?php 
	$counter				= 0;
	$page_index				= 0;
	$posts_types			= array('lugares');

	$places					= query_posts( array( 'post_type' => $posts_types, 'posts_per_page' => '150' ) );

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

	//wp_reset_query();
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

<?php 
	$posts_types = array('artes', 'eu-acho', 'feiras', 'mesa', 'passeio', 'pessoas', 'pistas', 'sacolas'); 
	$recent_posts_count = 0;
?>

			<!-- IMAGEM DE BACKGROUND EM DESTAQUE -->
			<!-- <div class="header__image--post header__image--post-random">
				<img src="<?php echo $imagem_de_fundo['url'] ?>" class="header__image--post-preloading" alt="<?php echo $imagem_de_fundo['title'] ?>">
				<img src="<?php echo $imagem_de_fundo['url'] ?>" alt="<?php echo $imagem_de_fundo['title'] ?>">
			</div> -->

			<main role="main" class="home">
				<section class="block__post block__home">
					<?php 
						$args = array(
						'numberposts'			=> 6,
						'offset'				=> 0,
						'category'				=> '',
						'category_name'			=> '',
						'orderby'				=> 'post_date',
						'order'					=> 'DESC',
						'include'				=> '',
						'exclude'				=> '',
						//'meta_key'				=> '',
						//'meta_value'			=> '',
						'post_type'				=> $posts_types,
						'post_mime_type'		=> '',
						'post_parent'			=> '',
						'post_status'			=> 'publish',
						'suppress_filters'		=> true );

						$recent_posts			= get_posts($args);
						$first_post				= array($recent_posts[$recent_posts_count]);

						++$recent_posts_count;

						foreach ( $first_post as $post ) : setup_postdata( $post );
							$postID 		= get_the_ID();
							$date 			= get_the_date('d \d\e F \d\e Y', $postID);
							$postType       = get_post_type($postID);
					?>
					<div class="center">
						<div class="row">
							<div class="block__post--category">
								<a href="<?php bloginfo('url'); ?>/<?php echo $postType; ?>" class="btn btn-default"><?php echo change_post_type_name($postType); ?></a>
							</div>
							<div class="col-m-4">
								<div class="block__post--title">
									<h1><?php the_title(); ?></h1>

									<!-- <a href="<?php the_permalink(); ?>" class="btn btn-link btn-seemore">Ler post completo <i class="fa fa-arrow-right"></i></a> -->

									<div class="block__post--time">
										<p>Em <?php echo $date; ?> por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
									</div>

								</div>
							</div>

							<div class="col-m-8">
								<div class="block__post--content">
									<div class="block__post--entries">
										<!-- <div class="align-center" style="margin-bottom: 30px;">
											<?php the_post_thumbnail(); ?>
										</div> -->
										<?php the_excerpt(); ?>
									</div>

									<!-- <div class="block__post--share">
										<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> <?php echo get_comments_number($postID); ?></a>

										<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-link" target="_blank"><i class="fa fa-share"></i> <?php echo get_facebook_share_count(get_permalink($postID)); ?></a>
									</div> -->
								</div>
							</div>
						</div>
					</div>

					<?php endforeach; wp_reset_postdata(); ?>
				</section>

				<div class="bg-white">
					<div class="center">
						<!-- <div class="block__adsence--full">
							<div class="align-center">
								<img src="<?php bloginfo('template_url'); ?>/img/fke/adsence-full.png" alt="Publicidade Full">
							</div>
						</div> -->
					</div>

					<div class="center">
						<div class="block__highlights">
							<div class="row">
								<div class="col-m-4">
									<!-- <div class="block__adsence--medium">
										<img src="<?php bloginfo('template_url'); ?>/img/fke/adsence-medium.png" alt="Publicidade Media">
									</div> -->

									<?php 
										$highlights_post_2 = get_posts(array(
											'numberposts'	=> -1,
											'post_type'		=> $posts_types,
											'meta_key'		=> 'destaque',
											'meta_value'	=> 'posicao_2'
										));

										if (!count($highlights_post_2)) {
											$highlights_post_2 = array($recent_posts[$recent_posts_count]);
											++$recent_posts_count;
										}

										foreach ( $highlights_post_2 as $post ) : setup_postdata( $post );
												$postID 		= get_the_ID();
												$date 			= get_the_date('d \d\e F \d\e Y', $postID);
												$positionImage	= get_field('posicao_da_imagem', $postID);
												$postType       = get_post_type($postID);
									?>

									<div class="block__post--highlights">
										<div class="block__post--image-auto <?php echo $positionImage; ?>">
											<?php the_post_thumbnail(); ?>
										</div>

										<div class="block__post--category">
											<a href="<?php bloginfo('url'); ?>/<?php echo $postType; ?>" class="btn btn-default"><?php echo change_post_type_name($postType); ?></a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> <?php echo get_comments_number($postID); ?></a>
												<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-link" target="_blank"><i class="fa fa-share"></i> <?php echo get_facebook_share_count(get_permalink($postID)); ?></a>
											</div>

											<div class="block__post--title">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											</div>

											<div class="block__post--time">
												<p>Em <?php echo $date; ?> por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
											</div>

											<div class="block__post--entries">
												<?php echo excerpt(15); ?>
											</div>
										</div>
									</div>

									<?php endforeach; wp_reset_postdata(); ?>
								</div>

								<div class="col-m-8">
									<?php 
										$highlights_post_1 = get_posts(array(
											'numberposts'	=> -1,
											'post_type'		=> $posts_types,
											'meta_key'		=> 'destaque',
											'meta_value'	=> 'posicao_1'
										));

										if (!count($highlights_post_1)) {
											$highlights_post_1 = array($recent_posts[$recent_posts_count]);
											++$recent_posts_count;
										}

										foreach ( $highlights_post_1 as $post ) : setup_postdata( $post );
												$postID 		= get_the_ID();
												$date 			= get_the_date('d \d\e F \d\e Y', $postID);
												$positionImage	= get_field('posicao_da_imagem', $postID);
												$postType       = get_post_type($postID);
									?>

									<div class="block__post--highlights">
										<div class="block__post--image-auto <?php echo $positionImage; ?>">
											<?php the_post_thumbnail(); ?>
										</div>

										<div class="block__post--category">
											<a href="<?php bloginfo('url'); ?>/<?php echo $postType; ?>" class="btn btn-default"><?php echo change_post_type_name($postType); ?></a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> <?php echo get_comments_number($postID); ?></a>
												<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-link" target="_blank"><i class="fa fa-share"></i> <?php echo get_facebook_share_count(get_permalink($postID)); ?></a>
											</div>

											<div class="block__post--title">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											</div>

											<div class="block__post--time">
												<p>Em <?php echo $date; ?> por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
											</div>

											<div class="block__post--entries">
												<?php echo excerpt(40); ?>
											</div>
										</div>
									</div>

									<?php endforeach; wp_reset_postdata(); ?>
								</div>
							</div>

							<div class="row">
								<div class="col-m-4">
									<?php 
										$highlights_post_3 = get_posts(array(
											'numberposts'	=> -1,
											'post_type'		=> $posts_types,
											'meta_key'		=> 'destaque',
											'meta_value'	=> 'posicao_3'
										));

										if (!count($highlights_post_3)) {
											$highlights_post_3 = array($recent_posts[$recent_posts_count]);
											++$recent_posts_count;
										}

										foreach ( $highlights_post_3 as $post ) : setup_postdata( $post );
												$postID 		= get_the_ID();
												$date 			= get_the_date('d \d\e F \d\e Y', $postID);
												$positionImage	= get_field('posicao_da_imagem', $postID);
												$postType       = get_post_type($postID);
									?>

									<div class="block__post--highlights">
										<div class="block__post--image-auto <?php echo $positionImage; ?>">
											<?php the_post_thumbnail(); ?>
										</div>

										<div class="block__post--category">
											<a href="<?php bloginfo('url'); ?>/<?php echo $postType; ?>" class="btn btn-default"><?php echo change_post_type_name($postType); ?></a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> <?php echo get_comments_number($postID); ?></a>
												<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-link" target="_blank"><i class="fa fa-share"></i> <?php echo get_facebook_share_count(get_permalink($postID)); ?></a>
											</div>

											<div class="block__post--title">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											</div>

											<div class="block__post--time">
												<p>Em <?php echo $date; ?> por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
											</div>

											<div class="block__post--entries">
												<?php echo excerpt(15); ?>
											</div>
										</div>
									</div>

									<?php endforeach; wp_reset_postdata(); ?>
								</div>

								<div class="col-m-4">
									<div class="block__post--highlights">
										<div class="block__post--category">
											<a href="#this" class="btn btn-default">agenda</a>
										</div>

										<div class="row block__post--highlights-calendar">
											<?php 
												$date = date('Ymd');
												$diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado');
												$meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');

												$args = array(
												'numberposts'			=> 3,
												'order'					=> 'ASC',
												'meta_query'	=> array(
													'relation'		=> 'AND',
													array(
														'key'		=> 'evento_filtro',
														'compare'	=> '>=',
														'value'		=> $date,
													)
												),
												'post_type'				=> array('agenda'),
												'post_status'			=> 'publish'
												);

												$events					= get_posts($args);

												foreach ( $events as $post ) : setup_postdata( $post );
													$postID 		= get_the_ID();
													$event_place	= get_field('cidade_estado_pais', $postID);
													$date           = get_field('evento_filtro', $postID);
													$link           = get_field('link', $event->ID);
													$title_str      = get_the_title($postID);

													$date_format = date_create($date);
													$date_format = date_format($date_format, 'Y-m-d');
													$diasemana_numero = date('w', strtotime($date_format));

													$timestamp = strtotime($date);

													//var_dump($event_place)
											?>

											<div class="col-m-12">
												<div class="block__calendar">
													<div class="block__calendar--image">
														<img src="<?php bloginfo('template_url'); ?>/img/fke/calendar-image-<?php echo rand (1,9); ?>.jpg" alt="<?php the_title(); ?>">
													</div>

													<div class="block__calendar--title">
														<a href="<?php echo $link; ?>"><?php echo title_limit($title_str, 4); ?></a>
														<a href="<?php echo $link; ?>"><span>@ <?php echo $event_place; ?>, 15h</span></a>
													</div>

													<div class="block__calendar--date">
														<a href="#this">
															<span><?php echo $diasemana[$diasemana_numero]; ?></span>
															<p><?php echo date('d', $timestamp); ?> <br /> <strong><?php echo date_i18n("F", $timestamp); ?></strong></p>
														</a>
													</div>

													<div class="block__calendar--overlay"></div>
												</div>
											</div>

											<?php endforeach; wp_reset_postdata(); ?>

											<!-- <div class="col-m-12">
												<div class="block__calendar">
													<div class="block__calendar--image">
														<img src="<?php bloginfo('template_url'); ?>/img/fke/calendar-image-2.png" alt="Picnik">
													</div>

													<div class="block__calendar--title">
														<a href="#this">Picnik</a>
														<a href="#this"><span>@ Praça dos cristais, 15h</span></a>
													</div>

													<div class="block__calendar--date">
														<a href="#this">
															<span>segunda</span>
															<p>25 <br /> <strong>maio</strong></p>
														</a>
													</div>

													<div class="block__calendar--overlay"></div>
												</div>
											</div>

											<div class="col-m-12">
												<div class="block__calendar">
													<div class="block__calendar--image">
														<img src="<?php bloginfo('template_url'); ?>/img/fke/calendar-image-3.png" alt="Feira livre">
													</div>

													<div class="block__calendar--title">
														<a href="#this">Santuário apresenta...</a>
														<a href="#this"><span>@ SQN 214, 15h</span></a>
													</div>

													<div class="block__calendar--date">
														<a href="#this">
															<span>sexta</span>
															<p>30 <br /> <strong>maio</strong></p>
														</a>
													</div>

													<div class="block__calendar--overlay"></div>
												</div>
											</div> -->
										</div>

										<div class="block__actions">
											<div class="row">
												<div class="col-m-5">
													<a href="<?php bloginfo('template_url'); ?>/inc/modal-agenda.php" class="btn btn-full btn-white btn-modal btn-send-event">sugerir evento</a>
												</div>

												<div class="col-m-7">
													<a href="<?php echo get_permalink( get_page_by_path('agenda')); ?>" class="btn btn-full btn-default">ver toda a agenda</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-m-4">
									<?php 
										$highlights_post_4 = get_posts(array(
											'numberposts'	=> -1,
											'post_type'		=> $posts_types,
											'meta_key'		=> 'destaque',
											'meta_value'	=> 'posicao_4'
										));

										if (!count($highlights_post_4)) {
											$highlights_post_4 = array($recent_posts[$recent_posts_count]);
											++$recent_posts_count;
										}

										foreach ( $highlights_post_4 as $post ) : setup_postdata( $post );
												$postID 		= get_the_ID();
												$date 			= get_the_date('d \d\e F \d\e Y', $postID);
												$positionImage	= get_field('posicao_da_imagem', $postID);
												$postType       = get_post_type($postID);
									?>

									<div class="block__post--highlights">
										<div class="block__post--image-auto <?php echo $positionImage; ?>">
											<?php the_post_thumbnail(); ?>
										</div>

										<div class="block__post--category">
											<a href="<?php bloginfo('url'); ?>/<?php echo $postType; ?>" class="btn btn-default"><?php echo change_post_type_name($postType); ?></a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> <?php echo get_comments_number($postID); ?></a>
												<a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&title=<?php the_title(); ?>" class="btn btn-link" target="_blank"><i class="fa fa-share"></i> <?php echo get_facebook_share_count(get_permalink($postID)); ?></a>
											</div>

											<div class="block__post--title">
												<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
											</div>

											<div class="block__post--time">
												<p>Em <?php echo $date; ?> por <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
											</div>

											<div class="block__post--entries">
												<?php echo excerpt(15); ?>
											</div>
										</div>
									</div>

									<?php endforeach; wp_reset_postdata(); ?>
								</div>
							</div>
						</div>
					</div>

					<div class="block__map">
						<div class="center">
							<div class="block__post--category">
								<a href="#this" class="btn btn-default">onde</a>
							</div>
						</div>

						<div id="google__map" class="block__map--google">
							<img src="<?php bloginfo('template_url'); ?>/img/fke/mapa.png" alt="Google Maps - ONDE">
						</div>
					</div>
				</div>
			</main>
<?php get_footer(); ?>