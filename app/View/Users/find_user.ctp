<div class="form-group">
	<?= $this->Form->input('User.find', array('maxlength' => '30', 'required' => 'required', 'class' => 'form-control','placeholder' => 'Digite el Nombre, Email', 'label' => 'Buscar por Nombre', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-12 col-md-12 text-center'))) ?>
</div>
<div id="results">
	<div class="form-group">
		<?= $this->Form->input('User.cod', array('readonly' => 'readonly', 'class' => 'form-control', 'label' => 'Usuario del Cliente', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-6 col-md-6 text-center'))) ?>
		<?= $this->Form->input('name', array('class' => 'form-control', 'readonly' => 'readonly', 'label' => 'Nombre del Cliente', array('class' => 'col-sm-2 control-label'), 'div' => array('class' => 'col-xs-12 col-sm-6 col-md-6 text-center'))) ?>
	</div>
</div>
<script type="text/javascript">
	$('#results').hide();
	$('#UserFind').autocomplete({
		minLength: 2,
		select: function(event, ui){
			$("#UserFind").val(ui.item.label);
		},
		source: function(request, response){
			$.ajax({
				url: '<?= Router::url(array("controller" => "Terceros", "action" => "FindTerce"), true) ?>',
				data: {
					term: request.term
				},
				dataType: "json",
				success: function(data){
					response($.map(data, function(el, index){
						return {
							value: el.Tercero.name+" "+el.Tercero.apellidos,
							name: el.Tercero.name,
							citerce: el.Tercero.id,
							apellidos: el.Tercero.apellidos
						};
					}));
				}
			});
		},
		select: function(ul, ui){
			$('#UserCod').val(ui.item.citerce);
			$('#name').val(ui.item.name+' '+ui.item.apellidos);
			$('#results').show();
			$('.button').attr('disabled', false);
		}
	}).data("ui-autocomplete")._renderItem = function(ul, item){
		return $("<li></li>").data("item.autocomplete", item).append('<a href="google.com" id="'+item.citerce+'">'+item.name+' '+item.apellidos+'</a>').appendTo(ul)
	};
</script>