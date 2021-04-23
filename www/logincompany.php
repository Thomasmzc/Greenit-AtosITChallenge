<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_logincompany.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>green'it - Log in</title>
        </head>

        <body>
            <header>
                <span class='return-container' data-to="0"><img src='assets/img/icon-back.png' /></span>
                <button class='gotosignup'>Sign up</button>
            </header>
            <section>
               <div class='left_container1 left_container'>
                    <div class='marger-container'>
                        <h1>Welcome back to greenit for organizations</h1>
                        <p class='explain'>A special account, giving you access to our community, submit and follow your events, get data on your success</p>
                        <input type='email' id='email' placeholder="Email" />
                        <input type='password' id='password' placeholder="Password"/>
                        <a class='forgotlink'>Forgot password?</a>
                        <ins class='text-error'></ins>
                        <button class='gotolog'>Log in</button>
                        
                    </div>
                     <div class='marger-container2'>
                        <h1>Resetting my password</h1>
                        <p class='explain'>We will send you an email.</p>
                        <input type='email' id='emailForgot' placeholder="Email" />
                        <ins class='success_message'></ins>
                        <a class='return'>Go back</a>
                        <ins class='text-error2'></ins>
                        <button class='gotosend'>Reset it</button>
                    </div>
                </div>
                <div class='right_container'>
                </div>
            </section>
            <footer>
                
            </footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            <script src="js/logincompany.js"></script>

        </body>

    </div>
</html>