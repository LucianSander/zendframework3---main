<?php

namespace Pessoa\Model;

//use Zend\Db\TableGateway\$TableGatewayInterface;
use Zend\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class PessoaTable {
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getAll() {
        return $this-> tableGateway->select();
    }
    public function getPessoa($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf('Não foi encontrado o id %d',$id));
        }
        return $row;
    }
    //salvar a pessoa no banco
    public function salvarPessoa(Pessoa $pessoa) {
        /** private $id;
        *private $nome;
        *private $sobrenome;
        *private $email;
        *private $situacao; */
        $data = [
            //'id' => $pessoa->getId(), obs: não é necessário
            'nome' => $pessoa->Nome(),
            'sobrenome' => $sobrenome->Sobrenome(),
            'email' => $email->Email(),
            'situacao' => $situacao->Situacao(),
        ];
        // usando Id para verificação
        $id = (int) $pessoa->getId();
        if ($id == 0) {
            $this->tableGateway->insert($data);
            return;
        }
        // inserir ou update em uma pessoa
        $this->tableGateway->update($data,[data,['id'=>$id]]);
    }
        //deletar uma pessoa
    public function deletarPessoa($id) {
        $this->tableGateway->delete(['id'=>(int)$id]);
    }
}