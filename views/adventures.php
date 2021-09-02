<?php

require('controllers/AdventureController.php');
$adventures = AdventureController::getAll();

?>

<div class="row">
    <?php
    foreach($adventures as $adventure) { ?>
        <div class="col s6 md3">
            <div class="card medium">
                <div class="card-image">
                    <img src="https://ychef.files.bbci.co.uk/1600x900/p09jf7k2.webp">
                    <span class="card-title white brand-text"><?php echo($adventure['name'])?></span>
                </div>
                <div class="card-content">
                    <p><?php echo($adventure['tip'])?></p>
                </div>
                <div class="card-action">
                    <a href="views/adventureDetails.php?id=<?php echo($adventure['id'])?>">See more</a>
                </div>
            </div>
        </div>
    <?php }?>

</div>