<?php get_header(); ?>

<?php 
	$counter                = 0;
	$page_index             = 0;
	$posts_types            = array('artes', 'eu-acho', 'feiras', 'mesa', 'passeio', 'pessoas', 'pistas', 'sacolas');

	$all_posts              = query_posts( array( 'post_type' => $posts_types, 'posts_per_page' => '9', 'paged' => get_query_var('paged') ) );
?>

			<main id="main" role="main" class="search all-posts">
				<section class="block__post">
					<div class="center">
						<div class="row">
							<div class="col-m-12">
								<div class="block__post--title">
									<h1>todos os posts</h1>

									<div class="block__post--category align-right">
										<a href="<?php bloginfo('template_url'); ?>/inc/modal-filter.php" class="btn btn-default2 btn-modal btn-filter">pesquisar posts no arquivo</a>
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
									$post           = get_post($postID);

									setup_postdata($post);

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

								<nav class="navigation pagination">
									<?php posts_nav_link(' &#8212; ', __('&laquo; P&aacute;gina anterior'), __('next')); ?>
								</nav>

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

