<?php
session_start();
if(isset($_SESSION['id'])){
?>
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
             <link href="css/style_requirements.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta charset="utf-8" />
            <title>Green'IT - Sign up</title>
        </head>

        <body>
            <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
            </header>
            <section>
                <div class='required1 requirements'>
                    <h3>We would like to know a little more about you …</h3>
                    <div class='flex-container'>
                        <div class='choicecontainer choicecontainer1' data-id='3'>
                            <img class='icon_choice' data-hover='assets/img/leaf_w.png' data-out='assets/img/leaf.png'  src='assets/img/leaf.png'/>
                            <p>I have never participated in these events</p>
                        </div>
                        <div class='choicecontainer choicecontainer1' data-id='2'>
                            <img class='icon_choice' data-hover='assets/img/plant_w.png' data-out='assets/img/plant.png'  src='assets/img/plant.png'/>
                            <p>I rarely participate in events in favor of the environment</p>
                        </div>
                        <div class='choicecontainer choicecontainer1' data-id='1'>
                            <img class='icon_choice' data-hover='assets/img/tree_w.png' data-out='assets/img/tree.png'  src='assets/img/tree.png'/>
                            <p>I regularly participate in events in favor of environment</p>
                        </div>
                    </div>
                </div>
                 <div class='required2 requirements'>
                    <h3>I'm using green it because ...</h3>
                    <div class='flex-container'>
                        <div class='choicecontainer choicecontainer2' data-id='1'>
                            <img class='icon_choice' data-hover='assets/img/recycle_w.png' data-out='assets/img/recycle.png' src='assets/img/recycle.png'/>
                            <p>I want to act in favour of the environment</p>
                        </div>
                        <div class='choicecontainer choicecontainer2' data-id='2'>
                            <img class='icon_choice' data-hover='assets/img/book_w.png' data-out='assets/img/book.png' src='assets/img/book.png'/>
                            <p>I want to develop my knowledge of good environmental practices</p>
                        </div>
                    </div>
                </div>
            </section>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            <script src="js/requirements.js"></script>

        </body>

    </div>
</html>
<?php
}
else{
    header('Location: login.php');
}
?>