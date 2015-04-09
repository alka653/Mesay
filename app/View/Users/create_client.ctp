<div class="modal fade" id="modal-mesay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	   	<div class="modal-content">
	   	 	<div class="modal-header">
	       		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       		<h4 class="modal-title" id="myModalLabel">Crear Cliente</h4>
	   		</div>
		<?= $this->Form->create('User', array('action' => $action, 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
		<?php
			$disabled = "true";
		?>
	      	<div class="modal-body form-horizontal">
	      		<div class="form-group">
					<?= $this->Form->input('name', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese un Nombre', 'label' => 'Nombre:', array('for' => 'name'), 'maxlength' => '30')) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('apellidos', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese los apellidos', 'value' => $apellidos,'label' => 'Apellidos:', array('for' => 'apellidos'), 'maxlength' => '30')) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('dirterce', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese la direccion de residencia', 'value' => $dirterce, 'label' => 'Direccion:', array('for' => 'dirterce'), 'maxlength' => '20')) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('ctaskype', array('autocomplete' => 'off', 'class' => 'form-control', 'placeholder' => 'Ingrese el usuario skype', 'value' => $ctaskype, 'label' => 'Skype:', array('for' => 'ctaskype'), 'maxlength' => '20')) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('email1', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese el correo electronico', 'value' => $email1, 'onkeyup' => $onkeyup2, 'label' => 'Correo Electronico:', array('for' => 'email1'), 'maxlength' => '40')) ?>
					<div id="user_email"></div>
				</div>
				<div class="form-group">
					<?= $this->Form->input('tel1', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese numero telefonico', 'value' => $tel1, 'label' => 'Telefono:', array('for' => 'tel1'), 'maxlength' => '30')) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('depar', array('class' => 'form-control', 'required' => 'required',  'label' => 'Departamento (*)', array('for' => 'depar'), 'type' => 'select', 'options' => $depar, 'value' => $val_depar, 'empty' => 'Selecciona un Departamento')) ?>
				</div>
				<div class="form-group">
					<div class="ciudad">
						<?= $this->Form->input('ciudad', array('class' => 'form-control', 'required' => 'required',  'label' => 'Ciudad (*)', array('for' => 'ciudad'), 'type' => 'select', 'empty' => 'Selecciona una Ciudad')) ?>
					</div>
				</div>
	        	<div class="form-group">
					<?= $this->Form->input('username', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese un Usuario', 'label' => 'Usuario:', 'onkeyup' => $onkeyup, 'disabled' => $name, array('for' => 'username'), 'maxlength' => '15')) ?>
					<div id="user_name"></div>
				</div>
				<div class="form-group">
					<?= $this->Form->input('password', array('autocomplete' => 'off', 'class' => 'form-control xs-10', 'required' => $required, 'placeholder' => 'Ingrese una Contraseña', 'label' => 'Contraseña:', array('for' => 'password'), 'maxlength' => '20')) ?>
					<?= $this->Form->checkbox('check') ?>
					<?= $this->Form->label('check', 'Generar Contraseña') ?>
					<?= $this->Form->checkbox('check_2') ?>
					<?= $this->Form->label('check_2', 'Ver Contraseña') ?>
				</div>
	      	</div>
	      	<div class="modal-footer">
			<?= $this->Form->submit('Guardar', array('id' => 'User'.$action.'Form', 'class' => 'button btn btn-primary btn-label-center', 'div' => false, 'disabled' => $disabled)) ?>
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.button').attr('disabled', <?= $button ?>);
	SelectCiud();
	$('#UserDepar').change(function(){
		SelectCiud();
	});
	function SelectCiud(){
		$('.ciudad').load('<?= Router::url(array("controller" => "Ciudades", "action" => "getByCiudad"), true) ?>'+'/'+$('#UserDepar').val()+'/'+<?= $ciud_val ?>);
	}
	$("#User<?= $action ?>Form").submit(function(e){
    	var postData = $(this).serializeArray();
    	var formURL = $(this).attr("action");
    	$.ajax({
        	url : formURL,
        	type: "POST",
        	data : postData,
        	success:function(response){
            	toastr.success(response);
            	users();
            	$('#modal-mesay').modal('hide');
        	},
        	error: function(response){
            	toastr.warning(response); 
        	}
    	});
		e.preventDefault();
		return false;
	});
	function BrowseUser(){
  		$('#user_name').load('<?= Router::url(array("controller" => "Users", "action" => "confirm"), true) ?>'+'/'+$('#UserUsername').val());
	}
	function BrowseEmail(){
  		$('#user_email').load('<?= Router::url(array("controller" => "Users", "action" => "email"), true) ?>'+'/'+$('#UserEmail1').val());
	}
	$('#UserCheck2').change(function() {
        if($(this).is(":checked")) {
            $('#UserPassword').attr('type', 'text');
        }else{
            $('#UserPassword').attr('type', 'password');
        }
    });
	$('#UserCheck').change(function() {
        if($(this).is(":checked")) {
            $.ajax({
	        	url : '<?= Router::url(array("controller" => "Users", "action" => "GeneratePassword"), true) ?>',
	        	type: "POST",
	        	success:function(response){
	            	$('#UserPassword').val(response);
	        	}
	    	});
        }else{
        	$.ajax({
	        	url : '<?= Router::url(array("controller" => "Users", "action" => "GeneratePassword"), true) ?>',
	        	type: "POST",
	        	success:function(response){
	            	$('#UserPassword').val(response);
	        	}
	    	});
        }   
    });
</script>