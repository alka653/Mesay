<?= $this->Form->create('User', array('action' => 'update', 'class' => 'col s12', 'inputDefaults' => array('label' => array("class" => "active"), 'div' => "input-field col s12"))); ?>
<div class="modal-content">
    <h4>Editar Registros</h4>
    <div class="row">
        <div class="input-field col s12">
            <?= $this->Form->input('id', array('type' => 'hidden', "value" => $user['User']['id'], "label" => array("text" => "Numero de Cedula", "class" => "active"), array("for" => "cedula"))) ?>
            <?= $this->Form->input('name', array("value" => $user['User']['name'], "label" => array("text" => "Nombre Completo", "class" => "active"), array("for" => "name"))) ?>
            <?= $this->Form->input('role', array('label' => array("text" => "Perfil", "class" => "active"), array('for' => 'role'), 'type' => 'select', 'options' => $roles, 'class' => 'browser-default', "selected" => $user['User']['role'])) ?>
            <?= $this->Form->input('status', array('label' => array("text" => "Estado", "class" => "active"), array('for' => 'asistencia'), 'type' => 'select', 'options' => array('1' => 'Activo', '0' => 'Inactivo'), 'class' => 'browser-default', "selected" => $user['User']['asistencia'])) ?>
        </div>
    </div>
</div>
<div class="modal-footer">
    <?= $this->Form->submit('Actualizar', array('id' => 'RegisterUpdateForm', 'class' => 'waves-effect waves-green btn-flat modal-action')); ?>
    <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close">Cerrar</a>
</div>