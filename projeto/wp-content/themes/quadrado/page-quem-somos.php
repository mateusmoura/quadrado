<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post();
		$viewID = get_the_ID();
		$title = get_the_title($viewID);
	 ?>
	<main role="main">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<h1><?php echo str_replace('/', '<strong>', $title); ?></h1>
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="entries">
						<?php the_content(); ?>

						<div class="teachers__list row">
							<div class="col-m-3">
								<h4>David Nogueira</h4>
								<a href="#this" class="btn btn-link">&gt; Perfil completo</a>
							</div>

							<div class="col-m-3">
								<h4>Felipe Pessoa</h4>
								<a href="#this" class="btn btn-link">&gt; Perfil completo</a>
							</div>

							<div class="col-m-3">
								<h4>Sharlene Elaine</h4>
								<a href="#this" class="btn btn-link">&gt; Perfil completo</a>
							</div>

							<div class="col-m-3">
								<h4>Luis Felipe Lopes</h4>
								<a href="#this" class="btn btn-link">&gt; Perfil completo</a>
							</div>
						</div>
					</div>
				</section>

				<aside>
					<div class="aside__courses">
						<h2>Nossos cursos</h2>

						<?php $args = array(
							'posts_per_page'   => 2,
							'offset'           => 0,
							'category'         => '',
							'category_name'    => '',
							'orderby'          => 'post_date',
							'order'            => 'DESC',
							'include'          => '',
							'exclude'          => '',
							'meta_key'         => '',
							'meta_value'       => '',
							'post_type'        => 'cursos',
							'post_mime_type'   => '',
							'post_parent'      => '',
							'post_status'      => 'publish',
							'suppress_filters' => true 
						);
						$posts_category = get_posts( $args );

						$i = 0;
						$len = count($posts_category);

						foreach ( $posts_category as $post ) : setup_postdata( $post ); 
							$courseID = get_the_ID();
							$c_title = get_the_title($courseID);
							$categories = get_the_category($courseID);
							$professor = get_field('professores', $courseID);
							$data = get_field('inicio_do_curso', $courseID);
							$valor = get_field('valor_do_curso', $courseID);
							$parcelas = get_field('parcelas', $courseID);
						?>

						<div class="row">
							<div class="col-m-12">
								<div class="course  <?php if($i == $len - 1) { echo 'noBorder'; }; ?>">
									<span class="tag bgcolor-<?php echo $categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></span>

									<h3><a href="<?php echo the_permalink(); ?>"><?php echo str_replace('/', '', $c_title); ?></a></h3>
									
									<div class="information">
										<p><span>com</span> <?php echo $professor[0]["nome"] ?></p>
										<p><span>início:</span> <?php echo $data ?></p>
										<p><span>Investimento de</span> <?php echo $parcelas; ?>x R$ <?php echo $valor; ?></p>
									</div>

									<a href="<?php echo the_permalink(); ?>" class="btn btn-link">> Saiba mais</a>
								</div>
							</div>
						</div>

						<?php $i++; endforeach; wp_reset_postdata();?>

						<div class="row">
							<div class="col-m-12 align-center seeAll">
								<a href="<?php bloginfo('url'); ?>/cursos/" class="btn btn-error btn-seeall">Todos os nossos cursos</a>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>

		<?php endwhile; else: ?>
		<?php endif; ?>
	</main>
	<?php get_footer(); ?>