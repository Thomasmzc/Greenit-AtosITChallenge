<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
             <link href="css/style_personnal_settings.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta charset="utf-8" />
            <title>Green'IT - Settings</title>
        </head>

        <body>
            <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
            </header>
            <section>
                <div class='flex-left'>
                    <h1>Welcome green’iter, just one last step</h1>
                    <p class='big-explain'>To better indentify the events and organizations that you might enjoy.</p>
                    <p class='little-explain'>You can check our data policy</p>
                </div>
                <div class='flex-right'>
                    <input type='text' id='age' placeholder="Age" />
                    <input type='text' id='location' placeholder="City"/>
                    <input type='text' id='country' placeholder="Country"/>
                    <ins class='text-error'></ins>
                    <button class='gotolog'>Let's start</button>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/personnal_settings.js"></script>

        </body>

    </div>
</html>
<?php
}
else{
    header('Location: login.php');
}
?>