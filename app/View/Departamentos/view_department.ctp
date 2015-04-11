<?php
	$this->Paginator->options(array(
		'update' => '#Content-department'
	));
?>
<div id="Content-department">
	<table class="table table-bordered table-hover" id="table">
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('Id') ?></th>
				<th><?= $this->Paginator->sort('Nombre') ?></th>
				<th><?= $this->Paginator->sort('Acción') ?></th>
			</tr>
		</thead>
		<tbody id="department">
			<?php
				foreach($departamentos AS $departamento){
			?>
				<tr id="<?= $departamento['Departamento']['id'] ?>">
					<td><?= $departamento['Departamento']['id'] ?></td>
					<td class="<?= $departamento['Departamento']['id'] ?>"><?= $departamento['Departamento']['depar'] ?></td>
					<td>
						<?= $this->Html->link("<i class='fa fa-trash'></i>", array('controller' => 'Departamentos', 'action' => "DeleteDepartment", $departamento['Departamento']['id']), array("escape" => false, 'id' => $departamento['Departamento']['id'], 'class' => 'Delete')) ?>
						<?= $this->Html->link("<i class='fa fa-edit'></i>", '#', array("escape" => false, 'id' => $departamento['Departamento']['id'], 'cdepar' => $departamento['Departamento']['depar'], 'class' => 'Edit')) ?>
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
		var cdepar = $(this).attr('cdepar');
		$('#DepartamentoId').val(id);
		$('#DepartamentoDepar').val(cdepar);
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
					toastr.warning('Elimine las relaciones del Departamento');
				}else{
					toastr.success(response);
					department();
				}
			},
			error: function(response){
            	toastr.warning(response); 
        	}
		});
		$('#DepartamentoId').val('');
		$('#DepartamentoDepar').val('');
		e.preventDefault();
	});
</script>