<?php 

require_once "../conexao.php";

if(isset($_POST['envia'])) {

    $vtrid = $_POST["vtrid"];
    $pref = $_POST["vtrpref"];
    $tipo = $_POST["vtrtipo"];
    $marcamod = $_POST["vtrmarcamod"];
    $ano = $_POST["vtrano"];
    $status = $_POST["vtrstatus"];
    $img = $_POST["vtrimg"];
    $placa = $_POST["vtrplaca"];
    $chassi = $_POST["vtrchassi"];
    $renavan = $_POST["vtrrenavan"];
    $combustivel = $_POST["vtrcombustivel"];
    $pneu = $_POST["vtrpneu"];
    $odomatual = $_POST["vtrodomatual"];
    $outros = $_POST["vtroutros"];
    $valoratualtgr = $_POST["vtrvaloratualtgr"];
    $especie = $_POST["vtrespecie"];
    $classe = $_POST["vtrclasse"];

    $sql = "INSERT INTO vtr (
                              vtrpref, 
                              vtrtipo,
                              vtrmarcamod, 
                              vtrano, 
                              vtrstatus, 
                              vtrplaca, 
                              vtrchassi, 
                              vtrrenavan, 
                              vtrcombustivel, 
                              vtrpneu, 
                              vtroutros, 
                              vtrvaloratualtgr, 
                              vtrespecie, 
                              vtrclasse, 
                              vtrstatus
                              )
                                VALUES (
                                  '$pref', 
                                  '$tipo', 
                                  '$marcamod', 
                                  $ano, 
                                  '$status', 
                                  '$placa', 
                                  '$chassi', 
                                  '$renavan', 
                                  '$combustivel', 
                                  '$pneu', 
                                  '$outros', 
                                  $valoratualtgr, 
                                  '$especie', 
                                  '$classe', 
                                  '$status'
                                )";

        if ($conn->query($sql) === TRUE) {

        $id_inserido = $conn->insert_id;      

      echo "<script>location.href='index.php'</script>";              
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            };

    if($_POST['vtrid'] > 0) {


      $sql = "UPDATE vtr SET vtrpref='$pref', vtrtipo='$tipo', vtrmarcamod='$marcamod', vtrano='$ano', vtrstatus='$status', vtrplaca = '$placa', vtrchassi = '$chassi', vtrrenavan='$renavan', vtrcombustivel='$combustivel', vtrpneu='$pneu', vtroutros='$outros', vtrvaloratualtgr=$valoratualtgr, vtrespecie='$especie', vtrclasse='$classe' WHERE vtrid=$vtrid";
        
        if ($conn->query($sql) === TRUE) {

      echo "<script>location.href='index.php?vtrid=<?=$vtrid;?>'</script>";              
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            };

        };

    };?>
