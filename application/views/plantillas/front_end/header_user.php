<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?= $titulo ?></title>
    <!-- Icono -->
    <link href="<?= base_url() ?>assets/img/favicon.ico" rel="shortcut icon" />
    <!-- Normalize -->
    <link href="<?= base_url() ?>assets/css/normalize.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="<?= base_url() ?>assets/css/bootstrap-3.3.6.css" rel="stylesheet" />
    <!-- mis estilos -->
    <link href="<?= base_url() ?>assets/css/estilos.css" rel="stylesheet" />
    <!-- bxSlider CSS file -->
    <link href="<?= base_url() ?>assets/css/jquery.bxslider.css" rel="stylesheet" />
    <!-- JQuery DataTables CSS -->
    <link href="<?= base_url() ?>assets/css/jquery.dataTables-1.10.11.css" rel="stylesheet" />
    <!-- Buttons DataTables CSS -->
    <link href="<?= base_url() ?>assets/css/buttons.dataTables-1.10.11.css" rel="stylesheet" />
     <!-- Font Awesome Icons -->
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?= base_url() ?>assets/js/jquery-1.12.0.min.js"></script>
    <!-- Include highcharts para Gráficas -->
    <script src="<?= base_url() ?>assets/js/highcharts/highcharts.js"></script>
    <script src="<?= base_url() ?>assets/js/highcharts/highcharts-3d.js"></script>
    <script src="<?= base_url() ?>assets/js/highcharts/modules/exporting.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container"> 
    <header class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">         
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button> 
                    <p class="logo">
                        <a class="navbar-brand" href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>assets/img/logoPharmaZero.png" alt="logo Pharma Zero" width="130" height="130">
                        </a>
                    </p>
                </div>      
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="<?= base_url() ?>ventas">Ventas</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="<?= base_url() ?>logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Cerrar Sesion</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="ubicacion">
            Estas en: <?= $ubicacion ?>
            </div>
            <div class="usuario">
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?= $nick_usuario_session ?>
            </div>
        </div>
    </header>

    <div class="row clearfix">      
        <div class="borde"></div>
    </div>