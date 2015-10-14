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
						<h1>Nossos <strong>professores</strong></h1>
						<p><?php the_content(); ?></p>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="block__teachers">

						<?php query_posts( array( 'post_type' => 'professores', 'posts_per_page' => '4', 'order' => 'ASC' ) );

						if (have_posts()) : while (have_posts()) : the_post();
							$courseID = get_the_ID();
							$c_title = get_the_title($courseID);
							$professor_email = get_field('e-mail_do_professor', $courseID);
							$sobre_o_professor = get_field('sobre_o_professor', $courseID);
							$imagem_professor = get_field('foto_do_professor', $courseID);
						?>
						<?php if( $counter % 2 == 0 ) { ?>
							
							<div class="row padded-x2">
						<?php } ?>

								<div class="col-m-6">
									<div class="teacher">
										<figure>
											<img src="<?php echo $imagem_professor['url']; ?>" alt="<?php echo $c_title; ?>">
										</figure>

										<div class="information">
											<strong><?php echo $c_title; ?></strong>

											<?php echo $sobre_o_professor; ?>

											<a href="mailto:<?php echo $professor_email; ?>"><i class="fa fa-envelope-o"></i> <?php echo $professor_email; ?></a>
										</div>
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
						<?php endif; wp_reset_query(); ?>

						<?php wp_pagenavi(); ?>
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
								<div class="course">
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

						<?php endforeach; wp_reset_postdata();?>

						<div class="row">
							<div class="col-m-12 align-center seeAll">
								<a href="<?php bloginfo('url'); ?>/cursos/" class="btn btn-error btn-seeall">Todos os nossos cursos</a>
							</div>
						</div>
					</div>
				</aside>
			</div>
		</div>
	<?php get_footer(); ?>
