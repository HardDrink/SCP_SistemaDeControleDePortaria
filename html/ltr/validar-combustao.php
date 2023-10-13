<?php
include ('/xampp/htdocs/Codigos/matrix/config/protect.php');
include_once('/xampp/htdocs/Codigos/matrix/config/config.php');

if(isset($_POST['enviar'])){

    $id_emp  =$_POST['id_emp'];
    $data    =$_POST['data'];
    $data    =implode("-",array_reverse(explode("/",$data)));
    
    $turno              =$_POST['turno'];
    $operador           =$_POST['operador'];
    $hori_inicio        =$_POST['hori_inicio'];
    $hori_final         =$_POST['hori_final'];
    $inicio             =$_POST['inicio'];
    $final              =$_POST['final'];
    $hori_abastecimento =$_POST['hori_abastecimento'];
    $quantidade         =$_POST['quantidade'];
    $oleo               =$_POST['oleo'];
    $hidraulico         =$_POST['hidraulico'];
    
    if(isset($_POST['hidraulico1'])){
        $hidraulico.="OK";
        
    }else
    {
        if(isset($_POST['hidraulico2'])){
            $hidraulico.=" Vazando ";
            }
            if(isset($_POST['hidraulico3'])){
            $hidraulico.=" Baixo ";
            }
    }
    if(strlen($hidraulico)==0)$hidraulico="-";
    
    $oleo = "";

    if(isset($_POST['oleo1'])){
        $oleo.="OK";
        
    }else
    {
        if(isset($_POST['oleo2'])){
            $oleo.=" Vazando ";
            }
            if(isset($_POST['oleo3'])){
            $oleo.=" Baixo ";
            }
    }
    if(strlen($oleo)==0)$oleo="-";
    
    $transmissao="";
    
    if(isset($_POST['transmissao1'])){
        $transmissao.="OK";
        
    }else
    {
        if(isset($_POST['transmissao2'])){
            $transmissao.=" Vazando ";
            }
            if(isset($_POST['transmissao3'])){
            $transmissao.=" Baixo ";
            }
    }
    if(strlen($transmissao)==0)$transmissao="-";
    
    $agua="";
    
    if(isset($_POST['agua1'])){
        
        $agua.="OK";
    
    }else
    {
        if(isset($_POST['agua2'])){
            $agua.=" Vazando ";
            }
            if(isset($_POST['agua3'])){
            $agua.=" Baixo ";
            }
    }
    
    if(strlen($agua)==0)$agua="-";
    
    $freio="";

    if(isset($_POST['freio1'])){
        $freio.="OK";
    
    }else
    {
        if(isset($_POST['freio2'])){
            $freio.=" Vazando ";
            }
            if(isset($_POST['freio3'])){
            $freio.=" Baixo ";
            }
    }
    
    if(strlen($freio)==0)$freio="-";
    
    $mangueira="";

    if(isset($_POST['mangueira1'])){
        $mangueira.="OK";
    
    }else
    {
        if(isset($_POST['mangueira2'])){
            $mangueira.=" Vazando ";
            
            }
    }
    
    if(strlen($mangueira)==0)$mangueira="-";
    
    $desquerdo="";

    if(isset($_POST['desquerdo0'])){

        $desquerdo.="OK";
        
    }else
    {
        if(isset($_POST['desquerdo1'])){
                $desquerdo.=" Gasto ";
                }
            if(isset($_POST['desquerdo2'])){
                $desquerdo.=" Rachado ";
                }
            if(isset($_POST['desquerdo3'])){
                $desquerdo.=" Deformado ";
                }
    }
    
    if(strlen($desquerdo)==0)$desquerdo="-";
    
    $ddireito="";

    if(isset($_POST['ddireito0'])){
        $ddireito.="OK";
        
    }else
    {
        if(isset($_POST['ddireito1'])){
            $ddireito.=" Gasto ";
            }
            if(isset($_POST['ddireito2'])){
                $ddireito.=" Rachado ";
                }
            if(isset($_POST['ddireito3'])){
                $ddireito.=" Deformado ";
                }
    }
    
    if(strlen($ddireito)==0)$ddireito="-";
    
    $tesquerdo="";

    if(isset($_POST['tesquerdo0'])){

        $tesquerdo.="OK";
        
    }else
    {
        if(isset($_POST['tesquerdo1'])){
                $tesquerdo.=" Gasto ";
                }
            if(isset($_POST['tesquerdo2'])){
                $tesquerdo.=" Rachado ";
                }
            if(isset($_POST['tesquerdo3'])){
                $tesquerdo.=" Deformado ";
                }
    }
    
    if(strlen($desquerdo)==0)$desquerdo="-";
    
    $tdireito="";

    if(isset($_POST['tdireito0'])){

        $tdireito.="OK";
        
    }else
    {
        if(isset($_POST['tdireito1'])){
                $tdireito.=" Gasto ";
                }
            if(isset($_POST['tdireito2'])){
                $tdireito.=" Rachado ";
                }
            if(isset($_POST['tdireito3'])){
                $tdireito.=" Deformado ";
                }
    }
    
    if(strlen($tdireito)==0)$tdireito="-";
    
    $limpeza="";

    if(isset($_POST['limpeza1'])){

        $limpeza.="SIM";
        
    }else
    {
        if(isset($_POST['limpeza2'])){

            $limpeza.=" NÃO ";
        }
    }
    
    $agua            =$_POST['agua'];
    $anormalidades   =$_POST['anormalidades'];
    $ordem_servico   =$_POST['ordem_servico'];
    $horimetro       =$_POST['horimetro'];
    $horimetro       =str_replace(",", ".", $horimetro);
    $problema        =$_POST['problema'];
    $servicos        =$_POST['servicos'];
    $descricao       =$_POST['descricao'];
    $at_inicial      =$_POST['at_inicial'];
    $at_final        =$_POST['at_final'];
    $manutenção      ="";
    
    if(strlen($ordem_servico)>0)$manutencao .="Ordem de Servico:$ordem_servico/ ";
    if(strlen($horimetro)>0)$manutencao     .="Horímetro:$horimetro/ ";
    if(strlen($problema)>0)$manutencao      .="Problema:$problema/ ";
    if(strlen($servicos)>0)$manutencao      .="Serviços Executados:$servicos/ ";
    if(strlen($descricao)>0)$manutencao     .="Descrição:$descricao/ ";
    if(strlen($at_inicial)>0)$manutencao    .="Horário Inicial:$at_inicial/ ";
    if(strlen($at_final)>0)$manutencao      .="Horário Final:$at_final";

    
    if(strlen($manutencao)==0)$manutencao="-";
    
    $conn = new mysqli(HOST, USER, PASS, BASE);
    
    $sql="INSERT INTO emp_controle (`id_emp`,`data`,`turno`,`operador`,`hori_inicio`,`hori_final`,`inicio`,`final`,`oleo`,`agua`,`hidraulico`,`transmissao`,`freio`,`mangueira`,`desquerdo`,`ddireito`,`tesquerdo`,`tdireito`,`limpeza`,`anormalidades`,`manutencao`,`usuario`)
        VALUES('$id_emp','$data','$turno','$operador','$hori_inicio','$hori_final','$inicio','$final','$oleo','$agua','$hidraulico','$transmissao','$freio','$mangueira','$desquerdo','$ddireito','$tesquerdo','$tdireito','$limpeza','$anormalidades','$manutencao','$usuario') ";
    
    $msg=$sql;

    $sql=utf8_encode($sql);
    $result = mysqli_query($conn, $sql);

    $conn->commit();
    

if (strlen($erro)>0) $msg=$erro;
else $msg= "<b><big>Controle incluído com sucesso</big>.</b>";
}
$conn->close();

?>