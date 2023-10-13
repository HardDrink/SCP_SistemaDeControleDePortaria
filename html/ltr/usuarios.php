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
    <title>Lista de Usuários</title>
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
                                <h5 class="card-title">Lista de Usuários</h5>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><b>ID</b></th>
                                                <th><b>Nome</b></th>
                                                <th><b>Email</b></th>
                                                <th><b>Nivel</b></th>
                                                <th><b>Data Criação</b></th>
                                                <th><b>Editar</b></th>
                                                <th><b>Excluir</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                $conn = new mysqli(HOST, USER, PASS, BASE);

                                                $result = mysqli_query($conn, "SELECT * FROM usuarios ORDER BY id");

                                                while ($row = mysqli_fetch_assoc($result))
                                                {

                                                $id     = $row ['id'];
                                                $nome   = $row ['nome'];
                                                $email  = $row ['email'];
                                                $nivel  = $row ['tipo'];
                                                $data   = $row ['date'];

                                                print "<tr>";
                                                print "<td>{$id}</td>";
                                                print "<td>{$nome}</td>";
                                                print "<td>{$email}</td>";
                                                
                                                if ($nivel === '1') {$nivel = 'Administrador';}
                                                if ($nivel === '2') {$nivel = 'Supervisor';}
                                                if ($nivel === '3') {$nivel = 'Jovem Aprendiz';}
                                                if ($nivel === '4') {$nivel = 'Portária';}
                                                if ($nivel === '5') {$nivel = 'Básico';}
                                                
                                                
                                                print "<td>{$nivel}</td>";
                                                print "<td>{$data}</td>";
                                                echo "<td><a href='alterarusuario.php?id={$id}'><i class='mdi mdi-pen' style='font-size:16px;margin-left: 14px;'></i></a></td>";
                                                echo "<td><a href='deletausuario.php?id={$id}'><i class='mdi mdi-pen' style='font-size:16px;margin-left: 20px;'></i></a></td>";
                                                print "</tr>";

                                                }
                                                $conn->close();

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