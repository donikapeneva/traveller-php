<head>
    <title>Travellers</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <script src="//code.jquery.com/jquery-2.1.2.min.js"></script>
    
    <link href="styles/shared.css" rel="stylesheet" />
    <link href="styles/home.css" rel="stylesheet" />
    <link href="../styles/addAdventure.css" rel="stylesheet" />
    
    <style type="text/css">
        
        .brand {
            backround: #DAA520FF !important;
        }
        .brand-text {
            color: #DAA520FF !important;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('select').formSelect();
        });
    </script>
</head>

<body class ="grey lighten-4">
<nav class="white">
    <div class="container">
        <a href="/Travellers" class="brand-logo brand-text center">Travellers</a>
        <ul class="right hide-on-small-and-down">
            <?php session_start(); if($_SESSION && $_SESSION['userId']) { ?>
                <li>
                    <a href="views/addAdventure.php" class="btn brand top-nav-button">Add adventure</a>
                </li>
            <?php } ?>
            <li>
                <a href="views/profile.php" class="btn brand top-nav-button">My Profile</a>
            </li>
        </ul>
    </div>
</nav>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
