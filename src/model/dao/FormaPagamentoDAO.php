<?php

namespace dao;

use bd\DBH;
use classes\FormaPagamento;

class FormaPagamentoDAO {
    static public function createFormaPagamento (FormaPagamento $formaPagamento)
    {
        $sth = DBH::$dbh->prepare('INSERT INTO forma_pagamento VALUES (default, ?, true, default)');
        $params = array(
            $formaPagamento->getNome()
        );
        if ($sth->execute($params)) {
            return self::getFormaPagamentoById(DBH::$dbh->lastInsertId());
        } else {
            return false;
        }
    }

    static public function updateFormaPagamento ( FormaPagamento $formaPagamento ) {
        $sth = DBH::$dbh->prepare('UPDATE forma_pagamento set nome = ?, status = ? WHERE id = ?');
		$params = array(
            $formaPagamento->getNome(),
            $formaPagamento->getStatus(),
            $formaPagamento->getId()
        );
        if(!$sth->execute($params)){
			return false;
		}
		return $formaPagamento;
    }
    
    static public function getFormaPagamentoById( Int $id ) {
        $sth = DBH::$dbh->prepare("SELECT * FROM forma_pagamento where id = ?");
        if($sth->execute(array($id))){
            $formaPagamento = $sth->fetch();
            if( !isset( $formaPagamento['id'] ) )
                return false;
			$formaPagamento = self::buildFormaPagamento( $formaPagamento );
			if(is_null($formaPagamento->getId())){
				return false;
			}
			return $formaPagamento;
		} else {
            return false;
        }   
    }

    static public function getAllFormasPagamento( ) {
        $sth = DBH::$dbh->prepare("SELECT * FROM forma_pagamento");
        if($sth->execute()){
            $retorno = $sth->fetchAll();
            if( !empty( $lstFormasPagamento ) )
                return false;
            $lstFormasPagamento = [];
            foreach ($retorno as $formaPagamento) {
                array_push($lstFormasPagamento, self::buildFormaPagamento( $formaPagamento ));
            }
			if(!$lstFormasPagamento){
				return false;
			}
			return $lstFormasPagamento;
		} else {
            return false;
        }
    }

    static public function buildFormaPagamento( Array $data ) {
        $formaPagamento = new FormaPagamento;
        return $formaPagamento
            ->setId($data['id'])
            ->setNome($data['nome'])
            ->setStatus($data['status'])
            ->setData_criacao($data['data_criacao']);
    }
}