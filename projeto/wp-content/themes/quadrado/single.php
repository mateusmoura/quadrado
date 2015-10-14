<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); 
		$pageID = get_the_ID();
		$title = get_the_title($pageID);
		$categories = get_the_category($pageID);
		$professor = get_field('professores', $pageID); // Fazer de outra forma.
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

						<img src="<?php echo $professor[0]['foto_do_professor']['url'] ?>" alt="<?php echo $professor[0]["nome"] ?>">

						<div class="information">
							<strong><?php echo $professor[0]["nome"] ?></strong>

							<?php echo $professor[0]["sobre_o_professor"] ?>

							<a href="mailto:<?php echo $professor[0]['email'] ?>"><i class="fa fa-envelope-o"></i> <?php echo $professor[0]['email'] ?></a>
						</div>
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
							<i class="fa fa-calendar"></i>

							<div>
								<label>Data</label>
								<p><?php echo get_field('inicio_do_curso') ?> a <?php echo get_field('final_do_curso') ?></p>
							</div>
						</div>

						<div class="time">
							<i class="fa fa-clock-o"></i>

							<div>
								<label>Horário</label>
								<p><?php echo get_field('horario_do_curso'); ?></p>
							</div>
						</div>

						<div class="map">
							<i class="fa fa-map-marker"></i>

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
									echo get_field('link_pagseguro'); 
								} else { ?>

								<button type="button" class="btn btn-error btn-esgotado">ESGOTADO <span><?php echo get_field('total_de_vendas'); ?> alunos confirmados</span></button>
								<a href="#this" class="btn-notice">> Avise-me quando abrir nova turma</a>
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