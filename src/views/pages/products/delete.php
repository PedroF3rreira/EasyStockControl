<?php $render('header', [
	'user' => $loggedUser, 
	'page' => $page
]); ?>

<div class="container-areas">

	<section class="content-area1">	
		<div class="section-title">
			<h4>Deletar Produto</h4>
		</div>
	
		<form method="POST" class="form" action="<?=$base;?>/produto/excluir">
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

		<form method="POST" class="form" action="<?=$base;?>/produto/excluir/<?=$product->id;?>">
			
			<div class="form-control">
				<label for="small_desc">Descrição</label>
				<input type="text" name="small_desc" id="small_desc" disabled size="30" value="<?=$product->smallDesc??'';?>" required>

				<label for="price">Preço</label>
				<input type="number" name="price" id="price" min="1" step="0.01" disabled value="<?=$product->price??'';?>" required>
			</div>


			<div class="form-control">
				<label for="qtd_min">Qtd mínima</label>
				<input type="number" name="qty_min" id="qty_min" min="1" disabled value="<?=$product->qtyMin??'';?>" required>
			</div>

			<label for="long_desc">Descrição Longa:</label>
			<div class="form-control">
				<textarea cols="50" rows="10" name="long_desc" id="long_desc" disabled ><?=$product->longDesc??'';?></textarea> 
			</div>
			<div class="form-control">
				<input type="submit" value="Deletar" class="botton">
			</div>
		</form>
	</section>
	<?php $render('aside',['page' => $page]);  ?>
	<?php $render('footer'); ?>