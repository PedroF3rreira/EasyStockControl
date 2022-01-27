<?php $render('header', ['user' => $loggedUser, 'page' => $page]);?>

<div class="container-areas">
	
	<section class="content-area1">
		
		<div class="section-title">
			<h4>Últimas Saídas</h4>
		</div>
		<section class="area-content last-exits">

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/ventilador.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/carro.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/tinta-lux.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/controle-remoto.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>
			
		</section>
		
		<div class="section-title">
			<h4>Últimas entradas</h4>
		</div>

		<section class="area-content last-entries">

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/ventilador.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/carro.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/tinta-lux.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>

			<div class="card-area">
				<div class="card-image">
					<img src="assets/image/controle-remoto.jpg" alt="">
				</div>
				<div class="card-body">
					texto do card				
				</div>
			</div>
			
		</section>
	</section>

	<section class="content-area2">

		<div class="section-title">
			<h4>Relatório de Estoque</h4>
		</div>


		<div class="graphics-area">
			<h2>Gráficos</h2>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
		</div>
	</section>
	<?php $render('aside',['page' => $page]); ?>
</div>
</body>
</html>