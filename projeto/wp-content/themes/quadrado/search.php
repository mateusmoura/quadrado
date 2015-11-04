<?php get_header(); ?>

<?php $posts_types = array('artes', 'eu-acho', 'feiras', 'mesa', 'passeio', 'pessoas', 'pistas', 'sacolas'); ?>

		<!-- IMAGEM DE BACKGROUND EM DESTAQUE -->
		<!-- <div class="header__image--post header__image--post-random">
			<img src="<?php echo $imagem_de_fundo['url'] ?>" class="header__image--post-preloading" alt="<?php echo $imagem_de_fundo['title'] ?>">
			<img src="<?php echo $imagem_de_fundo['url'] ?>" alt="<?php echo $imagem_de_fundo['title'] ?>">
		</div> -->

			<main role="main" class="search">
				<section class="block__post">
					<div class="center">
						<div class="row">
							<div class="col-m-12">
								<div class="block__post--title">
									<h1>encontramos <?php echo $search->found_posts; ?> posts com a palavra “<?php echo get_search_query() ?>”</h1>

									<div class="block__post--category align-right">
										<a href="#this" class="btn btn-default">ver todos os posts</a>
									</div>

									<div class="block__post--time"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="bg-white">
						<div class="center">
							<div class="block__highlights">
								<?php if (have_posts()) : while (have_posts()) : setup_postdata( the_post() );
									$postID			= get_the_ID();
									$date			= get_the_date('d \d\e F \d\e Y', $postID);
									$postType		= get_post_type($postID);

									//if ( $postType != 'page' && $postType != 'lugares' ):
								?>

										<?php if( $counter % 3 == 0 ) { ?>
										<div class="row">
										<?php } ?>
											<div class="col-m-4">
												<div class="block__post--highlights">
													<div class="block__post--image-auto">
														<?php the_post_thumbnail(); ?>
													</div>

													<div class="block__post--category">
														<a href="<?php bloginfo('url'); ?>/<?php echo $postType; ?>" class="btn btn-default"><?php echo $postType; ?></a>
													</div>

													<div class="block__post--content">
														<div class="block__post--share">
															<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
															<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
														</div>

														<div class="block__post--title">
															<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
														</div>

														<div class="block__post--time">
															<p>Em <?php echo $date; ?> por <a href="#this" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
														</div>

														<div class="block__post--entries">
															<?php the_excerpt(); ?>
														</div>
													</div>
												</div>
											</div>
										<?php if( $page_index > 1 ) { ?>
										</div>
										<?php $page_index = 0; } else {
											++$page_index;
										} 

										++$counter;
										?>
									<?php //endif; ?>
								<?php endwhile; ?>
								</div>
								<?php posts_nav_link(' &#8212; ', __('&laquo; P&aacute;gina anterior'), __('Pr&oacute;xima p&aacute;gina &raquo;')); ?>
								<?php else: ?>
									<p>Não foi encontrado nenhum resultado para "<?php echo get_search_query(); ?>". <a href="<?php bloginfo('url'); ?>/cursos/">Ver todos os posts</a></p>
								<?php endif; ?>
							</div>

							<!-- <div class="block__loading">
								<div class="loading"></div>
								<p>rapidão, estamos carregando mais resultados da sua busca</p>
							</div> -->
						</div>
					</div>
				</section>
			</main>

<?php get_footer(); ?>

