<?php
header('Content-type: text/html; charset=utf-8');

//inicio html
include_once("head.php");

define("ROOT",str_replace(DIRECTORY_SEPARATOR."www",'',__DIR__));
define("CLASS_DIR", ROOT . DIRECTORY_SEPARATOR . "src" . DIRECTORY_SEPARATOR);

spl_autoload_register(function($class) {
    $className = CLASS_DIR . str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
    include($className);
});

$dados = new \OO\Pessoa\Util\Dados();

$arrayPessoas = $dados->montaArray();
$id_pessoa = filter_input(INPUT_GET,'id');
?>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Dados do Cliente</div>
                <!-- Table -->
                <table class="table">
                    <?=$dados->montaTabelaporId($arrayPessoas,$id_pessoa)?>
                </table>
            </div>

        </div>
    </div>

<?

include_once("scripts.php");

?>

