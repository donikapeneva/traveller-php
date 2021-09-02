<?php

require ('../controllers/AdventureController.php');
//session_start();
//echo $_SESSION['email'];
if(isset($_POST['submit'])) {

    AdventureController::create($_POST);
}

?>

<?php include('shared/header.php'); ?>

<section class="container grey-text">
    <h4 class="center brand-text">Add adventure</h4>
    <form class="center white" method="POST" action="addAdventure.php" >
        <label>Name</label>
        <input name="adventureName" type="text" class="input-field center "/>
        <label>Tips</label>
        <input name="tips" type="text" class="input-field white center"/>
        <input type="submit" value="Add Adventure" name="submit" class="btn"/>
    </form>
</section>

<?php include('shared/footer.php'); ?>
