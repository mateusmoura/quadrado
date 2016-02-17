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
								<div class="row">
									<div class="col-12">
										<label>Autenticar com o Facebook (obrigatório)</label>
										<button type="button" class="btn btn-link btn-facebook">
											<i class="fa fa-facebook-square"></i>
										</button>
									</div>
								</div>
								<div class="row fb__notLogged">
									<div class="col-12">
										<label>seu nome (obrigatório)</label>
										<input type="text" name="user_name" class="form-style required">
									</div>
								</div>
								<div class="row fb__notLogged">
									<div class="col-12">
										<label>seu e-mail (obrigatório)</label>
										<input type="text" name="user_email" class="form-style email required">
									</div>
								</div>
								<div class="row fb__notLogged">
									<div class="col-12">
										<label>URL do evento no Facebook (obrigatório)</label>
										<input type="text" name="user_url_event" class="form-style url required">
									</div>
								</div>

								<div class="row fb__notLogged">
									<div class="col-12">
										<button type="submit" class="btn btn-default btn-full">sugerir evento</button>
									</div>
								</div>
							</form>
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