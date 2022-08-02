<?php include('shared/header.php'); ?>
<?php
// session_start();

require $_SERVER['DOCUMENT_ROOT'].'/Travellers/controllers/UserController.php';
require $_SERVER['DOCUMENT_ROOT'].'/Travellers/controllers/AdventureController.php';

$error = '';

if(isset($_GET['logout'])) {
    UserController::LogOut();
}

if(isset($_POST['login'])) {
    if ($_POST['email']){
        $error = UserController::LoginAuthenticate();
    }
}

if(isset($_POST['register'])) {
    if ($_POST['email']){
        $existingUser = UserController::getOneByEmail($_POST['email']);
        if($existingUser) {
            echo "Already registered :) ";
        } else {
            $newUser = UserController::create($_POST);
        }
    }
}

if($_SESSION && $_SESSION['userId']) {
    //echo $_SESSION['userId'];
    $user = UserController::getOneById($_SESSION['userId']);
    $adventures = AdventureController::getAllByUserId($_SESSION['userId']);
}
?>



<?php 
    if($error) {
        echo '<div class="card-panel red lighten-4">'.$error.'</div>';
    }
?>

<?php if(!$_SESSION || !$_SESSION['userId']) { ?>
<section class="row grey-text">
    <div class="col s6 md3">
        <h4 class="center brand-text">Log in</h4>
        <form class="center" method="POST" action="profile.php" >
            <label>Email</label>
            <input name="email" type="text" placeholder="email" class="input-field center "/>
            <label>Password</label>
            <input name="password" type="password" placeholder="password" class="input-field white center"/>
            <input type="submit" name="login" value="Sign" class="btn">
        </form>
    </div>

    <div class="col s6 md3">
        <h4 class="center brand-text">Register</h4>
        <form class="center" method="POST" action="profile.php" >
            <label>Email</label>
            <input name="email" type="text" class="input-field center "/>
            <label>Password</label>
            <input name="password" type="password" class="input-field white center"/>
            <label>Username</label>
            <input name="username" type="text" class="input-field center "/>
            <label>First Name</label>
            <input name="firstName" type="text" class="input-field center "/>
            <label>Last Name</label>
            <input name="lastName" type="text" class="input-field center "/>
            <input type="submit" name="register" value="Register" class="btn">
        </form>
    </div>

</section>


<?php } else { ?>
    <div class="row">
            <div class="col s6 md3 ">
                <div class="card small">
<!--                    <div class="card-image">-->
<!--                        <img src="https://ychef.files.bbci.co.uk/1600x900/p09jf7k2.webp">-->
<!--                        <span class="card-title white brand-text">--><?php //echo($adventure['name'])?><!--</span>-->
<!--                    </div>-->
                    <div class="card-content">
                        <h6>My details</h6>
                        <p>username: <?php echo($user['username'])?></p>
                        <p>email: <?php echo($user['email'])?></p>
                        <p>first name: <?php echo($user['first_name'])?></p>
                        <p>last name: <?php echo($user['last_name'])?></p>
                    </div>
                    <div class="card-action">
                        <form class="right" action="profile.php" method="GET">
                            <input type="submit" name="logout" value="LogOut" class="btn">
                        </form>
                    </div>
                </div>
            </div>
    </div>

<h5 class="center brand-text">My Adventures</h5>
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

<?php } ?>

<?php include('shared/footer.php'); ?>