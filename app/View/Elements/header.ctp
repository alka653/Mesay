<header>
    <div class="container">
    <?php
        if(AuthComponent::user('id')){
    ?>
        <div class="row">
            <div class="col-md-12">
            <div class="dropdown dropdown-menu-right">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                Bienvenido <strong><?= AuthComponent::user('name') ?></strong>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                    <li><?= $this->Html->link('Cerrar Sesión', array('controller' => 'users', 'action' => 'logout'), array('role' => 'menuitem', 'tabindex' => '-1')) ?></li>
                </ul>
            </div>
            </div>
        </div>
    <?php
        }else{
    ?>
        <div class="row">
            <div class="col-md-12">
                <strong>Email: </strong>info@yourdomain.com
                &nbsp;&nbsp;
                <strong>Support: </strong>+90-897-678-44
            </div>
        </div>
    <?php
        }
    ?>
    </div>
</header>
<div class="navbar navbar-inverse set-radius-zero">
    <div class="container content-nav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
                <img src="http://sistematizar.co/images/logopag.png" />
            </a>
        </div>
    </div>
</div>
<section class="menu-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><?= $this->Html->link('Inicio', array('controller' => 'users', 'action' => 'welcome')) ?></li>
                        <?= $this->element($user['Role']['name_role']) ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>