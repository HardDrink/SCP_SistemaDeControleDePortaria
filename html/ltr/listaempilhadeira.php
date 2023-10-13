<?php
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');
include ('/xampp/htdocs/Codigos/matrix/config/protect.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Lista de Empilhadeiras</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../../assets/extra-libs/multicheck/multicheck.css">
    <link href="../../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../../dist/css/style.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
<?php
//menu superior!!!
include('menusuperior.php');
?>
        </header>
<?php

//menu lateral !!!
include ('menulateral.php');
?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista de Empilhadeiras</h5>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Empilhadeira</th>
                                                <th>Chassi</th>
                                                <th>Combustivel</th>
                                                <th>Horímetro</th>
                                                <th>Tipo</th>
                                                <th>Editar</th>
                                                <th>Histórico</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $conn = new mysqli(HOST, USER, PASS, BASE);
                                                
                                                //puxa os dados do banco e armazena na variavel $result
                                                $result = mysqli_query($conn, "SELECT * from empilhadeiras ORDER BY id_emp");

                                                //filtra apenas as tabelas linkadas com a variavel $row
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                    
                                                //define as variaveis
                                                $id_emp      = $row ['id_emp'];
                                                $nome_emp    = $row ['nome_emp'];
                                                $chassi      = $row ['chassi'];
                                                $combustivel = $row ['combustivel'];
                                                $horimetro   = $row ['horimetro'];
                                                $tipo        = $row ['tipo'];

                                                    //transforma os dados da tabela 'combustivel' para texto
                                                    if($tipo === '1'){$tipo1 = 'Combustão';}
                                                    if($tipo === '2'){ $tipo1 = 'Elétrica';}
                                                    if($tipo === '3'){ $tipo1 = 'Grande Porte';}
                                                    if($tipo === '4') {$tipo1 = 'Outro';}

                                                    //tranforma os dados da tabela 'tipo' para texto
                                                    if($combustivel === '1'){$comb = 'Álcool';}
                                                    if($combustivel === '2'){$comb = 'Diesel';}
                                                    if($combustivel === '3'){$comb = 'Elétrico';}
                                                    if($combustivel === '4'){$comb = 'Gás';}
                                                    if($combustivel === '5'){$comb = 'Gasolina';}

                                                    //exibe a tabela com as tabelas selecionadas do banco
                                                print "<tr>";
                                                print "<td>{$nome_emp}</td>";
                                                print "<td>{$chassi}</td>";
                                                print "<td>{$comb}</td>";
                                                print "<td>{$horimetro}</td>";
                                                print "<td>{$tipo1}</td>";
                                                echo "<td><a href='empilhadeira-edit.php?id_emp={$id_emp}'><i class='mdi mdi-pen' style='font-size:16px;margin-left: 14px;'></i></a></td>";
                                                echo "<td><a href='listamanutencao.php?id_emp={$id_emp}'><i class='mdi mdi-pen' style='font-size:16px;margin-left: 20px;'></i></a></td>";
                                                print "</tr>";

                                                }

                                                ?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
<!-- final da pagina -->
            </div>
<!-- Footer -->
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