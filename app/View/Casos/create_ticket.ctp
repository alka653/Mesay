<?php
	$fecha = date_create();
?>
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
			<h4 class="text-center">Información del Cliente</h4>
			<div class="text-center">
            	<?= $this->Html->link("Cliente Existente", array('controller' => 'Users', 'action' => "FindUser"), array("class" => "btn btn-primary user-exists", "escape" => false)) ?>
            	<?= $this->Html->link("Cliente Nuevo", array('controller' => 'Users', 'action' => "NewUser"), array("class" => "btn btn-primary user-exists", "escape" => false)) ?>
			</div>
			<div id="user-find"></div>
			<?php
				}else{
					$disabled = false;
				}
			?>
			<h4 class="text-center">Información del Problema</h4>
			<div class="form-group">
				<?= $this->Form->input('cticaso', array('class' => 'form-control', 'required' => 'required', 'label' => 'Tipo de Caso', 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'), array('class' => 'col-sm-2 control-label'), 'type' => 'select', 'options' => $cticaso, 'empty' => 'Selecciona el Tipo de Caso')) ?>
				<?= $this->Form->input('nivel', array('required' => 'required', 'class' => 'form-control', 'required' => 'required', 'label' => 'Nivel del Caso', 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-6'), array('class' => 'col-sm-2 control-label'), 'type' => 'select', 'options' => $level, 'empty' => 'Selecciona un Nivel')) ?>
			</div>
			<div class="form-group">
				<?= $this->Form->input('titulo', array('maxlength' => '200', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite un Titulo del Problema', 'label' => 'Titulo', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-sm-6'))) ?>
				<?= $this->Form->input('time', array('readonly' => 'readonly', 'value' => date('Y-m-d H:i:s'), 'class' => 'form-control', 'label' => 'Fecha y Hora del Caso', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-6 col-md-6'))) ?>
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
	$(".user-exists").click(function(event){
        event.preventDefault();
        var target = $(this).attr("href");
        $('#user-find').load(target);
    });
	$("#CasoTel1").keypress(function(e){
		if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
	       	return false;
		}
	});
</script>