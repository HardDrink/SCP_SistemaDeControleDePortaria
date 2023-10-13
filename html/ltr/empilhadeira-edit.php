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
    <title>Editar Empilhadeiras</title>
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

if(!empty($_GET['id_emp']))
{

    $conexao = new mysqli(HOST, USER, PASS, BASE);


    $id_emp = (int) $_GET['id_emp'];
    $result1 = mysqli_query($conexao,"SELECT * FROM empilhadeiras WHERE id_emp='{$id_emp}'");
    $row = mysqli_fetch_assoc($result1);

    $id_emp = $row['id_emp'];
    $nome_emp = $row['nome_emp'];
    $chassi = $row['chassi'];
    $combustivel = $row['combustivel'];
    $horimetro = $row['horimetro'];
    $tipo = $row['tipo'];

    $conexao->close();
}



?>

        <div class="page-wrapper">
        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Editar Empilhadeiras</h5>
                                <br>

                            <form method="post">
                                <div class="form-group row">
                                        <label for="fname" class="col-md-2 text-end control-label col-form-label">Nome: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="nome_emp" class="form-control" id="fname" value="<?=$nome_emp?>" placeholder="Insira o nome...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Chassi: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="chassi" class="form-control" id="fname" value="<?=$chassi?>" placeholder="Insira o chassi...">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                <label for="fname" class="col-md-2 text-end control-label col-form-label">Combustível: </label>
                                    <div class="col-sm-3">
                                        <select class="select2 form-select shadow-none" name="combustivel" style=" height:36px;">
                                            <option>Escolha Um Tipo ...</option>
                                                <option value='1' <?php if($combustivel==1) echo'selected="selected"'; ?> >Álcool</option>
                                                <option value='2' <?php if($combustivel==2) echo'selected="selected"'; ?> >Diesel</option>
                                                <option value='3' <?php if($combustivel==3) echo'selected="selected"'; ?> >Elétrico</option>
                                                <option value='4' <?php if($combustivel==4) echo'selected="selected"'; ?> >Gás</option>
                                                <option value='5' <?php if($combustivel==5) echo'selected="selected"'; ?> >Gasolina</option>
                                                
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="fname" class="col-md-2 text-end control-label col-form-label">Horimetro: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="horimetro" class="form-control" id="fname" value="<?=$horimetro?>" placeholder="">
                                        </div>
                                    </div>

                                <div class="form-group row">
                                <label for="fname" class="col-md-2 text-end control-label col-form-label">Tipo: </label>
                                    <div class="col-lg-3">
                                        <select class="select2 form-select shadow-none" name="tipo" style="width: 100%; height:36px;">
                                            <option>Escolha Um Tipo...</option>
                                                <option value='1' <?php if($tipo==1) echo'selected="selected"'; ?> >Combustão</option>
                                                <option value='2' <?php if($tipo==2) echo'selected="selected"'; ?> >Elétrica</option>
                                                <option value='3' <?php if($tipo==3) echo'selected="selected"'; ?> >Grande Porte</option>
                                                <option value='4' <?php if($tipo==4) echo'selected="selected"'; ?> >Outro</option>
                                        </select>
                                    </div>
                                    </div>
                                    <?php

                                        $conexao = new mysqli(HOST, USER, PASS, BASE);

                                        if(isset($_POST['enviar'])){
                                            $nome_emp   =$_POST['nome_emp'];
                                            $chassi     =$_POST['chassi'];
                                            $combustivel=$_POST['combustivel'];
                                            $horimetro  =$_POST['horimetro'];
                                            $tipo       =$_POST['tipo'];

                                        $sql = "UPDATE empilhadeiras SET `nome_emp`='$nome_emp', `chassi`='$chassi', `combustivel`='$combustivel', `horimetro`='$horimetro', `tipo`='$tipo' WHERE id_emp='$id_emp'";

                                        $result = mysqli_query($conexao, $sql);


                                        if($result)
                                        {
                                            print "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Empilhadeira Atualizada Com Sucesso!!!</h4>";
                                            echo "<meta HTTP-EQUIV='refresh' CONTENT='0';URL=empilhadeira-edit.php?id_emp={$id_emp}'>";
                                        }
                                        else
                                        {
                                            print "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Não Foi Possivel Atualizar! Contate o Suporte!</h4>";
                                        }
                                        }
                                        $conexao->close();
                                        ?>

                            <div class="border-top">
                                <div class="card-body">
                                    <button onclick='msg()' type="submit" name="enviar" class="btn btn-primary">Alterar</button>
                                </div>
                                <script>
                                            function msg()
                                            {
                                            alert("Empilhadeira Atualizada Com Sucesso!");
                                            }
                                        </script>
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