<?php

include_once '../autoload.php';

use bd\DBH;
use classes\DoadorDoacao;
use dao\DoadorDoacaoDAO;

if( !$_POST ) {
    header('location: ../../');
}

$doacao = $_POST;


$donate = new DoadorDoacao;
$donate ->setId_doador($doacao['doador'])
        ->setId_doacao($doacao['doacao'])
        ->setId_forma_pagamento($doacao['forma_pagamento']);
        DBH::connect();
$donate = DoadorDoacaoDAO::createDoadorDoacao($donate);

header('location: ../../');
