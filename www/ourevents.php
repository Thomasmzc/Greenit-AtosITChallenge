<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_header_private_comp2.css" rel="stylesheet" />
            <link href="css/style_ourevents.css" rel="stylesheet" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta charset="utf-8" />
            <title>green'it</title>
        </head>

        <body>
            <header>
                <div class='teamcontainer'>
                    <img alt="" class='imgprofil' />
                    <div class='header-namescontainer'>
                        <p class='bigname-header'></p>
                        <p class='littlename-header'></p>
                    </div>
                </div>
                <div class='burger hovereffect'>
                    <div class='line1'></div>
                    <div class='line2'></div>
                    <div class='line3'></div>
                </div>
                <ul class='nav-links'>
                    <li class='nav-link hovereffect'>
                        <a href='mycompany.php'>Home</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='professional_profile.php'>Team profile</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='ourevents.php'>Our events</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='companypage.php'>Organization's page</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='dashboard.php'>Dashboard</a>
                    </li>
                    <li class='nav-link hovereffect'>
                        <a href='parameters.php'>Settings</a>
                    </li>
                </ul>
                <div class='page-title'>
                    <h1>Our events</h1>
                </div>
            </header>
            <section>
                <nav>
                    <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                    <ul>
                        <li class='navhome navli' data-color='#000000'><a href='mycompany.php'><img src='assets/img/iconhome.png' data-on='assets/img/iconhome_w.png' data-out='assets/img/iconhome.png'/><p>Home</p></a></li>
                        <li class='active navevent ' data-color='#00B34B'><a href='ourevents.php'><img src='assets/img/iconevent.png' data-on='assets/img/iconevent_w.png' data-out='assets/img/iconevent.png'/><p>Events</p></a></li>
                        <li class='navcomp navli' data-color='#027DFC'><a href='companypage.php'><img src='assets/img/iconshop.png' data-on='assets/img/iconshop_w.png' data-out='assets/img/iconshop.png'/><p>Organization's page</p></a></li>
                        <li class='navdash navli' data-color='#69AFEA'><a href='dashboard.php'><img src='assets/img/icondash.png' data-on='assets/img/icondash_w.png' data-out='assets/img/icondash.png'/><p>Dashboard</p></a></li>
                        <li class='navparameters navli' data-color='#7B7B7B'><a href='parameters.php'><img src='assets/img/iconsettings.png' alt='parameters' class='parameters' data-on='assets/img/iconsettings_w.png' data-out='assets/img/iconsettings.png'/><p>Settings</p></a></li>
                    </ul>
                </nav>
                <div class='corpus'>
                    <h2>Scheduled events </h2> 
                    <div class='flexer-events'>
                        <span class='add-event-container'><img src='assets/img/icon-more.png' class='iconbtn'/>Create a new event</span>
                        <div class='flexer-scheduled'>
                        </div>
                    </div>
                    <h2>Past events</h2>
                    <div class='flexer-past'>
                    </div>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/header_private_comp2.js"></script>
            <script src="js/ourevents.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}