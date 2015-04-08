<div class="col-xs-12 col-sm-12 col-md-12">
	<h4 class="page-header">Digite todos los campos para el registro de la solicitud.</h4>
</div>
<div class="clearfix visible-xs"></div>
<div class="row-fluid">
	<div class="col-xs-12" id="dashboard_tabs">
		<?= $this->Session->flash(); ?>
		<?= $this->Form->create('Caso', array('action' => 'NewTicket', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
			<?php
				if($user['User']['role'] != 3){
					$disabled = "disabled";
			?>
			<h4 class="text-center">Información del Usuario</h4>
				<div class="form-group">
					<div class="col-xs-12 col-sm-12 col-md-6">
						<?= $this->Form->input('citerce', array('maxlength' => '15', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite un Usuario', 'label' => 'Usuario', 'onkeyup' => 'BrowseUser()', array('class' => 'col-sm-2 control-label'))) ?>
						<div id="user_name"></div>
					</div>
					<?= $this->Form->input('name', array('maxlength' => '30', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite el nombre del usuario', 'label' => 'Nombre del Usuario', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'))) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('apellidos', array('maxlength' => '30', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite el apellido del usuario', 'label' => 'Apellido del Usuario', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'))) ?>
					<?= $this->Form->input('dirterce', array('maxlength' => '20', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite la direccion del usuario', 'label' => 'Direccion del Usuario', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'))) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('email1', array('type' => 'email', 'maxlength' => '40', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite el Correo Electronico del usuario', 'label' => 'Correo Electronico del Usuario', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'))) ?>
					<?= $this->Form->input('tel1', array('maxlength' => '10', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite el Numero Telefonico del usuario', 'label' => 'Numero Telefonico del Usuario', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'))) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('depar', array('required' => 'required', 'class' => 'form-control', 'required' => 'required', 'label' => 'Departamento', 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'), array('class' => 'col-sm-2 control-label'), 'type' => 'select', 'options' => $depar, 'empty' => 'Selecciona un Departamento')) ?>
					<div class="col-xs-12 col-sm-12 col-md-6">
						<div id="ciudad">
							<?= $this->Form->input('ciudad', array('class' => 'form-control xs-10', 'required' => 'required',  'label' => 'Ciudad (*)', array('for' => 'ciudad'), 'type' => 'select', 'empty' => 'Selecciona una Ciudad')) ?>
						</div>
					</div>
				</div>
			<?php
				}else{
					$disabled = false;
				}
			?>
			<h4 class="text-center">Información del Problema</h4>
			<div class="form-group">
				<?= $this->Form->input('cticaso', array('class' => 'form-control', 'required' => 'required', 'label' => 'Tipo de Caso', 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'), array('class' => 'col-sm-2 control-label'), 'type' => 'select', 'options' => $cticaso, 'empty' => 'Selecciona el Tipo de Caso')) ?>
				<?= $this->Form->input('nivel', array('class' => 'form-control', 'required' => 'required', 'label' => 'Nivel del Caso', 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'), array('class' => 'col-sm-2 control-label'), 'type' => 'select', 'options' => array('1' => 'Alto', '2' => 'Medio', '3' => 'Bajo'), 'empty' => 'Selecciona un Nivel')) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('titulo', array('maxlength' => '200', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite un Titulo del Problema', 'label' => 'Titulo', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-sm-12'))) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('detalle', array('type' => 'textarea', 'rows' => '5', 'maxlength' => '3000', 'class' => 'form-control','placeholder' => 'Una Breve Descripcion del Problema', 'label' => 'Detalle del Problema', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-sm-12'))) ?>
			</div>
		<?= $this->Form->submit('Guardar Cambios', array('id' => 'button', 'class' => 'button btn btn-primary btn-label-center', 'div' => array('class' => 'form-group text-center'), 'disabled' => $disabled)) ?>
	</div>
</div>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){
		TinyMCEStart('#CasoDetalle', null);
	});
	$("#CasoTel1").keypress(function(e){
		if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
	       	return false;
		}
	});
	function BrowseUser(){
  		$('#user_name').load('<?= Router::url(array("controller" => "Users", "action" => "confirm"), true) ?>'+'/'+$('#CasoCiterce').val());
	}
	$('#CasoDepar').change(function(){
		$('#ciudad').load('<?= Router::url(array("controller" => "Ciudades", "action" => "getByCiudad"), true) ?>'+'/'+$(this).val());
	});
</script>