<?php

namespace classes;

class FormaPagamento {
    private $id;
    private $nome;
    private $status;
    private $data_criacao;

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

	public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
		return $this;
    }
    
    public function getData_criacao(){
		return $this->data_criacao;
	}

	public function setData_criacao($data_criacao){
        $this->data_criacao = $data_criacao;
        return $this;
	}
}