<?php require_once "conexao.php";

  $param2 = "&get_vtrid=";
  $param3 = "&get_vtrstatus=";
  $param4 = "&get_vtrespecie=";
  $param5 = "&form=";
  $uri_img = "veiculos/img/";
  $vtrstatus = $vtrespecie = "";
  
  $sql = "SELECT * FROM vtr";

  $where = "";    

  if(!empty($_REQUEST['get_vtrid'])) { 
      $vtrid = $_REQUEST['get_vtrid'];
      $where = " WHERE vtrid=$vtrid";
      $param3 .= $vtrstatus;
    }

  if(!empty($_GET['get_vtrstatus'])) { 
      $vtrstatus = $_GET['get_vtrstatus'];
      $where = " WHERE vtrstatus="."'$vtrstatus'";
      $param4 .= $vtrespecie;

    }

    if(!empty($_GET['get_vtrespecie'])) { 
      $vtrespecie = $_GET['get_vtrespecie'];
      $where = " WHERE vtrespecie='$vtrespecie'";
    }


  $order_by = " ORDER BY vtrtipo ASC";
  $sql .= $where.$order_by;
  $res = $conn->query($sql);
  $row = $res->fetch_assoc();
  $row_vtrtipo = $row["vtrtipo"];



