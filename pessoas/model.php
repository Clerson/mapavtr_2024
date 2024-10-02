<?php
    include_once 'conexao.php';

   $sql_pessoas = "SELECT * FROM pessoas";
   $where = "  WHERE pstatus = 's'";
   $order_by = "";

   if (!empty($_POST['query'])) {
      $search = mysqli_real_escape_string($conn, $_POST["query"]);
      $where = " WHERE nome LIKE '%$search%' OR rg LIKE '%$search%'";
    };

    if(!empty($_GET['grad'])) { 
      $grad = $_GET['grad'];
      $where = " WHERE grad='$grad'";
    } 
            
   if (!empty($_GET['iddetmp'])) {
      $iddetmp = $_GET['iddetmp'];
      $sql_pessoas = "SELECT codmil, nomeguerra FROM pessoas, detmapa WHERE iddetmp=$iddetmp AND idpessoa = codmil";
    }

    if(!empty($_GET['pstatus'])) { 
      $pstatus = $_GET['pstatus'];
      $where = " WHERE pstatus='$pstatus'";
    } 

    $sql_pessoas .= $where.$order_by;
    $result_pessoas = $conn->query($sql_pessoas);
      
if (isset($_POST['acao'])) {

    $grad = $_POST["grad"];
    $rg = $_POST["rg"];
    $nomeguerra = $_POST["nomeguerra"];
    $nome = $_POST["nome"];
    $contato = $_POST["contato"];
    $pstatus = $_POST["pstatus"];

    if ($_POST['acao'] == "pessoasinsert") {


      $sql = "INSERT INTO pessoas (grad, rg, nomeguerra, nome, contato, pstatus)
      VALUES ('$grad', '$rg', '$nomeguerra', '$nome', '$contato', '$pstatus')";

   }

    if ($_POST['acao'] == "pessoasupdate") {

    $codmil = $_POST['codmil'];

    $sql = "UPDATE pessoas SET grad='$grad', rg='$rg', nomeguerra='$nomeguerra', nome='$nome', contato='$contato', pstatus='$pstatus' WHERE codmil=$codmil";

    }


    if ($conn->query($sql) === TRUE) {
      echo "<script>location.href='?p=pessoas'</script>";
    } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

}

if(!empty($_GET['delete'])) {

    $codmil = $_GET['delete'];

     $sql_delete = "DELETE FROM pessoas WHERE codmil=$codmil";

     if ($conn->query($sql_delete) === TRUE) {            

        echo " 
            <div class='conteiner-fluid text-center p-2'>
            <button class='btn btn-primary' disabled>
            <span class='spinner-border spinner-border-sm'></span>
            Carregando... 
            </button>
            </div>
            ";
        echo "
        <script>location.href='/pessoas'</script>";
      } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
      } exit();
    
    } // FIM DA if(($acao) == 'delete')



;?>