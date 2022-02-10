<aside class="side-bar-area">
	<ul>
		<li class='<?=($page=='home'?'active':'') ?>'><a href="<?=$base?>/"><span class="material-icons-outlined">cottage</span>Inicio</a></li>
		
		<li><div class="label-menu"><span class="material-icons-outlined">
inventory_2
</span>Produtos</div></li>
		
		<li class='<?=($page=='cadastro'?'active':'') ?>'><a href="<?=$base;?>/produto/cadastro"><span class="material-icons-outlined">add</span>Cadastro</a></li>

		<li class='<?=($page=='entrada'?'active':'') ?>'><a href="<?=$base;?>/produto/entrada"><span class="material-icons-outlined">call_missed_outgoing</span>Entradas</a></li>

		<li class='<?=($page=='saida'?'active':'') ?>'><a href="<?=$base;?>/produto/saida"><span class="material-icons-outlined">call_missed</span>Saídas</a></li>

		<li class='<?=($page=='alterar'?'active':'') ?>'><a href="<?=$base;?>/produto/alterar"><span class="material-icons-outlined">sync_alt</span>Atualizar</a></li>

		<li class='<?=($page=='excluir'?'active':'') ?>'><a href="<?=$base;?>/produto/excluir"><span class="material-icons-outlined">delete</span>Excluir</a></li>
		
		<li><div class="label-menu"><span class="material-icons-outlined">face</span>Fornecedores</div></li>
		
		<li class='<?=($page=='cadastro_fornecedor'?'active':'') ?>'><a href="<?=$base;?>/fornecedor/cadastro"><span class="material-icons-outlined">add</span>Cadastro</a></li>

		<li class='<?=($page=='atualizar_fornecedor'?'active':'') ?>'><a href="<?=$base;?>/fornecedor/atualizar"><span class="material-icons-outlined">sync_alt</span>Atualizar</a></li>

		<li class='<?=($page=='excluir_fornecedor'?'active':'') ?>'><a href="<?=$base;?>/fornecedor/excluir"><span class="material-icons-outlined">delete</span>Excluir</a></li>


		<li class='<?=($page=='configuration'?'active':'') ?>'><a href="#"><span class="material-icons-outlined">manage_accounts</span>configuraçoes</a></li>

		<li class='<?=($page=='logout'?'active':'') ?>'><a href="<?=$base;?>/sair"><span class="material-icons-outlined">logout</span>logout</a></li>
	</ul>
</aside>