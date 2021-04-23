<?php
session_start(); 
if(isset($_SESSION['id']) && isset($_POST['id'])){
    include('includes/connexion.php');
    // get infos event

    $getevent = $bdd->prepare("SELECT * FROM event WHERE ID = ?");
    $getevent->execute(array($_POST['id']));

    $dataevent = $getevent->fetch();
    $photo = "<img src='uploads/".$dataevent['photo']."' />";
    
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
    if($dataevent['registration'] != null && $dataevent['registration'] != "" && strlen($dataevent['registration']) > 5){
        $registration =  "<div class='register-container' onclick=\"openInNewTab('".$dataevent['registration']."');\"><p>I'm in!</p><img src='assets/img/ciemax.png' /></div>";
    }
    else{
        $registration = "";
    }

    // Get organization
    $getorga = $bdd->prepare("SELECT * FROM companies WHERE ID = ?");
    $getorga->execute(array($dataevent['organization']));
    $dataorga = $getorga->fetch();
    if($dataorga['logo'] != null && $dataorga['logo'] != ""){
        $logo = "<img src='uploads/".$dataorga['logo']."' />";
    }
    else{
        $logo = "";
    }
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

    // if fav
    $getfav = $bdd->prepare("SELECT * FROM savedEvents WHERE user = ? AND event = ?");
    $getfav->execute(array($_SESSION['id'], $_POST['id']));
    $nbfav = $getfav->rowCount();
    if($nbfav > 0){
        $fav = $getfav->fetch();
        $datafav = $fav['ID'];
        $textfav = "<p>Remove from favorites</p>";
        $imgfav = "<img src='assets/img/heartactive.png' />";
        $classfav = "activeh";
    }
    else{
        $datafav = 0;
        $textfav = "<p>Add to favorites</p>";
        $imgfav = "<img src='assets/img/heart.png' />";
        $classfav = "";
    }

?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <!-- En-tête de la page -->
            <link href="css/style_header_private.css" rel="stylesheet" />
            <link href="css/style_event.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>green'it</title>
        </head>

        <body>
            <header>
            </header>
            <section>
                <div class='corpus' data-event="<?php echo $_POST['id']; ?>">
                    <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                    <div class='fline-container'>
                        <div class='photo-container'>
                            <?php echo $photo; ?>
                        </div>
                        <div class='title-container'>
                            <h2 id='eventname'><?php echo $dataevent['title']; ?></h2>
                            <p id='eventdate'><?php echo $datetime; ?></p>
                            <p id='location'><img src='assets/img/pin.png' /><?php echo $dataevent['location']; ?></p>
                            <div id='keywords-container'>
                                <ul>
                                    <li class='k1'><?php echo $dataevent['openness']; ?></li>
                                    <li class='k2'><?php echo $dataevent['payment']; ?></li>
                                    <li class='k3'><?php echo $dataevent['timing']; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class='heart-container <?php echo $classfav; ?>' data-fav='<?php echo $datafav; ?>'><?php echo $textfav.$imgfav; ?></div>
                        <?php
                           echo $registration;
                        ?>
                    </div>
                    <div class='secondlinecontainer'>
                        <div class='eventside'>
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
                        <div class='companyside'>
                            <div class='company-container' data-idorga="<?php echo $dataorga['ID']; ?>">
                                <div class='logo-container'>
                                    <?php echo $logo; ?>
                                </div>
                                <span class='organame'><?php echo $dataorga['raison']; ?></span>
                                <div class='flex-links-contactOrga'>
                                    <?php echo $website; ?>
                                    <?php echo $linkedin; ?>
                                    <?php echo $instagram; ?>
                                    <?php echo $facebook; ?>
                                </div>
                                <button class='gotoevents'>See all events</button>
                            </div>
                            <div class='share-container'>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer></footer>

             <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/header_private.js"></script>
            <script src="js/event.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: ourevents.php');
}