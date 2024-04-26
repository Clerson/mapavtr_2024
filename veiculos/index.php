<?php require_once 'model.php';?>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">

          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="?p=veiculos" class="nav-link  btn btn-info shadow m-1"><i class='fas fa-home'></i> INÍCIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-info shadow m-1" href="#" data-bs-toggle="modal" data-bs-target="#form_insert"><i class="fa fa-plus-circle"></i> NOVO VEÍCULO</a>
            </li>
          </ul>

          <ul class="navbar-nav">
           <li class="nav-item">
              <?php
              $res_status = $conn->query("SELECT vtrstatus, count(*) AS qnt FROM vtr GROUP BY vtrstatus");
              $row_status = $res_status->fetch_assoc();

              if($res_status->num_rows > 0) { 

                 do { ?>
                  
                    <a href="?p=veiculos&vtrstatus=<?=$row_status['vtrstatus'];?>">
                      <span class="badge rounded-pill bg-info text-dark"><?=$row_status['vtrstatus'];?> 
                      <span class="badge bg-primary"><?=$row_status['qnt'];?></span></span>
                    </a>
                  
                <?php } while ($row_status = $res_status->fetch_assoc()); }; ?>
              </li>
            </ul>

          <div class="d-flex">
            <form action="?p=veiculos" method="POST" class="d-flex gx-1 gy-1 my-auto">
            <select class='form-select shadow-sm mx-1' name="vtrid" id='search_text'>
              <option value=''> Selecione viatura</option>
              <?php
                require_once 'conexao.php';
                $sql = "SELECT vtrid, vtrimg, vtrtipo FROM vtr WHERE vtrstatus='ativa' ORDER BY vtrtipo ASC";
                $res = $conn->query($sql);
                $row = $res->fetch_assoc();
                
                do { ?> 
                <option value='<?=$row['vtrid']?>'><?=$row['vtrtipo']?></option>
                <?php } while ($row=$res->fetch_assoc()) ?>
            </select>
            <input type="submit"  class="btn btn-primary mt-2" value="Enviar" name="submit">
          </form>
        </div>
        </div>
      </div>
    </nav>
  </div>


<div class="row" >

    <?php 
  
      include 'categ.php';

      include 'card.php';
        
    ?>

 </div>   

<?php include_once '_form_insert.php';?>
