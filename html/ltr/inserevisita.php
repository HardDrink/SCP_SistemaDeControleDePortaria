<?php
include ('/xampp/htdocs/Codigos/matrix/config/protect.php');
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');
$conn = new mysqli(HOST, USER, PASS, BASE);

$hoje= date('d/m/Y H:i');

if(isset($_POST['realizar-entrada'])){

    $id_pessoa    = $_POST['id_pessoa'];
    $nome         = $_POST['nome'];
    $cpf          = $_POST['cpf'];
    $rg           = $_POST['rg'];
    $cnh          = $_POST['cnh'];
    $placa_cavalo = $_POST['placa_cavalo'];
    $placa_1      = $_POST['placa_1'];
    $placa_2      = $_POST['placa_1'];
    $veiculo      = $_POST['veiculo'];
    $empresa      = $_POST['empresa'];
    $visitado     = $_POST['visitado'];
    $setor        = $_POST['setor'];
    $operacao     = $_POST['operacao'];
    $observacao   = $_POST['observacao'];
    $entrada = date('d/m/Y H:i');



$sql = "INSERT INTO portaria_visita (`id_pessoa`, `nome_visita`, `cpf_visita`, `rg_visita`, `cnh_visita`, `placa_cavalo`,
                                    `placa_1`, `placa_2`, `veiculo`, `empresa`, `entrada`, `visitado`, `setor`, `operacao`,
                                    `observacao`) VALUES ('$id_pessoa', '$nome', '$cpf', '$rg', '$cnh', '$placa_cavalo', '$placa_1',
                                    '$placa_2', '$veiculo', '$empresa','$entrada', '$visitado', '$setor', '$operacao', '$observacao')";


    if($result = mysqli_query($conn, $sql)){
        echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Entrada do Visitante $nome Foi Feita Com Sucesso!!!.</h4>. <br>";
    }else
    {
        echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Deu Ruim A Entrada!!!</h4>. <br>";
    }
    
}



?>
