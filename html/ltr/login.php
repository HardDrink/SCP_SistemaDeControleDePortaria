<?php
include ('/xampp/htdocs/Codigos/matrix/config/config.php');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<scrip src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="login.css">-->
<link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/logo_cragea_peq.png">
<!------ Include the above in your HEAD tag ---------->

<section class="vh-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

          <img src="../../assets/images/logocragea-branco.jpg" style="width: 200px;margin-left: 15px;margin-bottom: 20px;" alt="homepage" class="light-logo" />
                <form method="post">        
                    <div class="form-outline mb-4">
                    <input type="text" style="background-color: white; border: 1px solid #ced4da;" name="usuario" class="form-control form-control-lg" />
                    <label class="form-label">Usuário</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" id="typePasswordX-2" name="senha" class="form-control form-control-lg" />
                    <label class="form-label">Senha</label>
                    </div>

                    <?php
                    if(isset($_POST['enviar'])){
                        if (isset($_post['usuario']) || isset($_POST['senha'])) {

                            if (strlen($_POST['usuario']) == 0) {
                                echo "<h4 style='color: red;'>Preencha Seu Usuário!</h4>";

                            } else if (strlen($_POST['senha']) == 0) {
                                echo "<h4 style='color: red;'>Preencha Sua Senha!</h4>";
                            
                            } else {

                                $usuario = $_POST['usuario'];
                                $senha   = $_POST['senha'];

                                $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = md5('$senha')";
                                $sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL:");
                            
                                $quantidade = $sql_query->num_rows;

                                if ($quantidade == 1) {

                                    $usuario = $sql_query->fetch_assoc();

                                    if (!isset($_SESSION)) {
                                        session_start();
                                    }

                                    $_SESSION['id'] = $usuario['id'];
                                    $_SESSION['nome'] = $usuario['nome'];
                                    $_SESSION['tipo'] = $usuario['tipo'];

                                    header("Location: index.php");

                                }else {
                                    echo "<h4 style='color: red;'>Usuário ou Senha Errados!</h4>";
                                }

                            }
                        }
                      }
                        ?>

                    <button name="enviar" class="btn btn-primary btn-lg btn-block" type="submit">Entrar</button>

                    <hr class="my-4">
                    </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>