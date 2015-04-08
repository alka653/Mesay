<div class="clearfix visible-xs"></div>
<div class="row-fluid">
	<div id="dashboard_tabs" class="col-md-12">
		<div id="dashboard-overview" class="row">
			<h4 class="text-center">Lista de Departamentos Agregados</h4>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= $this->Form->create('Departamento', array('action' => 'AddDepartment', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
				<div class="form-group">
					<?= $this->Form->input('id', array('class' => 'form-control', 'label' => 'Código del Departamento', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12'))) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('depar', array('maxlength' => '40', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Escriba nombre del Departamento', 'label' => 'Departamento', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12'))) ?>
				</div>
				<?= $this->Form->submit('Agregar Departamento', array('id' => 'button DepartamentoAddDepartmentForm', 'class' => 'button btn btn-primary btn-label-center', 'div' => array('class' => 'form-group text-center'))) ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<table class="table table-bordered table-hover" id="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th></th>
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
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#DepartamentoId').hide();
		$('.Edit').click(function(e){
			var id = $(this).attr('id');
			var cdepar = $(this).attr('cdepar');
			$('#DepartamentoId').val(id);
			$('#DepartamentoDepar').val(cdepar);
			e.preventDefault();
		});
		$("#DepartamentoAddDepartmentForm").submit(function(e){
	    	var postData = $(this).serializeArray();
	    	var formURL = $(this).attr("action");
	    	$.ajax({
	        	url : formURL,
	        	type: "POST",
	        	data : postData,
	        	success:function(response){
	            	toastr.success(response);
	            	var id = $('#table').closest('table').find('tr:last td:first').text();
	            	var cod = parseInt(id)+1;
	            	if($('#DepartamentoId').val() != ""){
	            		$('td.'+$('#DepartamentoId').val()).text($('#DepartamentoDepar').val());
	            	}else{
	            		location.reload();
	            	}
	            	$('#DepartamentoId').val('');
					$('#DepartamentoDepar').val('');
	        	},
	        	error: function(response){
	            	toastr.warning(response); 
	        	}
	    	});
			e.preventDefault();
			return false;
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
						$('#'+id).hide();
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
	});
</script>