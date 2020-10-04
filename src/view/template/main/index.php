<?php

use bd\DBH;
use classes\Doador;
use dao\AcessDonations;
use dao\DoadorDoacaoDAO;
use dao\FormaPagamentoDAO;
DBH::connect();

$doacoes = AcessDonations::getAllDonation();
$lstFormasPagamento = FormaPagamentoDAO::getAllFormasPagamento();
$doador = new Doador;
$doador->setId(1);

$lstDoacao = DoadorDoacaoDAO::getAllDoadorDoacaoListByIdDoador($doador->getId());
?>
<div>
    <form method="post" action="./src/controller/doacao.php">
        Doar
        <input type="number" style="display: none;" name="doador" value="<?php echo($doador->getId()) ?>">
        <select name="doacao">
            <?php foreach ($doacoes as $doacao) :?>
                <option value="<?php echo $doacao->getId() ?>">
                    <?php echo($doacao->getValor()) ?>
                </option>
            <?php endforeach ?>
        </select>
        <select name="forma_pagamento">
            <?php foreach ($lstFormasPagamento as $formaPagamento): ?>
                <option value="<?php echo $formaPagamento->getId() ?>">
                    <?php echo($formaPagamento->getNome()) ?>
                </option>
            <?php endforeach ?>
        </select>

        <button>
            Doar
        </button>
        
    </form>
    <hr>
    <?php if( !empty($lstDoacao) ): ?>
    <div>
        <?php foreach ($lstDoacao as $donateDoador): ?>
            <?php var_dump($donateDoador) ?>

        <?php endforeach ?>
    </div>
    <?php endif ?>
</div>