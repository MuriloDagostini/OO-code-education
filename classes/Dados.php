<?php

class Dados {

    public function montaArray()
    {
        $dados = include "/dados/pessoas.php";
        foreach ($dados as $pessoa) {
            $arrayPessoas[] = new Pessoa($pessoa['id'], $pessoa['nome'], $pessoa['idade'], $pessoa['cpf'],
                $pessoa['cidade'], $pessoa['email'], $pessoa['telefone']);
        }

        return $arrayPessoas;
    }

    public function montaTabela($arrayPessoas,$sort){
        $html = "";
        if($sort == 'true'){

            krsort($arrayPessoas);
        }else{

            sort($arrayPessoas);
        }
        foreach ($arrayPessoas as $pessoa) {

            $html .= "

                <tr>
                    <td>{$pessoa->id}</td>
                    <td><a href='/view_pessoa.php?id={$pessoa->id}' class='fancy' data-fancybox-type='iframe'>{$pessoa->nome}</a></td>
                    <td>{$pessoa->email}</td>
                    <td colspan='2'>{$pessoa->telefone}</td>
                </tr>

            ";
        }
        return $html;
    }

    public function montaTabelaporId($arrayPessoas,$id_pessoa){
        $html = "";
        foreach ($arrayPessoas as $pessoa) {
            if($id_pessoa == $pessoa->id) {
                $html .= "

                    <tr>
                        <td>Nome:</td>
                        <td>{$pessoa->nome}</td>
                    </tr>
                    <tr>
                        <td>Idade:</td>
                        <td>{$pessoa->idade}</td>
                    </tr>
                    <tr>
                        <td>CPF:</td>
                        <td>{$pessoa->cpf}</td>
                    </tr>
                    <tr>
                        <td>Cidade:</td>
                        <td>{$pessoa->cidade}</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>{$pessoa->email}</td>
                    </tr>
                    <tr>
                        <td>Telefone:</td>
                        <td>{$pessoa->telefone}</td>
                    </tr>

                ";
            }
        }
        return $html;
    }

} 