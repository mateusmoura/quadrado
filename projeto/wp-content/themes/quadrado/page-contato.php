<?php get_header(); ?>
	<!-- IMAGEM DE BACKGROUND EM DESTAQUE -->
	<div class="header__image--post header__image--post-random">
		<img src="<?php echo $imagem_de_fundo['url'] ?>" class="header__image--post-preloading" alt="<?php echo $imagem_de_fundo['title'] ?>">
		<img src="<?php echo $imagem_de_fundo['url'] ?>" alt="<?php echo $imagem_de_fundo['title'] ?>">
	</div>

	<main role="main" class="contact">
		<section class="block__post">
			<div class="center">
				<div class="row">
					<div class="col-m-12">
						<div class="block__post--title">
							<h1>fale com a gente</h1>

							<div class="block__post--time"></div>
						</div>
					</div>
				</div>
			</div>

			<div class="bg-white">
				<div class="center">
					<div class="block__post--content">
						<div class="block__social">
							<div class="row">
								<div class="col-m-6 align-right">
									<a href="http://facebook.com/quadradobrasilia" target="_blank" class="btn btn-link btn-facebook-2">
										<i class="fa fa-facebook"></i>
										facebook.com/quadradobrasilia
									</a>
								</div>

								<div class="col-m-6 align-left">
								<a href="mailTo:aloquadrado@quadradobrasilia.com.br" target="_blank" class="btn btn-link btn-email-2">
										<i class="fa fa-envelope-o"></i>
										aloquadrado@quadradobrasilia.com.br
									</a>
								</div>
							</div>
						</div>

						<div class="block__newsletter">
							<h3>assine a newsletter do quadrado</h3>

							<div>
								<div class="row padded-x2">
									<div class="col-m-4 align-right">
										<i class="fa fa-pencil bg-default"></i>
									</div>

									<div class="col-m-5 align-left">
										<label for="field-newsletter">digite seu e-mail e seja avisado sobre novos posts</label>
										<!-- <input type="text" name="field-newsletter" id="field-newsletter" class="form-style"> -->
										<?php 
											echo do_shortcode('[wysija_form id="1"]');
										?>

										<!-- <div class="align-right">
											<button type="submit" class="btn btn-white">assinar</button>
										</div> -->
									</div>
								</div>
							</div>
						</div>

						<div class="block__form--contact">
							<h3>fala que eu te escuto</h3>

							<?php 
								echo do_shortcode('[contact-form-7 id="4540" title="Formulário de contato"]');
							?>

							<!-- <div class="row padded-x2">
								<div class="col-m-5">
									<div class="row">
										<div class="col-m-12">
											<label>seu nome (obrigatório)</label>
											<input type="text" name="" id="" class="form-style">
										</div>
									</div>

									<div class="row">
										<div class="col-m-12">
											<label>seu e-mail (obrigatório)</label>
											<input type="text" name="" id="" class="form-style">
										</div>
									</div>
								</div>

								<div class="col-m-7">
									<label>abra seu coração</label>

									<textarea name="" class="form-style"></textarea>

									<div class="align-right">
										<button type="submit" class="btn btn-default">enviar</button>
									</div>
								</div>
							</div> -->
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>
<?php get_footer(); ?>