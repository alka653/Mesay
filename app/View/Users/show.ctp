<?php
	$this->Paginator->options(array(
		'update' => '#Content-users'
	));
?>
<div id="Content-users">
	<table class="table table-bordered table-hover" id="table">
		<thead>
			<tr>
				<th><?= $this->Paginator->sort('Usuario') ?></th>
				<th><?= $this->Paginator->sort('Nombre') ?></th>
				<th><?= $this->Paginator->sort('Perfil') ?></th>
				<th><?= $this->Paginator->sort('Estado') ?></th>
				<th><?= $this->Paginator->sort('Acción') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
	        	foreach($users as $user){
	        		if($user['User']['status'] == 1){
	        			$estado = $this->Html->link("<span class='label label-success'>".$user['State']['name_state']."</span>", array('controller' => 'Users', 'action' => "status", $user['User']['id']), array("id" => $user['User']['id'], "class" => "modal-trigger status", "escape" => false));
	        		}else{
	        			$estado = $this->Html->link("<span class='label label-warning'>".$user['State']['name_state']."</span>", array('controller' => 'Users', 'action' => "status", $user['User']['id']), array("id" => $user['User']['id'], "class" => "modal-trigger status", "escape" => false));
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
	<div class="paging text-center">
		<ul class="pagination">
			<li> <?php echo $this->Paginator->prev('< ' . __('previous'), array('tag' => false), null, array('class' => 'prev disabled')); ?> </li>
			<?php echo $this->Paginator->numbers(array('separator' => '', 'tag' => 'li', 'currentTag' => 'a', 'currentClass' => 'active')); ?>
			<li> <?php echo $this->Paginator->next(__('next') . ' >', array('tag' => false), null, array('class' => 'next disabled')); ?> </li>
		</ul>
	</div>
</div>
<?= $this->Js->writeBuffer() ?>
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