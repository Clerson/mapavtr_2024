<div class="col-sm m-1 p-0" id="result">

<div class="row gx-1 gy-1">

<?php include 'model.php';

 if ($result_pessoas->num_rows > 0) { 

  $row_pessoas = $result_pessoas->fetch_assoc();

    do { 

        $codmil = $row_pessoas["codmil"];
        $grad = $row_pessoas["grad"];
        $rg = $row_pessoas["rg"];
        $nomeguerra = $row_pessoas["nomeguerra"];
        $nome = $row_pessoas["nome"];
        $contato = $row_pessoas["contato"];
        $img = $row_pessoas["img"];
        $pstatus = $row_pessoas["pstatus"];

    
    ?>

    <div class='container1 shadow rounded-3'>
      <a href='#' data-bs-toggle="modal" data-bs-target="#updatepessoa<?=$codmil?>">
        <img class="image"  src="pessoas/pessoas_img/<?=$img;?>" alt="Card image">
        <div class="middle">
          <div class="vtrtitle"><?=$grad."<b> ".$nomeguerra." <br/>".$rg;?></b></div>
        </div>
      </a>  
    </div>


<?php 

include '_form_update.php';

include '_form_delete.php';

} while ($row_pessoas = $result_pessoas->fetch_assoc()); 

};?>

  </div>
  
</div>