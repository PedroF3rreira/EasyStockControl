<?php $render('header', ['user' => $loggedUser, 'page' => $page]); ?>
<div class="container-areas">

	<section class="register content-area1">	
		<div class="section-title">
			<h4>Cadastro de Produtos</h4>
		</div>

		<form method="POST" class="form">

			<div class="form-control">
				<label for="small_desc">Descrição</label>
				<input type="text" name="small_desc" id="small_desc" required>

				<label for="price">Preço</label>
				<input type="text" name="price" id="price" required>
			</div>


			<div class="form-control">
				<label for="qtd">Qtd</label>
				<input type="number" name="qtd" id="qtd" min="1" required>

				<label for="qtd_min">Qtd mínima</label>
				<input type="number" name="qtd_min" id="qtd_min" min="1" required>
			</div>


			<div class="form-control">
				<label for="fron">Fornecedor</label>
				<select id="forn" name="forn">
					<option value="1">Multilaser</option>
					<option value="2">Quality</option>
					<option value="3">Fortlev</option>
				</select>
			</div>

			<label for="long_desc">Descrição Longa:</label>
			<div class="form-control">
				<textarea cols="50" rows="10" name="long_desc" id="long_desc"></textarea> 
			</div>
			<div class="form-control">
				<input type="submit" value="Cadastrar" class="botton">
			</div>
		</form>
	</section>
	<?php $render('aside');  ?>
	<?php $render('footer'); ?>