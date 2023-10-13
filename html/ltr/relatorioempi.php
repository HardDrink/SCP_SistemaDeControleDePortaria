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
    <title>Relátorios Empilhadeiras</title>
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
date_default_timezone_set('America/Sao_Paulo');
?>
        </header>
<?php

//menu lateral !!!
include ('menulateral.php');

$nome_emp='';
$chassi='';
$combustivel=0;
$horimetro='';
$tipo=0;

?>

        <div class="page-wrapper">
        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Criar Relátorio De Empilhadeiras</h5>
                                <br>
                                
                                <?php

                                    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
                            
                                    if(isset($dados['data_inicio'])) {
                                        $data_inicio = $dados['data_inicio'];
                                    }
                                    if(isset($dados['data_final'])) {
                                        $data_final = $dados['data_final'];
                                    }
                                    if(isset($dados['id_emp'])) {
                                        $id_emp = $dados['id_emp'];
                                    }
                            ?>
                            <form action="relatorioempi2.php" method="post" target="_blank">
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Data Inicial: </label>
                                        <div class="col-sm-3">
                                            <input type="date" name="data_inicio" value="<?=$data_inicio?>" class="form-control" id="">
                                        </div>
                                        <label class="col-md-2 text-end control-label col-form-label">Data Final: </label>
                                        <div class="col-sm-3">
                                            <input type="date" name="data_final" value="<?=$data_final?>" class="form-control" id="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-md-2 text-end control-label col-form-label">Equipamento: </label>
                                    <div class="col-lg-3">
                                        <select name="id_emp" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                            <option value="0">Todas</option>
                                            <?php 
                                                $conn = new mysqli(HOST, USER, PASS, BASE);
                                                
                                                $result2 = mysqli_query($conn, "SELECT nome_emp, id_emp FROM empilhadeiras");
            
                                                while ($row1 = mysqli_fetch_assoc($result2))
                                                {                                                
                                                $id_emp = $row1['id_emp'];
                                                $nome_emp = $row1['nome_emp'];
                                                print "<option value='{$id_emp}'>{$nome_emp}</option>";
                                                }


                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="criar" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </form>

                                    </div>
                                    <!-- Footer -->
                                    <?php
                                    include('footer.html');
                                    
                                    ?>
                                    <!-- footer-->
                        </div>
                                    </div>
                                </div>

        </div>

<!-- final da pagina -->
            </div>
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