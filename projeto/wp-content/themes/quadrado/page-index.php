<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		$pageID = get_the_ID();
		$title = get_the_title($pageID);
		remove_filter( 'the_content', 'wpautop' );
	?>
	<main role="main" class="home">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--image">
					</div>

					<div class="col-m-12">
						<h1><?php echo str_replace('/', '<strong>', $title); ?></h1>
						<p><?php echo wpautop(the_content()); ?></p>
					</div>
				</div>
			</div>
		</div>

		<section class="block__courses">
			<div class="bg"></div>
			<div class="center">
				<h2>Nossos cursos</h2>

				<div class="courses__list row">
					<?php query_posts( array( 'post_type' => 'cursos', 'posts_per_page' => '4', 'orderby' => 'menu_order', 'order' => 'ASC' ) );

					if ( have_posts() ) : while ( have_posts() ) : the_post();
						$courseID = get_the_ID();
						$c_title = get_the_title($courseID);
						$categories = get_the_category($courseID);
						$professor = get_field('professores', $courseID);
						$data = get_field('inicio_do_curso', $courseID);
						$valor = get_field('valor_do_curso', $courseID);
						$parcelas = get_field('parcelas', $courseID);
					?>
					<div class="col-m-3">
						<div class="course">
							<span class="tag bgcolor-<?php echo $categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></span>

							<h3><a href="<?php echo the_permalink(); ?>"><?php echo str_replace('/', '', $c_title); ?></a></h3>
							
							<div class="information">
								<p><span>com</span> <?php echo $professor[0]["nome"] ?></p>
								<p><span>início:</span> <?php echo $data ?></p>
								<p><span>Investimento de</span> <?php echo $parcelas; ?>x R$ <?php echo $valor; ?></p>
							</div>

							<a href="<?php echo the_permalink(); ?>" class="btn btn-error">Saiba mais</a>
						</div>
					</div>
					<?php endwhile; endif; wp_reset_query(); ?>
				</div>

				<a href="<?php bloginfo('url'); ?>/cursos/" class="btn-link btn-courses">&gt; Conheça os nossos cursos</a>
			</div>
		</section>

		<section class="block__blog">
			<div class="bg"></div>

			<div class="center">
				<h2>Blog</h2>

				<div class="posts__list row">
					<?php $args = array(
						'posts_per_page'   => 3,
						'offset'           => 0,
						'category'         => '',
						'category_name'    => '',
						'orderby'          => 'post_date',
						'order'            => 'DESC',
						'include'          => '',
						'exclude'          => '',
						'meta_key'         => '',
						'meta_value'       => '',
						'post_type'        => 'post',
						'post_mime_type'   => '',
						'post_parent'      => '',
						'post_status'      => 'publish',
						'suppress_filters' => true 
					);
					$posts_array = get_posts( $args ); 

					//var_dump($posts_array);
					foreach ( $posts_array as $post ) : setup_postdata( $post ); 
						$postID = get_the_ID();
						$date = get_the_date('Ymd', $postID);
						$date2 = get_the_date('d/m/Y', $postID);
					?>

					<div class="col-m-4">
						<div class="post">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

							<div class="information">
								<time datetime="<?php echo $date; ?>"><?php echo $date2; ?></time>
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>

					<?php endforeach; wp_reset_postdata();?>
				</div>

				<a href="<?php bloginfo('url'); ?>/blog/" class="btn-link btn-blog">&gt; Leia nosso blog</a>
			</div>
		</section>

		<div class="block__maps">
			<div id="map-canvas">
				<img src="<?php bloginfo('template_url'); ?>/img/fke/maps.png" alt="imagem fake">
			</div>
		</div>

		<!-- <div class="blocks">
			<div class="center">
				<?php the_content(); ?>
			</div>
		</div> -->
		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>