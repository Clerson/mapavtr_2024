<div class="col-sm m-1 p-0">

<div class="row gx-1 gy-1">

<?php include 'model.php';

  if ($res->num_rows > 0) {  

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

	<div class="card col-sm-2 m-1 shadow <?php if($status == 'INATIVA') echo "bg-secondary";?> text-center">
    <a href='<?=$param1.$param2.$vtrid;?>' class="nav-link">
      <div class="card-header"><h5><?=$tipo;?></h5></div>
      <div class="card-body"><img src='<?=$uri_img.$img;?>' width="80%" class="rounded-circle" ></div>
      <?php
        if(!empty($_REQUEST['get_vtrid'])) { ?>
      <div class="card-footer"><a href='#' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#idvtr<?=$vtrid?>">Editar</a></div>
      <?php } ?>
    </a>
  </div>

   <?php  } while ($row = $res->fetch_assoc());

    include '_form_update.php';

  };?>

  </div>
  
</div>