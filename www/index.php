<?php

header('Content-type: text/html; charset=utf-8');

define('CLASS_DIR','src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

//inicio html
include_once("head.php");

include_once("menu.php");

$dados = new OO\Pessoa\Pessoa();

$arrayPessoas = $dados->montaArray();
$sort = filter_input(INPUT_GET,'sort');
?>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Lista de Clientes</div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Tipo</th>
                        <th><span class="glyphicon glyphicon-star" aria-hidden="true" style="font-size:18px"></span></th>
                        <th><a href="/?sort=<?=$sort == 'true' ? 'false' : 'true'?>"><img src="img/arrows.png" alt=""/></th>
                    </tr>
                    <?=$dados->montaTabela($arrayPessoas,$sort)?>
                </table>
            </div>

        </div>
    </div>

<?

include_once("footer.php");

?>

