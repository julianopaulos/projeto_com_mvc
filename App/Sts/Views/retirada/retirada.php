<?php
    
    unset($_SESSION['endereco']);
    if(!$this->Dados):
        $_SESSION['id_pedido']=$_GET['id_pedido'];
        $_SESSION['id_pedido']=$_GET['id_pedido'];
        $_SESSION['id_pedido2']=$_GET['id_pedido'];
        $_SESSION['id_pedido3']=$_GET['id_pedido'];
    else:
        foreach($this->Dados as $dados): 
            extract($dados);
            $_SESSION['id_pedido'] = $id;
            $_SESSION['id_pedido1'] = $id;
            $_SESSION['id_pedido2'] = $id;
            $_SESSION['id_pedido3'] = $id;
            $_SESSION['status'] = $status;
        endforeach;
    endif;
?>
    
    <script src="js/sweetalert2.all.min.js"></script>


    <script>
        $(document).ready(function () {
            atualiza();
        });
        function atualiza() {
            $.get("core/acao_retirada.php",function (resultado) {
                $('#notificacao').html(resultado);
            });
            setTimeout('atualiza()',5000);
        }
    </script>
    <h1 id="notificacao"></h1>
<div class="wrapper text-center">
    <h3 style="padding-top: 100px;">O estabelecimento recebeu a notificação de seu pedido,<br>
        você pode aguardar a notificação de aprovação ou pode ir direto ao estabelecimento,<br>
        agradecemos a escolha e desejamos que volte novamente a escolher o nosso estabelecimento =)
    </h3>
    <h2><a href="cardapio">Voltar para o cardápio</a></h2>
</div>
<?php
    require_once "Core/acao_retirada.php";
?>