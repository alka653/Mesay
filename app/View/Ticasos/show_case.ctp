<div class="clearfix visible-xs"></div>
<div class="row-fluid">
	<div class="col-md-12" id="dashboard_tabs">
		<div id="dashboard-overview" class="row">
			<h4 class="text-center">Lista de Tipo de Casos</h4>
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
				<div id="ticasos"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	ticaso();
	$('#TicasoId').hide();
	$("#TicasoAddTicasoForm").submit(function(e){
    	var postData = $(this).serializeArray();
    	var formURL = $(this).attr("action");
    	$.ajax({
        	url : formURL,
        	type: "POST",
        	data : postData,
        	success:function(response){
            	toastr.success(response);
            	ticaso();
        	},
        	error: function(response){
            	toastr.warning(response); 
        	}
    	});
		e.preventDefault();
		return false;
	});
	function ticaso(){
        $('#ticasos').load('<?= Router::url(array("controller" => "Ticasos", "action" => "ViewCase"), true) ?>');
    }
</script>