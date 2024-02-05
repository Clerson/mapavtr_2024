<?php
require 'conexao.php';
$sqlFile = 'mapavtr.sql';

try {
    // Conexão com o banco de dados usando a extensão PDO
    $dsn = "mysql:host=$servername;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);
    
    // Configurações para importação
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Leitura do arquivo SQL
    $sql = file_get_contents($sqlFile);
    
    // Execução do arquivo SQL
    $pdo->exec($sql);
    
    echo 'Importação concluída com sucesso!';
} catch (PDOException $e) {
    die('Erro ao importar o arquivo SQL: ' . $e->getMessage());
}
?>



