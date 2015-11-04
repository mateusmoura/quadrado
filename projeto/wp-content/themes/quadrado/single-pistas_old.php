<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		$postID					= get_the_ID();
		$date					= get_the_date('d \d\e F \d\e Y', $postID);
		$imagem_de_fundo		= get_field('imagem_de_fundo');
		$imagem_do_post			= get_field('imagens_do_postd');
		$image_count			= floor(10 / count($imagem_do_post));

		var_dump(count($imagem_de_fundo) );
	?>

	<!-- IMAGEM DE BACKGROUND EM DESTAQUE -->
	<?php if(count($imagem_de_fundo) > 1) : ?>
	<div class="header__image--post">
	<?php else: ?>
	<div class="header__image--post header__image--post-random">
		<img src="<?php echo $imagem_de_fundo['url'] ?>" class="header__image--post-preloading" alt="<?php echo $imagem_de_fundo['title'] ?>">
	<?php endif ?>
		<img src="<?php echo $imagem_de_fundo['url'] ?>" alt="<?php echo $imagem_de_fundo['title'] ?>">
	</div>

	<?php if(count($imagem_do_post) > 0) : ?>
	<main role="main" class="internal">
	<?php else: ?>
	<main role="main" class="internal no-gallery">
	<?php endif ?>
		<section class="block__post">
			<div class="center">
				<div class="row">
					<div class="col-m-12">
						<div class="block__post--title">
							<h1><?php the_title(); ?></h1>

							<div class="block__post--category align-right">
								<a href="<?php bloginfo('url'); ?>/<?php echo get_post_type($postID); ?>" class="btn btn-default"><?php echo get_post_type($postID); ?></a>
							</div>

							<div class="block__post--time">
								<p>Em <?php echo $date; ?> por <a href="#this" class="btn btn-link"><strong><?php the_author(); ?></strong></a></p>

								<div class="block__post--share">
									<a href="#this" class="btn btn-link"><i class="fa fa-comment"></i> 23</a>
									<a href="#this" class="btn btn-link"><i class="fa fa-share"></i> 1k</a>
								</div>
							</div>
						</div>

						<div class="block__gallery">
							<div class="row unicelular align-center">
							<?php 
								foreach ( $imagem_do_post as $image ) :
							?>
								<div class="col-m-<?php echo $image_count ?>">
									<img src="<?php echo $image['imagem'] ?>" alt="">
								</div>
							<?php endforeach;?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="bg-white">
				<div class="center">
					<div class="block__post--content">
						<div class="block__post--entries">
							<?php the_content(); ?>
						</div>

						<!-- <div class="block__post--go">
							<h4>Bora?</h4>
							<p>Moça do Buquê</p>

							<a href="tel:+6181414433">(61) 8141-4433</a> e <a href="mailTo:mocadobuque@gmail.com">mocadobuque@gmail.com</a></p>

							<ul class="block__post--go-social">
								<li>Instagram: <a href="#this">@moca_do_buque</a></li>
								<li>Facebook: <a href="#this">@moca_do_buque</a></li>
								<li>Twitter: <a href="#this">@moca_do_buque</a></li>
							</ul>
						</div> -->

						<div class="block__adsence--post">
							<div class="row unicelular align-center center">
								<div class="col-m-4">
									<img src="img/fke/adsence-post.png">
								</div>
								<div class="col-m-4">
									<img src="img/fke/adsence-post.png">
								</div>
								<div class="col-m-4">
									<img src="img/fke/adsence-post.png">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- <div class="wrap index">
			<h4>Single.php</h4>
			<div class="list_posts">
				<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<p><?php the_content(); ?></p>
				<div class="comments">
					<dl class="status">
						<dt><a href="<?php the_permalink(); ?>"><?php comments_number('Nenhum coment&amp;aacute;rio', 'Um coment&amp;aacute;rio', '% coment&amp;aacute;rios' );?></a></dt>
					</dl>
					<dl class="comment">
						<dt><?php the_author(); ?></dt>
						<dd class="date">dia <?php the_time('j \d\e\ F \d\e\ Y'); ?></dd>
					</dl> -->
	<?php endwhile; else: ?>
				<p><?php _e('Nenhum post encontrado.'); ?></p>
	<?php endif; ?>
		<?php posts_nav_link(' &amp;#8212; ', __('&amp;laquo; P&amp;aacute;gina anterior'), __('Pr&amp;oacute;xima p&amp;aacute;gina &amp;raquo;')); ?>
		<?php //get_sidebar(); ?>
	</main>
	<?php get_footer(); ?>