<?php get_header(); ?>
	<main role="main" class="home">
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<h1>Resultado <strong>Busca</strong></h1>
						<p>Os resultados abaixo são da busca de "<?php echo get_search_query() ?>"</p>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="block__courses--list">
						<?php if (have_posts() && $_GET['post_type']) : while (have_posts()) : the_post();
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
						<?php posts_nav_link(' &#8212; ', __('&laquo; P&aacute;gina anterior'), __('Pr&oacute;xima p&aacute;gina &raquo;')); ?>
						<?php else: ?>
							<p>Não foi encontrado nenhum resultado para <?php echo get_search_query(); ?>. <a href="<?php bloginfo('url'); ?>/cursos/">Volte aos cursos</a></p>
						<?php endif; ?>
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
								'parent'                   => '',
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
						</div>
					</div>
				</aside>
			</div>
		</div>
	</main>
	<?php get_footer(); ?>

