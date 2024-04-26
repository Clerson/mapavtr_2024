<?php  include "model.php"; ?>

<h6 class="my-auto me-2">MAPA DE VTR</h6>


      <a class="navbar-brand p-0" href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>">
        <img src="../img/<?=$alaimg;?>" width="40" height="40" class="rounded-circle shadow">
      </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mapadet">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mapadet">

          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link btn btn-info shadow me-1" href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>">
                ALA <b><?=$row['ala'];?></b>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-info shadow me-1" href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>">
                <?=date('d/m/y', (strtotime($row["data"])));?>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-info shadow me-1" href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>&acao=ins">
                <i class="fa fa-plus-circle"></i> NOVA SAÍDA
              </a>
            </li>
          </ul>

        </div>

  <?php

    $res_rel = $conn->query("
                              SELECT destino, count(*) AS qnt  
                              FROM detmapa 
                              WHERE idmapa = $idmapa 
                              GROUP BY destino 
                              ORDER BY qnt 
                              DESC
                              ");

    $row_rel = $res_rel->fetch_assoc();
    

    if($res_rel->num_rows > 0) { 

     do {  

          $qnt_rel = $row_rel['qnt']; 
          $destino = $row_rel['destino'];
      ?>

        <a href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>&dest=<?=$destino;?>">
          <span class="badge rounded-pill bg-info text-dark me-1">
            <?=$destino;?> 
            <span class="badge bg-primary"><?=$qnt_rel;?></span>
          </span>
        </a>

      <?php } while ($row_rel = $res_rel->fetch_assoc());

    };

      $res_status = $conn->query("
                                  SELECT detmp_status, count(*) AS qnt  
                                  FROM detmapa 
                                  WHERE idmapa = $idmapa 
                                  GROUP BY detmp_status
                                ");

      $row_status = $res_status->fetch_assoc();
      $num_status = $res_status->num_rows;

      if($res_status->num_rows > 0) { 
        
     do {  
          $qnt_status = $row_status['qnt']; 
          $detmp_status = $row_status['detmp_status'];
    
      ?>

          <a href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>&status=<?=$detmp_status;?>">
            <span class="badge rounded-pill 
            <?php if($detmp_status == "QRV") echo "bg-success text-light"; else echo "bg-warning text-dark" ?> me-1">
              <?=$detmp_status;?> 
              <span class="badge bg-primary"><?=$qnt_status;?></span>
            </span>
          </a>
    <?php } while ($row_status = $res_status->fetch_assoc()); 

      }; ?>


      </div>

    </nav>


  <div class="container-fluid">

    <div class='row'>

      <div class="col-sm-2 p-0">
        <?php 
        // SELECIONA OS REGISTROS EM DETMAPA, AGRUPADOS POR VTR, FILTRADO PELO IDMAPA
        $result_detmapa = $conn->query("
                                   
                                      SELECT idvtr,
                                             vtrid, 
                                             vtrimg, 
                                             vtrtipo  
                                      FROM detmapa
                                      INNER JOIN vtr ON vtrid=idvtr 
                                      WHERE idmapa=$idmapa 
                                      GROUP BY idvtr 
                                      ");

        $row_detmapa = $result_detmapa->fetch_assoc(); 

        if ($result_detmapa->num_rows > 0) {
          

        // MOSTRA OS REGISTROS DE DETMAPA, COM OS DADOS DA VTR

            do {

            $idvtr = $row_detmapa['idvtr'];
            $img = $row_detmapa['vtrimg'];
            $tipo = $row_detmapa['vtrtipo'];

          ;?>

          <div class="list-group list-group-flush">
            <a href='?p=mapadet&idmapa=<?=$idmapa;?>&idvtr=<?=$idvtr;?>' class="list-group-item list-group-item-action
              <?php 
              if((isset($_GET['idvtr'])) && $_GET['idvtr'] == $idvtr) echo "active"
              ;?>
              " >
              <div class="d-flex justify-content-between m-auto">
                <img src='../veiculos/vtrimg/<?=$img;?>' width="60" >
                <h5><?=$tipo;?></h5>
              </div>
            </a>
          </div>

         <?php } while ($row_detmapa = $result_detmapa->fetch_assoc()); 

          } ?>
      </div>

    <?php if($result_detmapa->num_rows > 0) {


      if(!empty($_GET['idvtr'])) { include_once "analit.php"; };

       if(!empty($_GET['dest'])) { include_once "analit.php";};

       if(!empty($_GET['status'])) { include_once "analit.php";};

      if(!empty($_GET['iddetmp'])) { include_once "form.php";};

      if(!empty($_GET['acao'])) {

        if($_GET['acao'] == 'ins') {

          echo "<div class='col-sm p-2'>";
            include_once "form.php" ;
          echo "</div>";
        };

        if($_GET['acao'] == 'env') { require_once "model.php" ;}

      ;} 

      
      if(!empty($_GET['rel'])) {

        if($_GET['rel'] == 'status') { include_once "rel_status.php"; }

        if($_GET['rel'] == 'dest') { include_once "rel_dest.php"; }

      ;}
      
  echo "</div>";

} else include_once "form.php";




