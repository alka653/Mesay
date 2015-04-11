<header class="navbar">
  <div class="container-fluid expanded-panel">
    <div class="row">
      <div id="logo" class="col-xs-6 col-sm-2">
        <?= $this->Html->link('MESAY', array('controller' => 'users', 'action' => 'welcome')) ?>
      </div>
      <div id="top-panel" class="col-xs-6 col-sm-10">
        <div class="row">
          <div class="col-xs-8 col-sm-4">
          </div>
          <div class="col-xs-4 col-sm-8 top-panel-right">
            <ul class="nav navbar-nav pull-right panel-menu">
              <li class="hidden-xs">
                <a href="ajax/page_messages.html" class="ajax-link">
                  <i class="fa fa-envelope"></i>
                  <span class="badge">7</span>
                </a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle account" data-toggle="dropdown">
                  <div class="avatar">
                    <?= $this->Html->image('template/avatar.jpg', array('class' => 'img-circle', 'alt' => 'avatar')) ?>
                  </div>
                  <i class="fa fa-angle-down pull-right"></i>
                  <div class="user-mini pull-right">
                    <span class="welcome">Bienvenido,</span>
                    <span><?= $user['User']['name'] ?></span>
                  </div>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-user"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li>
                    <a href="ajax/page_messages.html" class="ajax-link">
                      <i class="fa fa-envelope"></i>
                      <span>Messages</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-cog"></i>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li>
                    <?= $this->Html->link('<i class="fa fa-power-off"></i><span>Cerrar Sesión</span>', array('controller' => 'users', 'action' => 'logout'), array('escape' => false)) ?>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>