

<?php include('shared/header.php'); ?>

<section class="row grey-text">
    <div class="col s6 md3">
        <h4 class="center brand-text">Log in</h4>
        <form class="center" method="POST" action="../controllers/loginController.php" >
            <label>Username</label>
            <input name="username" type="text" placeholder="username" class="input-field center "/>
            <label>Password</label>
            <input name="password" type="password" placeholder="password" class="input-field white center"/>
            <button type="submit" class="btn">sign</button>
        </form>
    </div>

    <div class="col s6 md3">
        <h4 class="center brand-text">Register</h4>
        <form class="center" method="POST" action="../controllers/loginController.php" >
            <label>Username</label>
            <input name="username" type="text" placeholder="username" class="input-field center "/>
            <label>Email</label>
            <input name="password" type="password" placeholder="password" class="input-field white center"/>
            <label>Password</label>
            <input name="username" type="text" placeholder="username" class="input-field center "/>
            <label>First Name</label>
            <input name="username" type="text" placeholder="username" class="input-field center "/>
            <label>Last Name</label>
            <input name="username" type="text" placeholder="username" class="input-field center "/>
            <button type="submit" class="btn">sign</button>
        </form>
    </div>

</section>

<?php include('shared/footer.php'); ?>