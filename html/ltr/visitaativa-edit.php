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
    <title>Editar Visitantes Ativos</title>
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

$id_visita    = '';  
$id_pessoa    = ''; 
$nome         = ''; 
$cpf          = ''; 
$rg           = ''; 
$cnh          = ''; 
$placa_cavalo = ''; 
$placa_1      = ''; 
$placa_2      = ''; 
$veiculo      = ''; 
$empresa      = ''; 
$visitado     = ''; 
$setor        = ''; 
$operacao     = ''; 
$observacao   = ''; 

?>
        </header>
<?php

//menu lateral !!!
include ('menulateral.php');

if(!empty($_GET['id_visita']))
{

    $conexao = new mysqli(HOST, USER, PASS, BASE);

    $id_visita = (int) $_GET['id_visita'];
    $result1 = mysqli_query($conexao,"SELECT * FROM portaria_visita WHERE id_visita='{$id_visita}'");
    $row = mysqli_fetch_assoc($result1);

    $id_visita    = $row['id_visita'];
    $id_pessoa    = $row['id_pessoa'];
    $nome         = $row['nome_visita'];
    $cpf          = $row['cpf_visita'];
    $rg           = $row['rg_visita'];
    $cnh          = $row['cnh_visita'];
    $placa_cavalo = $row['placa_cavalo'];
    $placa_1      = $row['placa_1'];
    $placa_2      = $row['placa_2'];
    $veiculo      = $row['veiculo'];
    $empresa      = $row['empresa'];
    $visitado     = $row['visitado'];
    $setor        = $row['setor'];
    $operacao     = $row['operacao'];
    $observacao   = $row['observacao'];
}
$conexao->close();
?>
        <div class="page-wrapper">
        <div class="card">
            <form method="post">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Editar Visitantes:</h5>
                                <br>

                                <div class="form-group row" style="text-align: center;">
                                    <h5>Preencha os dados do Visitante:</h5>
                                    <h5>Campos Com * São Obrigatórios:</h5>
                                </div>
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">CPF: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="cpf" value='<?=$cpf?>' class="form-control" id="cpf" readonly>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Nome: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="nome" value="<?=$nome?>" class="form-control" id="nome" readonly>
                                            <input type='hidden' name='id_pessoa' value='<?=$id_pes?>'/>
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
                                            <input type="text" name="placa_cavalo" value="<?=$placa_cavalo?>" maxlength="10" class="form-control" id="placa1" placeholder="Informe a Placa...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Placa Carreta 1: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="placa_1" value="<?=$placa_1?>" maxlength="10" class="form-control" id="placa2" placeholder="Informe a Placa...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Placa Carreta 2: </label>
                                            <div class="col-sm-3">
                                            <input type="text" name="placa_2" value="<?=$placa_2?>" maxlength="10" class="form-control" id="placa3" placeholder="Informe a Placa...">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Veiculo: </label>
                                            <div class="col-sm-3">
                                            <select name="veiculo" id="tipo" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="Sem Veiculo" <?php if($veiculo == 'Sem Veiculo') echo'selected="selected"'; ?>>Sem Veiculo</option>
                                                <option value="Moto" <?php if($veiculo == 'Moto') echo'selected="selected"'; ?>>Moto</option>
                                                <option value="Carro De Passeio" <?php if($veiculo == 'Carro De Passeio') echo'selected="selected"'; ?>>Carro De Passeio</option>
                                                <option value="Utilitario" <?php if($veiculo == 'Utilitario') echo'selected="selected"'; ?>>Utilitario</option>
                                                <option value="Caminhão Baú" <?php if($veiculo == 'Caminhão Baú') echo'selected="selected"'; ?>>Caminhão Baú</option>
                                                <option value="Caminhão Graneleiro" <?php if($veiculo == 'Caminhão Graneleiro') echo'selected="selected"'; ?>>Caminhão Graneleiro</option>
                                                <option value="Caminhão Tanque" <?php if($veiculo == 'Caminhão Tanque') echo'selected="selected"'; ?>>Caminhão Tanque</option>
                                                <option value="Caminhão Rollon" <?php if($veiculo == 'Caminhão Rollon') echo'selected="selected"'; ?>>Caminhão Rollon</option>
                                                <option value="Caminhão Poli Caçamba" <?php if($veiculo == 'Caminhão Poli Caçamba') echo'selected="selected"'; ?>>Caminhão Poli Caçamba</option>
                                                <option value="Caminhão / Container" <?php if($veiculo == 'Caminhão / Container') echo'selected="selected"'; ?>>Caminhão / Container</option>
                                                <option value="Caminhão Truck" <?php if($veiculo == 'Caminhão Truck') echo'selected="selected"'; ?>>Caminhão Truck</option>
                                                
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Empresa: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="empresa" value="<?=$empresa?>" class="form-control" id="empresa" placeholder="Informe a Empresa...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label" required>Visitado:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="visitado" value="<?=$visitado?>" class="form-control" id="visitado" placeholder="Informe o Local a ser visitado...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Setor:</label>
                                            <div class="col-sm-3">
                                            <select name="setor" id="setor" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="0" <?php if($setor== '0') echo'selected="selected"'; ?>>Escolha Um Setor</option>
                                                <option value="Administrativo" <?php if($setor == 'Administrativo') echo'selected="selected"'; ?>>Administrativo</option>
                                                <option value="Operacional" <?php if($setor == 'Operacional') echo'selected="selected"'; ?>>Operacional</option>
                                                <option value="Neolubes" <?php if($setor == 'Neolubes') echo'selected="selected"'; ?>>Neolubes</option>
                                                <option value="Pátio" <?php if($setor == 'Pátio') echo'selected="selected"'; ?>>Pátio</option>
                                                <option value="Refeitório" <?php if($setor == 'Refeitório') echo'selected="selected"'; ?>>Refeitório</option>
                                                
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Operação: </label>
                                            <div class="col-sm-3">
                                            <select name="operacao" id="operacao" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                                <option value="0" <?php if($operacao==0) echo'selected="selected"'; ?>>Escolha uma Operação</option>
                                                <option value="Carregamento" <?php if($operacao =='Carregamento') echo'selected="selected"'; ?>>Carregamento</option>
                                                <option value="Descarregamento" <?php if($operacao== 'Descarregamento') echo'selected="selected"'; ?>>Descarregamento</option>
                                                <option value="Carregamento e Descarregamento" <?php if($operacao == 'Carregamento e Descarregamento') echo'selected="selected"'; ?>>Carregamento e Descarregamento</option>
                                                <option value="Visita" <?php if($operacao == 'Visita') echo'selected="selected"'; ?>>Visita</option>
                                                <option value="Entrevista" <?php if($operacao == 'Entrevista') echo'selected="selected"'; ?>>Entrevista</option>
                                                <option value="Troca de Nota" <?php if($operacao == 'Troca de Nota') echo'selected="selected"'; ?>>Troca de Nota</option>
                                                <option value="Entrega de alimentos" <?php if($operacao == 'Entrega de Alimentos') echo'selected="selected"'; ?>>Entrega De Alimentos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label">Observação: </label>
                                            <div class="col-sm-9">
                                            <input type="text" name="observacao" value="<?=$observacao?>" id="observacao" class="form-control"></input>
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
                                        print "<button type='submit' name='realizar-entrada' class='btn btn-primary'>Atualizar</button>";
                                  
                                        $conn->close();
                                ?>
                                
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