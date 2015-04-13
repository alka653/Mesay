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
	<div class="col-xs-12 col-sm-12 col-md-6">
		<?= $this->Form->input('email1', array('type' => 'email', 'maxlength' => '40', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite el Correo Electronico del usuario', 'onkeyup' => 'BrowseEmail()', 'label' => 'Correo Electronico del Usuario', array('class' => 'col-sm-2 control-label'))) ?>
		<div id="user_email"></div>
	</div>
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
<script type="text/javascript">
	$('#depar').change(function(){
		$('#ciudad').load('<?= Router::url(array("controller" => "Ciudades", "action" => "getByCiudad"), true) ?>'+'/'+$(this).val());
	});
	function BrowseUser(){
  		$('#user_name').load('<?= Router::url(array("controller" => "Users", "action" => "confirm"), true) ?>'+'/'+$('#citerce').val());
	}
	function BrowseEmail(){
  		$('#user_email').load('<?= Router::url(array("controller" => "Users", "action" => "email"), true) ?>'+'/'+$('#email1').val());
	}
</script>