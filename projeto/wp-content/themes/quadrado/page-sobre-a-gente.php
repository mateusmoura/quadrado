<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post();
		$viewID = get_the_ID();
		$title = get_the_title($viewID);
	 ?>

	<main role="main" class="about">
		<section class="block__post">
			<div class="center">
				<div class="row">
					<div class="col-m-12">
						<div class="block__post--title">
							<h1><?php the_title(); ?></h1>

							<div class="block__post--time">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="block__slider full">
				<?php
					$count = 0;

					// check if the repeater field has rows of data
					if( have_rows('item_do_carousel') ):
						// loop through the rows of data
							while ( have_rows('item_do_carousel') ) : the_row();

								if($count == 0) {
									$itemclass = 'left';
								} else if ($count == 1) {
									$itemclass = 'active';
								} else if ($count == 2) {
									$itemclass = 'right';
								} else {
									$itemclass = 'hidden';
								}
				?>


								<div class="block__slider--item <?php echo $itemclass ?>">
									<div class="block__slider--item-entries center">
										<h2><?php echo the_sub_field('titulo'); ?></h2>

										<img class="alignnone" src="<?php echo the_sub_field('imagem'); ?>" />
										<div class="block__slider--legend">
											<?php echo the_sub_field('legenda_da_imagem'); ?>
										</div>

										<div class="block__slider--text">
											<?php echo the_sub_field('conteudo'); ?>
										</div>

										<div class="block__slider--link">
											<?php echo the_sub_field('url'); ?>
										</div>
									</div>

									<div class="block__slider--shadow"></div>
								</div>
					<?php
							$count++;

							endwhile;

					else :

							// no rows found

					endif;

					?>

					<div class="block__slider--controls">
						<button type="button" class="btn btn-default btn-left"><i class="fa fa-chevron-left"></i></button>
						<button type="button" class="btn btn-default btn-right"><i class="fa fa-chevron-right"></i></button>
					</div>
			</div>
			<?php //the_content(); ?>
		</section>

		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>