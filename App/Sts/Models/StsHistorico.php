<?php


namespace Sts\Models;


use Sts\Models\Helper\StsRead;

class StsHistorico
{
    private $resultado;
    public function index()
    {
        $itens_por_pagina = 10;
        if(!isset($_GET['pagina']))
        {
            $_GET['pagina'] = 1;
        }
        $pagina = $_GET['pagina'];
        $inicio = ($itens_por_pagina*$pagina)-$itens_por_pagina;
        $listar = new StsRead();
        $listar->exeRead("pedido","WHERE id_cliente=:id order by id desc limit {$inicio},{$itens_por_pagina}",
        "id={$_SESSION['logado']}");
        $this->resultado['dados'] = $listar->getResultado();
        return $this->resultado['dados'];
        
    }
    public function paginacao()
    {
        $listar = new StsRead();
        $listar->exeRead("pedido","WHERE id_cliente=:id order by id desc","id={$_SESSION['logado']}");
        $this->resultado['paginacao'] = $listar->getResultado();
        return $this->resultado['paginacao'];
    }





}