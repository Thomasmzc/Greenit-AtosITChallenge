<?php

session_start(); 
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro" && isset($_POST['id'])){
    include('includes/connexion.php');
    // get infos event

    $getevent = $bdd->prepare("SELECT * FROM event WHERE ID = ? AND organization = ?");
    $getevent->execute(array($_POST['id'], $_SESSION['orga']));

    $dataevent = $getevent->fetch();

    if($dataevent['photo'] != null && $dataevent['photo'] != ""){
        $photo = "<img src='uploads/".$dataevent['photo']."' />";
    }
    else{
         $photo = "<img src='uploads/".$dataevent['photo']."' />";
        // Insert  photo de base
    }
    $dt = DateTime::createFromFormat('m/d/Y', $dataevent['date_start']);
    $timer = $dt->format('l d F Y');
    if($dataevent['date_end'] != ""){
        $dt2 = DateTime::createFromFormat('m/d/Y', $dataevent['date_end']);
        $timer2 = $dt2->format('l d F Y');
    }
    $replacehourS = str_replace(":","h",$dataevent['hour_start']);
    if($dataevent['hour_end'] != ""){
        $replacehourF = str_replace(":","h",$dataevent['hour_end']);
    }
    if($dataevent['date_end'] != "" && $dataevent['hour_end'] != ""){
        $datetime = $timer." to ".$timer2." - ".$replacehourS." to ".$replacehourF;
        $content_date = $timer." to ".$timer2;
        $content_hour = $replacehourS." to ".$replacehourF;
    }
    else if($dataevent['date_end'] != "" && $dataevent['hour_end'] == ""){
        $datetime = $timer." to ".$timer2." - ".$replacehourS;
        $content_date = $timer." to ".$timer2;
        $content_hour = $replacehourS;
    }
    else if($dataevent['date_end'] == "" && $dataevent['hour_end'] != ""){
        $datetime = $timer." - ".$replacehourS." to ".$replacehourF;
        $content_date = $timer;
        $content_hour = $replacehourS." to ".$replacehourF;
    }
    else if($dataevent['date_end'] == "" && $dataevent['hour_end'] == ""){
        $datetime = $timer." - ".$replacehourS;
        $content_date = $timer;
        $content_hour = $replacehourS;
    }
    // Get author
    $getauthor = $bdd->prepare("SELECT fname, lname, photo FROM team WHERE ID = ?");
    $getauthor->execute(array($dataevent['id_author']));
    $dataauthor = $getauthor->fetch();
    if($dataauthor['photo'] != null && $dataauthor['photo'] != ""){
        $photo_author = "<img src='uploads/".$dataauthor['photo']."' />";
    }
    else{
        $photo_author = "";
    }
    if($dataevent['registration'] != null && $dataevent['registration'] != "" && strlen($dataevent['registration']) > 5){
        $registration =  "<div class='register-container' onclick=\"openInNewTab('".$dataevent['registration']."');\"><p>I'm in!</p><img src='assets/img/ciemax.png' /></div>";
    }
    else{
        $registration = "";
    }
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_header_private_comp2.css" rel="stylesheet" />
            <link href="css/style_scheduledevent.css" rel="stylesheet" />
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
                    <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                    <span class='editer' data-id="<?php echo $_POST['id']; ?>">Edit this event</span>
                    <span class='canceler'>Cancel this event</span>
                    <div class='fline-container'>
                        <div class='photo-container'>
                            <?php echo $photo; ?>
                        </div>
                        <div class='title-container'>
                            <h2 id='eventname'><?php echo $dataevent['title']; ?></h2>
                            <p id='location'><img src='assets/img/pin.png' /><?php echo $dataevent['location']; ?></p>
                            <div id='keywords-container'>
                                <ul>
                                    <li class='k1'><?php echo $dataevent['openness']; ?></li>
                                    <li class='k2'><?php echo $dataevent['payment']; ?></li>
                                    <li class='k3'><?php echo $dataevent['timing']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <?php
                           echo $registration;
                        ?>
                    </div>
                    <div class='flinesecond-container'>
                        <div class='datecontainer'>
                            <div class='icon-container'>
                                <img src='assets/img/icon-calendar.png'/>
                            </div>
                            <ins class='insdate'><?php echo $content_date; ?></ins>
                        </div>
                        <div class='hourcontainer'>
                            <div class='icon-container'>
                                <img src='assets/img/icon-clock.png'/>
                            </div>
                            <ins class='inshour'><?php echo $content_hour; ?></ins>
                        </div>
                    </div>
                    <div class='description_container'>
                        <p><?php echo htmlspecialchars_decode($dataevent['description']); ?></p>
                    </div>
                    <div class='contact-container'>
                        <h3>Proposed by</h3>
                        <div class='insert-contacts'>
                            <div class='imgproposedby'>
                                <?php echo $photo_author; ?>
                            </div>
                            <p><?php echo  $dataauthor['fname']." ".$dataauthor['lname']; ?></p>
                        </div>
                    </div>
                </div>
                <div class='corpus2'>
                    <span class='return-container2'><img src='assets/img/icon-back.png' /></span>
                    <h2>Cancelling the event</h2>
                    <p class='explaining'>Your event will be deleted. Type your password to confirm the cancellation.</p>
                    <input type='password' id='password' placeholder='Password' />
                    <ins id='errorpass'></ins>
                    <button id='confirmdelete' data-id="<?php echo $_POST['id']; ?>">Confirm</button>
                </div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/header_private_comp2.js"></script>
            <script src="js/scheduledevent.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: ourevents.php');
}