
<?php 
include_once "../templates/header.php";
include "model.php" 
;?>

</nav>
</div> 

<div class="col-sm">
      <div class="row">
    <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">

          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="/pessoas"><i class="fas fa-home"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#insert"><i class="fa fa-plus-circle"></i> Adicionar</a>
            </li>
          </ul>

          <ul class="navbar-nav me-auto">

            <li class="nav-item me-2">
                <span class="btn btn-light">Número de militares ativos: <b><?=mysqli_num_rows($result_pessoas)?></b></span>
            </li>
          </ul>
          
            <form action="" method="POST" class="row text-center">
              <div class="d-flex">
              <input class="form-control" type="text" placeholder="Pesquisar pessoas"  name="search_text" id="search_text">
              </div>
            </form>
          

        </div>
      </div>
    </nav>
  </div>
<?php 
echo "<div id='result'></div>";
include 'insert.php';
include '../templates/footer.php';

?>

<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"card.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>