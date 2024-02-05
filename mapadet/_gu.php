<div class="form-floating">
          
          <a href="#demo" class="btn btn-secondary" data-bs-toggle="collapse">Guarnição empenhada</a>
          
          <div id="demo" class="collapse">
            <?php
            if ($res_guc->num_rows > 0) {

              $row_guc = $res_guc->fetch_assoc();
               echo "Ocorrência atendida por: ";
              do {
              $grad_guc = $row_guc["grad"];
              $nomeguerra_guc = $row_guc["nomeguerra"];
              $rg_guc = $row_guc["rg"];

              echo $grad_guc." ".$nomeguerra_guc." // ";

               } while ($row_guc = $res_guc->fetch_assoc()); 

            } else echo "<span>Nenhuma Guarnição inserida!</span>" ; ?>





<div class="row m-2">
        
            <?php
              $res_guc = $conn->query("
                                      SELECT
                                      detmp_id,
                                      codmil, 
                                      nomeguerra, 
                                      grad,
                                      rg, 
                                      img
                                      FROM gu, pessoas
                                      WHERE detmp_id = $iddetmp
                                      AND pes_id = codmil 
                                    ");

              if ($res_guc->num_rows > 0) {
                $row_guc = $res_guc->fetch_assoc();

                do {

                $idpessoa = $row_guc["codmil"];
                $img = $row_guc["img"] ?? "thumb.jpg";
                $grad = $row_guc["grad"];
                $nomeguerra = $row_guc["nomeguerra"];
                $rg = $row_guc["rg"];

              ;?>


              <div class='container1 col-sm-1 m-0 shadow-sm rounded-3'>
                <a href='#' data-bs-toggle="modal" data-bs-target="#gu_ins">
                  <img class="image"  src="../pessoas/pessoas_img/<?=$img;?>" alt="Card image">
                  <div class="middle">
                    <div class="vtrtitle"><?=$grad."<b> ".$nomeguerra." <br/>".$rg;?></b></div>
                  </div>
                </a>  
              </div>

            <?php } while($row_guc = $res_guc->fetch_assoc());

            } ;?>

</div> <!-- Fim da row -->

<div class="row">
      <form action='model.php?acao=gu' method='POST' class='row gx-2 gy-2 text-center'>
          <div class="form-floating p-0 col-sm-1" id="pes_img"></div>
          <div class='form-floating' id="pes_id">
            <select class='form-select' name='pes_id' id="pes_id" onchange="mudarFotoGuarnicao(this.value)" required>
              <?php 
                  $res_p = $conn->query(
                                          "
                                          SELECT 
                                          codmil, 
                                          nomeguerra
                                          FROM pessoas 
                                          WHERE pstatus = 's' 
                                          ORDER BY nomeguerra ASC
                                          "
                                        );
                  $row_p = $res_p->fetch_assoc();

                   do { ?>
                    <option value="<?=$row_p['codmil'];?>">
                      <?=$row_p['nomeguerra'];?>
                    </option>  
                  <?php } while ($row_p = $res_p->fetch_assoc());
                ?>
            </select>
            <label for='pes_id' class='form-label'>Componente:</label>
          </div>

          <input type='text' name='mapa_id' value='<?=$idmapa;?>' hidden>
          <input type='text' name='detmp_id' value='<?=$iddetmp;?>' hidden>
          <input type='text' name='idvtr' value='<?=$idvtr;?>' hidden>

        <div class="form-floating ">
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
</div>

          </div>

        </div>