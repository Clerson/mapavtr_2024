  
  <div class="col-sm-1 p-0">

    <?php require_once "conexao.php";
      
    $sql_cat = "SELECT vtrespecie, COUNT(*) AS vtrqnt FROM vtr GROUP BY vtrespecie ORDER BY vtrespecie ASC";
    $res_cat = $conn->query($sql_cat);  
    $row_cat = $res_cat->fetch_assoc();

 do { 
  
    $especie = $row_cat["vtrespecie"];
    $vtrqnt = $row_cat["vtrqnt"];

;?>

<div class="list-group list-group-flush">
  <a href="<?=$param1.$param4.$especie;?>" class="list-group-item list-group-item-action"> 
    <div class="d-flex justify-content-between">
      <h6><?=$especie;?></h6>
      <div class="badge bg-warning text-dark shadow my-auto"><?=$vtrqnt;?></div>
    </div>
   </a>
 </div>

<?php } while ($row_cat = $res_cat->fetch_assoc()) ; ?>

</div>
