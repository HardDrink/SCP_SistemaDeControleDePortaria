<?php
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');
include ('/xampp/htdocs/Codigos/matrix/config/protect.php');

$dados = $_GET;

$conn = new mysqli(HOST, USER, PASS, BASE);


    $id_pes  = (int) $_GET['id_pes'];
    $result1 = "DELETE FROM portaria_pessoa WHERE id_pes='{$id_pes}'";

    $result = mysqli_query($conn, $result1);

    header('Location:bloqueiovisita.php');
?>