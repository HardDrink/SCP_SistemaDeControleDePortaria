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
    <title>Entrada de Visitantes</title>
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

$nome   = '';
$rg     = '';
$cpf    = '';
$cnh    = '';
$data   = '';
$ativo  = '1';
$motivo = '';

?>
        <div class="page-wrapper">
        <div class="card">
            <form method="post">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Entrada Visitantes:</h5>
                                <br>

                                <div class="form-group row" style="text-align: center;">
                                    <h5>Preencha os dados do Visitante:</h5>
                                    <h5>Campos Com * São Obrigatórios:</h5>
                                </div>
                                <?php

                                $data = date("d/m/Y H:i:s");

                                $conn = new mysqli(HOST, USER, PASS, BASE);


                                if(isset($_POST['verifica'])){
                                
                                    $cpf = $_POST['cpf'];

                                $result2 = mysqli_query($conn, "SELECT id_pes, nome, cpf, rg, cnh, ativo, motivo FROM portaria_pessoa where cpf like $cpf");

                                // pega os valores do banco e armazena na variavel $existe
                                while ($existe = mysqli_fetch_assoc($result2)){
                                    
                                $id_pes = $existe['id_pes'];
                                $nome   = $existe['nome'];
                                $rg     = $existe['rg'];
                                $cnh    = $existe['cnh'];
                                $ativo  = $existe['ativo'];
                                $motivo = $existe['motivo'];
                                }
                            }
                            $conn->close();
                            ?>
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">CPF: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="cpf" value='<?=$cpf?>' class="form-control" id="cpf" placeholder="Insira o CPF...">
                                                <div class="card-body">
                                                    <button type="submit" name="verifica" style="margin-left:30px" class="btn btn-primary">Buscar Visitante</button>
                                                </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Nome: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="nome" value="<?=$nome?>" class="form-control" id="nome" readonly>
                                            <input type='hidden' name='entrada' value='<?=$data?>' />
                                            <input type='hidden' name='id_pessoa' value='<?=$id_pes?>'/>
                                            <input type='hidden' name='ativo' value='<?=$ativo?>'/>
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
                                <label class="col-md-2 text-end control-label col-form-label">Placa Cavalo: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="placa_cavalo" maxlength="10" class="form-control" id="placa1" placeholder="Informe a Placa...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Placa Carreta 1: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="placa_1" maxlength="10" class="form-control" id="placa2" placeholder="Informe a Placa...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Placa Carreta 2: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="placa_2" maxlength="10" class="form-control" id="placa3" placeholder="Informe a Placa...">
                                        </div>
                                    </div>

                                    <?php 

                                    // define a variavel como sem valor pra nao dar erro.
                                    $tipo = '';
                                    ?>

                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Veiculo: </label>
                                            <div class="col-sm-3">
                                            <select name="veiculo" id="tipo" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="Sem Veiculo">Sem Veiculo</option>
                                                <option value="Moto">Moto</option>
                                                <option value="Carro De Passeio">Carro De Passeio</option>
                                                <option value="Utilitario">Utilitario</option>
                                                <option value="Caminhão Baú">Caminhão Baú</option>
                                                <option value="Caminhão Graneleiro">Caminhão Graneleiro</option>
                                                <option value="Caminhão Tanque">Caminhão Tanque</option>
                                                <option value="Caminhão Rollon">Caminhão Rollon</option>
                                                <option value="Caminhão Poli Caçamba">Caminhão Poli Caçamba</option>
                                                <option value="Caminhão / Container">Caminhão / Container</option>
                                                <option value="Caminhão Truck" >Caminhão Truck</option>
                                                
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Empresa: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="empresa" class="form-control" id="empresa" placeholder="Informe a Empresa...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label" required>Visitado: *</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="visitado" class="form-control" id="visitado" placeholder="Informe o Local a ser visitado...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Setor: *</label>
                                            <div class="col-sm-3">
                                            <select name="setor" id="setor" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="0">Escolha Um Setor</option>
                                                <option value="Administrativo">Administrativo</option>
                                                <option value="Operacional">Operacional</option>
                                                <option value="Neolubes">Neolubes</option>
                                                <option value="Pátio">Pátio</option>
                                                <option value="Refeitório">Refeitório</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Operação: </label>
                                            <div class="col-sm-3">
                                            <select name="operacao" id="operacao" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="0">Escolha uma Operação</option>
                                                <option value="Carregamento">Carregamento</option>
                                                <option value="Descarregamento">Descarregamento</option>
                                                <option value="Carregamento e Descarregamento">Carregamento e Descarregamento</option>
                                                <option value="Visita">Visita</option>
                                                <option value="Entrevista">Entrevista</option>
                                                <option value="Troca de Nota">Troca de Nota</option>
                                                <option value="Entrega de alimentos">Entrega De Alimentos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Observação: </label>
                                            <div class="col-sm-9">
                                            <textarea name="observacao" id="observacao" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <?php

                                        $conn = new mysqli(HOST, USER, PASS, BASE);


                                    if(isset($_POST['realizar-entrada'])){
                                    

                                        $id_pessoa    = $_POST['id_pessoa'];
                                        $nome         = $_POST['nome'];
                                        $cpf          = $_POST['cpf'];
                                        $rg           = $_POST['rg'];
                                        $cnh          = $_POST['cnh'];
                                        $placa_cavalo = $_POST['placa_cavalo'];
                                        $placa_1      = $_POST['placa_1'];
                                        $placa_2      = $_POST['placa_2'];
                                        $veiculo      = $_POST['veiculo'];
                                        $empresa      = $_POST['empresa'];
                                        $visitado     = $_POST['visitado'];
                                        $setor        = $_POST['setor'];
                                        $operacao     = $_POST['operacao'];
                                        $observacao   = $_POST['observacao'];
                                        $entrada      = $_POST['entrada'];
                                        




                                    $sql = "INSERT INTO portaria_visita (`id_pessoa`, `nome_visita`, `cpf_visita`, `rg_visita`, `cnh_visita`, `placa_cavalo`,
                                                                        `placa_1`, `placa_2`, `veiculo`, `empresa`, `entrada`, `visitado`, `setor`, `operacao`,
                                                                        `observacao`) VALUES ('$id_pessoa', '$nome', '$cpf', '$rg', '$cnh', '$placa_cavalo', '$placa_1',
                                                                        '$placa_2', '$veiculo', '$empresa',NOW(), '$visitado', '$setor', '$operacao', '$observacao')";


                                        if($result = mysqli_query($conn, $sql)){
                                            echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Entrada do Visitante $nome Foi Feita Com Sucesso!!!.</h4><br>";
                                        }else
                                        {
                                            echo "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Deu Ruim A Entrada!!!</h4><br>";
                                        }
                                        
                                    }
                                    if($ativo == '1'){
                                        print "<button type='submit' name='realizar-entrada' class='btn btn-primary'>Realizar Entrada</button>";
                                    }
                                    else
                                    {
                                        print "<button type='submit' name='realizar-entrada' class='btn btn-primary' disabled>Realizar Entrada</button>";
                                        print "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-12 text-end'>Usuário Bloqueado, Motivo: {$motivo}, Por Favor Contate Supervisor!</h4><br>";
                                    }
                                ?>
                                
                                    </div>

                            </div>
                        </form>
                    </div>

<?php
include('footer.html');

?>
                                    </div>
                        </div>
                                    </div>
                                </div>

        </div>

<!-- final da pagina -->
            </div>
<!-- Footer -->
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