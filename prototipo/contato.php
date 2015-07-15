<?php include("inc/header.php"); ?>

		<main role="main">
			<div class="block__title">
				<div class="center">
					<div class="row">
						<div class="col-m-12 block__title--breadcrumb">
							<p class="breadcrumb"><a href="index.php">Página inicial</a> / Contato</p>
						</div>

						<div class="col-m-12">
							<h1>Entre em <strong>Contato</strong></h1>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when anunknown.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="wrap">
				<div class="bg"></div>
				<div class="content">
					<section class="block__page">
						<div class="row padded-x2">
							<div class="col-m-6">
								<div class="block__form">
									<form action="#url" class="validate">
										<div class="row">
											<div class="col-m-12">
												<label for="nome">Nome:</label>
												<input type="text" name="nome" id="nome" class="form-style radius required">
											</div>
										</div>

										<div class="row">
											<div class="col-m-6">
												<label>Telefone</label>
												<input type="text" name="telefone" class="mask-phone form-style radius required">
											</div>

											<div class="col-m-6">
												<label for="email">E-mail</label>
												<input type="text" name="email" class="form-style radius required">
											</div>
										</div>

										<div class="row">
											<div class="col-m-12">
												<label for="message">Mensagem:</label>
												<textarea name="message" class="form-style radius required"></textarea>
											</div>
										</div>

										<div class="row">
											<div class="col-m-6">
												<button type="submit" class="btn btn-error">Enviar</button>
											</div>
										</div>
									</form>
								</div>
							</div>

							<div class="col-m-6">
								<div class="block__faq">
									<h2>DÚVIDAS FREQUENTES</h2>

									<div class="collapse">
										<div class="coll_title">
											<h4><a href="#this">1. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
										</div>

										<div class="coll_content">
											<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
										</div>
									</div>

									<div class="collapse">
										<div class="coll_title">
											<h4><a href="#this">2. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
										</div>

										<div class="coll_content">
											<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
										</div>
									</div>

									<div class="collapse">
										<div class="coll_title">
											<h4><a href="#this">3. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
										</div>

										<div class="coll_content">
											<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
										</div>
									</div>

									<div class="collapse">
										<div class="coll_title">
											<h4><a href="#this">4. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
										</div>

										<div class="coll_content">
											<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
										</div>
									</div>

									<div class="collapse">
										<div class="coll_title">
											<h4><a href="#this">5. Lorem Ipsum is simply dummy text of the printing and typesetting industry?</a></h4>
										</div>

										<div class="coll_content">
											<p>Typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>

					<aside>
						<div class="aside__dataIcon">
							<div class="date">
								<i class="fa fa-phone-square"></i>

								<div>
									<label>Telefone</label>
									<strong><span>61.</span> 3522-1699</strong>
								</div>
							</div>

							<div class="time">
								<i class="fa fa-envelope-o"></i>

								<div>
									<label>e-mail</label>
									<a href="mailto:quatuorideias@gmail.com">quatuorideias@gmail.com</a>
								</div>
							</div>

							<div class="map">
								<i class="fa fa-map-marker"></i>

								<div>
									<label>local</label>
									<p>CA 05, Lote F, Ed. San Raphael, Loja 09 Lago Norte - Brasília/DF</p>
								</div>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</main>

<?php include("inc/footer.php"); ?>