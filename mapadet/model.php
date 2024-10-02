<?php
    
    include_once 'conexao.php';

    $idmapa = $_GET['idmapa'];
    $res = $conn->query("SELECT * FROM mapas WHERE idmapa = $idmapa");
    $row = $res->fetch_assoc();

    switch ($row['ala']) {
      case 'Alpha':
        $alaimg = 'alpha.jpeg';
        break;
      case 'Bravo':
        $alaimg = 'bravo.jpeg';
        break;
      case 'Charlie':
        $alaimg = 'charlie.jpeg';
        break;
      case 'Delta':
        $alaimg = 'delta.jpeg';
        break;
    }

    $ala = $row['ala'];
    $idofdia = $row['idofdia'];
    $idchefe = $row['idchefe'];
    $idtelefonista1 = $row['idtelefonista1'];
    $idtelefonista2 = $row['idtelefonista2'];
    $data = date('d/m/Y', strtotime($row['data']));

              // OFICIAL DE DIA

              $res_ofdia = $conn->query("SELECT * FROM pessoas WHERE codmil=$idofdia");
              $row_ofdia = $res_ofdia->fetch_assoc();
              $ofdia_grad =  $row_ofdia['grad'];
              $ofdia_nome =  $row_ofdia['nome'];
              $ofdia_img = $row_ofdia['img'];
              $ofdia_rg = $row_ofdia['rg'];

              // OFICIAL DE DIA

              $res_chefe = $conn->query("SELECT * FROM pessoas WHERE codmil=$idchefe");
              $row_chefe = $res_chefe->fetch_assoc();
              $chefe_grad =  $row_chefe['grad'];
              $chefe_nome =  $row_chefe['nome'];
              $chefe_img = $row_chefe['img'];
              $chefe_rg = $row_chefe['rg'];

              // VIDEOFONISTA DIURNO

              $res_tel1 = $conn->query("SELECT * FROM pessoas WHERE codmil=$idtelefonista1");
              $row_tel1 = $res_tel1->fetch_assoc();
              $tel1_grad =  $row_tel1['grad'];
              $tel1_nome =  $row_tel1['nome'];
              $tel1_img = $row_tel1['img'];
              $tel1_rg = $row_tel1['rg'];

              // VIDEOFONISTA NOTURNO

              $res_tel2 = $conn->query("SELECT * FROM pessoas WHERE codmil=$idtelefonista2");
              $row_tel2 = $res_tel2->fetch_assoc();
              $tel2_grad =  $row_tel2['grad'];
              $tel2_nome =  $row_tel2['nome'];
              $tel2_img = $row_tel2['img'];
              $tel2_rg = $row_tel2['rg'];


if (!empty($_POST['idmapa'])) {  

    $idmapa = $_POST['idmapa'];
    $idvtr = $_POST["idvtr"];
    $idpessoa = $_POST["pessoa"];
    $odomsaida = $_POST["odomsaida"];
    $odomentr = $_POST["odomentr"];
    $horasaida = $_POST["horasaida"];
    $horaentr = $_POST["horaentr"];
    $destino = $_POST["destino"];
    $status = $_POST["status"];
    $obs = $_POST["obs"];
    $num_rai = $_POST["num_rai"];

    $sql = "INSERT INTO detmapa(idmapa, idvtr, idpessoa, odomsaida, odomentr, horasaida, horaentr, destino, detmp_status, obs, num_rai)
    VALUES ($idmapa, $idvtr, $idpessoa, $odomsaida, $odomentr, '$horasaida', '$horaentr', '$destino', '$status','$obs', $num_rai)";

      if(!empty($_POST['iddetmp'])) {
        
        $iddetmp = $_POST['iddetmp'];
        $sql = "UPDATE detmapa SET idmapa = $idmapa, idvtr = $idvtr, idpessoa = $idpessoa, odomsaida = $odomsaida, odomentr = $odomentr, horasaida = '$horasaida', horaentr = '$horaentr', destino = '$destino',  detmp_status = '$status', obs = '$obs', num_rai = $num_rai WHERE iddetmp = $iddetmp";

        if ($conn->query($sql) === TRUE) { 

          echo "
            <script>
            location.href='?p=mapadet&idmapa=".$idmapa."&idvtr=".$idvtr."&iddetmp=".$iddetmp."&alert=edit';
            </script>
            ";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

      ;}

    if ($conn->query($sql) === TRUE) { 

      $iddetmp = $conn->insert_id;
      echo " 

            <script>
            location.href='?p=mapadet&idmapa=".$idmapa."&idvtr=".$idvtr."&iddetmp=".$iddetmp."&alert=ins'
            </script>

          ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

;}

;?>