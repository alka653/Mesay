<div class="container">
    <div class="section">
      	<div class="row">
        	<div class="col s12">
        		<h4 class="header col s12 light center">Usuarios</h4>
        	</div>
        	<div class="col s12">
        		<?php echo $this->Html->link("<i class='mdi-content-add-circle'></i>", array('action'=>'add'), array('escape' => false, "class" => 'icon-link', 'title' => 'Nuevo Usuario')); ?>
        		<table class="bordered hoverable responsive-table">
        			<thead>
        				<tr>
							<th>Usuario</th>
							<th>Nombre</th>
							<th>Fecha Creación</th>
							<th>Rol</th>
							<th>Estado</th>
							<th>Acciones</th>
        				</tr>
        			</thead>
        			<tbody>
        				<?php
        					foreach($users as $user){
        						?>
        						<tr>
        							<td><?= $this->Html->link( $user['User']['username']  ,   array('action'=>'edit', $user['User']['id']),array('escape' => false) );?></td>
        							<td><?= $user['User']['name']; ?></td>
        							<td><?= $this->Time->niceShort($user['User']['created']); ?></td>
        							<td><?= $user['Role']['name']; ?></td>
        							<td>
        								<?php 
        									if($user['User']['status'] != 0){
        										echo "Activo";
        									}else{
        										echo "Inactivo";
        									}
        								?>
        							</td>
        							<td>
        								<?php echo $this->Html->link('<i class="mdi-content-create"></i>', array('action'=>'edit', $user['User']['id']), array('escape' => false)); ?> | 
										<?php
											if($user['User']['status'] != 0){ 
												echo $this->Html->link('<i class="mdi-content-clear"></i>', array('action'=>'delete', $user['User']['id']), array('escape' => false));
											}else{
												echo $this->Html->link('<i class="mdi-content-undo"></i>', array('action'=>'activate', $user['User']['id']), array('escape' => false));
												}
										?>
									</td>
				        		</tr>
				        <?php
				        	}
				        ?>
        			</tbody>
        		</table>
        		<?= $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
				<?= $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
				<?= $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
        	</div>
      	</div>
    </div>
</div>
<?= $this->element('footer') ?>