<?php include("inc/header.php"); ?>

			<main role="main" class="calendar">
				<section class="block__post">
					<div class="center">
						<div class="row">
							<div class="col-m-12">
								<div class="block__post--title">
									<h1>agenda do quadrado</h1>

									<a href="#this" class="btn btn-default">sugerir um evento</a>

									<div class="block__post--time"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="bg-white">
						<div class="center">
							<div class="block__fullcalendar">
								<div class="block__fullcalendar--actions align-right">
									<button type="button" class="btn btn-white-b btn-disabled btn-week">por semana</button>
									<button type="button" class="btn btn-default btn-active btn-month">por mês</button>
								</div>

								<div id="calendar"></div>
							</div>
						</div>
					</div>
				</section>
			</main>

<?php include("inc/footer.php"); ?>