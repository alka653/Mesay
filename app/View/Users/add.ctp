<div class="row-fluid">
    <div class="col-md-12" id="dashboard_tabs">
        <div id="dashboard-overview" class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <?= $this->Html->link("Administrador", array('controller' => 'Users', 'action' => "CreateAdmin"), array("class" => "btn btn-primary modal-admin", "escape" => false)) ?>
                <?= $this->Html->link("Cliente", array('controller' => 'Users', 'action' => "CreateClient"), array("class" => "btn btn-primary modal-admin", "escape" => false)) ?>
                <?= $this->Html->link("Tecnico", array('controller' => 'Users', 'action' => "CreateTecni"), array("class" => "btn btn-primary modal-admin", "escape" => false)) ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id="users"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    users();
    $(".modal-admin").click(function(event){
        event.preventDefault();
        var target = $(this).attr("href");
        $('.modal-load').load(target, function(){
            $('#modal-mesay').modal('show');
        });
    });
    function users(){
        $('#users').load('<?= Router::url(array("controller" => "Users", "action" => "show"), true) ?>');
    }
</script>