<?php
require_once 'conexao.php';

$sql = "SELECT * FROM mapas";

$order_by=" ORDER BY idmapa DESC";

$limit =" LIMIT 10";
        if(!empty($_GET['limit'])) {
        $limit = $_GET['limit'];
        $limit = " LIMIT $limit";
      }

$where = "";
        if(!empty($_GET['idmapa'])) {
          $idmapa = $_GET['idmapa'];
          $where = " WHERE idmapa = $idmapa";
        };

        if(!empty($_GET['ala'])) {
          $ala = $_GET['ala'];
          $where = " WHERE ala = '$ala'";
          $limit = "";
        };

        if(!empty($_POST['data_ini'])) {
          $data_ini = $_POST['data_ini']; $data_ini=date('Y-m-d H:i:s', strtotime($data_ini));
          $data_fim = $_POST['data_fim']; $data_fim=date('Y-m-d H:i:s', strtotime($data_fim));
          $where = " WHERE data BETWEEN '$data_ini' AND '$data_fim'";
          $limit = "";
        }
       

$sql .= $where.$order_by.$limit;

$res = $conn->query($sql);
$row = $res->fetch_assoc();

                  
$res_p = $conn->query("SELECT codmil, nomeguerra FROM pessoas WHERE pstatus = 's' ORDER BY nomeguerra ASC");

  if (!empty($_GET['idofdia'])) {    
    $idofdia = $_GET['idofdia'];
    $sql_pessoas = "SELECT img FROM pessoas WHERE codmil = $idofdia";
    $result_pessoas = $conn->query($sql_pessoas);
    $row_pessoas = $result_pessoas->fetch_assoc();
    $img = $row_pessoas['img'];

      echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' width='46' height='56'>";
   };



if(!empty($_POST['acao'])) {

        $acao = $_POST['acao'];
        $ala = $_POST["ala"];
        $idofdia = $_POST["idofdia"];
        $idchefe = $_POST["idchefe"];
        $idtel1 = $_POST["idtel1"];
        $idtel2 = $_POST["idtel2"];
        $data = $_POST["data"]; 
       
    if($acao == 'insertmapa') {
        
        $sql = "INSERT INTO mapas(ala, idofdia, idchefe, idtelefonista1, idtelefonista2, data)
        VALUES ('$ala', $idofdia, $idchefe, $idtel1, $idtel2, '$data')";

          if ($conn->query($sql) === TRUE) {
            $mapa_ultimo_registro = $conn->insert_id;
            
                  echo "<script>location.href='?p=mapadet&idmapa=".$mapa_ultimo_registro."&acao=ins'</script>";
                  echo " 
                    <div class='conteiner-fluid text-center p-2'>
                    <button class='btn btn-primary' disabled>
                    <span class='spinner-border spinner-border-sm'></span>
                    Carregando... 
                    </button>
                    </div>
                    ";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
                exit;




    }

     if($acao == 'updatemapa') {
        $idmapa = $_POST['idmapa'];
        $sql = "UPDATE mapas SET ala='$ala', idofdia=$idofdia, idchefe=$idchefe, idtelefonista1=$idtelefonista1,  idtelefonista2=$idtelefonista2, data='$data' WHERE idmapa=$idmapa";
                    echo " 
                    <div class='conteiner-fluid text-center p-2'>
                    <button class='btn btn-primary' disabled>
                    <span class='spinner-border spinner-border-sm'></span>
                    Carregando... 
                    </button>
                    </div>
                    ";
          if ($conn->query($sql) === TRUE) {
                
                  echo "<script>location.href='?p=mapa&idmapa=".$idmapa."'</script>";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }

    }



}
    
 ;?>