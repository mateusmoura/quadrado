<?php get_header(); ?>
	<?php 
		$counter = 0;
		$page_index = 0;

		$page_curso = get_page( 6 );
	 ?>

	 <main role="main" class="home">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<h1>Nossos <strong>cursos</strong></h1>
						<p><?php echo $page_curso->post_content; ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="block__courses--list">

						<?php if (have_posts()) : while (have_posts()) : the_post();
							$courseID = get_the_ID();
							$c_title = get_the_title($courseID);
							$categories = get_the_category($courseID);
							$professor = get_field('professores', $courseID);
							$data = get_field('inicio_do_curso', $courseID);
							$valor = get_field('valor_do_curso', $courseID);
							$parcelas = get_field('parcelas', $courseID);
						?>

						<?php if( $counter % 3 == 0 ) { ?>
							
							<div class="row">
						<?php } ?>
								<div class="col-m-4">
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
						<?php if( $page_index > 1 ) { ?>
							</div>
						<?php $page_index = 0; } else {
							++$page_index;
						} 

						++$counter;

						?>

							<?php endwhile; ?>
							</div>
							<?php else: ?>
								<p>Nada encontrado!</p>

							<?php endif; ?>

						<?php wp_pagenavi(); ?>
					</div>
				</section>

				<aside>
					<div class="aside__searchCourses">
						<form id="searchform" action="<?php bloginfo('home'); ?>/" method="get">
							<div class="row">
								<div class="col-m-12 button-inset">
									<input id="s" type="text" class="form-style" placeholder="Encontre um curso" name="s" value="<?php echo wp_specialchars($s, 1); ?>" />
									<input type="hidden" name="post_type" value="cursos" />
									<button type="submit" id="searchsubmit" class="btn btn-error">OK</button>
								</div>
							</div>
						</form>
					</div>

					<div class="aside__categories">
						<h2>categorias</h2>

						<div class="tags">
						<?php 
							$args = array(
								'type'                     => 'post',
								'child_of'                 => 0,
								'parent'                   => '22',
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

							$categories = get_categories( $args );

							foreach ( $categories as $category ) :

							$cat_url = get_site_url().'/category/'.$category->category_nicename;
						?>


							<a href="<?php echo $cat_url; ?>" class="tag bgcolor-<?php echo $category->slug; ?>"><?php echo $category->cat_name; ?></a>

						<?php endforeach; wp_reset_postdata();?>

							<!-- <a href="#this" class="tag bgcolor-1">arte</a>
							<a href="#this" class="tag bgcolor-2">educação</a>
							<a href="#this" class="tag bgcolor-3">filosofia</a>
							<a href="#this" class="tag bgcolor-8">cinema</a>
							<a href="#this" class="tag bgcolor-4">gestão e negócios</a>
							<a href="#this" class="tag bgcolor-5">história</a>
							<a href="#this" class="tag bgcolor-6">música</a>
							<a href="#this" class="tag bgcolor-7">gastronomia</a> -->
						</div>
					</div>
				</aside>
			</div>
		</div>
	<?php get_footer(); ?>
