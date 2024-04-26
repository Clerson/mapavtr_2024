  <?php 

  require_once "conexao.php";

  $sql = "SELECT * FROM vtr";
  $where = "";
  if(!empty($_REQUEST['vtrstatus'])) { 
      $vtrstatus = $_REQUEST['vtrstatus'];
      $where = " WHERE vtrstatus="."'$vtrstatus'";
    }

    if(!empty($_REQUEST['idvtr'])) { 
      $idvtr = $_REQUEST['idvtr'];
      $where = " WHERE vtrid=$idvtr";
    } 

  $order_by = " ORDER BY vtrtipo ASC";
  $sql .= $where.$order_by;
  $res = $conn->query($sql);