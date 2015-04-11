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
				<div id="city"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	cities();
	$('#CiudadeId').hide();
	function cities(){
        $('#city').load('<?= Router::url(array("controller" => "Ciudades", "action" => "ViewCity"), true) ?>');
    }
	$("#CiudadeAddCityForm").submit(function(e){
    	var postData = $(this).serializeArray();
    	var formURL = $(this).attr("action");
    	$.ajax({
        	url : formURL,
        	type: "POST",
        	data : postData,
        	success:function(response){
            	toastr.success(response);
            	cities();
        	},
        	error: function(response){
            	toastr.warning(response); 
        	}
    	});
		e.preventDefault();
		return false;
	});
</script>