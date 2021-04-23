<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "perso"){
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" rel="stylesheet" />
            <link href="css/style_header_private.css" rel="stylesheet" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="css/style_consume.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta charset="utf-8" />
            <title>green'it</title>
        </head>

        <body>
            <header>
                <div class='profil-nav-container'>
                    <div class='profilcontainer'>
                        <img alt="" class='imgprofil' />
                        <p class='name-header'></p>
                    </div>
                    <nav>
                        <ul>
                            <li class='navhome navli' data-color='#000000'><a href='account.php'><img src='assets/img/iconhome.png' data-on='assets/img/iconhome_w.png' data-out='assets/img/iconhome.png'/><p>Home</p></a></li>
                            <li class='navact navli' data-color='#00B34B'><a href='act.php'><img src='assets/img/iconhandsdouble.png' data-on='assets/img/iconhandsdouble_w.png' data-out='assets/img/iconhandsdouble.png'/><p>Act for the future</p></a></li>
                            <li class='active navcart' data-color='#027DFC'><a href='consume.php'><img src='assets/img/iconshopping.png' data-on='assets/img/iconshopping_w.png' data-out='assets/img/iconshopping.png'/><p>Consume sustainably</p></a></li>
                            <li class='navparameters navli' data-color='#7B7B7B'><a href='parameters.php'><img src='assets/img/iconsettings.png' alt='parameters' class='parameters' data-on='assets/img/iconsettings_w.png' data-out='assets/img/iconsettings.png'/><p>Settings</p></a></li>
                        </ul>
                    </nav>
                </div>
                <div class='burger hovereffect'>
                    <div class='line1'></div>
                    <div class='line2'></div>
                    <div class='line3'></div>
                </div>
                <ul class='nav-links'>
                    <li class='nav-link hovereffect'>
                        <a href='account.php'>Home</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='personal_profile.php'>My profile</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='act.php'>Act for the future</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='consume.php'>Consume sustainably</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='parameters.php'>Settings</a>
                    </li>
                </ul>
                <div class='page-title'>
                <h1>Consume sustainably</h1>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
            </header>
            <section>
                <div class='corpus'>
                    <div class='searchnav-container'>
                        <div class='browse-container'>
                            <h2>Browse all</h2>
                            <div class='flexer-browse'>
                                <div class='category-container' data-terms="1" data-active="0">
                                    <p>My fridge</p>
                                    <img src='assets/img/apple.png' />
                                </div>
                                <div class='category-container' data-terms="2" data-active="0">
                                    <p>My bank account</p>
                                    <img src='assets/img/bank.png' />
                                </div>
                                <div class='category-container' data-terms="3" data-active="0">
                                    <p>My transports</p>
                                    <img src='assets/img/eleccar.png' />
                                </div>
                                <div class='category-container' data-terms="4" data-active="0">
                                    <p>My closet</p>
                                    <img src='assets/img/cintre.png' />
                                </div>
                                <div class='category-container' data-terms="5" data-active="0">
                                    <p>My digital devices</p>
                                    <img src='assets/img/ddevices.png' />
                                </div>
                                <div class='category-container' data-terms="6" data-active="0">
                                    <p>Home sweet home</p>
                                    <img src='assets/img/brouette.png' />
                                </div>
                                <div class='category-container' data-terms="7" data-active="0">
                                    <p>My waste</p>
                                    <img src='assets/img/trash.png' />
                                </div>
                                <div class='category-container' data-terms="8" data-active="0">
                                    <p>My beauty</p>
                                    <img src='assets/img/cils.png' />
                                </div>
                                <div class='category-container' data-terms="9" data-active="0">
                                    <p>My business</p>
                                    <img src='assets/img/whiteshop.png' />
                                </div>
                                <div class='category-container' data-terms="10" data-active="0">
                                    <p>My entertainment</p>
                                    <img src='assets/img/books.png' />
                                </div>
                                <div class='category-container' data-terms="11" data-active="0">
                                    <p>My health</p>
                                    <img src='assets/img/healthicon.png' />
                                </div>
                                <div class='category-container' data-terms="12" data-active="0">
                                    <p>My vacation</p>
                                    <img src='assets/img/vacations.png' />
                                </div>
                                <div class='category-container' data-terms="13" data-active="0">
                                    <p>My sports</p>
                                    <img src='assets/img/bycicle.png' />
                                </div>
                                <div class='category-container' data-terms="14" data-active="0">
                                    <p>Others</p>
                                </div>
                            </div>
                        </div>
                        <div class='favorites-container' />
                            <h2>My favorites</h2>
                            <div class='flexer-favorites'>
                                
                            </div>
                        </div>
                    </div>
                    <div class='centersearch-container'>
                        <div class='search-container'>
                            <div class='flexer-input-container'>
                                <div class='flexer-input'>
                                    <input type='text' id='searcher' placeholder="Search for Organization's name, sector ..." />
                                    <img src='assets/img/icon-loupe.png' alt='search' />
                                </div>
                            </div>
                        </div>
                        <div class='flexer-results'>
                        </div>
                        <div class='flexer-corpus'>
                            
                            
                        </div>
                    </div>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"   integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="   crossorigin="anonymous"></script>
            <script src="js/header_private.js"></script>
            <script src="js/consume.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}