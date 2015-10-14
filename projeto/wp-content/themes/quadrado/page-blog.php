<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post();
		$viewID = get_the_ID();
	 ?>
	<main role="main">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<h1>Nosso <strong>Blog</strong></h1>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="block__program blog">
						<ul>
							<?php query_posts( array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => '5', 'order' => 'DESC' ) );

							if ( have_posts() ) : while ( have_posts() ) : the_post();
								$postId = get_the_ID();
								$categories = get_the_category_list(',', '<div>', $postId);
							?>

							<li>
								<div class="class-number">
									<span><?php the_date('M'); ?></span>
									<strong><?php echo get_the_date('d', $postId); ?></strong>
								</div>

								<div class="information">
									<div class="categories"><?php echo $categories; ?></div>
									<h2><a href="<?php the_permalink(); ?>" title="<?php the_title() ?>"><?php the_title() ?></a></h2>
									<?php the_excerpt(); ?>
								</div>
							</li>
							
							<?php endwhile; endif; ?>
						</ul>

						<?php wp_pagenavi(); wp_reset_query();?>
					</div>
				</section>

				<aside>
					<div class="aside__searchCourses">
						<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
							<div class="row">
								<div class="col-m-12 button-inset">
									<input id="s" type="text" class="form-style" placeholder="Encontre um artigo" name="s" value="<?php echo wp_specialchars($s, 1); ?>" />
									<input type="hidden" name="post_type" value="post" />
									<button type="submit" id="searchsubmit" class="btn btn-error">OK</button>
								</div>
							</div>
						</form>
					</div>

					<div class="aside__assuntos">
						<h2>Assuntos</h2>

						<div class="tags">
						<?php 
							$args = array(
								'type'                     => 'cursos',
								'child_of'                 => 0,
								'parent'                   => '23',
								'orderby'                  => 'name',
								'order'                    => 'ASC',
								'hide_empty'               => 1,
								'hierarchical'             => 1,
								'exclude'                  => '1',
								'post_type'                => 'cursos',
								'include'                  => '',
								'number'                   => '',
								'taxonomy'                 => 'category',
								'pad_counts'               => false 
							);

							$categories = get_categories( $args ); ?>
						<ul>
						<?php 
							foreach ( $categories as $category ) :

							$cat_url = get_site_url().'/category/'.$category->category_nicename;
						?>

							<li>
								<a href="<?php echo $cat_url; ?>" class=""><?php echo $category->cat_name; ?></a>
							</li>

						<?php endforeach; wp_reset_postdata();?>
						</ul>
						</div>
					</div>
				</aside>
			</div>
		</div>

		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>