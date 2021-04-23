<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "perso" && isset($_POST['id'])){
    include("includes/connexion.php");
    $getorga = $bdd->prepare("SELECT * FROM companies WHERE ID = ?");
    $getorga->execute(array($_POST['id']));

    $dataorga = $getorga->fetch();

    $logo = "<img src='uploads/".$dataorga['logo']."' class='ppicture' />";

    if($dataorga['linkedin'] !="" && $dataorga['linkedin'] != null){
        $linkedin = "<img src='assets/img/linkedin.png' alt='linkedin' class='linkedin imglink' data-link='".$dataorga['linkedin']."' onclick=\"openInNewTab('".$dataorga['linkedin']."');\"/>";
    }
    else{
        $linkedin ="";
    }
    if($dataorga['instagram'] !="" && $dataorga['instagram'] != null){
        $instagram = "<img src='assets/img/instagram.png' alt='instagram' class='instagram imglink' data-link='".$dataorga['instagram']."' onclick=\"openInNewTab('".$dataorga['instagram']."');\"/>";
    }
    else{
        $instagram ="";
    }
    if($dataorga['facebook'] !="" && $dataorga['facebook'] != null){
        $facebook = "<img src='assets/img/facebook.png' alt='facebook' class='facebook imglink' data-link='".$dataorga['facebook']."' onclick=\"openInNewTab('".$dataorga['facebook']."');\"/>";
    }
    else{
        $facebook ="";
    }
    if($dataorga['website'] !="" && $dataorga['website'] != null){
        $website = "<img src='assets/img/icon-link.png' alt='facebook' class='websitelink imglink' data-link='".$dataorga['website']."' onclick=\"openInNewTab('".$dataorga['website']."');\"/>";
    }
    else{
        $website ="";
    }
    if($dataorga['email'] !="" && $dataorga['email'] != null){
        $mail = "<img src='assets/img/icon-mail.png' alt='facebook' class='maillink imglink' data-link='".$dataorga['email']."'  onclick = \"parent.location='mailto:".$dataorga['email']."'\"/>";
    }
    else{
        $mail ="";
    }

     // if fav
    $getfav = $bdd->prepare("SELECT * FROM savedOrga WHERE user = ? AND organization = ?");
    $getfav->execute(array($_SESSION['id'], $_POST['id']));
    $nbfav = $getfav->rowCount();
    if($nbfav > 0){
        $fav = $getfav->fetch();
        $datafav = $fav['ID'];
        $imgfav = "<img src='assets/img/staractive.png' />";
    }
    else{
        $datafav = 0;
        $imgfav = "<img src='assets/img/star.png' />";
    }
?>  
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_header_private.css" rel="stylesheet" />
            <link href="css/style_oneorganization.css" rel="stylesheet" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class='corpus' data-orga="<?php echo $_POST['id']; ?>">
                    <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                    <div class='bg_tochange'>
                        <div class='flexer-top'> 
                            <div class='bloc_logo'><?php echo $logo; ?></div>
                            <div class='text-top-container'>
                                <div class='bloc_title-container'>
                                    <h1 class='companyname'><?php echo $dataorga['raison']; ?></h1>
                                </div>
                                <p class='location'><?php echo $dataorga['location']; ?></p>
                                <p class='secteur'><?php echo $dataorga['secteur']; ?></p>
                            </div>
                            <div class='heart-container' data-fav='<?php echo $datafav; ?>'><?php echo $imgfav; ?></div>
                        </div>
                        <div class='switcher-container'>
                            <div class='switcher_header'>
                                <span id='abtus' class='hdractive'>About us</span>
                                <span id='ourevents'>Events</span>
                                <span id='engagements'>Engagement</span>
                                <span id='contacts'>Contact</span>
                            </div>
                            <div class='switcher-corpus'>
                                <div class='switcher-abtus switcher activ' data-id='abtus'>
                                    <p class='description-content'><?php echo htmlspecialchars_decode($dataorga['description']); ?></p>
                                </div>
                                <div class='switcher-ourevents switcher' data-id='ourevents'>
                                    <div class='flexer-scheduled'>
                                    </div>
                                </div>
                                <div class='switcher-engagements switcher' data-id='engagements'>
                                    <p class='keywords'></p>
                                </div>
                                <div class='switcher-contacts switcher' data-id='contacts'>
                                    <div class='flexer-contact'>
                                        <div class='contact-flex'>
                                            <?php echo $website; ?>
                                            <?php echo $mail; ?>
                                        </div>
                                         <div class='reseau-flex'>
                                            <?php echo $linkedin; ?>
                                            <?php echo $instagram; ?>
                                            <?php echo $facebook; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/header_private.js"></script>
            <script src="js/oneorganization.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}