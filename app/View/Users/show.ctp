<table class="table table-bordered table-hover" id="table">
	<thead>
		<tr>
			<th>Usuario</th>
			<th>Nombre</th>
			<th>Perfil</th>
			<th>Estado</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php
        	foreach($users as $user){
        		if($user['User']['status'] == 1){
        			$estado = $this->Html->link("<span class='label label-success'>Activo</span>", array('controller' => 'Users', 'action' => "status", $user['User']['id']), array("id" => $user['User']['id'], "class" => "modal-trigger status", "escape" => false));
        		}else{
        			$estado = $this->Html->link("<span class='label label-warning'>Inactivo</span>", array('controller' => 'Users', 'action' => "status", $user['User']['id']), array("id" => $user['User']['id'], "class" => "modal-trigger status", "escape" => false));
        		}
       	?>
        	<tr>
            	<td><?= $user['User']['username'] ?></td>
            	<td><?= $user['User']['name'] ?></td>
            	<td><?= $user['Role']['name_role'] ?></td>
            	<td><?= $estado ?></td>
            	<td><?= $this->Html->link("<i class='fa fa-edit'></i>", array('controller' => 'Users', 'action' => "EditUser", $user['User']['id'], $user['User']['role']), array("id" => $user['User']['id'], "class" => "edit-user", "escape" => false)) ?></td>
          	</tr>
        <?php
        	}
        ?>
	</tbody>
</table>
<script>
	$(".status").click(function(event){
		event.preventDefault();
	    $.ajax({
	        url: $(this).attr('href'),
	        type: 'GET',
	        success: function(response){
	          	toastr.success(response);
            	users();
	        },
	        error: function(response){
	        	toastr.warning(response);
	        }
	    });
	});
    $(".edit-user").click(function(event){
        event.preventDefault();
        var target = $(this).attr("href");
        $('.modal-load').load(target, function(){
            $('#modal-mesay').modal('show');
        });
    });
</script>