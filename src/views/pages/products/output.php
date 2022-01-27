<?php $render('header', [
	'user' => $loggedUser, 
	'page' => $page
]); ?>

<div class="container-areas">

	<section class="register content-area1">	
		<div class="section-title">
			<h4>Saída de Produtos</h4>
		</div>
	
		<form method="POST" class="form" action="<?=$base;?>/produto/saida">
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
				<label for="search" >Buscar Produto</label>
				<input type="search" name="search" placeholder="digite cod ou descrição">
				<input type="submit" value="Buscar" class="botton">
			</div>

		</form>

		<form method="POST" class="form" action="<?=$base;?>/produto/saida/<?=$product->id;?>">
			<div class="form-control">
				<label>Codigo:</label>
				<input type="text"  value="<?=$product->id??'';?>" disabled size='4'>
			</div>

			<div class="form-control">
				<label>Descrição:</label>
				<input type="text" name="desc" value="<?=$product->smallDesc??'';?>" disabled size='40'>
			</div>

			<div class="form-control">
				<label>Quantidade:</label>
				<input type="text" name="qty" value="<?=$product->qty??'';?>" readonly='readonly' size="2">
			</div>

			<div class="form-control">
				<label>Qtd-Saída</label>
				<input type="text" name="output"  min="1" size="2" required>
			</div>

			<div class="form-control">
				<input type="submit" value="Confirmar" class="botton">
			</div>
		</form>
	</section>
	<?php $render('aside',['page' => $page]);  ?>
	<?php $render('footer'); ?>