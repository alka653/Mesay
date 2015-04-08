<div id="sidebar-left" class="col-xs-2 col-sm-2">
	<ul class="nav main-menu">
		<li>
			<?= $this->Html->link('<i class="fa fa-dashboard"></i><span class="hidden-xs">  Inicio</span>', array('controller' => 'users', 'action' => 'welcome'), array('escape' => false)) ?>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle">
				<i class="fa fa-archive"></i>
				<span class="hidden-xs">Tickets</span>
			</a>
			<ul class="dropdown-menu">
				<li><?= $this->Html->link('Crear Ticket', array('controller' => 'casos', 'action' => 'CreateTicket'), array('escape' => false)) ?></li>
				<li><a class="ajax-link" href="ajax/charts_flot.html">Ver Tickets</a></li>
			</ul>
		</li>
		<?= $this->element($user['Role']['name_role']) ?>
	</ul>
</div>