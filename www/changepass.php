<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_login.css" rel="stylesheet" />
            <link href="css/style_header_public.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta charset="utf-8" />
            <title>green'it - Log in</title>
        </head>

        <body>
           <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                <div class='bloc_btncenter'>
                    <button class='gotoperso'>Personnal</button>
                    <button class='gotocompany'>For companies</button>
                </div>
                <div class='bloc_btn'>
                    <button class='gotosign'>Don't have an account ?</button>
                </div>
            </header>
            <section>
                    <div class='left_side'>
                        <h2>Resetting my password</h2>
                        <input type='email' id='email' placeholder="Email" />
                        <input type='password' id='temp_pass' placeholder="Temporary password"/>
                        <input type='password' id='password' placeholder="New password"/>
                        <ins class='error1'></ins>
                        <button class='gotolog' data-type="<?php echo $_GET['type'] ?>">Log in</button>
                    </div>
                    <div class='right_side'>
                        <div class='random-container'><p class='fact-container'></p></div>
                    </div>
            </section>
            <footer></footer>
            <div id='darkness'></div>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            <script src="js/changepass.js"></script>
        </body>
    </div>
</html>