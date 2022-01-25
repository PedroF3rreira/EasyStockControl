<?php $render('header', [
	'user' => $loggedUser, 
	'page' => $page
]); ?>

<div class="container-areas">

	<section class="register content-area1">	
		<div class="section-title">
			<h4>Cadastro de Fornecedores</h4>
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
				<label for="name">Nome</label>
				<input type="text" name="name" id="name" required>
			</div>
			
		</form>
	</section>
	<?php $render('aside');  ?>
	<?php $render('footer'); ?>