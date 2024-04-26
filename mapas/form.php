        <form action="?p=mapas" method="POST" class="row text-center gx-1 gy-1 ">
          <div class="row gx-2 gy-2 text-center">
            <div class='col-sm-4'>
              <div class="form-floating">

              <?php

              $sql = "SELECT ala FROM mapas ORDER BY idmapa DESC";
              $res = $conn->query($sql);
              $row = $res->fetch_assoc();

              switch ($row['ala']) { 
                case 'Alpha':
                  $ala = 'Bravo';
                  break;
                case 'Bravo':
                  $ala = 'Charlie';
                  break;
                case 'Charlie':
                  $ala = 'Delta';
                  break;
                case 'Delta':
                  $ala = 'Alpha';
                  break;
              }

              echo 

                "
                <div class='form-check-inline p-1'>
                  <img src='../img/$ala.jpeg' width='48' class='rounded-circle'>
                  <input type='radio' class='btn-check' id='$ala' name='ala' value='$ala' checked>
                  <label class='btn btn-outline-primary' for='$ala'>$ala</label>
                </div>
                ";
                ?>
              </div>
            </div>

            <div class='col-sm'>
              <div class="form-floating"> <!-- DATA DO SERVIÇO -->
                <input type="date" class="form-control" name="data" placeholder="Data do serviço" value="<?php echo date('Y-m-d');?>"  required>
                <label for="data">Data do serviço:</label>
              </div>
            </div>

          </div>

          <div class="row gx-1 gy-1 text-center">
            <div id="img"></div>
            <div class="form-floating col-sm"> <!-- OFICIAL DE DIA -->
              <select class="form-select" name="idofdia" onchange="mudarFotoOficialDia(this.value)">
                <option value=''> Selecione o Oficial de Dia</option>
                <?php
                  $res_p = $conn->query("SELECT codmil, nomeguerra FROM pessoas WHERE pstatus = 's' ORDER BY nomeguerra ASC");
                  $row_p = $res_p->fetch_assoc();  
                   do { ?>
                  <option value="<?=$row_p['codmil'];?>" required><?=$row_p['nomeguerra'];?></option>
                  <?php  } while($row_p = $res_p->fetch_assoc()) ;?>
              </select>
            </div>
          </div>

          <div class="row gx-1 gy-1 text-center">
            <div id="imgChefe"></div>
            <div class="form-floating col-sm"> <!-- CHEFE DO SERVIÇO DE DIA -->
              <select class="form-select" name="idchefe" onchange="mudarFotoChefe(this.value)">
                <option value=""> Selecione o Chefe de Socorro</option>
                <?php
                $res_p = $conn->query("SELECT codmil, nomeguerra FROM pessoas WHERE pstatus = 's' ORDER BY nomeguerra ASC");
                $row_p = $res_p->fetch_assoc();
                  do  { ?>
                  <option value="<?=$row_p['codmil'];?>" required><?=$row_p['nomeguerra'];?></option>
                  <?php } while($row_p = $res_p->fetch_assoc())?>
              </select>
            </div>
          </div>

          <div class="row gx-1 gy-1 text-center">
            <div id="imgTel1"></div>
            <div class="form-floating col-sm"> <!-- TELEFONISTA 1 -->
              <select class="form-select" name="idtel1" onchange="mudarFotoTel1(this.value)">
                <option value=''> Selecione o Videofonista 1</option>
                <?php
                  $res_p = $conn->query("SELECT codmil, nomeguerra FROM pessoas WHERE pstatus = 's' ORDER BY nomeguerra ASC");
                  $row_p = $res_p->fetch_assoc();
                  do { ?>
                  <option value="<?=$row_p['codmil'];?>" required><?=$row_p['nomeguerra'];?></option>
                  <?php } while($row_p = $res_p->fetch_assoc()) ?>
              </select>
            </div>
            </div>

          <div class="row gx-1 gy-1 text-center">
            <div id="imgTel2"></div>
            <div class="form-floating col-sm"> <!-- TELEFONISTA 2 -->
              <select class="form-select" name="idtel2" onchange="mudarFotoTel2(this.value)">
                <option value=''> Selecione o Videofonista 2</option>
                <?php
                  $res_p = $conn->query("SELECT codmil, nomeguerra FROM pessoas WHERE pstatus = 's' ORDER BY nomeguerra ASC");
                  $row_p = $res_p->fetch_assoc();
                  do { ?>
                  <option value="<?=$row_p['codmil'];?>" required><?=$row_p['nomeguerra'];?></option>
                  <?php } while($row_p = $res_p->fetch_assoc()) ?>
              </select>
            </div>
          </div>
              
          <div class="form-floating">
            <button type="submit" class="btn btn-primary" name="acao" value="insertmapa">Enviar</button>
          </div>
      </form>
    
