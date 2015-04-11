<?php
	$this->Paginator->options(array(
		'update' => '#Content-ticasos'
	));
?>
<div id="Content-ticasos">
	<table class="table table-bordered table-hover" id="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Nombre</th>
				<th>Prefijo</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="department">
			<?php
				foreach($ticasos AS $ticaso){
			?>
				<tr id="<?= $ticaso['Ticaso']['id'] ?>">
					<td><?= $ticaso['Ticaso']['id'] ?></td>
					<td class="<?= $ticaso['Ticaso']['id'] ?>-1"><?= $ticaso['Ticaso']['nticaso'] ?></td>
					<td class="<?= $ticaso['Ticaso']['id'] ?>-2"><?= $ticaso['Ticaso']['prefijo'] ?></td>
					<td>
						<?= $this->Html->link("<i class='fa fa-trash'></i>", array('controller' => 'Ticasos', 'action' => "DeleteTicase", $ticaso['Ticaso']['id']), array("escape" => false, 'id' => $ticaso['Ticaso']['id'], 'class' => 'Delete')) ?>
						<?= $this->Html->link("<i class='fa fa-edit'></i>", '#', array("escape" => false, 'id' => $ticaso['Ticaso']['id'], 'name' => $ticaso['Ticaso']['nticaso'], 'prefijo' => $ticaso['Ticaso']['prefijo'], 'class' => 'Edit')) ?>
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
<script>
	$('.Edit').click(function(e){
		var id = $(this).attr('id');
		var name = $(this).attr('name');
		var prefijo = $(this).attr('prefijo');
		$('#TicasoId').val(id);
		$('#TicasoNticaso').val(name);
		$('#TicasoPrefijo').val(prefijo);
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
					toastr.warning('Elimine las relaciones del Caso');
				}else{
					toastr.success(response);
					ticaso();
				}
			},
			error: function(response){
            	toastr.warning('Error al Eliminar'); 
        	}
		});
		e.preventDefault();
	});
</script>