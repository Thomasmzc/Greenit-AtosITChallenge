<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_login.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>Green'IT - Log in</title>
        </head>

        <body>
            <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                <div class='bloc_btncenter'>
                    <button class='gotoperso'>Personal</button>
                    <button class='gotocompany'>Organization</button>
                </div>
                <div class='bloc_btn'>
                    <button class='gotosign'>Don't have an account ?</button>
                </div>
                <div class='burger hovereffect'>
                    <div class='line1'></div>
                    <div class='line2'></div>
                    <div class='line3'></div>
                </div>
                <ul class='nav-links'>
                    <div class='headernav'>
                        <img src='assets/img/logo_black.png' alt='greenit' class='logonav'/>
                        <div class='bloc_btncenternav'>
                            <button class='gotopersonav'>Personal</button>
                            <button class='gotocompanynav'>For companies</button>
                        </div>
                    </div>
                    <div class='blcnav1'>
                        <li class='nav-link hovereffect'>
                            <a href='signup.php'>Don't have an account?</a>
                        </li>
                    </div>
                </ul>
            </header>
            <section>
                    <div class='left_side'>
                        <h2>My personnal account</h2>
                        <input type='email' id='email' placeholder="Email" />
                        <input type='password' id='password' placeholder="Password"/>
                        <ins class='error1'></ins>
                        <button class='gotolog'>Log in</button>
                        <a class='forgotlink'>Forgot password?</a>
                    </div>
                    <div class='left_side2'>
                        <h2>I forget my password</h2>
                        <input type='email' id='emailForgot' placeholder="Email" />
                        <ins class='error2'></ins>
                        <button class='gotosend'>Reset it</button>
                        <a class='return'>Go back</a>
                    </div>
                    <div class='right_side'>
                        <div class='random-container'><p class='fact-container'></p></div>
                    </div>
            </section>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            <script src="js/login.js"></script>

        </body>

    </div>
</html>