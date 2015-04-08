<div class="clearfix visible-xs"></div>
<div class="row-fluid">
	<div class="col-md-12" id="dashboard_tabs">
		<div id="dashboard-overview" class="row">
			<h4 class="text-center">Lista de Ciudades Agregadas</h4>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= $this->Form->create('Ticaso', array('action' => 'AddTicaso', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
				<div class="form-group">
					<?= $this->Form->input('id', array('class' => 'form-control', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12'))) ?>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-6">
					<?= $this->Form->input('nticaso', array('maxlength' => '20', 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Escriba El Tipo de Caso', 'label' => 'Tipo de Caso', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-11'))) ?>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-6">
					<?= $this->Form->input('prefijo', array('maxlength' => '3', 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Prefijo del Tipo de Caso', 'label' => 'Prefijo', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-11'))) ?>
				</div>
				<?= $this->Form->submit('Guardar', array('id' => 'button CiudadeAddCityForm', 'class' => 'button btn btn-primary btn-label-center', 'div' => array('class' => 'form-group text-center'))) ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
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
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#TicasoId').hide();
		$('.Edit').click(function(e){
			var id = $(this).attr('id');
			var name = $(this).attr('name');
			var prefijo = $(this).attr('prefijo');
			$('#TicasoId').val(id);
			$('#TicasoNticaso').val(name);
			$('#TicasoPrefijo').val(prefijo);
			e.preventDefault();
		});
		$("#TicasoAddTicasoForm").submit(function(e){
	    	var postData = $(this).serializeArray();
	    	var formURL = $(this).attr("action");
	    	$.ajax({
	        	url : formURL,
	        	type: "POST",
	        	data : postData,
	        	success:function(response){
	            	toastr.success(response);
	            	location.reload();
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
						toastr.warning('Elimine las relaciones del Caso');
					}else{
						toastr.success(response);
						$('#'+id).hide();
					}
				},
				error: function(response){
	            	toastr.warning('Error al Eliminar'); 
	        	}
			});
			$('#DepartamentoId').val('');
			$('#DepartamentoCdepar').val('');
			$('#DepartamentoName').val('');
			e.preventDefault();
		});
	});
</script>