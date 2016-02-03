		<footer class="footer">
			<div class="center">
				<div class="col-m-8">
					<nav class="footer__menu">
						<div class="dropdown">
							<a href="#this">todos os posts <i class="fa fa-angle-down"></i></a>

							<ul>
								<li><a href="<?php bloginfo('url'); ?>/artes">Artes</a></li>
								<li><a href="<?php bloginfo('url'); ?>/eu-acho">Eu acho</a></li>
								<li><a href="<?php bloginfo('url'); ?>/feiras">Feira</a></li>
								<li><a href="<?php bloginfo('url'); ?>/mesa">Mesa</a></li>
								<li><a href="<?php bloginfo('url'); ?>/passeio">Passeio</a></li>
								<li><a href="<?php bloginfo('url'); ?>/pessoas">Pessoas</a></li>
								<li><a href="<?php bloginfo('url'); ?>/pistas">Pista</a></li>
								<li><a href="<?php bloginfo('url'); ?>/sacolas">Sacola</a></li>
							</ul>
						</div>

						<a href="<?php echo get_permalink( get_page_by_path('mapa')); ?>">mapa do quadrado</a>
						<a href="<?php echo get_permalink( get_page_by_path('agenda')); ?>">agenda</a>
						<a href="<?php echo get_permalink( get_page_by_path('sobre-a-gente')); ?>" title="Sobre a gente">sobre a gente</a>
						<a href="<?php echo get_permalink( get_page_by_path('contato')); ?>">contato</a>
					</nav>
				</div>

				<div class="col-m-4 align-center ">
					<h2 class="footer__logo central"><a href="index.php">Quadrado Brasília</a></h2>
					<p>todos os direitos reservados</p>
				</div>
			</div>
		</footer>
	</div>

	<div id="loading"></div>

	<script>
		base_url = "<?php bloginfo('template_url'); ?>/";
		base_url_project = "<?php bloginfo('url'); ?>";
		ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
	</script>

	<script src="<?php bloginfo('template_url'); ?>/js/plugins/module.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/plugins/jQuery-1.11.0.min.js"></script>
	
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Mascarar.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Mensagem.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Modal.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.VerificarNavegador.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.ValidarFormularios.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Collapsible.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Feedback.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Random.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.GoogleMaps.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.OAuthFacebook.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Modal.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/Modulos/MM.Calendar.js"></script>

	<!--[if lte IE 9]><script src="<?php bloginfo('template_url'); ?>/js/plugins/jQuery.placeholder.js"></script>
	<script>
		$(document).ready(function(){
			$('input[placeholder], textarea[placeholder]').placeholder();
		});
	</script><![endif]-->

	<script src="<?php bloginfo('template_url'); ?>/js/base.js"></script>

	<?php wp_footer(); ?>

	</body>
</html>