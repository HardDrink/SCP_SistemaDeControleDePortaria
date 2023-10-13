<?php
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');

$conn = new mysqli(HOST, USER, PASS, BASE);

if (isset($_GET['enviar']))
$id_visita = $_GET['id_visita'];

$sql = "UPDATE portaria_visita SET `saida`=NOW() WHERE id_visita='$id_visita'";

$result = mysqli_query($conn, $sql);

if ($result) {
    $retorna = ['status'=> false, 'msg' => "Error: Não Foi Possivel Realizar A Saída!"];
}else {
    $retorna = ['status'=> true, 'msg' => "Saída Realizada Com Sucesso!"];
}

echo json_decode($result);

?>
