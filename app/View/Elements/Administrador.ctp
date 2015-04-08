<li class="dropdown">
	<a href="#" class="dropdown-toggle">
		<i class="fa fa-group"></i>
		<span class="hidden-xs">Administración</span>
	</a>
	<ul class="dropdown-menu">
		<li><?= $this->Html->link('Creación de Usuarios', array('controller' => 'users', 'action' => 'Add'), array('escape' => false)) ?></li>
		<li><?= $this->Html->link('Categoría de Casos', array('controller' => 'ticasos', 'action' => 'ShowCase'), array('escape' => false)) ?></li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-plus-square"></i>
				<span class="hidden-xs">Gestión Geográfica</span>
			</a>
			<ul class="dropdown-menu">
				<li><?= $this->Html->link('Agregar Municipios', array('controller' => 'ciudades', 'action' => 'ShowCity'), array('escape' => false)) ?></li>
				<li><?= $this->Html->link('Agregar Departamentos', array('controller' => 'departamentos', 'action' => 'ShowDepartment'), array('escape' => false)) ?></li>
			</ul>
		</li>
	</ul>
</li>