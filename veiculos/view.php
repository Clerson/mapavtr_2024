<?php 

  $vtrid = $_GET['idvtr'];
  $sql = "SELECT *
          FROM vtr
          LEFT JOIN detmapa
          ON vtr.vtrid = detmapa.idvtr 
          WHERE vtrid = $vtrid
          ";

  $res = $conn->query($sql);
  $row = $res->fetch_assoc();

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
  $odomatual = $row["odomentr"];
  $outros = $row["vtroutros"];
  $valoratualtgr = $row["vtrvaloratualtgr"];
  $especie = $row["vtrespecie"];
  $classe = $row["vtrclasse"];

?>
<div class="row my-1">
  <div class="col-sm">

    <div class="card">
      <div class="card-header">
       <h5>#ID: <?=$vtrid ;?> / <?=$tipo ;?></h5>
      </div>
      <div class="card-body">
        <div class="table-responsive-sm">
          <table class="table">
            <tr>
              <td colspan="6">
                 <img src='../veiculos/vtrimg/<?=$img;?>' width="100" height="100" class="rounded-circle" >
              </td>
            </tr>

              <tr>
                <td>
                  PREFIXO: <?=$pref;?>
                </td>

                <td>
                  MARCA/MODELO: <?=$marcamod;?>
                </td>

                <td>
                  ANO: <?=$ano;?>
                </td>
              </tr>

              <tr>
 
                <td>
                  PLACA: <?=$placa;?>
                </td>
 
                <td>
                  CHASSI: <?=$chassi;?>
                </td>
 
                <td>
                  RENAVAN: <?=$renavan;?>
                </td>
              </tr>

              <tr>

                <td>
                  COMBUSTÍVEL: <?=$combustivel;?>
                </td>

                <td>
                   PNEU: <?=$pneu;?>
                </td>

                <td>
                  ODOMETRO(KM): <?=$odomatual;?>
                </td>
              </tr>

              <tr>

                <td>
                  VALOR TGR(R$): <?=$valoratualtgr;?>
                </td>

                <td>
                  ESPÉCIE: <?=$especie;?>
                </td>

                <td>
                  CLASSE: <?=$classe;?>
                </td>
              </tr>
              
              <tr>

                <td>
                  STATUS: <?=$status;?>
                </td>
                
                <td colspan="4">
                  OUTROS: <?=$outros;?>
                </td>
              </tr>

          </table>
        </div>
      </div>

        <div class="card-footer">
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?=$vtrid;?>">Editar</button>
        </div>
      </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal<?=$vtrid;?>">
  <div class="modal-dialog  modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><?=$tipo;?></h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <?php include_once 'form.php';?>
      </div>

    </div>
  </div>
</div>