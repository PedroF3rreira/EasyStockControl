<aside class="side-bar-area">
	<ul>
		<li class='<?=($page=='home'?'active':'') ?>'><a href="<?=$base?>/"><span class="material-icons-outlined">cottage</span>Inicio</a></li>

		<li class='<?=($page=='register'?'active':'') ?>'><a href="<?=$base;?>/produto/cadastro"><span class="material-icons-outlined">add</span>Cadastro</a></li>

		<li class='<?=($page=='entry'?'active':'') ?>'><a href="<?=$base;?>/produto/entrada"><span class="material-icons-outlined">call_missed_outgoing</span>Entradas</a></li>

		<li class='<?=($page=='exit'?'active':'') ?>'><a href="<?=$base;?>/produto/saida"><span class="material-icons-outlined">call_missed</span>Saídas</a></li>

		<li class='<?=($page=='update'?'active':'') ?>'><a href="atualizar.html"><span class="material-icons-outlined">sync_alt</span>Alteração</a></li>

		<li class='<?=($page=='register_provider'?'active':'') ?>'><a href="<?=$base;?>/fornecedor/cadastro"><span class="material-icons-outlined">face</span>Cadastro Fornecedores</a></li>

		<li class='<?=($page=='configuration'?'active':'') ?>'><a href="#"><span class="material-icons-outlined">manage_accounts</span>configuraçoes</a></li>

		<li class='<?=($page=='logout'?'active':'') ?>'><a href="#"><span class="material-icons-outlined">logout</span>logout</a></li>
	</ul>
</aside>