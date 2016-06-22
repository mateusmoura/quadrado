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

			<?php the_content(); ?>
		</section>

		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>