<?php  date_default_timezone_set("America/Sao_Paulo");?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Mapa Vtr 2024</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="img/logo_9bbm.png">
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body style=" background-image: url('img/vtr_bg.png');
              background-repeat: repeat;
              background-position: right top;
            ">

  <div class="container-fluid" id="container" >

    <div class="row">

      <div class="offcanvas offcanvas-start p-0" id="menu">

        <div class="offcanvas-header bg-secondary">
          <img src="img/logo_9bbm.png" width="40" height="auto">
          <h4 class="offcanvas-title">9º BBM</h4>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body">
          <nav class="navbar">
            <ul class="navbar-nav">
                  <li class="nav-item"><a class="nav-link mx-2" href="?p=mapas"><h6><i class="fas fa-map"></i> MAPAS</a></li></h6>
                  <li class="nav-item"><a class="nav-link mx-2" href="?p=veiculos"><h6><i class='fas fa-ambulance'></i> VEÍCULOS</a></li></h6>
                  <li class="nav-item"><a class="nav-link mx-2" href="?p=pessoas"><h6><i class='fas fa-users'></i>  PESSOAS</a></li></h6>
            </ul>
          </nav>
        </div>

      </div>
      
<!-- SEGUNDA COLUNA -->
<div class="col-sm">

  <div class="row">
    <nav class="navbar navbar-expand-sm navbar-light bg-secondary">
      <div class="container-fluid">

        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" role="button" data-bs-toggle="offcanvas" data-bs-target="#menu">
              <span class="navbar-toggler-icon"></span>
            </a>
          </li>
        </ul>

    		<?php 

        $acao = "";
        $url='mapas/index.php';

        if(!empty($_GET['p'])) {

          $p=$_GET['p'];

          switch ($p) {
            case 'mapas'; $url='mapas/index.php'; break;
            case 'mapadet'; $url='mapadet/index.php'; break;
            case 'pessoas'; $url='pessoas/index.php'; break;
            case 'veiculos'; $url='veiculos/index.php'; break;
          }  
        }

        include $url

        ;?>


		</div>
	</div>
</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
<script src='js/a076d05399.js' crossorigin='anonymous'></script>
<script src="scripts.js"></script>
<script type="text/javascript"></script>

