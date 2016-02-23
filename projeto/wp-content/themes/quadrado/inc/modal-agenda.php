		<div class="modal__default modal__event">
			<div class="modal__head">
				<div class="row">
					<div class="col-12">
						<h2>sugerir um evento</h2>
					</div>
				</div>
			</div>

			<div class="modal__content">
				<div class="row">
					<div class="col-12">
						<div class="modal__content--form">
							<form action="wp_ajax_admin_enqform" method="POST" class="validate" data-onlyvalidate="true" data-callfn="site.registerEvent">
								<div class="row modal__event--loading">
									<div class="col-12 align-center">
										<i class="fa fa-circle-o-notch fa-spin"></i>
									</div>
								</div>
								<div class="row modal__event--userData">
									<div class="col-12">
										<label>você está sugerindo este link como</label>

										<img src="#url" alt="">

										<h2></h2>
										<a href="#this" class="btn-logout btn-link">sair</a>
									</div>
								</div>

								<div class="row modal__event--oauth">
									<div class="col-12">
										<label>Autenticar com o Facebook (obrigatório)</label>
										<button type="button" class="btn btn-link btn-facebook">
											<i class="fa fa-facebook-square"></i>
										</button>
									</div>
								</div>
								<div class="row modal__event--name">
									<div class="col-12">
										<label>seu nome (obrigatório)</label>
										<input type="text" name="user_name" class="form-style required">
									</div>
								</div>
								<div class="row modal__event--email">
									<div class="col-12">
										<label>seu e-mail (obrigatório)</label>
										<input type="text" name="user_email" class="form-style email required">
									</div>
								</div>
								<div class="row modal__event--url">
									<div class="col-12">
										<label>URL do evento no Facebook (obrigatório)</label>
										<input type="text" name="user_url_event" class="form-style url required">
									</div>
								</div>

								<div class="row fb__notLogged">
									<div class="col-12">
										<button type="submit" class="btn btn-default btn-full">sugerir evento <i class="fa fa-circle-o-notch fa-spin"></i></button>
									</div>
								</div>
							</form>

							<div class="modal__event--success">
								<h3>Obrigada pela sugestão!</h3>
								<p>Seu evento será analisado!</p>

								<button type="button" class="btn btn-default btn-again">quero sugerir outro evento</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script>
			var _formValidate		= $('.modal__default form.validate'),
				obj_temp			= _formValidate.data('settings'),
				callback			= _formValidate.data('callfn');

			MM.ValidarFormularios(_formValidate, obj_temp, callback);
			MM.OAuthFacebook($('div.modal__event'), window.FB);
		</script>