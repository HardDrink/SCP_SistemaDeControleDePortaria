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
    <title>Alterar Usuário</title>
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

$nome    = '';
$usuario = '';
$nivel   = '';

if (!empty($_GET['id'])){
    $conexao = new mysqli(HOST, USER, PASS, BASE);

    $id = $_GET['id'];

    $sql1 = "SELECT * FROM usuarios WHERE id = '{$id}'";
    
    $result = mysqli_query($conexao, $sql1);

    $row = mysqli_fetch_assoc($result);

    $nome     = $row['nome'];
    $usuario  = $row['usuario'];
    $nivel    = $row['tipo'];
    $email    = $row['email'];


}


?>

        <div class="page-wrapper">
        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="text-align: center;">Alterar Usuários</h5>
                                <h6 class="card-title" style="text-align: center;">Deixe A Senha Em Branco Caso Não Queira Mudar</h6>
                                <br>

                            <form method="post">
                                <div class="form-group row">
                                        <label class="col-md-2 text-end control-label col-form-label" required>Nome: *</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="nome" class="form-control" value="<?=$nome?>" placeholder="Insira o nome...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label" required>Usuário: *</label>
                                        <div class="col-sm-3">
                                            <input type="text" name="usuario" class="form-control" id="usuario" value="<?=$usuario?>" placeholder="Insira o usuario...">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fname"
                                            class="col-md-2 text-end control-label col-form-label">Email:</label>
                                        <div class="col-sm-3">
                                            <input type="email" name="email" class="form-control" value="<?=$email?>" id="email" placeholder="Insira o email...">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                            <label class="col-md-2 text-end control-label col-form-label">Senha:</label>
                                            <div class="col-sm-3">
                                                <input type="password" name="senha" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                <div class="form-group row">
                                <label class="col-md-2 text-end control-label col-form-label">Nivel: </label>
                                    <div class="col-sm-3">
                                        <select class="select2 form-select shadow-none" value="<?=$nivel?>" name="nivel" style=" height:36px;">
                                            <option>Escolha Um Tipo ...</option>
                                                <option value='1' <?php if($nivel  == 1) echo'selected="selected"'; ?> >Administrador</option>
                                                <option value='2' <?php if($nivel  == 2) echo'selected="selected"'; ?> >Supervisor</option>
                                                <option value='3' <?php if($nivel  == 3) echo'selected="selected"'; ?> >Jovem Aprendiz</option>
                                                <option value='4' <?php if($nivel  == 4) echo'selected="selected"'; ?> >Portária</option>
                                                <option value='5' <?php if($nivel  == 5) echo'selected="selected"'; ?> >Básica</option>
                                                
                                        </select>
                                    </div>
                                </div>


                                    <?php
                                    $conexao = new mysqli(HOST, USER, PASS, BASE);

                                    //verifica se o botao enviar ainda nao foi apertado\/
                                    if(isset($_POST['enviar'])){

                                        //definindo as variaveis Usa o $_POST para pegar os valores dentro dos input e armazenar em variaveis
                                        $nome        =$_POST['nome'];
                                        $usuario     =$_POST['usuario'];
                                        $email       =$_POST['email'];
                                        $senha       =$_POST['senha'];
                                        $nivel       =$_POST['nivel'];

                                
                                        //seleciona o banco
                                        $sql = "UPDATE usuarios SET `nome`='$nome', `usuario`='$usuario', `email`='$email', `tipo`='$nivel'";

                                        if($senha != null) {

                                            $sql .= ", `senha`= md5('$senha')";

                                        } else{

                                            //$sql .= " `senha`= md5('$senha')";

                                        }

                                        $sql .= "WHERE id='$id'";

                                        $result = mysqli_query($conexao, $sql);


                                        if($result)
                                        {
                                            print "<h4 style='font-size: 15px;color: red;margin-top: 9px;' class='col-md-6 text-end'>Usuário Atualizada Com Sucesso!!!</h4>";
                                            echo "<meta HTTP-EQUIV='refresh' CONTENT='0';URL=alterarusuario.php?id={$id}'>";
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
                                    <button type="submit" name="enviar" class="btn btn-primary">Alterar</button>
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