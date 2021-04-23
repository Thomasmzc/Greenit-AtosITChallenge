<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_mycompany.css" rel="stylesheet" />
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
                            <p>Team profile</p>
                            <img src='assets/img/persona_white.png' />
                        </span>
                        <span class='boxflex bfl2'>
                            <p>Organization's page</p>
                            <img src='assets/img/shop_white.png' />
                        </span>
                        <span class='boxflex bfl3'>
                            <p>Events</p>
                            <img src='assets/img/event.png' />
                        </span>
                        <span class='boxflex bfl4'>
                            <p>Dashboard</p>
                            <img src='assets/img/dashboard.png' />
                        </span>
                    </div>
                    <p class='info-helper'>You have a problem? We are <a href='#' id='gotohelp'>here</a> to help you</p>
                </div>
                <div class='corpus2'>
                    <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                    <h3>Any question ?</h3>
                    <p>We want to improve your green’it experience. Do not hesitate to ask us your questions or to send us your feedback.</p>
                    <div class='contentmsg' contenteditable="true" placeholder='Your message to our team ...'></div>
                    <ins class='returnmsg'></ins>
                    <button id='sendmsg'>Send</button>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/mycompany.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}