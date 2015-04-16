<div class="row-fluid">
	<div class="col-xs-12" id="dashboard_tabs">
		<table class="table table-bordered">
	        <tr>
	            <th colspan="4" class="text-center">
	            	<h3>Ticket No. <?= $id ?></h3>
	            	<p>Cliente <?= strtoupper($caso['Tercero']['name'])." ".strtoupper($caso['Tercero']['apellidos']) ?></p>
	            </th>
	        </tr>
	        <tr>
	            <th>Título</th>
	            <td><?= $caso['Caso']['titulo'] ?></td>
	            <th>Nivel</th>
	            <td><span class="label <?= $span ?>"><?= $caso['Level']['name_level'] ?></span></td>
	        </tr>
	        <tr>
	            <th>Técnico</th>
	            <td id="tecni"><?= $caso['Tecnico']['ntecni'].' '.$caso['Tecnico']['atecni'] ?></td>
	            <th>Estado</th>
	            <td><span class="label <?= $span2 ?>"><?= $caso['State']['name_state'] ?></td>
	        </tr>
	        <tr>
	            <th>Fecha Solicitud</th>
	            <td><?= $caso['Caso']['fhrecibo'] ?></td>
	            <th>Tipo de Caso</th>
	            <td><?= $caso['Ticaso']['nticaso'] ?></td>
	        </tr>
	        <tr>
	            <th>Detalle</th>
	            <td colspan="3"><?= $caso['Caso']['detalle'] ?></td>
	        </tr>
		</table> 
		<?php
			if(AuthComponent::user('role') != 3){
		?>
		<div class="row text-left">
            <?= $this->Html->link("Remitir Caso", array('controller' => 'Casos', 'action' => "RemitCaso", $id), array("class" => "btn btn-primary modal-remitir")) ?>
			<?= $this->Html->link("Anular Caso", array('controller' => 'Casos', 'action' => "AnularCaso", $caso['Caso']['idcaso']), array('class' => 'button btn btn-primary anular')) ?>
			<?= $this->Html->link("Finalizar Caso", array('controller' => 'Casos', 'action' => "FinalizarCaso", $caso['Caso']['idcaso']), array('class' => 'button btn btn-primary finalizar')) ?>
		</div>
		<?php
			}
		?>
	</div>
</div>
<script type="text/javascript">
	$(".modal-remitir").click(function(event){
        event.preventDefault();
        var target = $(this).attr("href");
        $('.modal-load').load(target, function(){
            $('#modal-mesay').modal('show');
        });
    });
</script>