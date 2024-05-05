  <div class="col-sm-3 p-0">
    <?php
        
    $sql_det = "
              SELECT * 
              FROM detmapa, 
                  vtr, 
                  pessoas  
              WHERE idmapa = $idmapa 
                AND vtrid = idvtr 
                AND idpessoa = codmil 
              ";

    if(!empty($_GET['idvtr'])) {
      $idvtr = $_GET['idvtr'];
      $sql_det .= " AND idvtr = $idvtr";
      
    }

    if(!empty($_GET['dest'])) { 
        $dest = $_GET['dest'];        
        $sql_det .= "AND destino = '$dest'";
    }

    if(!empty($_GET['status'])) { 
        $status = $_GET['status'];        
        $sql_det .= " AND detmp_status = '$status'";  
    }

      $sql_det .= " ORDER BY iddetmp DESC";
      $result_det = $conn->query($sql_det);  
      $row_det = $result_det->fetch_assoc();

 do { 

      $iddetmp = $row_det['iddetmp'];
      $idvtr = $row_det["idvtr"];
      $vtrimg = $row_det["vtrimg"];
      $vtrtipo = $row_det["vtrtipo"];
      $idpessoa = $row_det["codmil"];
      $nomeguerra = $row_det["nomeguerra"];
      $grad = $row_det["grad"];
      $pessoaimg = $row_det["img"];
      $odomsaida = $row_det["odomsaida"];
      $odomentr = $row_det["odomentr"];
      $horasaida = date("H:i", strtotime($row_det["horasaida"]));
      $horaentr = date("H:i", strtotime($row_det["horaentr"]));
      $destino = $row_det["destino"];
      $status = $row_det["detmp_status"];
      $obs = $row_det["obs"];
      $num_rai = $row_det["num_rai"];


      ;?>
      <div class="list-group list-group-flush">
        <a href="?p=mapadet&idmapa=<?=$idmapa;?>&idvtr=<?=$idvtr;?>&iddetmp=<?=$iddetmp;?>" 
          class="list-group-item list-group-item-action
          <?php

            if((isset($_GET['iddetmp'])) && $_GET['iddetmp'] == $iddetmp) echo "active";

            elseif($status == "aberta") echo "bg-warning";
            elseif($status == "QRV") echo "bg-success text-light";

          ?>

          "
          style="height:70px"> 

          <div class="d-flex justify-content-between">
            <img  src="../veiculos/img/<?=$vtrimg ;?>" width="60"  class="my-auto">
            <div class="text-center">
              <h6><?=$vtrtipo;?></h6>
              <div class="badge bg-warning text-dark shadow"><?=$destino."-".$horasaida."h -".$horaentr."h";?></div>
            </div>
            <img  src="../pessoas/pessoas_img/<?=$pessoaimg; ?>" class="rounded-2 shadow my-auto" width="38" >
          </div>
         </a>
       </div>



<?php } while ($row_det = $result_det->fetch_assoc()) ; ?>

</div>
