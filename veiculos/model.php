<?php require_once "conexao.php";

  $sql = "SELECT * FROM vtr";

  $where = "";
  if(!empty($_REQUEST['vtrstatus'])) { 
      $vtrstatus = $_REQUEST['vtrstatus'];
      $where = " WHERE vtrstatus="."'$vtrstatus'";
    }

    if(!empty($_REQUEST['especie'])) { 
      $especie = $_REQUEST['especie'];
      $where = " WHERE vtrespecie='$especie'";
    }

    if(!empty($_REQUEST['vtrid'])) { 
      $vtrid = $_REQUEST['vtrid'];
      $where = " WHERE vtrid=$vtrid";
    }  

  $order_by = " ORDER BY vtrtipo ASC";
  $sql .= $where.$order_by;
  $res = $conn->query($sql);



if(isset($_POST['envia'])) {

    $vtrid = $_POST["vtrid"];
    $pref = $_POST["vtrpref"];
    $tipo = $_POST["vtrtipo"];
    $marcamod = $_POST["vtrmarcamod"];
    $ano = $_POST["vtrano"];
    $status = $_POST["vtrstatus"];
    $placa = $_POST["vtrplaca"];
    $chassi = $_POST["vtrchassi"];
    $renavan = $_POST["vtrrenavan"];
    $combustivel = $_POST["vtrcombustivel"];
    $pneu = $_POST["vtrpneu"];
    $outros = $_POST["vtroutros"];
    $valoratualtgr = $_POST["vtrvaloratualtgr"];
    $especie = $_POST["vtrespecie"];
    $classe = $_POST["vtrclasse"];

    $sql = "INSERT INTO vtr (
                              vtrpref, 
                              vtrtipo,
                              vtrmarcamod, 
                              vtrano, 
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
                                  '$ano', 
                                  '$placa', 
                                  '$chassi', 
                                  '$renavan', 
                                  '$combustivel', 
                                  '$pneu', 
                                  '$outros', 
                                  '$valoratualtgr', 
                                  '$especie', 
                                  '$classe', 
                                  '$status'
                                )";

    if(!empty($_POST['vtrid'])) {

      $sql = "UPDATE vtr 
              SET vtrpref='$pref', 
                  vtrtipo='$tipo', 
                  vtrmarcamod='$marcamod', 
                  vtrano='$ano', 
                  vtrstatus='$status', 
                  vtrplaca = '$placa', 
                  vtrchassi = '$chassi', 
                  vtrrenavan='$renavan', 
                  vtrcombustivel='$combustivel', 
                  vtrpneu='$pneu', 
                  vtroutros='$outros', 
                  vtrvaloratualtgr='$valoratualtgr', 
                  vtrespecie='$especie', 
                  vtrclasse='$classe' 

                  WHERE vtrid=$vtrid";
        
        if ($conn->query($sql) === TRUE) {

            echo "<script>location.href='?p=veiculos'</script>";              
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            };

        };



        if ($conn->query($sql) === TRUE) {

            echo "<script>location.href='?p=veiculos'</script>";              
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            };



    };?>
