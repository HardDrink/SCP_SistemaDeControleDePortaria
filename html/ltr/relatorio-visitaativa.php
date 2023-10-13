<?php
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');
include ('/xampp/htdocs/Codigos/matrix/config/protect.php');
?>

<html>
<head>
<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>

<style type="text/css">
    .container {
        overflow-x: scroll;
}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Relatório Visitas Ativas</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/extra-libs/multicheck/multicheck.css">
    <link href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
</head>
</head>
<body>
<?php 

$di          = $_POST['data_inicio'];
$df          = $_POST['data_final'];
$data_inicio = $di.' 00:00:00';
$data_final  = $df.' 23:59:59';
$data_inicio = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $data_inicio);
$data_final  = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $data_final);
$setor       = $_POST['setor'];
$mes_corrente= date('m',strtotime($data_final));

switch ($mes_corrente){

case 1:  $mes = "Janeiro"; break;
case 2:  $mes = "Fevereiro"; break;
case 3:  $mes = "Março"; break;
case 4:  $mes = "Abril"; break;
case 5:  $mes = "Maio"; break;
case 6:  $mes = "Junho"; break;
case 7:  $mes = "Julho"; break;
case 8:  $mes = "Agosto"; break;
case 9:  $mes = "Setembro"; break;
case 10: $mes = "Outubro"; break;
case 11: $mes = "Novembro"; break;
case 12: $mes = "Dezembro"; break;
}



?>

<div class="card-body">
<h5 class="card-title" style="text-align: center;">Relatório de Visitas de <?php echo $di." a ".$df."<br>"; ?> a unidade CRAGEA de SJC</h5>
<br>

<div class="container">
            <table style="margin-left: -10px;" id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>Entrada</b></th>
                                                <th><b>Saída</b></th>
                                                <th><b>Nome</b></th>
                                                <th><b>CPF</b></th>
                                                <th><b>Empresa</b></th>
                                                <th><b>Placa_Cavalo</b></th>
                                                <th><b>Placa_1</b></th>
                                                <th><b>Placa_2</b></th>
                                                <th><b>Operação</b></th>
                                                <th><b>Setor</b></th>
                                                <th><b>Observação</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $conexao = new mysqli(HOST, USER, PASS, BASE);
                
                                        if($setor != '0')
                                                $sql="SELECT * FROM portaria_visita where entrada Between '$data_inicio' AND '$data_final' AND setor ='$setor' ORDER BY entrada";
                                            else
                                                $sql="SELECT * FROM portaria_visita where entrada Between '$data_inicio' AND '$data_final' ORDER BY entrada";
                                        
                                            $consulta =mysqli_query($conexao, $sql);
                                        
                                            while ($row = mysqli_fetch_assoc($consulta)) {
                                        
                                        $id_visita  = $row['id_visita'];
                                        $d1         = strtotime($row['entrada']);
                                        $d2         = strtotime($row['saida']);
                                        
                                        if($row['saida']== '0000-00-00 00:00:00'){
                                            $diferenca=" Em visita... ";
                                                $saida="---";
                                        }
                                        else{
                                            $time1     = new DateTime( $row['entrada'] );
                                            $time2     = new DateTime( $row['saida'] );
                                            $intervalo = $time1->diff( $time2 );
                                                $idt   = "{$intervalo->d}";
                                                $iho   = "{$intervalo->h}";
                                                $imi   = "{$intervalo->i}";
                                                $ise   = "{$intervalo->s}";
                                            
                                                if(strlen($iho)<2) $iho='0'.$iho;
                                                if(strlen($imi)<2) $imi='0'.$imi;
                                                if(strlen($ise)<2) $ise='0'.$ise; 
                                                $diferenca="$idt dias $iho:$imi:$ise";
                                                $saida=date("d/m/y H:i",$d2);
                                        }
                                        
                                        $data          = date("d/m/y",$d1);
                                        $entrada       = date("d/m/y H:i",$d1);
                                        $nome_visita   = $row['nome_visita'];
                                        $cpf_visita    = $row['cpf_visita'];
                                        $empresa       = $row['empresa'];
                                        $placa_cavalo  = $row['placa_cavalo'];
                                        $placa_1       = $row['placa_1'];
                                        $placa_2       = $row['placa_2'];
                                        $operacao      = $row['operacao'];
                                        $observacao    = $row['observacao'];
                                        
                                        
                                                print "<tr>";
                                                print "<td style='font-size: 14px;'>{$entrada}</td>";
                                                print "<td style='font-size: 14px;'>{$saida}</td>";
                                                print "<td style='font-size: 14px;'>{$nome_visita}</td>";
                                                print "<td style='font-size: 14px;'>{$cpf_visita}</td>";
                                                print "<td style='font-size: 14px;'>{$empresa}</td>";
                                                print "<td style='font-size: 14px;'>{$placa_cavalo}</td>";
                                                print "<td style='font-size: 14px;'>{$placa_1}</td>";
                                                print "<td style='font-size: 14px;'>{$placa_2}</td>";
                                                print "<td style='font-size: 14px;'>{$operacao}</td>";
                                                print "<td style='font-size: 14px;'>{$setor}</td>";
                                                print "<td style='font-size: 14px;'>{$observacao}</td>";
                                                print "</tr>";

                                    }
                                        
                                    $conexao->close();

                                                
                                                ?>
                                        </tbody>
                                    </table>
                                </div>
                                    
<?php
include('footer.html');

?>
<!-- footer-->
        </div>
    </div>
    <!-- querys -->
    <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
    <!-- this page js -->
    <script src="../../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../../assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
// datatable start
         $('#zero_config').DataTable();
         
    </script>

</body>

</html>