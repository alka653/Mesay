<?php
	Router::connect('/', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/Dashboard', array('controller' => 'users', 'action' => 'welcome'));
	Router::connect('/Tickets/Crear', array('controller' => 'casos', 'action' => 'createticket'));
	Router::connect('/Departamentos', array('controller' => 'departamentos', 'action' => 'ShowDepartment'));
	Router::connect('/Ciudades', array('controller' => 'ciudades', 'action' => 'ShowCity'));
	Router::connect('/Casos/Categoria-de-Casos', array('controller' => 'ticasos', 'action' => 'ShowCase'));
	Router::connect('/Usuarios/Agregar', array('controller' => 'users', 'action' => 'Add'));
	Router::connect('/Login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/Logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/Registrarme', array('controller' => 'users', 'action' => 'register'));
	CakePlugin::routes();
	require CAKE . 'Config' . DS . 'routes.php';
?>