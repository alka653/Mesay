<div class="clearfix visible-xs"></div>
<div class="row-fluid">
	<div id="dashboard_tabs" class="col-md-12">
		<div id="dashboard-overview" class="row">
			<h4 class="text-center">Lista de Departamentos Agregados</h4>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<?= $this->Form->create('Departamento', array('action' => 'AddDepartment', 'class' => 'form-horizontal', 'inputDefaults' => array('label' => false))); ?>
				<div class="form-group">
					<?= $this->Form->input('id', array('class' => 'form-control', 'label' => 'Código del Departamento', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12'))) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('depar', array('maxlength' => '40', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Escriba nombre del Departamento', 'label' => 'Departamento', array('class' => 'control-label'), 'div' => array('class' => 'col-xs-12'))) ?>
				</div>
				<?= $this->Form->submit('Agregar Departamento', array('id' => 'button DepartamentoAddDepartmentForm', 'class' => 'button btn btn-primary btn-label-center', 'div' => array('class' => 'form-group text-center'))) ?>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div id="department"></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	department();
	$('#DepartamentoId').hide();
	$("#DepartamentoAddDepartmentForm").submit(function(e){
    	var postData = $(this).serializeArray();
    	var formURL = $(this).attr("action");
    	$.ajax({
        	url : formURL,
        	type: "POST",
        	data : postData,
        	success:function(response){
            	toastr.success(response);
            	var id = $('#table').closest('table').find('tr:last td:first').text();
            	var cod = parseInt(id)+1;
            	if($('#DepartamentoId').val() != ""){
            		$('td.'+$('#DepartamentoId').val()).text($('#DepartamentoDepar').val());
            	}else{
            		department();
            	}
            	$('#DepartamentoId').val('');
				$('#DepartamentoDepar').val('');
        	},
        	error: function(response){
            	toastr.warning(response); 
        	}
    	});
		e.preventDefault();
		return false;
	});
	function department(){
        $('#department').load('<?= Router::url(array("controller" => "Departamentos", "action" => "ViewDepartment"), true) ?>');
    }
</script>