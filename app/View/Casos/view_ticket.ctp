<?php
	$this->Paginator->options(array(
		'update' => '#Content-casos'
	));
?>
<div class="row-fluid">
    <div class="col-md-12" id="dashboard_tabs">
        <div id="dashboard-overview" class="row">
			<div id="Content-casos">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th><?= $this->Paginator->sort('Ticket') ?></th>
							<th><?= $this->Paginator->sort('Titulo') ?></th>
							<th><?= $this->Paginator->sort('Fecha') ?></th>
							<th><?= $this->Paginator->sort('Nivel') ?></th>
							<th><?= $this->Paginator->sort('Estado') ?></th>
							<th><?= $this->Paginator->sort('Tecnico') ?></th>
							<th><?= $this->Paginator->sort('Acción') ?></th>
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($casos AS $caso){
						?>
						<tr>
							<td><?= $caso['Caso']['idcaso'] ?></td>
							<td><?= $caso['Caso']['titulo'] ?></td>
							<td><?= $caso['Caso']['fhrecibo'] ?></td>
							<td><?= $caso['Level']['name_level'] ?></td>
							<td><?= $caso['State']['name_state'] ?></td>
							<td><?= $caso['Tecnico']['ntecni'] ?></td>
							<td></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
				<div class="paging text-center">
					<ul class="pagination">
						<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
						<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
						<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
					</ul>
				</div>
				<?= $this->Js->writeBuffer() ?>
			</div>
		</div>
	</div>
</div>