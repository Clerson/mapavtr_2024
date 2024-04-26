<?php

   require_once "../conexao.php";

   if (!empty($_GET['idofdia'])) {    
     $idofdia = $_GET['idofdia'];
     $sql_pessoas = "SELECT img FROM pessoas WHERE codmil = $idofdia";
     $result_pessoas = $conn->query($sql_pessoas);
     $row_pessoas = $result_pessoas->fetch_assoc();
     $img = $row_pessoas['img'];

       echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' height='56'>";
    };   

   if (!empty($_GET['idChefe'])) {    
     $idChefe = $_GET['idChefe'];
     $sql_pessoas = "SELECT img FROM pessoas WHERE codmil = $idChefe";
     $result_pessoas = $conn->query($sql_pessoas);
     $row_pessoas = $result_pessoas->fetch_assoc();
     $img = $row_pessoas['img'];

       echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' width='46' height='56'>";
    };

    if (!empty($_GET['idTel1'])) {    
      $idTel1 = $_GET['idTel1'];
      $sql_pessoas = "SELECT img FROM pessoas WHERE codmil = $idTel1";
      $result_pessoas = $conn->query($sql_pessoas);
      $row_pessoas = $result_pessoas->fetch_assoc();
      $img = $row_pessoas['img'];

        echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' width='46' height='56'>";
     };

     if (!empty($_GET['idTel2'])) {    
       $idTel2 = $_GET['idTel2'];
       $sql_pessoas = "SELECT img FROM pessoas WHERE codmil = $idTel2";
       $result_pessoas = $conn->query($sql_pessoas);
       $row_pessoas = $result_pessoas->fetch_assoc();
       $img = $row_pessoas['img'];

         echo "<img src='../pessoas/pessoas_img/$img' class='rounded-2' width='46' height='56'>";
      };
