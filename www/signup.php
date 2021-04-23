<?php
if(isset($_GET['link'])){
    $linked = htmlspecialchars($_GET['link']);
}
else{
    $linked = "0";
}

?>
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_signup.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>Green'IT - Sign up</title>
        </head>

        <body>
            <header>
               <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                <div class='bloc_btncenter'>
                    <button class='gotoperso'>Personal</button>
                    <button class='gotocompany'>For companies</button>
                </div>
                <div class='bloc_btn'>
                    <button class='gotolog'>Log in</button>
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
                            <a href='login.php'>Log in</a>
                        </li>
                    </div>
                </ul>
            </header>
            <section>
                    <div class='left_side'>
                        <h2>Creating my green account</h2>
                        <input type='email' id='email' placeholder="Email" />
                        <input type='text' id='fname' placeholder="First name" />
                        <input type='text' id='lname' placeholder="Last name" />
                        <input type='password' id='password' placeholder="Password"/>
                        <p class='little-explain'>At least 8 characters, containing numbers and letters.</p>
                        <p class='big-explain'>By signing up, you agree to our <a href='terms.php'>Terms</a>. Learn how we collect, use and share your data in our <a href='privacy'>Data Policy</a>.</p>
                        <ins class='text-error'></ins>
                        <button class='gotosign' data-link="<?php echo $linked; ?>">Sign up</button>
                    </div>
                    <div class='right_side'>
                        <div class='random-container'><p class='fact-container'></p></div>
                        <button class='gotologin'>Have an account ?</button>
                    </div>
               
            </section>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            <script src="js/signup.js"></script>

        </body>

    </div>
</html>