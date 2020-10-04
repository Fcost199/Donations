<?php

namespace classes;


class Doador {
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $telefone;
    private $data_nascimento;
    private $data_criacao;
    private $status;
    private $endereco;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
        $this->id = $id;
        return $this;
	}

    public function getNome(){
		return $this->nome;
	}

	public function setNome($nome){
        $this->nome = $nome;
        return $this;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setCpf($cpf){
        $this->cpf = $cpf;
        return $this;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setEmail($email){
        $this->email = $email;
        return $this;
	}

	public function getTelefone(){
		return $this->telefone;
	}

	public function setTelefone($telefone){
        $this->telefone = $telefone;
        return $this;
	}

	public function getData_nascimento(){
		return $this->data_nascimento;
	}

	public function setData_nascimento($data_nascimento){
        $this->data_nascimento = $data_nascimento;
        return $this;
	}

	public function getData_criacao(){
		return $this->data_criacao;
	}

	public function setData_criacao($data_criacao){
        $this->data_criacao = $data_criacao;
        return $this;
	}

	public function getEndereco(){
		return $this->endereco;
	}

	public function setEndereco($endereco){
        $this->endereco = $endereco;
        return $this;
    }
    
    public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
    }
}
?>