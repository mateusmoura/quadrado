<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post();
		$viewID = get_the_ID();
		$resumo = get_post_meta($viewID, "Resumo");
	 ?>
	<main role="main" class="home">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--image">
						
					</div>

					<div class="col-m-12">
						<h1><?php the_title(); ?></h1>
						<p><?php echo $viewID; ?></p>
						<p><?php echo $resumo[0]; ?></p>
					</div>
				</div>
			</div>
		</div>

		<section class="block__courses">
			<div class="bg"></div>
			<div class="center">
				<h2>Nossos cursos</h2>

				<div class="courses__list row">
					<div class="col-m-3">
						<div class="course">
							<span class="tag bgcolor-1">Arte</span>

							<h3><a href="#this">Conservação e Restauro de Obras de Arte</a></h3>
							
							<div class="information">
								<p><span>com</span> Valéria de Mendonça</p>
								<p><span>início:</span> 06 de Janeiro 2015</p>
								<p><span>Investimento de</span> 3x R$ 450,00</p>
							</div>

							<a href="#this" class="btn btn-error">Saiba mais</a>
						</div>
					</div>

					<div class="col-m-3">
						<div class="course">
							<span class="tag bgcolor-2">Educação</span>

							<h3><a href="#this">Educação Financeira em Cinco Passos</a></h3>
							
							<div class="information">
								<p><span>com</span> Vários professores</p>
								<p><span>início:</span> 25 de Janeiro 2015</p>
								<p><span>Investimento de</span> 2x R$ 250,00</p>
							</div>

							<a href="#this" class="btn btn-error">Saiba mais</a>
						</div>
					</div>

					<div class="col-m-3">
						<div class="course">
							<span class="tag bgcolor-3">filosofia</span>

							<h3><a href="#this">A Contra-História da Filosofia</a></h3>
							
							<div class="information">
								<p><span>com</span> Valéria de Mendonça</p>
								<p><span>início:</span> 06 de Janeiro 2015</p>
								<p><span>Investimento de</span> 3x R$ 450,00</p>
							</div>

							<a href="#this" class="btn btn-error">Saiba mais</a>
						</div>
					</div>

					<div class="col-m-3">
						<div class="course">
							<span class="tag bgcolor-4">gestão e negócios</span>

							<h3><a href="#this">A Era da Responsabilidade</a></h3>
							
							<div class="information">
								<p><span>com</span> Alejandro Pinedo</p>
								<p><span>início:</span> 25 de Janeiro 2015</p>
								<p><span>Investimento de</span> 2x R$ 250,00</p>
							</div>

							<a href="#this" class="btn btn-error">Saiba mais</a>
						</div>
					</div>
				</div>

				<a href="#this" class="btn-link btn-courses">&gt; Conheça os nossos cursos</a>
			</div>
		</section>

		<section class="block__blog">
			<div class="bg"></div>

			<div class="center">
				<h2>Blog</h2>

				<div class="posts__list row">
					<div class="col-m-4">
						<div class="post">
							<h3><a href="#this">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in.</a></h3>

							<div class="information">
								<time datetime="2015-02-26">26/02/2015</time>
								<p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum... <a href="#this">Continue lendo</a></p>
							</div>
						</div>
					</div>

					<div class="col-m-4">
						<div class="post">
							<h3><a href="#this">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in.</a></h3>

							<div class="information">
								<time datetime="2015-02-26">26/02/2015</time>
								<p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum... <a href="#this">Continue lendo</a></p>
							</div>
						</div>
					</div>

					<div class="col-m-4">
						<div class="post">
							<h3><a href="#this">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in.</a></h3>

							<div class="information">
								<time datetime="2015-02-26">26/02/2015</time>
								<p>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum... <a href="#this">Continue lendo</a></p>
							</div>
						</div>
					</div>
				</div>

				<a href="#this" class="btn-link btn-blog">&gt; Leia nosso blog</a>
			</div>
		</section>

		<div class="block__maps">
			<img src="<?php bloginfo('template_url'); ?>/img/fke/maps.png" alt="imagem fake">
		</div>

		<!-- <section>
			<div class="entries">
				<?php the_content(); ?>
			</div>
		</section> -->

		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>