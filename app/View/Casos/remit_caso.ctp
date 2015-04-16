<div class="modal fade" id="modal-mesay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	   	<div class="modal-content">
	   	 	<div class="modal-header">
	       		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       		<h4 class="modal-title" id="myModalLabel">Remitir Caso <?= $id ?></h4>
	   		</div>
		<?= $this->Form->create('Caso', array('inputDefaults' => array('label' => false))); ?>
	      	<div class="modal-body form-horizontal">
	        	<div class="form-group">
					<?= $this->Form->input('ctecni-ac', array('autocomplete' => 'off', 'class' => 'form-control', 'readonly' => 'readonly', 'value' => $caso['Tecnico']['ntecni'].' '.$caso['Tecnico']['atecni'], 'label' => 'Tecnico Actual:', array('for' => 'ctecni-ac'))) ?>
					<div id="user_name"></div>
				</div>
				<div class="form-group">
					<?= $this->Form->input('ctecni', array('required' => 'required', 'class' => 'form-control', 'label' => 'Tecnico:', 'type' => 'select', 'options' => $tecnicos, 'empty' => 'Selecciona un Tecnico')) ?>
				</div>
	      	</div>
	      	<div class="modal-footer">
			<?= $this->Form->submit('Guardar', array('id' => 'CasoRemitCasoForm', 'class' => 'button btn btn-primary btn-label-center', 'div' => false)) ?>
	        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	   		</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("#CasoRemitCasoForm").submit(function(e){
    	var postData = $(this).serializeArray();
    	var formURL = $(this).attr("action");
    	$.ajax({
        	url : formURL,
        	type: "POST",
        	data : postData,
        	success:function(response){
            	toastr.success(response);
            	$('#tecni').text($("#CasoCtecni option:selected").text());
            	$('#modal-mesay').modal('hide');
        	},
        	error: function(response){
            	toastr.warning(response); 
        	}
    	});
		e.preventDefault();
		return false;
	});
</script>