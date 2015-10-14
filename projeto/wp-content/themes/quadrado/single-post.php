<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		$pageID = get_the_ID();
		$title = get_the_title($pageID);
		$categories = get_the_category($pageID);
	?>
	<main role="main" >
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<h1>Nosso <strong>Blog</strong></h1>
						<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum hasbeen the industry's standard dummy text ever since the 1500s, when anunknown.</p> -->
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="entries">
						<h3><?php the_title(); ?></h3>

						<div class="entries__info">
							<p class="data"><?php the_date('d/m/Y'); ?> - <?php echo $categories[0]->category_nicename; ?></p>
							<p class="autor">Por <?php the_author(); ?></p>
						</div>

						<?php the_content(); ?>

						<div class="pagination">
							<div class="nav-previous alignleft"><?php echo get_next_posts_link( 'Older posts' ); ?></div>
							<div class="nav-next alignright"><?php echo previous_posts_link( 'Newer posts' ); ?></div>
						</div>
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