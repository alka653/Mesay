<?php
	$this->Paginator->options(array(
		'update' => '#Content-city'
	));
?>
<div id="Content-city">
	<table class="table table-bordered table-hover" id="table">
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('Id') ?></th>
				<th><?= $this->Paginator->sort('Nombre') ?></th>
				<th><?= $this->Paginator->sort('Departamento') ?></th>
				<th><?= $this->Paginator->sort('Acción') ?></th>
			</tr>
		</thead>
		<tbody id="department">
			<?php
				foreach($ciudades AS $ciudad){
			?>
				<tr id="<?= $ciudad['Ciudade']['id'] ?>">
					<td><?= $ciudad['Ciudade']['id'] ?></td>
					<td class="<?= $ciudad['Ciudade']['id'] ?>-1"><?= $ciudad['Ciudade']['name'] ?></td>
					<td class="<?= $ciudad['Ciudade']['id'] ?>-2"><?= $ciudad['Departamento']['depar'] ?></td>
					<td>
						<?= $this->Html->link("<i class='fa fa-trash'></i>", array('controller' => 'Ciudades', 'action' => "DeleteCity", $ciudad['Ciudade']['id']), array("escape" => false, 'id' => $ciudad['Ciudade']['id'], 'class' => 'Delete')) ?>
						<?= $this->Html->link("<i class='fa fa-edit'></i>", '#', array("escape" => false, 'id' => $ciudad['Ciudade']['id'], 'city' => $ciudad['Ciudade']['name'], 'cdepar' => $ciudad['Ciudade']['cdepar'], 'class' => 'Edit '.$ciudad['Ciudade']['cdepar'])) ?>
					</td>
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
<script type="text/javascript">
	$('.Edit').click(function(e){
		var id = $(this).attr('id');
		var city = $(this).attr('city');
		var cdepar = $(this).attr('cdepar');
		$('#CiudadeId').val(id);
		$('#CiudadeName').val(city);
		$('#CiudadeCdepar').val(cdepar);
		e.preventDefault();
	});
	$('.Delete').click(function(e){
		var target = $(this).attr("href");
		var id = $(this).attr("id");
		$.ajax({
			url: target,
			type: "GET",
			success:function(response){
				if(response == 0){
					toastr.warning('Elimine las relaciones de la Ciudad');
				}else{
					toastr.success(response);
					cities();
				}
			},
			error: function(response){
            	toastr.warning('Error al Eliminar'); 
        	}
		});
		e.preventDefault();
	});
</script>