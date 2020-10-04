<?php
namespace dao;

use bd\DBH;
use classes\Doacao;

class AcessDonations {
    static public function createDonation (Doacao $doacao)
    {
        $sth = DBH::$dbh->prepare('INSERT INTO doacao VALUES (default, ?, default)');
        $params = array(
            $doacao->getValor()
        );
        if ($sth->execute($params)) {
            return self::getDonationById(DBH::$dbh->lastInsertId());
        } else {
            return false;
        }
    }

    static public function updateDonation ( Doacao $doacao ) {
        $sth = DBH::$dbh->prepare('UPDATE doacao set valor = ? WHERE id = ?');
		$params = array(
            $doacao->getValor(),
            $doacao->getId()
        );
        if(!$sth->execute($params)){
			return false;
		}
		return $doacao;
    }
    
    static public function getDonationById( Int $id ) {
        $sth = DBH::$dbh->prepare("SELECT * FROM doacao where id = ?");
        if($sth->execute(array($id))){
            $donate = $sth->fetch();
            if( !isset( $donate['id'] ) )
                return false;
			$donate = self::buildDonation( $donate );
			if(is_null($donate->getId())){
				return false;
			}
			return $donate;
		} else {
            return false;
        }   
    }

    static public function getAllDonation( ) {
        $sth = DBH::$dbh->prepare("SELECT * FROM doacao");
        if($sth->execute()){
            $retorno = $sth->fetchAll();
            if( !empty( $donations ) )
                return false;
            $donations = [];
            foreach ($retorno as $donate) {
                array_push($donations, self::buildDonation( $donate ));
            }
			if(!$donations){
				return false;
			}
			return $donations;
		} else {
            return false;
        }
    }

    static public function buildDonation( Array $data ) {
        $donation = new Doacao;
        return $donation
            ->setId($data['id'])
            ->setValor($data['valor'])
            ->setData_cadastro($data['data_cadastro']);
    }
}