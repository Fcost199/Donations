<?php

namespace classes;

class DoadorDoacao {
	
    private $id;
    private $id_doador;
    private $id_doacao;
    private $id_forma_pagamento;
    private $status;
    private $data_criacao;

    public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
		return $this;
	}

	public function getId_doador(){
		return $this->id_doador;
	}

	public function setId_doador($id_doador){
		$this->id_doador = $id_doador;
		return $this;
	}

	public function getId_doacao(){
		return $this->id_doacao;
	}

	public function setId_doacao($id_doacao){
		$this->id_doacao = $id_doacao;
		return $this;
	}

	public function getId_forma_pagamento(){
		return $this->id_forma_pagamento;
	}

	public function setId_forma_pagamento($id_forma_pagamento){
		$this->id_forma_pagamento = $id_forma_pagamento;
		return $this;
	}

	public function getData_criacao(){
		return $this->data_criacao;
	}

	public function setData_criacao($data_criacao){
		$this->data_criacao = $data_criacao;
		return $this;
    }
    
    public function getStatus(){
		return $this->status;
	}

	public function setStatus($status){
		$this->status = $status;
		return $this;
	}
}