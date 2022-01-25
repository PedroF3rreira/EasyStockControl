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
			<div class="form-control">
				<label for="type">Tipo</label>
				<select name="type" id="type">
					<option value="0">Fisíca</option>
					<option value="1">Jurídica</option>
				</select>
				<label for="cpf">Cpf</label>
				<input type="text" name="cpf" id="cpf" placeholder="000.000.000-00">	

				<label for="cnpj">Cnpj</label>
				<input type="text" name="cnpj" id="cnpj" placeholder="00.000.000/0001-00" disabled style="background-color:rgba(0,0,0,.2);">	
			</div>
			
			
		</form>
	</section>
	<script src="https://unpkg.com/imask"></script>
	<script type="text/javascript">

		IMask(document.getElementById('cpf'),
		{
			mask:"000.000.000-00"
		});

		IMask(document.getElementById('cnpj'),
		{
			mask:"00.000.000/0001-00"
		});

		document.getElementById('type').addEventListener('change', e =>{
			let type = 0;
			type = e.target.options[e.target.selectedIndex].value;

			if(type == 0){
				document.getElementById('cnpj').setAttribute('disabled',true);
				document.getElementById('cnpj').style = 'background-color: rgba(0,0,0,.2)';
			}
			else{
				document.getElementById('cnpj').removeAttribute('disabled',true);	
				document.getElementById('cnpj').style = 'background-color: #fff';
			}
		});
	</script>
	<?php $render('aside');  ?>
	<?php $render('footer'); ?>