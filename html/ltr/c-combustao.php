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
    <title>Check List Empilhadeira Combustão</title>
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
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Controle Diário de Equipamento - Combustão</h5>
                                <br>
                        <form method="post">
                                <div class="form-group row">
                                <label for="fname"class="col-md-2 text-end control-label col-form-label">Turno: </label>
                                    <div class="col-lg-3">
                                        <select name="turno" class="select2 form-select shadow-none"
                                            style="width: 100%; height:36px;">
                                            <option value="0">Escolha o Turno...</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                
                                        </select>
                                    </div>
                                    <label class="col-md-1"></label>
                                    <label for="fname"class="col-md-1 text-end control-label col-form-label">Data:</label>
                                    <div class="col-lg-3">
                                    <input type="date" name="data" class="form-control" id="datepicker-autoclose">
                                    
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label for="fname"class="col-md-2 text-end control-label col-form-label">Equipamento: </label>
                                    <div class="col-lg-3">
                                        <select name="id_emp" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                            <option value="0">Escolha um Equipamento...</option>
                                            <?php 
                                                $conn = new mysqli(HOST, USER, PASS, BASE);
    
                                                $result2 = mysqli_query($conn, "SELECT nome_emp, id_emp FROM empilhadeiras where tipo=1 order by nome_emp asc");
            
                                                while ($row1 = mysqli_fetch_assoc($result2))
                                                {
                                                
                                                $id_emp = $row1['id_emp'];
                                                $nome_emp = $row1['nome_emp'];
                                                print "<option value='{$id_emp}'>{$nome_emp}</option>";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <label class="col-md-1"></label>
                                    <label for="fname"class="col-md-1 text-end control-label col-form-label">Operador:</label>
                                    <div class="col-lg-3">
                                        <select name="operador" class="select2 form-select shadow-none" style="width: 100%; height:36px;">
                                            <option value="0">Escolha um Operador...</option>
                                            <?php 

                                                $conn = new mysqli(HOST, USER, PASS, BASE);
    
                                                $result2 = mysqli_query($conn, "SELECT nome FROM emp_empilhadeiristas WHERE ativo =1 ORDER BY nome ASC");
            
                                                while ($row1 = mysqli_fetch_assoc($result2))
                                                {
                                                
                                                $nome = $row1['nome'];
                                                print "<option value='{$nome}'>{$nome}</option>";
                                                }
                                                ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="fname"class="col-md-2 text-end control-label col-form-label">Horário inicial</label>
                                        <div class="col-sm-3">
                                            <input name="hori_inicio" type="datetime-local" class="form-control" id="hori_inicio"
                                                placeholder="">
                                        </div>
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Horário Final</label>
                                        <div class="col-sm-3">
                                            <input name="hori_final" type="datetime-local" class="form-control" id="hori_final"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Horário inicial do Trabalho</label>
                                        <div class="col-sm-3">
                                            <input name="inicio" type="datetime-local" class="form-control" id="inicio"
                                                placeholder="">
                                        </div>
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Horário Final do Trabalho</label>
                                        <div class="col-sm-3">
                                            <input name="final" type="datetime-local" class="form-control" id="final"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Horímetro Abastecimento</label>
                                        <div class="col-sm-3">
                                            <input name="hori_abastecimento" type="text" class="form-control" id="hori_abastecimento"
                                                placeholder="">
                                        </div>
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Quantidade</label>
                                        <div class="col-sm-3">
                                            <input name="quantidade" type="text" class="form-control" id="quantidade"
                                                placeholder="">
                                        </div>
                                    </div>
                                <div class="form-group row">
                                    <div class="col-md-9">
                                </div>
                                </div>
                                <div class="form-group row">
                                    <h5 style="text-align: center;">Verificar os Itens Abaixo Por Favor(Marcar Apenas um De Cada Tipo!):</h5>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3">Óleo Hidráulico:</label>
                                    <div class="col-sm-3">
                                        <div class="form-check-inline">
                                            <input type="checkbox" class="form-check-input" id="hidraulico" name="hidraulico1">
                                            <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="hidraulico" name="hidraulico2">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="hidraulico" name="hidraulico3">
                                            <label class="form-check-label mb-0">Baixo</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-md-3">Óleo do Motor:</label>
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <input type="checkbox" style="margin-left: 5px;" class="form-check-input"
                                                id="oleo" name="oleo1">
                                                <label class="form-check-label mb-0" >OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="oleo" name="oleo2" >
                                            <label class="form-check-label mb-0" >Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="oleo"  name="oleo3" >
                                            <label class="form-check-label mb-0" >Baixo</label>
                                                
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-3">Óleo Transmissão:</label>
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="transmissao" name="transmissao1">
                                                <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="transmissao" name="transmissao2">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="transmissao" name="transmissao3">
                                            <label class="form-check-label mb-0">Baixo</label>
                                                
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="form-group row">

                                    <label class="col-md-3">Água do Radiador:</label>
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <input type="checkbox" style="margin-left: 15px;" class="form-check-input"
                                                id="agua" name="agua1">
                                                <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="agua" name="agua2">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="agua" name="agua3">
                                            <label class="form-check-label mb-0">Baixo</label>
                                                
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-md-3">Freios: </label>
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <input type="checkbox" style="margin-left: 20px;" class="form-check-input"
                                                id="freio" name="freio1">
                                                <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="freio" name="freio2">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="freio" name="freio3">
                                            <label class="form-check-label mb-0" style="margin-top: 2px;">Falhando</label>
                                                
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-md-3">Mangueiras:</label>
                                    <div class="col-sm-4">
                                        <div class="form-check-inline">
                                            <input type="checkbox" style="margin-left: 25px;" class="form-check-input"
                                                id="mangueira" name="mangueira1">
                                                <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="mangueira" name="mangueira2">
                                            <label class="form-check-label mb-0">Vazando</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <h5 style="text-align: center;">Pneus: </h5>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-3">Pneu Dianteiro Esquerdo:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check-inline">
                                            <input type="checkbox" class="form-check-input" 
                                                id="desquerdo" name="desquerdo0">
                                            <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="desquerdo" name="desquerdo1">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="desquerdo" name="desquerdo2">
                                            <label class="form-check-label mb-0">Baixo</label>
                                            <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="desquerdo" name="desquerdo3">
                                            <label class="form-check-label mb-0">Deformado</label>
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-3">Pneu Dianteiro Direito:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check-inline">
                                            <input type="checkbox" class="form-check-input" style="margin-left: 5px;"
                                                id="ddireito" name="ddireito0">
                                                <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="ddireito" name="ddireito1">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="ddireito" name="ddireito2">
                                            <label class="form-check-label mb-0">Baixo</label>
                                            <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="ddireito" name="ddireito3">
                                            <label class="form-check-label mb-0">Deformado</label>
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-md-3">Pneu Traseiro Esquerdo:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check-inline">
                                            <input type="checkbox" class="form-check-input" style="margin-left: 10px;"
                                                id="tesquerdo" name="tesquerdo0">
                                                <label class="form-check-label mb-0" for="customControlValidation1">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="tesquerdo" name="tesquerdo1">
                                            <label class="form-check-label mb-0" for="customControlValidation1">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="tesquerdo" name="tesquerdo2">
                                            <label class="form-check-label mb-0" for="customControlValidation1">Baixo</label>
                                            <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="tesquerdo" name="tesquerdo3">
                                            <label class="form-check-label mb-0" for="customControlValidation1">Deformado</label>
                                        </div>
                                        
                                    
                                    </div>
                                    <div class="form-group row">

                                    <label class="col-md-3">Pneu Traseiro Direito:</label>
                                    <div class="col-sm-5">
                                        <div class="form-check-inline">
                                            <input type="checkbox" class="form-check-input" style="margin-left: 15px;"
                                                id="tdireito" name="tdireito0">
                                                <label class="form-check-label mb-0">OK</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="tdireito" name="tdireito1">
                                            <label class="form-check-label mb-0">Vazando</label>
                                                <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="tdireito" name="tdireito2">
                                            <label class="form-check-label mb-0">Baixo</label>
                                            <input type="checkbox" style="margin-left: 10px;" class="form-check-input"
                                                id="tdireito" name="tdireito3">
                                            <label class="form-check-label mb-0">Deformado</label>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-md-4">Condições Gerais de Limpeza (Garfos, Grades e tec...)</label>
                                    <div class="col-sm-6">
                                        <div class="form-check-inline">
                                            <input type="checkbox" class="form-check-input" style="margin-left: 3px;"
                                                id="limpeza" name="limpeza1">
                                                <label class="form-check-label mb-0" for="">SIM</label>
                                                <input type="checkbox" style="margin-left: 40px;" class="form-check-input"
                                                id="limpeza" name="limpeza2">
                                            <label class="form-check-label mb-0" for="">NÃO</label>
                                        </div>
                                    </div>

                            </div>

                            <div class="form-group row">
                                        <label for=""style="margin-top: 8px;" class="col-sm-3 text-end control-label col-form-label">Registrar Anormalidades:</label>
                                        <div class="col-sm-9">
                                            <textarea name="anormalidades" class="form-control"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                    <h5 style="text-align: center;">Registrar as Manutenções do Equipamento neste Período feitas pelo mecânico:</h5>
                                </div>

                                
                                <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Ordem de Serviço Nº:</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="ordem_servico"
                                                placeholder="" name="ordem_servico">
                                        </div>
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Horimetro:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="horimetro" class="form-control" id="horimetro"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Descrição do Problema: </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="problema" class="form-control" id="problema"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Serviços Executados: </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="servicos" class="form-control" id="servicos"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Descrição: </label>
                                        <div class="col-sm-9">
                                            <input type="text" name="descricao" class="form-control" id="descricao"
                                                placeholder="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Atendimento Inicial:</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="at_inicial" class="form-control" id="at_inicial"
                                                placeholder="">
                                        </div>
                                        <label for="fname"
                                            class="col-md-3 text-end control-label col-form-label">Atendimento Final: </label>
                                        <div class="col-sm-3">
                                            <input type="text" name="at_final" class="form-control" id="at_final"
                                                placeholder="">
                                        </div>
                                    </div>
                            </div>
                            <?php
                                    if(isset($_POST['enviar'])){
 
                                    $data                =$_POST['data'];
                                    $turno               =$_POST['turno'];
                                    $id_emp              =$_POST['id_emp'];
                                    $operador            =$_POST['operador'];
                                    $hori_inicio         =$_POST['hori_inicio'];
                                    $hori_final          =$_POST['hori_final'];
                                    $inicio              =$_POST['inicio'];
                                    $final               =$_POST['final'];
                                    $hori_abastecimento  =$_POST['hori_abastecimento'];
                                    $quantidade          =$_POST['quantidade'];

                                    // caso caia na opçao 0 deixa a variavel em branco...
                                    if($turno === 0){$turno = "";}
                                    if($id_emp === 0){$id_emp = "";}
                                    if($operador === 0){$operador = "";}

                                    // tira a / da string
                                    $data    =implode("-",array_reverse(explode("/",$data)));

                                    $hidraulico = "";

                                    if(isset($_POST['hidraulico1'])){$hidraulico = 'OK';}
                                    else
                                        {if(isset($_POST['hidraulico2'])){$hidraulico = 'Vazando';}
                                            if(isset($_POST['hidraulico3'])){$hidraulico = 'Baixo';}}

                                    $oleo = "";

                                    if(isset($_POST['oleo1'])){$oleo = 'OK';}
                                    else
                                        {if(isset($_POST['oleo2'])){$oleo = 'Vazando';}
                                            if(isset($_POST['oleo3'])){$oleo = 'Baixo';}}

                                    $transmissao = "";

                                    if(isset($_POST['transmissao1'])){$transmissao = 'OK';}
                                    else
                                        {if(isset($_POST['transmissao2'])){$transmissao = 'Vazando';}
                                            if(isset($_POST['transmissao3'])){$transmissao = 'Baixo';}}

                                    $agua = "";

                                    if(isset($_POST['agua1'])){$agua = 'OK';}
                                    else
                                        {if(isset($_POST['agua2'])){$agua = 'Vazando';}
                                            if(isset($_POST['agua3'])){$agua = 'Baixo';}}

                                    $freio = "";

                                    if(isset($_POST['freio1'])){$freio = 'OK';}
                                    else
                                        {if(isset($_POST['freio2'])){$freio = 'Vazando';}
                                            if(isset($_POST['freio3'])){$freio = 'Baixo';}}

                                    $mangueira = "";
                                            
                                    if(isset($_POST['mangueira1'])){$mangueira = 'OK';}
                                    else
                                        {if(isset($_POST['mangueira2'])){$mangueira = 'Vazando';}}


                                    $desquerdo = "";
                                        
                                    if(isset($_POST['desquerdo0'])){$desquerdo = 'OK';}
                                    else
                                        {if(isset($_POST['desquerdo1'])){$desquerdo = 'Vazando';}
                                            if(isset($_POST['desquerdo2'])){$desquerdo = 'Baixo';}
                                            if(isset($_POST['desquerdo3'])){$desquerdo = 'Deformado';}}

                                    $ddireito = "";

                                    if(isset($_POST['ddireito0'])){$ddireito = 'OK';}
                                    else
                                        {if(isset($_POST['ddireito1'])){$ddireito = 'Vazando';}
                                            if(isset($_POST['ddireito2'])){$ddireito = 'Baixo';}
                                            if(isset($_POST['ddireito3'])){$ddireito = 'Deformado';}}

                                    $tesquerdo = "";

                                    if(isset($_POST['tesquerdo0'])){$tesquerdo = 'OK';}
                                    else
                                        {if(isset($_POST['tesquerdo1'])){$tesquerdo = 'Vazando';}
                                            if(isset($_POST['tesquerdo2'])){$tesquerdo = 'Baixo';}
                                            if(isset($_POST['tesquerdo3'])){$tesquerdo = 'Deformado';}}

                                    $tdireito = "";

                                    if(isset($_POST['tdireito0'])){$tdireito = 'OK';}
                                    else
                                        {if(isset($_POST['tdireito1'])){$tdireito = 'Vazando';}
                                            if(isset($_POST['tdireito2'])){$tdireito = 'Baixo';}
                                            if(isset($_POST['tdireito3'])){$tdireito = 'Deformado';}}

                                    $limpeza = "";

                                    if(isset($_POST['limpeza1'])){$limpeza = 'SIM';}
                                    else
                                        {if(isset($_POST['limpeza2'])){$limpeza = 'NÃO';}}

                                        $anormalidades  =$_POST['anormalidades'];
                                        
                                        if(strlen($anormalidades)==0)$anormalidades="-";
                                        
                                        $ordem_servico  =$_POST['ordem_servico'];
                                        $horimetro      =$_POST['horimetro'];
                                        $horimetro      =str_replace(",", ".", $horimetro);
                                        $problema       =$_POST['problema'];
                                        $servicos       =$_POST['servicos'];
                                        $descricao      =$_POST['descricao'];
                                        $at_inicial     =$_POST['at_inicial'];
                                        $at_final       =$_POST['at_final'];
                                        
                                        
                                        $manutencao     ="";


                                        if(strlen($ordem_servico)>0)$manutencao  .="Ordem de Servico:$ordem_servico/ ";
                                        if(strlen($horimetro)>0)$manutencao      .="Horímetro:$horimetro/ ";
                                        if(strlen($problema)>0)$manutencao       .="Problema:$problema/ ";
                                        if(strlen($servicos)>0)$manutencao       .="Serviços Executados:$servicos/ ";
                                        if(strlen($descricao)>0)$manutencao      .="Descrição:$descricao/ ";
                                        if(strlen($at_inicial)>0)$manutencao     .="Horário Inicial:$at_inicial/ ";
                                        if(strlen($at_final)>0)$manutencao       .="Horário Final:$at_final";
		
                                        if(strlen($manutencao)==0)$manutencao="-";

                                        $conn = new mysqli(HOST, USER, PASS, BASE);
                                        
                                        $sql="INSERT INTO emp_controle (`id_emp`,`data`,`turno`,`operador`,`hori_inicio`,`hori_final`,`inicio`,`final`,`oleo`,`agua`,`hidraulico`,`transmissao`,`freio`,`mangueira`,`desquerdo`,`ddireito`,`tesquerdo`,`tdireito`,`limpeza`,`anormalidades`,`manutencao`)VALUES('$id_emp','$data','$turno','$operador','$hori_inicio','$hori_final','$inicio','$final','$oleo','$agua','$hidraulico','$transmissao','$freio','$mangueira','$desquerdo','$ddireito','$tesquerdo','$tdireito','$limpeza','$anormalidades','$manutencao')";

                                    $result = mysqli_query($conn, $sql);

                                    if ($result){print "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Controle Cadastrado Com Sucesso!!!</h4><br><br>";}
                                    else
                                    {echo'nao deu';}
                                    }
                                    ?>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" name="enviar" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                            </form>
                        </div>
        </div>
        </form>

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