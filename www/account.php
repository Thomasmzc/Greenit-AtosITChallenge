<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "perso"){
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_account.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>green'it</title>
        </head>

        <body>
            <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                <img src='assets/img/adjust.png' alt='parameters' class='parameters' />
            </header>
            <section>
                <div class='corpus'>
                    <h2>Hello,<ins class='insname'></ins></h2>
                    <div class='flexer-corpus'>
                        <span class='boxflex bfl1'>
                            <p>View my profile</p>
                            <img src='assets/img/persona_white.png' />
                        </span>
                        <span class='boxflex bfl2'>
                            <p>Act for the future</p>
                            <img src='assets/img/act_white.png' />
                        </span>
                         <span class='boxflex bfl3'>
                            <p>Consume sustainably</p>
                            <img src='assets/img/shopping-cart_white.png' />
                        </span>
                    </div>
                    <!--<p class='info-helper'>You have a problem? Whe are <a href='#'>here</a> to help you</p>-->
                    <div class='next-container'>
                        <div class='flexertitle-event'>
                            <h3>Your next event</h3>
                            <ins class='date_next'></ins>
                        </div>
                        <div class='event-container'>
                        </div>
                    </div>
                </div>

            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/account.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}