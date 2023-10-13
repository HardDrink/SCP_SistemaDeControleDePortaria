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
    <title>Cadastro Visitantes</title>
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
        <div class="card">
            <form method="post">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Cadastro Visitantes:</h5>
                                <br>

                                <div class="form-group row" style="text-align: center;">
                                    <h5>Por favor insira os Dados Abaixo (os campos com * são o obrigatorios):</h5>
                                    <h5>Digitar apenas os digitos sem . , ou -:</h5>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Nome: *</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="nome" class="form-control" id="nome" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">CPF: *</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="cpf" maxlength="11" class="form-control" id="cpf" required>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">RG: *</label>
                                            <div class="col-sm-3">
                                            <input type="text" name="rg" maxlength="11" class="form-control" id="rg" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">CNH: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="cnh" maxlength="10" class="form-control" id="cnh">
                                        </div>
                                    </div>
                                    <?php
                                        $conexao = new mysqli(HOST, USER, PASS, BASE);

                                    if(isset($_POST['cadastrar'])){
                                    
                                        $nome =strtoupper($_POST['nome']);
                                        $cpf  = $_POST['cpf'];
                                        $rg   = $_POST['rg'];
                                        $cnh  = $_POST['cnh'];

                                        $row = mysqli_query($conexao,"SELECT cpf FROM portaria_pessoa where cpf like '$cpf'");
                                
                                        $existe = mysqli_fetch_all($row);
                                
                                        if($existe){echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-7 text-end'>Visitante $nome com o CPF:$cpf Já Cadastrado</h4>. <br>";}

                                        else{
                                        
                                        $sql = "INSERT INTO portaria_pessoa (`nome`,`cpf`,`rg`,`cnh`, `ativo`) VALUES ('$nome', '$cpf', '$rg', '$cnh', '1')";
                                
                                        mysqli_query($conexao, $sql);
                                
                                        echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-7 text-end'>Visitante $nome Inserido Com Sucesso.</h4>. <br>";}
                                        }

                                        $conexao->close();
                                
                                    ?>
                                    </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="cadastrar" class="btn btn-primary">Cadastrar</button>
                                </div>
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