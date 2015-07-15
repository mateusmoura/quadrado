<?php include("inc/header.php"); ?>

		<main role="main" data-page="home">
			<div class="conteudo">
				<div class="alertas-exemplos">
					<h1>Alertas</h1>
					<p>Basta chamar a Função CNA.Feedback() e passar como parametros: texto( pode ser somente o texto ou HTML ), tipo ( sucesso, erro, alerta e info ) e close( true ou false para fechamento automatico ou não ).</p>

					<hr>
					<br><br>

					<div class="linha">
						<div class="col-24">
							<div class="feedback visual">
								<p><strong>ASSINE! </strong> <br>Receba informações sobre o agronegócio por e-mail! </p>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
							</div>
						</div>
						<br><br><br><br>
						<div class="col-24">
							<div class="feedback sucesso visual">
								<p><strong>ASSINE! </strong>Receba informações sobre o agronegócio por e-mail! <br><a href="#this">Cadastre-se</a></p>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
							</div>
						</div>
						<br><br><br><br>
						<div class="col-24">
							<div class="feedback erro visual">
								<p><strong>OPS! Parece que você preencheu algo errado.</strong> <br>Digite o número do seu CPF sem pontuação</p>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
							</div>
						</div>
						<br><br><br><br>
						<div class="col-24">
							<div class="feedback alerta visual">
								<p><strong>Atenção</strong> <br>Digite o número do seu CPF sem pontuação</p>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
							</div>
						</div>
						<br><br><br><br>
						<div class="col-24">
							<div class="feedback info visual">
								<p><strong>Atenção</strong> <br>Digite o número do seu CPF sem pontuação</p>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
							</div>
						</div>
					</div>

					<h1>Mensagens <small>Vai ser apresentadas com um OVERLAY de fundo</small></h1>
					<p>Basta chamar a Função CNA.Mensagem() e passar como parametros: título, mensagem e tipo( sucesso ou erro )</p>

					<hr>
					<br><br><br>
					<div class="linha overlay">
						<div class="col-12">
							<div class='message-alert sucesso visual'>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
								<span class='bg'></span>
								<h2>Título</h2>
								<p>Mensagem</p>
							</div>
						</div>

						<div class="col-12">
							<div class='message-alert erro visual'>
								<a href='#this' class='btn-fechar'><i class='fa fa-close'></i></a>
								<span class='bg'></span>
								<h2>Título</h2>
								<p>Mensagem</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>

		<style>
			.alertas-exemplos{
				padding-bottom: 80px;
			}
			.alertas-exemplos .overlay{
				background: url('img/bkg/overlay.png');
				padding: 80px 0;
			}
		</style>

<?php include("inc/footer.php"); ?>