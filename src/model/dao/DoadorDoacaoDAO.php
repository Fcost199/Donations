<?php
namespace dao;

use bd\DBH;
use classes\DoadorDoacao;

class DoadorDoacaoDAO {
    static public function createDoadorDoacao (DoadorDoacao $doadorDoacao)
    {
        $sth = DBH::$dbh->prepare('INSERT INTO doador_doacao VALUES (default, ?, ?, ?, true, default)');
        $params = array(
            $doadorDoacao->getId_doador(),
            $doadorDoacao->getId_doacao(),
            $doadorDoacao->getId_forma_pagamento()
        );
        if ($sth->execute($params)) {
            return self::getDoadorDoacaoById(DBH::$dbh->lastInsertId());
        } else {
            return false;
        }
    }

    static public function updateDoadorDoacao ( DoadorDoacao $doadorDoacao ) {
        $sth = DBH::$dbh->prepare('UPDATE doador_doacao set status = ? WHERE id = ?');
		$params = array(
            $doadorDoacao->getStatus(),
            $doadorDoacao->getId()
        );
        if(!$sth->execute($params)){
			return false;
		}
		return $doadorDoacao;
    }
    
    static public function getDoadorDoacaoById( Int $id ) {
        $sth = DBH::$dbh->prepare("SELECT * FROM doador_doacao where id = ?");
        if($sth->execute(array($id))){
            $doadorDoacao = $sth->fetch();
            if( !isset( $doadorDoacao['id'] ) )
                return false;
			$doadorDoacao = self::buildDoadorDoacao( $doadorDoacao );
			if(is_null($doadorDoacao->getId())){
				return false;
			}
			return $doadorDoacao;
		} else {
            return false;
        }   
    }

    static public function getAllDoadorDoacaoByIdDoador( int $doador ) {
        $sth = DBH::$dbh->prepare("SELECT * FROM doador_doacao where id_doador = ?");
        if($sth->execute()){
            $retorno = $sth->fetchAll();
            if( !empty( $retorno ) )
                return false;
            $lstDoadorDoacao = [];
            foreach ($retorno as $doadorDoacao) {
                array_push($lstDoadorDoacao, self::buildDoadorDoacao( $doadorDoacao ));
            }
			if(!$lstDoadorDoacao){
				return false;
			}
			return $lstDoadorDoacao;
		} else {
            return false;
        }
    }

    static public function getAllDoadorDoacaoListByIdDoador( int $doador ) {
        $sth = DBH::$dbh->prepare("SELECT doador_doacao.id as id_doador_doacao, doador.nome as nome_doador, doador.email as email_doador, doador.cpf as cpf_doador, doador.data_nascimento as data_nascimento, doacao.valor as valor_doacao, forma_pagamento.nome as forma_pagamento FROM doador_doacao inner join doador on doador.id = doador_doacao.id_doador inner join doacao on doacao.id = doador_doacao.id_doacao inner join forma_pagamento on forma_pagamento.id = doador_doacao.id_forma_pagamento where doador.id = ?");
        if ($sth->execute(
            array($doador)
        )){
            $retorno = $sth->fetchAll();
            if( empty( $retorno ) )
                return false;
            return $retorno;
		} else {
            return false;
        }
    }



    static public function buildDoadorDoacao( Array $data ) {
        $doadorDoacao = new DoadorDoacao;
        return $doadorDoacao
            ->setId($data['id'])
            ->setId_doador($data['id_doador'])
            ->setId_doacao($data['id_doacao'])
            ->setId_forma_pagamento($data['id_forma_pagamento'])
            ->setStatus($data['status'])
            ->setData_criacao($data['status']);
    }
}