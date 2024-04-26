<div class="col-sm m-1 p-0">

<div class="row gx-1 gy-1">

<?php include 'model.php';

  if ($res->num_rows > 0) {  

    $row = $res->fetch_assoc();

    do {
 
    $vtrid = $row["vtrid"];
    $pref = $row["vtrpref"];
    $tipo = $row["vtrtipo"];
    $marcamod = $row["vtrmarcamod"];
    $ano = $row["vtrano"];
    $status = $row["vtrstatus"];
    $img = $row["vtrimg"];
    $placa = $row["vtrplaca"];
    $chassi = $row["vtrchassi"];
    $renavan = $row["vtrrenavan"];
    $combustivel = $row["vtrcombustivel"];
    $pneu = $row["vtrpneu"];
    $odomatual = $row["vtrodomatual"];
    $outros = $row["vtroutros"];
    $valoratualtgr = $row["vtrvaloratualtgr"];
    $especie = $row["vtrespecie"];
    $classe = $row["vtrclasse"];
?>

	<div class="card col-sm-2 p-0 shadow <?php if($status == 'INATIVA') echo "bg-secondary";?>">
    <a href='#' data-bs-toggle="modal" data-bs-target="#idvtr<?=$vtrid?>" class="nav-link">
      <div class="card-header"><h5><?=$tipo;?></h5></div>
      <div class="card-body"><img src='veiculos/vtrimg/<?=$img;?>' width="100%" class="rounded-circle" ></div>
    </a>
  </div>

   <?php

    include '_form_update.php';

    } while ($row = $res->fetch_assoc());

  };?>

  </div>
  
</div>