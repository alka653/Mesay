<div class="row">
	<div class="col-md-6 col-md-offset-3 text-center alert-position">
		<?= $this->Session->flash(); ?>
	</div>
</div>
<div class="register-wrap">
	<h2>Registrate en MESAY</h2>
	<div class="form">
		<div class="row">
			<?= $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('name', array('class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese sus Nombres', 'label' => 'Nombres (*)', array('for' => 'name'), 'maxlength' => '30')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('apellidos', array('class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese sus Apellidos', 'label' => 'Apellidos (*)', array('for' => 'apellidos'), 'maxlength' => '30')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('dirterce', array('class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese su Direccion', 'label' => 'Direccion (*)', array('for' => 'dirterce'), 'maxlength' => '20')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('ctaskype', array('class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese su Cuenta Skype', 'label' => 'Cuenta Skype (*)', array('for' => 'ctaskype'), 'maxlength' => '20')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('email1', array('class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese su Correo Electronico', 'onkeyup' => 'BrowseEmail()', 'label' => 'Email (*)', array('for' => 'email1'), 'maxlength' => '40')) ?>
						<div id="user_email1"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('email2', array('class' => 'form-control xs-10', 'placeholder' => 'Ingrese su Correo Electronico', 'onkeyup' => 'BrowseEmail()', 'label' => 'Email (Opcional)', array('for' => 'email2'), 'maxlength' => '40')) ?>
						<div id="user_email2"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('email3', array('class' => 'form-control xs-10', 'placeholder' => 'Ingrese su Correo Electronico', 'onkeyup' => 'BrowseEmail()', 'label' => 'Email (Opcional)', array('for' => 'email3'), 'maxlength' => '40')) ?>
						<div id="user_email3"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('tel1', array('class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese su Numero Telefonico', 'label' => 'No. Telefonico (*)', array('for' => 'tel1'), 'maxlength' => '10')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('tel2', array('class' => 'form-control xs-10', 'placeholder' => 'Ingrese su Numero Telefonico', 'label' => 'No. Telefonico (Opcional)', array('for' => 'tel2'), 'maxlength' => '10')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('tel3', array('class' => 'form-control xs-10', 'placeholder' => 'Ingrese su Numero Telefonico', 'label' => 'No. Telefonico (Opcional)', array('for' => 'tel3'), 'maxlength' => '10')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('depar', array('class' => 'form-control xs-10', 'required' => 'required',  'label' => 'Departamento (*)', array('for' => 'depar'), 'type' => 'select', 'options' => $depar, 'empty' => 'Selecciona un Departamento')) ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<div id="ciudad">
							<?= $this->Form->input('ciudad', array('class' => 'form-control xs-10', 'required' => 'required',  'label' => 'Ciudad (*)', array('for' => 'ciudad'), 'type' => 'select', 'empty' => 'Selecciona una Ciudad')) ?>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('username', array('autocomplete' => 'off', 'class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese un Usuario', 'onkeyup' => 'BrowseUser()', 'label' => 'Usuario (*)', array('for' => 'username'))) ?>
						<div id="user_name"></div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<?= $this->Form->input('password', array('autocomplete' => 'off', 'class' => 'form-control xs-10', 'required' => 'required', 'placeholder' => 'Ingrese una Contraseña', 'label' => 'Contraseña (*)', array('for' => 'password'))) ?>
						<?= $this->Form->checkbox('check') ?>
						<?= $this->Form->label('check', 'Generar Contraseña') ?>
						<?= $this->Form->checkbox('check_2') ?>
						<?= $this->Form->label('check_2', 'Ver Contraseña') ?>
					</div>
				</div>
			<?= $this->Form->submit('Registrarme', array('class' => 'button', 'div' => false)) ?>
			<?= $this->Html->link('<p>Ya Tienes Cuenta? Ingresa.</p>', array('action' => 'login'), array('escape' => false)) ?>
		</div>
	</div>
</div>
<script language="javascript" type="text/javascript">
	function BrowseEmail(){
		if($('#UserEmail1').val() != ""){
			var div = '#user_email1';
			var val = $('#UserEmail1').val();
		}
		if($('#UserEmail2').val() != ""){
			var div = '#user_email2';
			var val = $('#UserEmail2').val();
		}
		if($('#UserEmail3').val() != ""){
			var div = '#user_email3';
			var val = $('#UserEmail3').val();
		}
  		$(div).load('<?= Router::url(array("controller" => "Users", "action" => "email"), true) ?>'+'/'+val);
	}
	function BrowseUser(){
  		$('#user_name').load('<?= Router::url(array("controller" => "Users", "action" => "confirm"), true) ?>'+'/'+$('#UserUsername').val());
	}
	$('#UserDepar').change(function(){
		$('#ciudad').load('<?= Router::url(array("controller" => "Ciudades", "action" => "getByCiudad"), true) ?>'+'/'+$(this).val());
	});
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