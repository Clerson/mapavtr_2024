<?php 
require_once 'model.php';
;?>

       <h6 class="my-auto me-2">MAPA DE VTR</h6>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav_mapa">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav_mapa">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a href="?p=mapas" class="nav-link btn btn-info shadow ms-2"><i class='fas fa-home'></i> INICIO</a>
              </li>
              <li class="nav-item">
                <a href="?p=mapas&acao=ins" class="nav-link btn btn-info shadow ms-2"><i class='fas fa-plus-circle'></i> NOVO MAPA</a>
              </li>
            </ul>

            <ul class="navbar-nav">
              <li class="nav-item">
                <a href="?ala=alpha" class="nav-link p-0 me-2">
                  <img src="../img/alpha.jpeg" width="40" height="40" class="rounded-circle shadow" title="Ala Alpha">
                </a>
              </li>
              <li class="nav-item">
                <a href="?ala=bravo" class="nav-link p-0 me-2">
                  <img src="../img/bravo.jpeg" width="40" height="40" class="rounded-circle shadow" title="Ala Bravo">
                </a>
              </li>
              <li class="nav-item">
                <a href="?ala=charlie" class="nav-link p-0 me-2">
                  <img src="../img/charlie.jpeg" width="40" height="40" class="rounded-circle shadow" title="Ala Charlie">
                </a>
              </li>
              <li class="nav-item">
                <a href="?ala=delta" class="nav-link p-0 me-2">
                  <img src="../img/delta.jpeg" width="40" height="40" class="rounded-circle shadow" title="Ala Delta">
                </a>
              </li>
            </ul>

            <form action="" method="POST" class="d-flex">
              <input class="form-control me-2" type="date" name="data_ini" value="<?php echo date('Y-m-d');?>">
              <input class="form-control me-2" type="date" name="data_fim" value="<?php echo date('Y-m-d');?>">
              <button type="submit" class="btn btn-primary shadow" type="button">Enviar</button>
            </form>

          </div>
      </div>
    </nav>
  </div>

<div class="row">

<div class="col-sm-2 p-0">
  <?php
 
  if($res->num_rows > 0) {
    
    do { 

    switch ($row['ala']) {
      case 'Alpha':
        $alaimg = 'alpha.jpeg';
        break;
      case 'Bravo':
        $alaimg = 'bravo.jpeg';
        break;
      case 'Charlie':
        $alaimg = 'charlie.jpeg';
        break;
      case 'Delta':
        $alaimg = 'delta.jpeg';
        break;
      }

    ?>

    <div class="list-group list-group-flush">
      <a href="?p=mapadet&idmapa=<?=$row['idmapa'];?>" class="list-group-item list-group-item-action">
        <div class="d-flex justify-content-between">
          <img src="../img/<?=$alaimg;?>" width="40" height="40" class="rounded-circle" >
          <h5 class="mb-1"><?=$row['ala'];?></h5>
          <span><?=date('d/m/y', (strtotime($row["data"])));?></span>
        </div>
      </a>
    </div>

      <?php } while($row = $res->fetch_assoc());

   } else echo "Escolha uma data válida";?>
</div>

<div class="col-sm-6 mx-auto">

    <?php 

        $acao = "";

        if(!empty($_GET['acao'])) {
          $acao=$_GET['acao'];
          switch ($acao) {
            case 'ins'; $acao='mapas/form.php'; break;
            case 'rel'; $acao='mapas/index.php'; break;
          }

          include $acao;
        }

        
    ?>