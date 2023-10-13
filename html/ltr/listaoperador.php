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
    <title>Lista de Visitantes</title>
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
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title"></h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Lista Operador</h5>
                                <div class="table-responsive">
                                    <table id="" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nome</th>
                                                <th>Ativo</th>
                                                <th>Opção</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php

                                            $conn = new mysqli(HOST, USER, PASS, BASE);

                                                if(isset($_POST['atualizar'])){
                                                    $id_empilhadeirista = $_POST['id_empilhadeirista'];
                                                    $ativo              = $_POST['ativo'];
    
                                                    $sql = "UPDATE emp_empilhadeiristas SET ativo='$ativo' WHERE id_empilhadeirista='$id_empilhadeirista'";
    
                                                    $result1 = mysqli_query($conn, $sql);
    
                                                    }

                                                $result = mysqli_query($conn, "SELECT * from emp_empilhadeiristas ORDER BY ativo desc,nome asc");


                                                while ($row = mysqli_fetch_assoc($result))
                                                {

                                                $nome               = $row ['nome'];
                                                $ativo              = $row ['ativo'];
                                                $id_empilhadeirista = $row ['id_empilhadeirista'];

                                                print "<tr>";
                                                print "<td>{$nome}</td>";
                                                print "<form method='post'>";

                                                echo "<input type='hidden' name='id_empilhadeirista' value='$id_empilhadeirista' />";

                                                print "<td><select name='ativo' id='ativo' class='select2 form-select shadow-none'style='width: 50%; height:36px;'>".
                                                        "<option value='1'"; 
                                                        if( isset($ativo)&&$ativo==1)
                                                        echo "selected=\'selected\'";  
                                                        echo ">Sim</option>";

                                                        print "<option value='0'"; 
                                                        if( isset($ativo)&&$ativo==0)
                                                        echo "selected=\'selected\'";  
                                                        echo ">Não</option>";

                                                        echo"</select>";
                                                echo "<td><button onclick='msg()' type='submit' class='btn btn-primary' name='atualizar'>Atualizar</button></form></td>";
                                                
                                                print "</tr>";

                                                }

                                                $conn->close();

                                                ?>
                                        </tbody>
                                        <script>
                                            function msg()
                                            {
                                            alert("Operador Atualizado Com Sucesso!");
                                            }
                                        </script>
                                    </table>
                                </form>
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