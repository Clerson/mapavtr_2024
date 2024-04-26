  
  <div class="col-sm-2 p-0">

    <?php require_once "conexao.php";
      
    $sql_cat = "SELECT grad, COUNT(*) AS gradqnt FROM pessoas GROUP BY grad";
    $res_cat = $conn->query($sql_cat);  
    $row_cat = $res_cat->fetch_assoc();

 do { 
  
    $grad = $row_cat["grad"];
    $gradqnt = $row_cat["gradqnt"];

;?>

<div class="list-group list-group-flush">
  <a href="?p=pessoas&grad=<?=$grad;?>" class="list-group-item list-group-item-action"> 
    <div class="d-flex justify-content-between">
      <h6><?=$grad;?></h6>
      <div class="badge bg-warning text-dark shadow my-auto"><?=$gradqnt;?></div>
    </div>
   </a>
 </div>

<?php } while ($row_cat = $res_cat->fetch_assoc()) ; ?>

</div>
