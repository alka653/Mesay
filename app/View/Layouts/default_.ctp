<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title><?= $pageTitle ?>L</title>
        <?= $this->Html->css('toastr') ?>
        <?= $this->Html->css('plantilla/bootstrap') ?>
        <?= $this->Html->css('plantilla/font-awesome') ?>
        <?= $this->Html->css('plantilla/style') ?>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <?= $this->element('header') ?>
        <?= $this->fetch('content') ?>
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        &copy; 2015 SistematizarEF. Diseñado por Adriann Felipe Sanchez Sierra
                    </div>

                </div>
            </div>
        </footer>
        <?= $this->Html->script("toastr") ?>
        <?= $this->Html->script("plantilla/jquery-1.11.1") ?>
        <?= $this->Html->script("plantilla/bootstrap") ?>
    </body>
</html>
