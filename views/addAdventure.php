<?php include('shared/header.php'); ?>

<?php

require ('../controllers/AdventureController.php');

$error = '';

if(!isset($_SESSION['userId'])) {
    $error = 'You need to be logged in.';
}

if(isset($_POST['submit'])) {
    if(isset($_SESSION['userId'])){
        AdventureController::create($_POST);
    } else {
        $error = 'Please, log in.';
    }
}

?>



<?php 
    if($error) {
        echo '<div class="card-panel red lighten-4">'.$error.'</div>';
    }
?>

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
