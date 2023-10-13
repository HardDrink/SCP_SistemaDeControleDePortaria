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
    <title>Bloqueio de Visitantes</title>
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

$nome = '';
$cpf = '';
$rg = '';
$cnh = '';

if(!empty($_GET['id_pes']))
{
        $conexao = new mysqli(HOST, USER, PASS, BASE);

    $id_pes  = (int) $_GET['id_pes'];
    $result1 = mysqli_query($conexao,"SELECT * FROM portaria_pessoa WHERE id_pes='{$id_pes}'");
    $row = mysqli_fetch_assoc($result1);

    $id_pes      = $row['id_pes'];
    $nome        = $row['nome'];
    $cpf         = $row['cpf'];
    $rg          = $row['rg'];
    $cnh         = $row['cnh'];
    $ativo       = $row['ativo'];
    $motivo      = $row['motivo'];
}
?>
        <div class="page-wrapper">
        <div class="card">
            <form method="post">
                            <di class="card-body">
                                <h5 class="card-title" style="text-align: center;">Bloqueio de Visitantes</h5>
                                <br>
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">CPF: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="cpf" value='<?=$cpf?>' class="form-control" id="cpf" placeholder="Insira o CPF...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Nome: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="nome" value="<?=$nome?>" class="form-control" id="nome" readonly>
                                            <input type='hidden' name='id_pes' value='<?=$id_pes?>'/>
                                        </div>
                                    </div>
                                <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">RG: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="rg" value="<?=$rg?>" class="form-control" id="rg" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">CNH: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="cnh" value="<?=$cnh?>" class="form-control" id="cnh" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Situação: *</label>
                                            <div class="col-sm-3">
                                            <select name="status" id="status" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="1" <?php if($ativo==1)echo ' selected'?>>Ativo</option>
                                                <option value="0" <?php if($ativo==0)echo ' selected'?>>Bloqueado</option>
                                                
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Motivo: </label>
                                    <div class="col-sm-3">
                                            <input type="text" name="motivo" id="motivo" value="<?=$motivo?>" class="form-control"></input>
                                        </div>
                                    </div>
                                        
                                        <?php
                                        $conn = new mysqli(HOST, USER, PASS, BASE);

                                    if(isset($_POST['enviar'])){
                                        
                                        $status = $_POST['status'];
                                        $motivo = $_POST['motivo'];
                                
                                        $sql = "UPDATE portaria_pessoa SET `ativo`='$status', `motivo`='$motivo' WHERE id_pes='$id_pes'";
                                
                                        mysqli_query($conexao, $sql);
                                
                                        echo "<meta HTTP-EQUIV='refresh' CONTENT='0';URL=alterarbloqueio.php?id_pes={$id_pes}'>";
                                        echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-5 text-end'>Atualizado!</h4><br>";
                                        }

                                        $conexao->close();
                                    ?>
                            <div class="form-group row">
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button onclick="msg()" type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                            <script>
                                            function msg()
                                            {
                                            alert("Visitante Atualizado!");
                                            }
                                        </script>
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