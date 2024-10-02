<?php 

if(isset($_POST['envia'])) {

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

    if($_POST['envia'] == 'insert') {


  //    if($tipo != $row_vtrtipo) { VERIFICA SE HÁ DUPLICIDADE NO CAMPO 'vtrtipo' 


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

      if ($conn->query($sql) === TRUE) {

        $vtrid = $conn->insert_id;

        echo "<script>
                window.alert('Registro INCLUÍDO com sucesso!');
                location.href='".$param1.$param2.$vtrid."'
              </script>";              
        } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                };
      
    }; // fim da INSERT

              
    if($_POST['envia'] == 'update') {

      $vtrid = $_POST["vtrid"];
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

          echo "<script>
                  window.alert('Registro ALTERADO com sucesso!');
                  location.href='".$param1.$param2.$vtrid."'
                </script>";              
          } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  };

    }; // fim de UPDATE


} // FIM DE ENVIA

    

      

if(!empty($_POST['enviaimg'])) {

              $vtrid = $_POST['vtrid'];
              $vtrimg = $_FILES["fileToUpload"]["name"]; 

              $sql = "UPDATE vtr SET vtrimg = '$vtrimg' WHERE vtrid=$vtrid";
              mysqli_query($conn, $sql) or die(mysqli_error());


                $target_dir = $uri_img;
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                  if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                  } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                  }
                }

                // Check if file already exists
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                  echo "<script>
                          window.alert('O arquivo não foi carregado com sucesso!');
                          location.href='".$param1.$param2.$vtrid."'
                        </script>";
                // if everything is ok, try to upload file
                } else {
                  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
                } 

                if (mysqli_query($conn, $sql)) {
                echo " window.alert('Registro ALTERADO com sucesso!');
                      location.href='".$param1.$param2.$vtrid."'";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }

            }

            ;?>
