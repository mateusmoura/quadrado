<?php get_header(); ?>
	<!-- IMAGEM DE BACKGROUND EM DESTAQUE -->
	<!-- <div class="header__image--post header__image--post-random">
		<img src="<?php echo $imagem_de_fundo['url'] ?>" class="header__image--post-preloading" alt="<?php echo $imagem_de_fundo['title'] ?>">
		<img src="<?php echo $imagem_de_fundo['url'] ?>" alt="<?php echo $imagem_de_fundo['title'] ?>">
	</div> -->
	<div class="header__image--post">
		<img src="<?php bloginfo('template_url'); ?>/img/fke/post-header-image-1_old.png" alt="Quadrado Brasilia">
	</div>

	<main role="main" class="calendar">
		<section class="block__post">
			<div class="center">
				<div class="row">
					<div class="col-m-12">
						<div class="block__post--title">
							<h1>agenda do quadrado</h1>

							<a href="<?php bloginfo('template_url'); ?>/inc/modal-agenda.php" class="btn btn-default btn-modal btn-send-event">sugerir um evento</a>

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
					</div>
				</div>
			</div>
		</section>
	</main>
<?php get_footer(); ?>