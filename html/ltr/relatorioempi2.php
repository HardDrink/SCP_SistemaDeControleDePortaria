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
date_default_timezone_set('America/Sao_Paulo');
?>

<?php 

$di         =$_POST['data_inicio'];
$df         =$_POST['data_final'];
$data_inicio=$di.' 00:00:00';
$data_final =$df.' 23:59:59';
$data_inicio=preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $data_inicio);
$data_final =preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $data_final);


if(isset($tudo_a))$tudo_a=$_POST['tudo_a'];
if(isset($tudo_m))$tudo_m=$_POST['tudo_m'];


$mes_corrente=date('m',strtotime($data_final));

switch ($mes_corrente){

case 1: $mes = "Janeiro"; break;
case 2: $mes = "Fevereiro"; break;
case 3: $mes = "Março"; break;
case 4: $mes = "Abril"; break;
case 5: $mes = "Maio"; break;
case 6: $mes = "Junho"; break;
case 7: $mes = "Julho"; break;
case 8: $mes = "Agosto"; break;
case 9: $mes = "Setembro"; break;
case 10: $mes = "Outubro"; break;
case 11: $mes = "Novembro"; break;
case 12: $mes = "Dezembro"; break;

}
?>
<div class="card-body">
<h5 class="card-title" style="text-align: center;">Relatório de Empilhadeiras de <?php echo $di." a ".$df."<br>"; ?> a unidade CRAGEA de SJC</h5>
<br>

<div class="container">
            <table style="margin-left: -10px;" id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>Data</b></th>
                                                <th><b>Empilhadeira</b></th>
                                                <th><b>Chassi</b></th>
                                                <th><b>Turno</b></th>
                                                <th><b>Horímetro Inicial</b></th>
                                                <th><b>Horímetro Final</b></th>
                                                <th><b>Horas Trabalhadas</b></th>
                                                <th><b>Hora Inicio</b></th>
                                                <th><b>Hora Final</b></th>
                                                <th><b>Horimetro Abastecimento</b></th>
                                                <th><b>Óleo</b></th>
                                                <th><b>Água</b></th>
                                                <th><b>Pneus</b></th>
                                                <th><b>Anormalidades</b></th>
                                                <th><b>Manutenção</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php 

            $conexao = new mysqli(HOST, USER, PASS, BASE);
			
			
			if(isset($_GET['status'])){ $where=" status=".$_GET['status'];}else{$where=" 1 ";}
			
			$order=" id_req ";

			 $sql="SELECT * FROM emp_controle WHERE (data between '$data_inicio' AND '$data_final')";
			

            if(isset($_POST['id_emp'])) if($_POST['id_emp']>0)$sql.=" AND id_emp=".$_POST['id_emp'];
            
			$sql.=" order by data,turno,id_emp";

            $consulta = mysqli_query($conexao,$sql);
			
			 $total_ht=0; //total horas trabalhadas
			while ($row = mysqli_fetch_assoc($consulta)) {
			
				$horas_trab            = $row['hori_final']-$row['hori_inicio'];
				$horas_trab            = round($horas_trab,2);

				$total_ht              = $total_ht+$horas_trab;

				
				$sql2 = "SELECT nome_emp, chassi FROM empilhadeiras WHERE id_emp=".$row['id_emp'];
				$consulta2             = mysqli_query($conexao, $sql2);
					while ($row2 = mysqli_fetch_assoc($consulta2))
					{
						$chassi                =$row2['chassi'];
						$res                   =$row2['nome_emp'];
						$data_t                =$row['data'];
					
				$data_t                =implode("/",array_reverse(explode("-",$data_t)));
				$turno                 = $row ['turno'];

				$operador              = $row ['operador'];
				$hori_inicio           = $row ['hori_inicio'];
				$hori_final            = $row ['hori_final'];
				$inicio                 = $row['inicio'];
				$final                 = $row['final'];
				$hori_abastecimento    = $row ['hori_abastecimento'];
				$oleo                  = $row ['oleo'];
				$agua                  = $row ['agua'];
				$pneus                 = $row ['pneu'];
				$anormalidades         = $row ['anormalidades'];
				$manutencao            = $row ['manutencao'];



					print "<tr>";
                    print "<td style='font-size: 14px;'>{$data_t}</td>";
                    print "<td style='font-size: 14px;'>{$res}</td>";
                    print "<td style='font-size: 14px;'>{$chassi}</td>";
                    print "<td style='font-size: 14px;'>{$turno}</td>";
                    print "<td style='font-size: 14px;'>{$operador}</td>";
                    print "<td style='font-size: 14px;'>{$hori_inicio}</td>";
                    print "<td style='font-size: 14px;'>{$hori_final}</td>";
                    print "<td style='font-size: 14px;'>{$horas_trab}</td>";
                    print "<td style='font-size: 14px;'>{$inicio}</td>";
                    print "<td style='font-size: 14px;'>{$final}</td>";
                    print "<td style='font-size: 14px;'>{$hori_abastecimento}</td>";
                    print "<td style='font-size: 14px;'>{$oleo}</td>";
                    print "<td style='font-size: 14px;'>{$agua}</td>";
                    print "<td style='font-size: 14px;'>{$pneus}</td>";
                    print "<td style='font-size: 14px;'>{$anormalidades}</td>";
                    print "<td style='font-size: 14px;'>{$manutencao}</td>";
                    print "</tr>";


				
					}
				}
                $conexao->close();
				
                      
				
				echo "<br>Total de Horas trabalhadas: $total_ht<br>";
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