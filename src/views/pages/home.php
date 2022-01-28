<?php $render('header', ['user' => $loggedUser, 'page' => $page]);?>

<div class="container-areas">
	
	<section class="content-area1">
		
		<div class="section-title">
			<h4>Últimas Entradas</h4>
		</div>
		<section class="content-areas last-entries">
			<table>
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th>Quantidade</th>
					<th>Qtd-Entrada</th>
				</tr>
				<tbody>
					<?php foreach($entries as $entry): ?>
						<tr>
							<td><?=$entry->id;?></td>
							<td><?=$entry->product->smallDesc;?></td>
							<td><?=$entry->qty;?></td>
							<td><?=$entry->entry;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</section>
		
		<div class="section-title">
			<h4>Últimas Saídas</h4>
		</div>

		<section class="content-areas last-exits">
			<table>
				<tr>
					<th>Código</th>
					<th>Descrição</th>
					<th>Saldo anterior</th>
					<th>Qtd-Saída</th>
				</tr>
				<tbody>
					<?php foreach($outputs as $output): ?>
						<tr>
							<td><?=$output->id;?></td>
							<td><?=$output->product->smallDesc;?></td>
							<td><?=$output->qty;?></td>
							<td><?=$output->output;?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
						
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