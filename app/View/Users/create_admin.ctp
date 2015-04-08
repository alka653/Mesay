<div class="modal fade" id="modal-mesay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	   	<div class="modal-content">
	   	 	<div class="modal-header">
	       		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       		<h4 class="modal-title" id="myModalLabel">Crear Administrador</h4>
	   		</div>
		<?= $this->Form->create('User', array('action' => 'SaveAdmin', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
		<?php
			$disabled = "true";
		?>
	      	<div class="modal-body form-horizontal">
	        	<div class="form-group">
					<?= $this->Form->input('username', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese un Usuario', 'label' => 'Usuario:', 'onkeyup' => 'BrowseUser()', array('for' => 'username'), 'maxlength' => '15', 'value' => $user)) ?>
					<div id="user_name"></div>
				</div>
				<div class="form-group">
					<?= $this->Form->input('name', array('autocomplete' => 'off', 'class' => 'form-control', 'required' => 'required', 'placeholder' => 'Ingrese un Nombre', 'label' => 'Nombre:', array('for' => 'name'), 'maxlength' => '20', 'value' => $name)) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('password', array('autocomplete' => 'off', 'class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese una Contraseña', 'label' => 'Contraseña:', array('for' => 'name'), 'maxlength' => '20')) ?>
					<?= $this->Form->checkbox('check') ?>
					<?= $this->Form->label('check', 'Generar Contraseña') ?>
					<?= $this->Form->checkbox('check_2') ?>
					<?= $this->Form->label('check_2', 'Ver Contraseña') ?>
				</div>
	      	</div>
	      	<div class="modal-footer">
			<?= $this->Form->submit('Guardar', array('id' => 'UserSaveAdminForm', 'class' => 'button btn btn-primary btn-label-center', 'div' => false, 'disabled' => $disabled)) ?>
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#UserSaveAdminForm").submit(function(e){
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