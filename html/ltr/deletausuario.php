<?php
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');
include ('/xampp/htdocs/Codigos/matrix/config/protect.php');

$dados = $_GET;

$conn = new mysqli(HOST, USER, PASS, BASE);


    $id      = (int) $_GET['id'];
    $result1 = "DELETE FROM usuarios WHERE id='{$id}'";

    $result = mysqli_query($conn, $result1);

    header('Location:usuarios.php');
?>