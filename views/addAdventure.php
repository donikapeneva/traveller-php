<?php include('shared/header.php'); ?>

<?php

require ('../controllers/AdventureController.php');
require ('../repositories/CountryRepository.php');
require ('../repositories/CityRepository.php');
$error = '';

if(!isset($_SESSION['userId'])) {
    $error = 'You need to be logged in.';
}

$countries = CountryRepository::getAll();
$cities = CityRepository::getAll();

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
    <div class="card-panel">
        <h4 class="center brand-text">Add adventure</h4>
        <form class="center white" method="POST" action="addAdventure.php" >
        
            <div class="center center-align">
                <input name="adventureName" type="text" class="input-field center center-align"/>
                <label class="center-align">Adventure Name</label>
            </div>

            <div class="input-field center center-align">
                <select class="input-field center-align" alignment="center">
                    <option value="" disabled selected>Choose your option</option>
                    <?php 
                        foreach($countries as $country) {
                            echo '<option value='.$country['id'].'>'.$country['name'].'</option>';
                        }
                    ?>
                </select>
            </div><label>Select Country</label>
            
            <div class="input-field center">
                <select class="input-field center ">
                    <option value="" disabled selected>Choose your option</option>
                    <?php 
                        foreach($cities as $city) {
                            echo '<option value='.$city['id'].'>'.$city['name'].'</option>';
                        }
                    ?>
                </select>
            </div><label>Select City</label>
            
            <div class="center center-align">
                <input name="tips" type="text" class="input-field white center"/>
                <label>Tips</label>
            </div>
            
            <div class="center form-button">
                <input type="submit" value="Add Adventure" name="submit" class="btn"/>
            </div>
        </form>
    </div>
</section>

<?php include('shared/footer.php'); ?>
