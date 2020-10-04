<?php

namespace classes;

class Doacao {
    private $id;
    private $valor;
    private $data_cadastro;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
        $this->id = $id;
        return $this;
	}

    public function getValor(){
		return $this->valor;
	}

	public function setValor($valor){
        $this->valor = $valor;
        return $this;
	}

	public function getData_cadastro(){
		return $this->data_cadastro;
	}

	public function setData_cadastro($data_cadastro){
        $this->data_cadastro = $data_cadastro;
        return $this;
	}

}