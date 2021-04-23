<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
             <link href="css/style_login.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta charset="utf-8" />
            <title>Green'IT - Log in</title>
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
                    <div class='left_side' data-id="<?php echo $_GET['ip']; ?>">
                        <h2>Resetting my password</h2>
                        <ins class='success_message'></ins>
                        <ins class='error_message'></ins>
                    </div>
                    <div class='right_side'>
                        <div class='random-container'><p class='fact-container'></p></div>
                    </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            
            <script>
                $(document).ready(function(){
                    $ip = $('.left_side').data('id');
                    $('.success_message').empty();
                    $('.error_message').empty();
                    console.log($ip);
                    $.ajax({
                        url: "includes/traitement_POST_verifAnswer.php",
                        type: 'post',
                        dataType: "json",
                        data: {
                            ip: $ip
                        },
                        success: function(json) {
                           $.each(json, function(index, value){
                            if(value == "200"){
                                $('.success_message').append(value);
                                $('.success_message').css({
                                    color: "green"
                                });
                            }
                            else {
                                $('.error_message').append(value);
                            }
                           });
                        }
                    });
                });
                //Links
                $(".logo").click(function(){
                    window.location.href="index.html";
                });
                $(".gotoperso").click(function(){
                    window.location.href="index.html";
                });
                $(".gotosign").click(function(){
                    window.location.href="signup.php";
                });
                $('.gotocompany').click(function(){
                    window.location.href='company.php';
                });
            </script>
        </body>

    </div>
</html>