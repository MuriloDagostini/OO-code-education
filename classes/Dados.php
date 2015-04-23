<?php

class Dados {

    public function montaArray()
    {
        $dados = include "/dados/clientes.php";
        $arrayPessoas = array();

        foreach ($dados as $pessoa) {
            if($pessoa['tipo']=="CPF"){
                $arrayPessoas[] = new PessoaFisica($pessoa['id'], $pessoa['nome'], $pessoa['idade'], $pessoa['cpf'],
                    $pessoa['cidade'], $pessoa['email'], $pessoa['telefone'], $pessoa['nota'], $pessoa['tipo'],
                        $pessoa['endereco']);
            }else{
                $arrayPessoas[] = new PessoaJuridica($pessoa['id'], $pessoa['nome'], $pessoa['cnpj'],$pessoa['cidade'],
                    $pessoa['email'], $pessoa['telefone'], $pessoa['nota'], $pessoa['tipo'], $pessoa['endereco']);
            }
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
            if($pessoa->getTipo() == "CPF"){
                $tipo = "P. Física";
            }else{
                $tipo = "P. Jurídica";
            }
            $html .= "

                <tr>
                    <td>{$pessoa->getId()}</td>
                    <td><a href='/view_pessoa.php?id={$pessoa->getId()}' class='fancy' data-fancybox-type='iframe'>{$pessoa->getNome()}</a></td>
                    <td>{$pessoa->getEmail()}</td>
                    <td>{$pessoa->getTelefone()}</td>
                    <td>{$tipo}</td>
                    <td colspan='2' style='padding-left: 12px'>{$pessoa->getNota()}</td>
                </tr>

            ";
        }
        return $html;
    }

    public function montaTabelaporId($arrayPessoas,$id_pessoa){
        $html = "";

        foreach ($arrayPessoas as $pessoa) {
            if($id_pessoa == $pessoa->getId()) {
                if($pessoa->getTipo() == "CPF"){
                    $tipo = "P. Física";
                    $html .= "

                        <tr>
                            <td>Nome:</td>
                            <td>{$pessoa->getNome()}</td>
                        </tr>
                        <tr>
                            <td>Idade:</td>
                            <td>{$pessoa->getIdade()}</td>
                        </tr>
                        <tr>
                            <td>CPF:</td>
                            <td>{$pessoa->getCpf()}</td>
                        </tr>
                        <tr>
                            <td>Cidade:</td>
                            <td>{$pessoa->getCidade()}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{$pessoa->getEmail()}</td>
                        </tr>
                        <tr>
                            <td>Telefone:</td>
                            <td>{$pessoa->getTelefone()}</td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td>{$tipo}</td>
                        </tr>
                        <tr>
                            <td>Nota:</td>
                            <td>{$pessoa->getNota()}</td>
                        </tr>
                        <tr>
                            <td>Endereço:</td>
                            <td>{$pessoa->getEndereco()}</td>
                        </tr>

                    ";
                }else{
                    $tipo = "P. Jurídica";
                    $html .= "
                        <tr>
                            <td>Nome:</td>
                            <td>{$pessoa->getNome()}</td>
                        </tr>
                        <tr>
                            <td>CNPJ:</td>
                            <td>{$pessoa->getCnpj()}</td>
                        </tr>
                        <tr>
                            <td>Cidade:</td>
                            <td>{$pessoa->getCidade()}</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td>{$pessoa->getEmail()}</td>
                        </tr>
                        <tr>
                            <td>Telefone:</td>
                            <td>{$pessoa->getTelefone()}</td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td>{$tipo}</td>
                        </tr>
                        <tr>
                            <td>Nota:</td>
                            <td>{$pessoa->getNota()}</td>
                        </tr>
                        <tr>
                            <td>Endereço:</td>
                            <td>{$pessoa->getEndereco()}</td>
                        </tr>

                    ";
                }
            }
        }
        return $html;
    }

} 