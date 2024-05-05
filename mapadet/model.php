<?php
    
    include_once 'conexao.php';

    $idmapa = $_GET['idmapa'];
      
    $sql = "SELECT * FROM mapas WHERE idmapa = $idmapa";
    $res = $conn->query($sql);
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
            window.alert('Registro SALVO com sucesso!')
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
            window.alert('Registro INCLUÍDO com sucesso!');
            location.href='?p=mapadet&idmapa=".$idmapa."&idvtr=".$idvtr."&iddetmp=".$iddetmp."&alert=ins'
            </script>

          ";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

;}

;?>