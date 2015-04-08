<div class="clearfix visible-xs"></div>
<div class="row-fluid">
	<div class="col-md-12" id="dashboard_tabs">
		<div id="dashboard-overview" class="row">
			<h4 class="text-center">Lista de Ciudades Agregadas</h4>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= $this->Form->create('Ciudade', array('action' => 'AddCity', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
				<div class="form-group">
					<?= $this->Form->input('id', array('class' => 'form-control', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12'))) ?>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-6">
					<?= $this->Form->input('name', array('maxlength' => '40', 'required' => 'required', 'class' => 'form-control', 'placeholder' => 'Escriba nombre de la Ciudad', 'label' => 'Ciudad', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-11'))) ?>
				</div>
				<div class="form-group col-xs-12 col-sm-12 col-md-6">
					<?= $this->Form->input('cdepar', array('required' => 'required', 'class' => 'form-control', 'label' => 'Departamento de la Ciudad', 'type' => 'select', 'options' => $depar, 'empty' => 'Selecciona un Departamento', 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-11'))) ?>
				</div>
				<?= $this->Form->submit('Agregar Ciudad', array('id' => 'button CiudadeAddCityForm', 'class' => 'button btn btn-primary btn-label-center', 'div' => array('class' => 'form-group text-center'))) ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<table class="table table-bordered table-hover" id="table">
					<thead>
						<tr>
							<th>Id</th>
							<th>Nombre</th>
							<th>Departamento</th>
							<th></th>
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
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#CiudadeId').hide();
		$('.Edit').click(function(e){
			var id = $(this).attr('id');
			var city = $(this).attr('city');
			var cdepar = $(this).attr('cdepar');
			$('#CiudadeId').val(id);
			$('#CiudadeName').val(city);
			$('#CiudadeCdepar').val(cdepar);
			e.preventDefault();
		});
		$("#CiudadeAddCityForm").submit(function(e){
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
						toastr.warning('Elimine las relaciones de la Ciudad');
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