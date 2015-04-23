<?php
header('Content-type: text/html; charset=utf-8');

//inicio html
include_once ("head.php");

include_once ("/classes/Pessoa.php");
include_once ("/classes/PessoaFisica.php");
include_once ("/classes/PessoaJuridica.php");
include_once ("/classes/Dados.php");

$dados = new Dados();

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

include_once ("scripts.php");

?>

