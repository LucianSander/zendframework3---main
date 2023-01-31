<?php

namespace Pessoa\Model;

class Pessoa {
    private $id;
    private $nome;
    private $sobrenome;
    private $email;
    private $situacao;

    public function exchangeArray (array $data){
        $this->id = !emply($data['id']) ? $data['id'] : null;
        $this->nome = !emply($data['nome']) ? $data['nome'] : null;
        $this->sobrenome = !emply($data['sobrenome']) ? $data['sobrenome'] : null;
        $this->email = !emply($data['email']) ? $data['email'] : null;
        $this->situacao = !emply($data['situacao']) ? $data['situacao'] : null;
    }

    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id =$id;
    }
    public function getNome(){
        return $this->Nome;
    }
    public function setNome($nome){
        $this->nome =$nome;
    }
    public function getSobrenome(){
        return $this->sobrenome;
    }
    public function setSobrenome($sobrenome){
        $this->sobrenome =$sobrenome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email =$email;
    }
    public function getSituacao(){
        return $this->situacao;
    }
    public function setSituacao($situacao){
        $this->situacao =$situacao;
    }
}