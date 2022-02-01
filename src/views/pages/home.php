<?php $render('header', ['user' => $loggedUser, 'page' => $page, 'entries' => $entries]);?>

<div class="container-areas">
	
	<section class="content-area1">
		
		<div class="section-title">
			<h4>Últimas Entradas</h4>
		</div>
		<section class="last-entries">
			<table>
				<tr>
					<th>Descrição</th>
					<th>Saldo anterior</th>
					<th>Qtd da Entrada</th>
					<th>Data da Entrada</th>
				</tr>
				<tbody>
					<?php foreach($entries as $entry): ?>
						<tr>
							<td><?=substr($entry->product->smallDesc, 0, 28).'...';?></td>
							<td><?=$entry->qty;?></td>
							<td><?=$entry->entry;?></td>
							<td><?=date_format(date_create($entry->dateEntry), 'd-m-Y')?></td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</section>
		
		<div class="section-title">
			<h4>Últimas Saídas</h4>
		</div>
		<section class="last-exits">
			<table>
				<tr>
					<th>Descrição</th>
					<th>Saldo anterior</th>
					<th>Qtd de Saída</th>
					<th>Data da Saída</th>
				</tr>
				<tbody>
					<?php foreach($outputs as $output): ?>
						<tr>
							<td><?=substr($output->product->smallDesc, 0, 28).'...'?></td>
							<td><?=$output->qty;?></td>
							<td><?=$output->output;?></td>
							<td><?=date_format(date_create($output->dateOutput), 'd-m-Y');?></td>
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
		<div  class="graphics-area">
			<div id="chart_div">
					
			</div>
		</div>
	</section>
	<?php $render('aside',['page' => $page]); ?>
</div>
</body>
</html>