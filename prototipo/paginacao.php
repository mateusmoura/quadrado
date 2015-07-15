<?php include("inc/header.php"); ?>

		<main role="main" data-page="home">
			<div class="conteudo">
				<div class="botoes-exemplos">
					<h1>Paginação</h1>
					<p>As cores dos botões podem ser alteradas nas variáveis pré-definidas.</p>
					<hr>
					<br><br>

					<div class="row">
						<h3>Paginação padrão</h3>
						<p>Paginação simples</p>
						<hr>
						<br>
						<div class="col-20">
							<nav>
								<ul class="paginacao">
									<li>
										<a href="#this" title="Anterior">
											<span>&laquo;</span>
										</a>
									</li>
									<li><a href="#this">1</a></li>
									<li><a href="#this">2</a></li>
									<li><a href="#this">3</a></li>
									<li><a href="#this">4</a></li>
									<li><a href="#this">5</a></li>
									<li>
										<a href="#this" title="Próximo">
											<span>&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>

					<div class="row">
						<h3>Paginação estado ativo e desativado</h3>
						<p>Para colocar os links no estado de ativo e desativado basta adicionar na <code>LI</code> as classes: <code>.ativo</code> para link ativo e <code>.desativado</code> para links desativados</p>
						<hr>
						<br>
						<div class="col-20">
							<nav>
								<ul class="paginacao">
									<li class="ativo">
										<a href="#this" title="Anterior">
											<span>&laquo;</span>
										</a>
									</li>
									<li class="desativado"><a href="#this">1</a></li>
									<li><a href="#this">2</a></li>
									<li><a href="#this">3</a></li>
									<li><a href="#this">4</a></li>
									<li><a href="#this">5</a></li>
									<li>
										<a href="#this" title="Próximo">
											<span>&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>

					<div class="row">
						<h3>Tamanhos da paginação</h3>
						<p>Para alterar o tamanho da páginação ele está definido em 3 classes: <code>.paginacao-gr</code> para grande, <code>.paginacao-base</code> para tamanho normal e <code>.paginacao-pq</code> para paginação pequena.</p>
						<hr>
						<br>
						<div class="col-20">
							<nav>
								<ul class="paginacao paginacao-gr">
									<li>
										<a href="#this" title="Anterior">
											<span>&laquo;</span>
										</a>
									</li>
									<li><a href="#this">1</a></li>
									<li><a href="#this">2</a></li>
									<li><a href="#this">3</a></li>
									<li><a href="#this">4</a></li>
									<li><a href="#this">5</a></li>
									<li>
										<a href="#this" title="Próximo">
											<span>&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>

							<nav>
								<ul class="paginacao paginacao-base">
									<li>
										<a href="#this" title="Anterior">
											<span>&laquo;</span>
										</a>
									</li>
									<li><a href="#this">1</a></li>
									<li><a href="#this">2</a></li>
									<li><a href="#this">3</a></li>
									<li><a href="#this">4</a></li>
									<li><a href="#this">5</a></li>
									<li>
										<a href="#this" title="Próximo">
											<span>&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>

							<nav>
								<ul class="paginacao paginacao-pq">
									<li>
										<a href="#this" title="Anterior">
											<span>&laquo;</span>
										</a>
									</li>
									<li><a href="#this">1</a></li>
									<li><a href="#this">2</a></li>
									<li><a href="#this">3</a></li>
									<li><a href="#this">4</a></li>
									<li><a href="#this">5</a></li>
									<li>
										<a href="#this" title="Próximo">
											<span>&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
					

					<div class="row">
						<h3>Paginação especifica do projeto por página</h3>
						<p>Paginação especifica do projeto basta adicionar a classe <code>.cna-pagina</code></p>
						<hr>
						<br>
						<div class="col-20">
							<nav>
								<ul class="nav-pagina">
									<li class="anterior">
										<a href="#this" title="Anterior">
											<span>Anterior</span>
											<p>Matéria seguinte</p>
											<i class="fa fa-angle-left"></i>
										</a>
									</li>
									<li class="proximo">
										<a href="#this" title="Próximo">
											<span>Próximo</span>
											<p>Matéria seguinte</p>
											<i class="fa fa-angle-right"></i>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>


					<br><br>
					<br><br>
					<br><br>
				</div>
			</div>
		</main>


<?php include("inc/footer.php"); ?>