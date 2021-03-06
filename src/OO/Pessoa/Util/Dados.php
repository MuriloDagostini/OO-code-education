<?php

namespace OO\Pessoa\Util;

use OO\Banco\Fixture;
use OO\Banco\ConexaoDB;
use OO\Pessoa\Types\PessoaFisica;
use OO\Pessoa\Types\PessoaJuridica;

class Dados {

    public function flush(){
        $bd = new ConexaoDB();
        $fixture = new Fixture($bd->getPdo());
        $fixture->dropClientes();
        $fixture->createClientes();
        $fixture->populateClientes();
    }

    public function montaArray()
    {
        $bd = new ConexaoDB();
        $sql = "select * from cliente ";
        $stmt = $bd->getPdo()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $arrayPessoas = array();
        foreach ($result as $pessoa) {
            if($pessoa['tipo']=="CPF"){
                $arrayPessoas[] = new PessoaFisica($pessoa);
            }else{
                $arrayPessoas[] = new PessoaJuridica($pessoa);
            }
        }

        return $arrayPessoas;
    }

    public function montaTabela($arrayPessoas,$sort)
    {
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
                    <td><a href='view_pessoa.php?id={$pessoa->getId()}' class='fancy' data-fancybox-type='iframe'>{$pessoa->getNome()}</a></td>
                    <td>{$pessoa->getEmail()}</td>
                    <td>{$pessoa->getTelefone()}</td>
                    <td>{$tipo}</td>
                    <td colspan='2' style='padding-left: 12px'>{$pessoa->getNota()}</td>
                </tr>

            ";
        }
        return $html;
    }

    public function montaTabelaporId($arrayPessoas,$id_pessoa)
    {
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