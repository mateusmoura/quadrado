	<footer>
		<div class="center">
			<div class="col-m-7">
				<div class="col-m-2 align-right">
					<a href="#this">
						<img src="<?php bloginfo('template_url'); ?>/img/lgo/logo-2.png" alt="Quatour &raquo; espaço de ideias">
					</a>
				</div>
				<div class="col-m-10">
					<p>61. <strong>3522-1699</strong></p>
					<p>CA 05, Lote F, Ed. San Raphael, Loja 09, Lago Norte - Brasília/DF <br/> CEP: 71.503-505</p>
				</div>
			</div>

			<div class="col-m-5">
			<label for="newsletter">Inscreva-se em nossa newsletter</label>
			<?php 
				echo do_shortcode('[simplenewsletter]');
			?>
			</div>
		</div>
	</footer>

	<div id="loading"></div>

	<script>
		base_url = "<?php bloginfo('template_url'); ?>/";
		base_url_project = "<?php bloginfo('url'); ?>";
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