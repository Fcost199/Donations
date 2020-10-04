<?php

use bd\DBH;
use dao\AcessDonations;

var_dump($_POST);
exit;

DBH::connect();
$donations = AcessDonations::getAllDonation();
?>
<div>
    <h2>
        Lista de doações
    </h2>
    <main>
        <?php if(!$donations): ?>
            <div class="donation">
                Valores doação
            </div>
        <?php else: ?>
            <?php foreach ($donations as $donation): ?>
                <button class="donation">
                    <?php echo($donation->getValor()); ?>
                </button>
            <?php endforeach ?>
        <?php endif ?>
    </main>
</div>