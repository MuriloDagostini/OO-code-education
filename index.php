<?php
//inicio html
include_once ("head.php");

include_once ("menu.php");

include_once ("/classes/Pessoa.php");
include_once ("/classes/Dados.php");

$dados = new Dados();

$arrayPessoas = $dados->montaArray();
$sort = filter_input(INPUT_GET,'sort');
?>
<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Lista de objetos pessoas</div>
                <!-- Table -->
                <table class="table">
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th><a href="/?sort=<?=$sort == 'true' ? 'false' : 'true'?>"><img src="img/arrows.png" alt=""/></th>
                    </tr>
                    <?=$dados->montaTabela($arrayPessoas,$sort)?>
                </table>
            </div>

        </div>
    </div>

<?

include_once ("footer.php");

?>

