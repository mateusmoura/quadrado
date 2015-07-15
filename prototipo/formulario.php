<?php include("inc/header.php"); ?>

		<main role="main" data-page="home">
			<div class="conteudo">
				<div class="formulario-exemplos">
					<h1>Formulário</h1>

					<form action="#url" method="POST" class="padded">
						<h2 class="h2">Input tipo texto</h2>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-20">
									<label for="dado-label" class="label">Normal</label>
									<input type="text" name="label" id="dado-label" class="form-style" placeholder="Dica para o usuário">
								</div>

								<div class="col-20">
									<label for="dado-label2">Desabilitado</label>
									<input type="text" name="label2" id="dado-label2" class="form-style" disabled="" placeholder="Dica para o usuário">
								</div>
							</div>
						</div>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-20">
									<label for="dado-label5">Input com icone</label>
									<div class="input-icon">
										<i class="fa fa-search"></i>
										<input type="text" name="label5" id="dado-label5" class="form-style" placeholder="Dica para o usuário">
									</div>
								</div>

								<div class="col-20">
									<label for="dado-label6">Input com icone direita</label>
									<div class="input-icon direita">
										<i class="fa fa-edit"></i>
										<input type="text" name="label6" id="dado-label6" class="form-style" placeholder="Dica para o usuário">
									</div>
								</div>
							</div>
						</div>

						<h2 class="h2">Inputs Mascaras</h2>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-10">
									<label for="dado-label9">Telefone:</label>
									<input type="text" name="label9" id="dado-label9" class="form-style mask-telefone" placeholder="Dica para o usuário">
								</div>
								<div class="col-10">
									<label for="dado-label10">CPF</label>
									<input type="text" name="label10" id="dado-label10" class="form-style mask-cpf" placeholder="Dica para o usuário">
								</div>
								<div class="col-10">
									<label for="dado-label11">CNPJ</label>
									<input type="text" name="label11" id="dado-label11" class="form-style mask-cnpj" placeholder="Dica para o usuário">
								</div>
								<div class="col-10">
									<label for="dado-label12">CEP</label>
									<input type="text" name="label12" id="dado-label12" class="form-style mask-cep" placeholder="Dica para o usuário">
								</div>
							</div>
						</div>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-10">
									<label for="dado-label13">Data</label>
									<input type="text" name="label13" id="dado-label13" class="form-style mask-data" placeholder="Dica para o usuário">
								</div>
								<div class="col-10">
									<label for="dado-label14">Somente numeros:</label>
									<input type="text" name="label15" id="dado-label14" class="form-style numeros" placeholder="Dica para o usuário">
								</div>
								<div class="col-10">
									<label for="dado-label15">Criar mascara personalizada</label>
									<input type="text" name="label15" id="dado-label15" class="form-style mask-personalizado" data-mascara="999.9/99.99999.999.9" placeholder="Dica para o usuário">
								</div>
								<div class="col-10">
									
								</div>
							</div>
						</div>

						<h2 class="h2">Input Upload</h2>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-20">
									<input type="file" name="label16">
								</div>

								<div class="col-20">
									<div class="custom-upload">
										<input type="file" name="label16">
									</div>
								</div>
							</div>
						</div>

						<h2 class="h2">Select</h2>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-10">
									<label for="dado-label17">Select</label>
									<select name="label17" id="dado-label17" class="form-style">
										<option value="">Selecione</option>
										<option>Valor 1</option>
										<option>Valor 2</option>
										<option>Valor 3</option>
									</select>
								</div>

								<div class="col-10">
									<label for="dado-label18">Select</label>
									<select name="label18" id="dado-label18" disabled="" class="form-style">
										<option value="">Selecione</option>
										<option>Valor 1</option>
										<option>Valor 2</option>
										<option>Valor 3</option>
									</select>
								</div>
							</div>
						</div>

						<h2 class="h2">Checkbox e Radio</h2>

						<div class="formulario-grupo">
							<div class="row">
								<div class="col-10">
									<div class="checkbox">
										<input type="checkbox" name="label19" id="dado-label19">
										<label for="dado-label19">Opção Selecionada</label>
									</div>
								</div>
								<div class="col-10">
									<div class="checkbox">
										<input type="checkbox" name="label20" id="dado-label20" disabled="">
										<label for="dado-label20">Opção Selecionada</label>
									</div>
								</div>

								<div class="col-10">
									<div class="radio">
										<input type="radio" name="label21" id="dado-label21">
										<label for="dado-label21">Opção Selecionada</label>
									</div>
								</div>

								<div class="col-10">
									<div class="radio">
										<input type="radio" name="label22" id="dado-label22" disabled="">
										<label for="dado-label22">Opção Selecionada</label>
									</div>
								</div>
							</div>
						</div>
					</form>

					<form class="validar" action="#url" method="POST" data-ajax="true">
						<div class="row formulario-grupo">
							<div class="col-20">
								<label for="dado-label23">Nome:</label>
								<input type="text" name="label23" id="dado-label23" class="form-style required" placeholder="Dica para o usuário">
							</div>

							<div class="col-20">
								<label for="dado-label24">Sobrenome:</label>
								<input type="text" name="label24" id="dado-label24" class="form-style required" placeholder="Dica para o usuário">
							</div>
						</div>

						<div class="row formulario-grupo">
							<div class="col-20">
								<label for="dado-label25">CPF:</label>
								<input type="text" name="label25" id="dado-label25" class="form-style required cpf mask-cpf" placeholder="Dica para o usuário">
							</div>

							<div class="col-20">
								<label for="dado-label26">Data de nascimento:</label>
								<div class="input-icon direita">
									<i class="fa fa-calendar"></i>
									<input type="text" name="label26" id="dado-label26" class="form-style required mask-data" placeholder="Dica para o usuário">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-3">
								<button type="submit" class="">Enviar</button>
							</div>
						</div>
					</form>

					<h1 class="titulo-1">Elementos especificos para o Projeto:</h1>

					<form action="#url" method="POST" class="validar msg-custom">
						<div class="row formulario-grupo">
							<div class="col-18">
								<label class="label">Input name</label>
								<input type="text" name="test-1" class="required form-style">
							</div>
							<div class="col-2 msg-validar">

							</div>
						</div>

						<div class="row formulario-grupo">
							<div class="col-18">
								<label class="label">Data</label>
								<input type="text" name="teste-2" class="required mask-data form-style">
							</div>
							<div class="col-2 msg-validar">

							</div>
						</div>

						<div class="row formulario-grupo">
							<div class="col-18">
								<label class="label">CPF</label>
								<input type="text" name="teste-6" class="required cpf mask-cpf form-style">
							</div>
							<div class="col-2 msg-validar">

							</div>
						</div>

						<div class="row formulario-grupo">
							<div class="col-18">
								<label class="label disabled">Input desativado</label>
								<input type="text" name="teste-3" disabled class="form-style">
							</div>
							<div class="col-2 msg-validar">

							</div>
						</div>

						<div class="row formulario-grupo">
							<div class="col-18">
								<label class="label">Area de texto</label>
								<textarea placeholder="placeholder" name="teste-4" class="form-style" ></textarea>
							</div>
							<div class="col-2 msg-validar">
								
							</div>
						</div>

						<div class="row">
							<div class="col-18 texto-direita">
								<button type="submit" class="btn btn-padrao">Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</main>

<?php include("inc/footer.php"); ?>