 <?php
   require_once "../conexao.php";
 
  if(isset($_GET['idvtr'])) {

    $idvtr = $_GET['idvtr'];
    $sql_detmapa = "SELECT odomentr, iddetmp FROM detmapa WHERE idvtr=$idvtr ORDER BY iddetmp DESC LIMIT 1";
    $res_detmapa = $conn->query($sql_detmapa);;  
    $row_detmapa = $res_detmapa->fetch_assoc(); 
     if (mysqli_num_rows($res_detmapa) > 0 ) { // Se o número de registros selecionados for maior que 0
          $odomentr = $row_detmapa['odomentr']; } // a variavel $odomentr recebe o valor do registro
          else { $odomentr = 0; } // se não a variável recebe o valor 0.
     echo "
            <span class='input-group-text'><i class='fas fa-tachometer-alt'></i></span>
            <span class='input-group-text'>KM saída:</span>
            <input type='number' class='form-control' name='odomsaida' value='".$odomentr."' >
            <input type='number' class='form-control rounded-end' style='color:gray' name='odomentr' value='".$odomentr."' hidden>
          ";
  };


// mostra foto do motorista
  if (!empty($_GET['codmil'])) {    
    $codmil = $_GET['codmil'];
    $sql_pessoas = "SELECT img FROM pessoas WHERE codmil = $codmil";
    $res_pessoas = $conn->query($sql_pessoas);
    $row_pessoas = $res_pessoas->fetch_assoc();
    $img = $row_pessoas['img'];

      echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' width='46' height='56'>";
   };

// mostra foto da guanição
   if (!empty($_GET['pes_id'])) {
     $pes_id = $_GET['pes_id'];
     $sql_pessoas = "SELECT codmil, img FROM pessoas WHERE codmil = $pes_id";
     $res_pessoas = $conn->query($sql_pessoas);
     $row_pessoas = $res_pessoas->fetch_assoc();
     $img = $row_pessoas['img'];

       echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' width='46' height='56'>";
    };

//mostra foto da vtr
  if (!empty($_GET['id'])) {
      
    $id = $_GET['id'];
    $sql = "SELECT vtrimg, vtrtipo FROM vtr WHERE vtrid = $id";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $img = $row['vtrimg'];
    $tipo = $row['vtrtipo']; 
    echo "<img src='../veiculos/vtrimg/$img' alt='$tipo' width='52' height='58'>";   
  };




?>