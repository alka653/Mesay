<div class="login-wrap">
	<?= $this->Session->flash(); ?>
	<h2>Acceso a Mesay</h2>
	<div class="form">
		<?= $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
			<?= $this->Form->input('username', array('class' => 'form-control xs-12','placeholder' => 'Ingrese su Usuario')) ?>
			<?= $this->Form->input('password', array('class' => 'form-control xs-12','placeholder' => 'Ingrese su Contraseña')) ?>
		<?= $this->Form->submit('Ingresar', array('class' => 'button', 'div' => false)); ?>
		<?= $this->Html->link('<p>No Tienes Cuenta? Registrate.</p>', array('action' => 'register'), array('escape' => false)) ?>
	</div>
</div>