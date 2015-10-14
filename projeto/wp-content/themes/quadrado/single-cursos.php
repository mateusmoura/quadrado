<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		$pageID = get_the_ID();
		$title = get_the_title($pageID);
		$categories = get_the_category($pageID);
		$professores = get_field('professores', $pageID); // Fazer de outra forma.
		$local = get_field('local_do_curso');
	?>
	<main role="main" >
		<div class="block__title">
			<div class="center">
				<div class="row">
					<div class="col-m-12 block__title--breadcrumb">
						<?php wp_custom_breadcrumbs(); ?>
					</div>

					<div class="col-m-12">
						<span class="tag bgcolor-<?php echo $categories[0]->slug; ?>"><?php echo $categories[0]->name; ?></span>
						<h1><?php echo str_replace('/', '<strong>', $title); ?></h1>
					</div>
				</div>
			</div>
		</div>

		<div class="wrap">
			<div class="bg"></div>
			<div class="content">
				<section class="block__page">
					<div class="entries">
						<h2>SOBRE O CURSO</h2>

						<?php the_content(); ?>
					</div>

					<div class="block__teacher">
						<h2>PROFESSOR</h2>

					<?php 
						foreach ( $professores as $professor ) :

						$cat_url = get_site_url().'/category/'.$category->category_nicename;
					?>
						<div class="block__teacher--item">

							<img src="<?php echo $professor['foto_do_professor']['url'] ?>" alt="<?php echo $professor["nome"] ?>">

							<div class="information">
								<strong><?php echo $professor["nome"] ?></strong>

								<?php echo $professor["sobre_o_professor"] ?>

								<a href="mailto:<?php echo $professor['email'] ?>"><i class="fa fa-envelope-o"></i> <?php echo $professor['email'] ?></a>
							</div>
						</div>
					<?php endforeach; ?>
					</div>

					<div class="block__program">
						<h2>PROGRAMAÇÃO</h2>

						<ul>
							<?php while(the_flexible_field("programacao")): ?>
								<?php if(get_row_layout() == "aula"): // layout: Content ?>
									<li>
										<div class="class-number">
											<span>Aula</span>
											<strong><?php the_sub_field("numero_da_aula"); ?></strong>
										</div>

										<div class="information">
											<strong><?php the_sub_field("titulo"); ?></strong>
											<p><?php the_sub_field("descrição"); ?></p>
										</div>
									</li>
								<?php endif; ?>
							<?php endwhile; ?>
						</ul>
					</div>
				</section>

				<aside>
					<div class="aside__dataIcon">
						<div class="date">
							<i class="icon icon-calendar"></i>

							<div>
								<label>Data</label>
								<p><?php echo get_field('inicio_do_curso') ?> a <?php echo get_field('final_do_curso') ?></p>
							</div>
						</div>

						<div class="time">
							<i class="icon icon-time"></i>

							<div>
								<label>Horário</label>
								<p><?php echo get_field('horario_do_curso'); ?></p>
							</div>
						</div>

						<div class="map">
							<i class="icon icon-marker"></i>

							<div>
								<label>Local</label>
								<a target="_blank" href="http://maps.google.com/maps?q=loc:<?php echo $local['lat'] ?>,<?php echo $local['lng'] ?>"><?php echo $local['address']; ?></a>
							</div>
						</div>
					</div>

					<div class="aside__buy">
						<div>
							<span>Investimento</span>
							<p class="value"><?php echo get_field('parcelas'); ?>x <span>R$ <?php echo get_field('valor_do_curso'); ?></span></p>

							<?php 
								if(intval(get_field('quantidade_de_alunos')) > 0 ){
									if( intval(get_field('curso_finalizado')) === 1 ) { ?>
										<p class="closed">Matrículas encerradas</p>
									<?php } else {
										echo get_field('link_pagseguro');
									}
								} else { ?>

								<button type="button" class="btn btn-error btn-esgotado">ESGOTADO <span><?php echo get_field('total_de_vendas'); ?> alunos confirmados</span></button>
								<a href="#this" rel="course_alert" cached="true" class="btn-notice btn-modal">> Avise-me quando abrir nova turma</a>
							<?php
								}
							?>

							<?php 
								if(intval(get_field('quantidade_de_alunos')) > 0 ){ ?>
								<input type="hidden" value="<?php echo get_field('quantidade_de_alunos'); ?>" name="quantidade_de_alunos" id="update_new_value">
								<input type="hidden" value="<?php echo $pageID ?>" name="curso_id" id="update_curso_id">
								<input type="hidden" value="<?php echo get_field('total_de_vendas'); ?>" name="total_de_vendas" id="update_total_vendas">

								<span class="students">Máximo de <?php echo get_field('quantidade_de_alunos'); ?> alunos</span>
							<?php } ?>
						</div>
					</div>
				</aside>
			</div>
		</div>
		
		<div id="modal" class="modal course_alert">
			<a href="#this" class="btn-fechar"><i class="icon icon-fechar2"></i></a>
			<div class="conteudo">
				<div class="course_alert">
					<h2><?php echo str_replace('/', '<strong>', $title); ?></h2>
					<p>Informe abaixo seu nome e e-mail e te avisaremos quando abrir uma nova turma deste curso.</p>

					<?php 
						echo do_shortcode('[contact-form-7 id="99" title="Avise-me Sobre o Curso"]');
					?>
				</div>
			</div>
		</div>
	<?php endwhile; else: ?>
				<p><?php _e('Nenhum post encontrado.'); ?></p>
	<?php endif; ?>
		<?php posts_nav_link(' &amp;#8212; ', __('&amp;laquo; P&amp;aacute;gina anterior'), __('Pr&amp;oacute;xima p&amp;aacute;gina &amp;raquo;')); ?>
		<?php //get_sidebar(); ?>
	</main>
	<?php get_footer(); ?>