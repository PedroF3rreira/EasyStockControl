<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Controle estoque</title>
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=$base;?>/assets/css/login.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
</head>
<body>
	<main>
		<div class="brand-area">
			<h1><span class="material-icons">settings</span>easy stock control</h1>
			<p>Controle seu estoque e fature ainda mais com nossa ferramente de controle de estoque de maneira simples e profissional.</p>
		</div>
		<section class="login-area">
			<div class="login-form">
				<form  method="POST" action="<?=$base;?>/cadastro">
					<?php if(!empty($flash)):?>
						<div class="menssage">
							<?=$flash;?>
						</div>
					<?php endif; ?>

					<div class="form-input">
						<label for="name">Nome</label>
						<input type="text" name="name" id="name" required>
					</div>

					<div class="form-input">
						<label for="email">Email</label>
						<input type="mail" name="email" id="email" required>
					</div>

					<div class="form-input">
						<label for="password">Senha</label>
						<input type="password" name="password" id="password">
					</div>
					
					<div class="form-input">
						<input type="submit" value="Cadastrar" class="botton">
					</div>
				</form>
				<a href="<?=$base;?>/login">Já tenho conta logar-se</a>
			</div>
		</section>
	</main>
</body>
</html>