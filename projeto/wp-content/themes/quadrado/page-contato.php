<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post();
		$viewID = get_the_ID();
		$resumo = get_post_meta($viewID, "Resumo");
	 ?>
	<main role="main" class="page-contact">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<h1>Entre em <strong>Contato</strong></h1>
						<p></p>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="row padded-x2">
						<div class="col-m-6">
							<div class="block__form">
								<?php the_content(); ?>
							</div>
						</div>

						<div class="col-m-6">
							<div class="block__faq">
								<!-- <h2>DÚVIDAS FREQUENTES</h2>

								<div class="collapse">
									<div class="coll_title">
										<h4><a href="#this">1. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
									</div>

									<div class="coll_content">
										<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
								</div>

								<div class="collapse">
									<div class="coll_title">
										<h4><a href="#this">2. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
									</div>

									<div class="coll_content">
										<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
								</div>

								<div class="collapse">
									<div class="coll_title">
										<h4><a href="#this">3. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
									</div>

									<div class="coll_content">
										<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
								</div>

								<div class="collapse">
									<div class="coll_title">
										<h4><a href="#this">4. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
									</div>

									<div class="coll_content">
										<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
								</div>

								<div class="collapse">
									<div class="coll_title">
										<h4><a href="#this">5. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
									</div>

									<div class="coll_content">
										<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
									</div>
								</div> -->
							</div>
						</div>
					</div>
				</section>

				<aside>
					<div class="aside__dataIcon">
						<div class="date">
							<i class="icon icon-phone"></i>

							<div>
								<label>Telefone</label>
								<strong><span>61.</span> 3522-1699</strong>
							</div>
						</div>

						<div class="email">
							<i class="icon icon-message"></i>

							<div>
								<label>e-mail</label>
								<a href="mailto:quatuorideias@gmail.com">quatuorideias@gmail.com</a>
							</div>
						</div>

						<div class="map">
							<i class="icon icon-marker2"></i>

							<div>
								<label>local</label>
								<p>CA 05, Lote F, Ed. San Raphael, Loja 09 Lago Norte - Brasília/DF</p>
							</div>
						</div>
					</div>
				</aside>
			</div>

			<div class="block__maps">
				<div id="map-canvas">
					<img src="<?php bloginfo('template_url'); ?>/img/fke/maps.png" alt="imagem fake">
				</div>
			</div>
		</div>
		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<div id="map_canvas"></div>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<?php get_footer(); ?>