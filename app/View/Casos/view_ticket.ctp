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
						</tr>
					</thead>
					<tbody>
						<?php 
							foreach($casos AS $caso){
								if($caso['Caso']['nivel'] == 1){
									$span = "label-danger";
								}
								if($caso['Caso']['nivel'] == 2){
									$span = "label-warning";
								}
								if($caso['Caso']['nivel'] == 3){
									$span = "label-info";
								}
								if($caso['Caso']['estado'] == 1){
									$span2 = "label-success";
								}
								if($caso['Caso']['estado'] == 2){
									$span2 = "label-danger";
								}
								if($caso['Caso']['estado'] == 3){
									$span2 = "label-default";
								}
						?>
						<tr>
							<td><?= $this->Html->link($caso['Caso']['idcaso'], array('controller' => 'casos', 'action' => 'ShowTicket', 'id' => $caso['Caso']['idcaso'])) ?></td>
							<td><?= $caso['Caso']['titulo'] ?></td>
							<td><?= $caso['Caso']['fhrecibo'] ?></td>
							<td><span class="label <?= $span ?>"><?= $caso['Level']['name_level'] ?></span></td>
							<td><span class="label <?= $span2 ?>"><?= $caso['State']['name_state'] ?></span></td>
							<td><?= $caso['Tecnico']['ntecni'] ?></td>
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