<?php
session_start();
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'serviaqp';
try {
    $conn_sesi = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
}

if (isset($_SESSION['user_id'])) {
    $records = $conn_sesi->prepare('SELECT UsuID, UsuCor, UsuCon, UsuRolID, UsuNom, UsuEst FROM usuario WHERE UsuID = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;
    if (count($results) > 0) {
        $user = $results;
    }
}
if(isset($recurso)){
    include("data_base.php");
    include("acl.php");
    $a=comprobar($conn,$recurso,$user);
    if($a["estado"]==0){
        $redireccion ="Location: /ServiAQP/error/?mensaje=".$a["mensaje"];
        header($redireccion);
    }
}
?>
