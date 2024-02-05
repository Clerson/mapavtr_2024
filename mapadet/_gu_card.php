
<!-- INICIO MODAL -->

<div class="modal fade" id="gu">
  <div class="modal-dialog" >
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header bg-info">
        <h4 class="modal-title">Componentes da Guarnição</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">

        <div class="row">
          <div class="col-sm">
        
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


              <div class='container1 col-sm-2 m-0 shadow-sm rounded-3'>
                <a href='#' data-bs-toggle="modal" data-bs-target="#gu_ins">
                  <img class="image"  src="../pessoas/pessoas_img/<?=$img;?>" alt="Card image">
                  <div class="middle">
                    <div class="vtrtitle"><?=$grad."<b> ".$nomeguerra." <br/>".$rg;?></b></div>
                  </div>
                </a>  
              </div>

            <?php } while($row_guc = $res_guc->fetch_assoc());

            } else echo '<h3>Nenhuma Guarnição inserida!</h3>' ;?>

          </div> <!-- Fim da col-sm -->
        </div> <!-- Fim da row -->

<div class="row">
  <div class="col-sm">
      <form action='model.php?acao=gu' method='POST' class='row gx-2 gy-2 text-center'>
          <div class="form-floating col-sm-2" id="pes_img">
          </div>
          <div class='form-floating col-sm' id="pes_id">
            <select class='form-select' name='pes_id' onchange="mudarFotoGuarnicao(this.value)" required>
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
            <label for='pes_id' class='form-label'>Motorista:</label>
          </div>

          <input type='text' name='mapa_id' value='<?=$idmapa;?>' hidden>
          <input type='text' name='detmp_id' value='<?=$iddetmp;?>' hidden>
          <input type='text' name='idvtr' value='<?=$idvtr;?>' hidden>


        <div class="form-floating col-sm-2">
          <button type="submit" class="btn btn-success">Enviar</button>
        </div>
      </form>
  </div> <!-- Fim da col-sm -->
</div> <!-- Fim da row -->

      </div> <!-- modal-body -->

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
      </div> <!-- modal-footer -->
    </div><!-- modal-content -->
  </div><!-- modal-dialog -->
</div><!-- modal -->


<script>
    function mudarFotoGuarnicao(str) {
  if (str == "") {
    document.getElementById("pes_img").innerHTML = "";
    return;
  }
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("pes_img").innerHTML = this.responseText;
  }
  xhttp.open("GET", "buscas.php?pes_id="+str);
  xhttp.send();
};
</script>