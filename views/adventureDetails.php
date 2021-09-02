<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/Travellers/controllers/AdventureController.php';
//require('controllers/AdventureController.php');

if(isset($_GET['id'])) {
    $adventure = AdventureController::getOne($_GET['id']);
}

if(isset($_POST['id'])) {
    AdventureController::delete($_POST['id']);
}

?>

<?php include('shared/header.php'); ?>

<div class="row ">
    <h4 class="center brand-text "><?php echo($adventure['name'])?></h4>
    <form class="right" action="adventureDetails.php" method="POST">
        <input type="hidden" name="id" value="<?php echo($adventure['id'])?>">
        <input type="submit" name="delete" value="Delete" class="btn">

    </form>
</div>
    <div class="container center">
        <div class="col s6 md3 ">
            <div class="card ">
                <div class="card-image">
                    <img src="https://ychef.files.bbci.co.uk/1600x900/p09jf7k2.webp">
                </div>
            </div>
        </div>
</div>

<div class="container center">
    <div class="col s12 m5">
        <div class="card-panel teal">
    <span class="white-text">
        <?php echo($adventure['tip'])?>
    </span>
        </div>
    </div>
</div>


<?php include('shared/footer.php'); ?>