<?php 

include_once "../templates/header.php";
require_once "../conexao.php";

  $sql = "SELECT * FROM vtr ORDER BY vtrtipo";
  $res = $conn->query($sql);
  $row = $res->fetch_assoc();

?>
  <form action="" method="POST" class="row gx-1 gy-1 text-center">
      <select class="form-select" name="vtrstatus">
        <option value="" >"Filtrar por status"</option>
        <option value="ATIVA" >Ativas</option>
        <option value="INATIVA" >Inativas</option>
      </select>
      <div class="form-floating">
        <input type="submit" class="btn btn-primary" name="">
    </div>
  </form>

<div class="p-1 m-2">Número de viaturas: <b><?=$res->num_rows?></b></div>

  <div class="list-group mb-1">

    <a href="?acao=ins" class="list-group-item list-group-item-action"><i class="fas fa-plus-circle"></i> Adicionar</a>

  </div> 
  
</div> <!-- FIM DA COLUNA ESQUERDA -->

<div class="col-sm-2" style="overflow-y: scroll; height:600px">

	
<?php if ($res->num_rows > 0) { do {
 
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

    // if(isset($_GET['vtrtipo'])) $tipo = $_GET['vtrtipo']; else $_GET['vtrtipo'] = "";
?>

	<div class="list-group list-group-flush p-1">
	<a href='?vtrid=<?=$vtrid;?>' class="list-group-item list-group-item-action" aria-current="true">
	  <div class="d-flex justify-content-between">
	    <img src='../veiculos/vtrimg/<?=$img;?>' width="60" height="60" class="rounded-circle" >
	    <h5><?=$tipo;?></h5>
	  </div>
	</a>
	</div>

 <?php } while ($row = $res->fetch_assoc());} ?>

</div>

<div class="col-sm">

<?php 

if (!empty($_GET['vtrid'])) { include_once 'form.php';};
if ((!empty($_GET['acao'])) && ($_GET['acao'] == 'ins')) { include_once 'form.php';}


?>

</div>

<?php

include_once '../templates/footer.php';

?>
