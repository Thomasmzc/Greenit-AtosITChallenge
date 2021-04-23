<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "perso"){

?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css" rel="stylesheet" />
            <link href="css/style_personal_profile.css" rel="stylesheet" />
            <link href="css/style_header_private.css" rel="stylesheet" />
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
                            <li class='navcart navli' data-color='#027DFC'><a href='consume.php'><img src='assets/img/iconshopping.png' data-on='assets/img/iconshopping_w.png' data-out='assets/img/iconshopping.png'/><p>Consume sustainably</p></a></li>
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
                <h1>My profile</h1>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
            </header>
            <section>
                <div class='corpus'>
                    <div class='flexer-profile_infos'>
                        <span id='gotoedit'>Edit my profile</span>
                        <span id='invit'><img src='assets/img/icon-more.png' class='iconbtn'/>Invite</span>
                        <div class='img-profile'><p>Add a picture</p></div>
                        <input type='file' id='imgprofil_container' accept="image/*"/>
                        
                        <div class='profile_infos'>
                            <ins class='insname'></ins>
                            <ins class='inscity'></ins>
                            <ins class='insage'></ins>
                        </div>
                        <div class='profile_infosedit'>
                            <input type='text' id='fname' placeholder="Your firstname">
                            <input type='text' id='lname' placeholder="Your lastname">
                            <input type='text' id='age' placeholder="Your age">
                            <input type='text' id='city' placeholder="Your city">
                            <input type='text' id='country' placeholder="Your country">
                            <ins class='erroreditprofil'></ins>
                            <div class='flexer-btn'>
                                <span class='discard_profiledit'>Discard changes</span>
                                <button id='submit_profiledit'>Save</button>
                            </div>
                        </div>
                        <div class='level-infos'></div>
                    </div>
                    <div class='flexer-corpus'>
                        <div class='engagements-container' />
                            <div class='bloc_icon_change topingengage'>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" data-supported-dps="24x24" fill="currentColor" class="mercado-match" width="24" height="24" focusable="false">
                                  <path d="M21.13 2.86a3 3 0 00-4.17 0l-13 13L2 22l6.19-2L21.13 7a3 3 0 000-4.16zM6.77 18.57l-1.35-1.34L16.64 6 18 7.35z"></path>
                                </svg>
                            </div>
                            <h2>Engagements</h2>
                            <div class='flexer_interest'></div> 
                            <div class='selector-interests_container'>
                                <p class='explainegage'>Select the causes that speak the most to you.</p>
                                <span id='closerengage'>close</span>
                                <div class='flexerinteresteditor'>
                                </div>
                            </div>
                        </div>
                        <div class='interests-container' />
                            <h2>Interests</h2>
                            <p class='explainegage'>Select the topics that interest you the most</p>
                            <input type='text' id='searcherinterests' placeholder='Interest (eg: Games)' />
                            <div class='findings-container'></div>
                            <div class='selectedinterests'>
                                
                            </div>
                        </div>
                        <div class='rewards-container'>
                            <h2>Rewards</h2>
                            <div class='temporary'>Coming soon !</div> 
                        </div>
                    </div>
                </div>
                <div class='corpus2'>
                    <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                    <h3>Invite a new member</h3>
                    <p class='explain-grey'>Share your personnal link to sponsor a new member and win a reward.</p>
                    <div class='flexer-input'>
                        <input type='text' id='sharelink' placeholder='Code' />
                        <span id='copylink' onclick="CopyLink()">Copy link</span>
                    </div>
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Crop your picture</h5>
                        <div class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="result"  height="auto" width="100%">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id='avortcrop'>Cancel</button>
                        <button type="button" class="btn btn-primary" id="crop">Save</button>
                    </div>
                </div> 
                
            </section>
            <div class='darkness'></div>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
            <!--<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_4uNVuxvyLV4aFrdTwByQXqhwq6KwjF8&libraries=places&callback=activatePlacesSearch"></script>-->
            <script src="js/header_private.js"></script>
            <script src="js/personal_profile.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}