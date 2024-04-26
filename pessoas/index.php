<?php include "model.php" ;?>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">

                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                      <a href="?p=pessoas" class="nav-link  btn btn-info shadow m-1"><i class='fas fa-home'></i> INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link btn btn-info m-1"  data-bs-toggle="modal" data-bs-target="#insert"><i class="fas fa-plus-circle"></i> NOVO MILITAR</a>
                    </li>
                </ul>
                
                <div class="list-group list-group-flush me-auto">
                  <a href="#" class="list-group-item list-group-item-action m-1">
                    <div class="d-flex justify-content-between m-auto">
                      Número de militares ativos: <b><?=mysqli_num_rows($result_pessoas)?></b>
                    </div>
                  </a>
                </div>

                <ul class="navbar-nav">
                   <li class="nav-item">
                      <?php
                      $res_status = $conn->query("SELECT pstatus, COUNT(*) AS qnt FROM pessoas GROUP BY pstatus");
                      $row_status = $res_status->fetch_assoc();

                      if($res_status->num_rows > 0) { 

                        do {

                        switch ($row_status['pstatus']) {
                            case 's': $pstatus = "ATIVO"; break;
                            case 'n': $pstatus = "INATIVO"; break;
                        }

                          ?>
                          
                            <a href="?p=pessoas&pstatus=<?=$row_status['pstatus'];?>">
                              <span class="badge rounded-pill bg-info text-dark"><?=$pstatus;?> 
                              <span class="badge bg-primary"><?=$row_status['qnt'];?></span></span>
                            </a>
                          
                        <?php } while ($row_status = $res_status->fetch_assoc()); }; ?>
                  </li>
                </ul>
                
            </div>
        </div>
    </nav>
  </div>

<div class="row">

    <?php 
  
      include 'categ.php';

      include 'card.php';
        
    ?>

 </div> 

<?php include 'insert.php';?>