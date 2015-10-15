<?php get_header(); ?>

			<main role="main" class="home">
				<section class="block__post">
					<?php 
						$args = array(
						'numberposts'			=> 1,
						'offset'				=> 0,
						'category'				=> '',
						'category_name'			=> '',
						'orderby'				=> 'post_date',
						'order'					=> 'DESC',
						'include'				=> '',
						'exclude'				=> '',
						'meta_key'				=> '',
						'meta_value'			=> '',
						'post_type'				=> array('artes', 'eu-acho', 'feiras', 'mesas', 'passeios', 'pessoas', 'pistas', 'sacolas'),
						'post_mime_type'		=> '',
						'post_parent'			=> '',
						'post_status'			=> 'publish',
						'suppress_filters'		=> true );

						$recent_posts = get_posts( $args );

						foreach ( $recent_posts as $post ) : setup_postdata( $post );
							$postID 		= get_the_ID();
							$date 			= get_the_date('d \d\e F \d\e Y', $postID);

							var_dump($post);
					?>
					<div class="center">
						<div class="row">
							<div class="block__post--title">
								<h1><?php the_title(); ?></h1>

								<a href="<?php the_permalink(); ?>" class="btn btn-link btn-seemore">Ler post completo <i class="fa fa-arrow-right"></i></a>

								<div class="block__post--time">
									<p>Em <?php echo $date; ?> por <a href="#this" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>
								</div>
							</div>

							<div class="block__post--content">
								<div class="block__post--category">
									<a href="<?php bloginfo('url'); ?>/<?php echo get_post_type($postID); ?>" class="btn btn-default"><?php echo get_post_type($postID); ?></a>
								</div>

								<div class="block__post--entries">
									<?php the_excerpt(); ?>
								</div>

								<div class="block__post--share">
									<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
									<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
								</div>
							</div>
						</div>
					</div>

					<?php endforeach; wp_reset_postdata(); ?>
				</section>

				<div class="bg-white">
					<div class="center">
						<div class="block__adsence--full">
							<div class="align-center">
								<img src="<?php bloginfo('template_url'); ?>/img/fke/adsence-full.png" alt="Publicidade Full">
							</div>
						</div>
					</div>

					<div class="center">
						<div class="block__highlights">
							<div class="row">
								<div class="col-m-4">
									<!-- <div class="block__adsence--medium">
										<img src="<?php bloginfo('template_url'); ?>/img/fke/adsence-medium.png" alt="Publicidade Media">
									</div> -->

									<div class="block__post--highlights">
										<div class="block__post--image-auto">
											<img src="<?php bloginfo('template_url'); ?>/img/fke/post-image-4.png" alt="Atenção: Nós vamos sobreviver ao pós-feriado">
										</div>

										<div class="block__post--category">
											<a href="#this" class="btn btn-default">comes</a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
												<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
											</div>

											<div class="block__post--title">
												<h2><a href="post-interna.php">Atenção: Nós vamos sobreviver ao pós-feriado</a></h2>
											</div>

											<div class="block__post--time">
												<p>Em 5 de maio de 2015 por <a href="#this" class="btn btn-link"><strong>carolnogueira76</strong></a></p>
											</div>

											<div class="block__post--entries">
												<p>Nós, do Quadrado, fazemos um trabalho beneficente Nós, do Quadrado, fazemos um trabalho beneficente. Nós, do Quadrado <a href="post-interna.php" class="btn btn-link"><i class="fa fa-arrow-right"></i></a></p>
											</div>
										</div>
									</div>


								</div>

								<div class="col-m-8">
									<div class="block__post--highlights">
										<div class="block__post--image">
											<img src="<?php bloginfo('template_url'); ?>/img/fke/post-image-1.png" alt="Quinta é quase sexta">
										</div>

										<div class="block__post--category">
											<a href="#this" class="btn btn-default">bebes</a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
												<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
											</div>

											<div class="block__post--title">
												<h2><a href="post-interna.php">Quinta é quase sexta</a></h2>
											</div>

											<div class="block__post--time">
												<p>Em 5 de maio de 2015 por <a href="#this" class="btn btn-link"><strong>danicronemberger</strong></a></p>
											</div>

											<div class="block__post--entries">
												<p>Em primeiro lugar, permita-me discorrer sobre o conceito que cunhei sobre música-boa. Segundo eu mesma, música-boa é aquela de que você gosta. Ponto. Aquela que você cresceu ouvindo. Ponto. Segundo eu mesma, música-boa é aquela de que você gosta. <a href="post-interna.php" class="btn btn-link"><i class="fa fa-arrow-right"></i></a></p>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-m-4">
									<div class="block__post--highlights">
										<div class="block__post--image">
											<img src="<?php bloginfo('template_url'); ?>/img/fke/post-image-2.png" alt="Faxina na vida">
										</div>

										<div class="block__post--category">
											<a href="#this" class="btn btn-default">compras</a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
												<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
											</div>

											<div class="block__post--title">
												<h2><a href="post-interna.php">Faxina na vida</a></h2>
											</div>

											<div class="block__post--time">
												<p>Em 5 de maio de 2015 por <a href="#this" class="btn btn-link"><strong>carolnogueira76</strong></a></p>
											</div>

											<div class="block__post--entries">
												<p>O melhor de mudar de casa é que você tem a oportunidade perfeita pra se livrar de tudo o que não presta, não te serve ou simplesmente você não quer mais. O melhor de mudar de casa é que você tem a oportunidade perfeita pra se livrar de tudo o que não presta. <a href="post-interna.php" class="btn btn-link"><i class="fa fa-arrow-right"></i></a></p>
											</div>
										</div>
									</div>
								</div>

								<div class="col-m-4">
									<div class="block__post--highlights">
										<div class="block__post--category">
											<a href="#this" class="btn btn-default">agenda</a>
										</div>

										<div class="row block__post--highlights-calendar">
											<div class="col-m-12">
												<div class="block__calendar">
													<div class="block__calendar--image">
														<img src="<?php bloginfo('template_url'); ?>/img/fke/calendar-image-1.png" alt="Feira livre">
													</div>

													<div class="block__calendar--title">
														<a href="#this">Feira livre</a>
														<a href="#this"><span>@ Eixão norte, 15h</span></a>
													</div>

													<div class="block__calendar--date">
														<a href="#this">
															<span>domingo</span>
															<p>24 <br /> <strong>maio</strong></p>
														</a>
													</div>

													<div class="block__calendar--overlay"></div>
												</div>
											</div>

											<div class="col-m-12">
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
											</div>
										</div>

										<div class="block__actions">
											<div class="row">
												<div class="col-m-5">
													<a href="#this" class="btn btn-full btn-white">sugerir evento</a>
												</div>

												<div class="col-m-7">
													<a href="#this" class="btn btn-full btn-default">ver toda a agenda</a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-m-4">
									<div class="block__post--highlights">
										<div class="block__post--image">
											<img src="<?php bloginfo('template_url'); ?>/img/fke/post-image-3.png" alt="Ana Marta, 65">
										</div>

										<div class="block__post--category">
											<a href="#this" class="btn btn-default">3x4</a>
										</div>

										<div class="block__post--content">
											<div class="block__post--share">
												<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
												<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
											</div>

											<div class="block__post--title">
												<h2><a href="post-interna.php">Ana Marta, 65</a></h2>
											</div>

											<div class="block__post--time">
												<p>Em 5 de maio de 2015 por <a href="#this" class="btn btn-link"><strong>carolnogueira76</strong></a></p>
											</div>

											<div class="block__post--entries">
												<p>“ I’d try telling myself to quit being weak, and to snap out of it” “ I’d try telling myself to quit being weak, and to snap out of it”. <a href="post-interna.php" class="btn btn-link"><i class="fa fa-arrow-right"></i></a></p>
											</div>
										</div>
									</div>
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

						<div id="google__map">
							<img src="<?php bloginfo('template_url'); ?>/img/fke/mapa.png" alt="Google Maps - ONDE">
						</div>
					</div>
				</div>
			</main>
<?php get_footer(); ?>