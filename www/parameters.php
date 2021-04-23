<?php
session_start();
if(isset($_SESSION['id'])){

    // Verifier qu'on est bien une entreprise
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_parameters.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>green'it</title>
        </head>

        <body>
            <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
            </header>
            <section>
                <div class='corpus'>
                    <span class='return-container close' data-state="0"><img src='assets/img/icon-back.png' /></span>
                    <nav>
                        <span class='blcacc'><p>Account settings</p></span>
                        <span class='blcdeco'><p>Log out</p></span>
                    </nav>
                    <div class='centercontainer'>
                        <h1>Change my password</h1>
                        <input type='password' id='oldpass' placeholder="Current password" />
                        <input type='password' id='newpass' placeholder="New password" />
                        <input type='password' id='newpass2' placeholder="Confirm your new password" />
                        <ins class='error'></ins>
                        <ins class='success'></ins>
                        <button id="submitchange">Save</button>
                    </div>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/parameters.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}