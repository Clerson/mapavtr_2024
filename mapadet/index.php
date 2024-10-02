<?php  include "model.php"; ?>

      <a class="navbar-brand p-0" href="#" data-bs-toggle="modal" data-bs-target="#info_ala">
        <img src="../img/<?=$alaimg;?>" width="40" height="40" class="rounded-circle shadow">
      </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mapadet">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mapadet">

          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="?p=mapadet&idmapa=<?=$idmapa;?>" class="nav-link btn shadow me-1 bg-light" >
                <i class="fa fa-calendar"></i> <?=$data;?>
              </a>
            </li>
            <li class="nav-item">
              <a href="?p=mapadet&idmapa=<?=$idmapa;?>&acao=ins" class="nav-link btn btn-info shadow me-1 text-light">
                <i class="fa fa-plus-circle"></i> NOVA SAÍDA
              </a>
            </li>
            
              <?php
                $res_status = $conn->query("
                                            SELECT detmp_status, count(*) AS qnt  
                                            FROM detmapa 
                                            WHERE idmapa = $idmapa
                                            -- AND detmp_status = 'aberta' 
                                            GROUP BY detmp_status
                                          ");

                $row_status = $res_status->fetch_assoc();
                $num_status = $res_status->num_rows;

              if($res_status->num_rows > 0) { 
                  
                                               do {  
                                                    $qnt_status = $row_status['qnt']; 
                                                    $detmp_status = $row_status['detmp_status'];
                                                    
                                                ?>

                  <li class="nav-item">
                    <a href="?p=<?=$p;?>&idmapa=<?=$idmapa;?>&status=<?=$detmp_status;?>" class="nav-link btn shadow me-1
                      <?php
                        if($detmp_status == "aberta") { $detmp_status = "Aberta"; echo "bg-warning";};
                        if($detmp_status == "QRV") echo "bg-success text-light";
                        if($detmp_status == "fechada") { $detmp_status = "Fechada"; echo "bg-light";};
                        if($detmp_status == "Cancelada") { $detmp_status = "Cancelada"; echo "bg-light";};
                      ?>">
                      <?=$detmp_status;?> 
                      <span class="badge bg-primary"><?=$qnt_status;?></span>
                    </a>
                  </li>

                                            <?php } while ($row_status = $res_status->fetch_assoc());

            };?>

             

            
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

    };?>


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
              <?php if((isset($_GET['idvtr'])) && $_GET['idvtr'] == $idvtr) echo "active";?>" style="height:70px">
              <div class="d-flex justify-content-between" id="hover">
                <img src='../veiculos/img/<?=$img;?>' class="my-auto" width="60px">
                <h5 class="my-auto"><?=$tipo;?></h5>
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

} else include_once "form.php"; ?>

<div class="modal" id="info_ala">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><img src="../img/<?=$alaimg;?>" width="40" height="40" class="rounded-circle shadow"> Ala <?=$ala;?> - <b><?=$data;?></b></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <img src="../pessoas/pessoas_img/<?=$ofdia_img;?>" width="40" class="rounded-1 shadow"> OFICIAL DE DIA: <b><?=$ofdia_grad." ".$ofdia_rg."  ".$ofdia_nome;?></b>
          </li>
          <li class="list-group-item">
            <img src="../pessoas/pessoas_img/<?=$chefe_img;?>" width="40" class="rounded-1 shadow"> ADJUNTO:<b> <?=$chefe_grad." ".$chefe_rg."  ".$chefe_nome;?></b>
          </li>
          <li class="list-group-item">
            <img src="../pessoas/pessoas_img/<?=$tel1_img;?>" width="40" class="rounded-1 shadow"> VIDEOFONISTA DIURNO:<b> <?=$tel1_grad." ".$tel1_rg."  ".$tel1_nome;?></b>
          </li>
          <li class="list-group-item">
            <img src="../pessoas/pessoas_img/<?=$tel2_img;?>" width="40" class="rounded-1 shadow"> VIDEOFONISTA NOTURNO:<b> <?=$tel2_grad." ".$tel2_rg."  ".$tel2_nome;?></b>
          </li>
        </ul>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div>

    </div>
  </div>
</div>






