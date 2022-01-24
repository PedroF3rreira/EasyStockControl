<?php $render('header', [
	'user' => $loggedUser, 
	'page' => $page
]); ?>

<div class="container-areas">

	<section class="register content-area1">	
		<div class="section-title">
			<h4>Cadastro de Produtos</h4>
		</div>

		<form method="POST" class="form" action="<?=$base;?>/produto/cadastro">
			
			<?php if(!empty($flash)):?>
				<div class="flash">
					<?=$flash;?>
				</div>
			<?php endif; ?>
			<?php if(!empty($msg)):?>
				<div class="menssage">
					<?=$msg;?>
				</div>
			<?php endif;?>

			<div class="form-control">
				<label for="small_desc">Descrição</label>
				<input type="text" name="small_desc" id="small_desc" required>

				<label for="price">Preço</label>
				<input type="number" name="price" id="price" min="1" step="0.01" required>
			</div>


			<div class="form-control">
				<label for="qtd">Qtd</label>
				<input type="number" name="qtd" id="qtd" min="1" required>

				<label for="qtd_min">Qtd mínima</label>
				<input type="number" name="qtd_min" id="qtd_min" min="1" required>
			</div>


			<div class="form-control">
				<label for="provider">Fornecedor</label>
				<select id="provider" name="provider">
					<?php foreach($providers as $provider): ?>
						<option value="<?=$provider['id']?>"><?=$provider['name'];?></option>
					<?php endforeach; ?>
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