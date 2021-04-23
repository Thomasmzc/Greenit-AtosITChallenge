<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
?> 
<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.css" rel="stylesheet" />
            <link href="css/style_professional_profile.css" rel="stylesheet" />
            <link href="css/style_header_private_comp2.css" rel="stylesheet" />
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
                    <h1>Team profile</h1>
                </div>
            </header>
            <section>
                <nav>
                    <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                    <ul>
                        <li class='navhome navli'><a href='mycompany.php'><img src='assets/img/iconhome.png' data-on='assets/img/iconhome_w.png' data-out='assets/img/iconhome.png'/><p>Home</p></a></li>
                        <li class='navevent navli'><a href='ourevents.php'><img src='assets/img/iconevent.png' data-on='assets/img/iconevent_w.png' data-out='assets/img/iconevent.png'/><p>Events</p></a></li>
                        <li class='navcomp navli'><a href='companypage.php'><img src='assets/img/iconshop.png' data-on='assets/img/iconshop_w.png' data-out='assets/img/iconshop.png'/><p>Organization's page</p></a></li>
                        <li class='navdash navli' data-color='#69AFEA'><a href='dashboard.php'><img src='assets/img/icondash.png' data-on='assets/img/icondash_w.png' data-out='assets/img/icondash.png'/><p>Dashboard</p></a></li>
                        <li class='navparameters navli'><a href='parameters.php'><img src='assets/img/iconsettings.png' alt='parameters' class='parameters' data-on='assets/img/iconsettings_w.png' data-out='assets/img/iconsettings.png'/><p>Settings</p></a></li>
                    </ul>
                </nav>
                <div class='corpus'>
                    <div class='my-container'>
                        <div class='img-profile'><p>Add a picture</p></div>
                        <input type='file' id='imgprofil_container' accept="image/*"/>
                        <img id='blah' src='' />
                        <ins class='myname'>First name</ins>
                        <ins class='myfunction'>Fonction</ins>
                        <ins class='myemail'>email@email.com</ins>
                    </div>
                    <div class='team-container'>
                        <div class='fline-team-container'>
                            <div class='accounts-container'>
                                <h2>Accounts</h2>
                                <span id='invit'><img src='assets/img/icon-more.png' class='iconbtn'/>Invite</span>
                                <div class='account-flexer'>
                                </div>
                            </div>
                            <div class='subscription-container'>
                                <h2>Subscription</h2>
                                <div class='flexer-subscription'>
                                    <div class='bloc_subscribe starter'>
                                        <p>Starter</p>
                                    </div>
                                    <div class='bloc_subscribe upgradesub'>
                                        <img src='assets/img/icon-more.png' class='iconbtnsubscribe'/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='help-container'>
                            <h2>How can we help you <ins class='myfname'>Prenom</ins>?</h2>
                            <div class='flex-help-container'>
                                <div class='pparameter blochelp'>
                                    <div class='center-blochelp'>
                                        <p>Page parameter</p>
                                        <img src='assets/img/computer.png' class='iconhelp'/>
                                    </div>
                                </div>
                                <div class='subscription blochelp'>
                                    <div class='center-blochelp'>
                                        <p>Subscription</p>
                                        <img src='assets/img/networking.png' class='iconhelp'/>
                                    </div>
                                </div>
                                <div class='push blochelp'>
                                    <div class='center-blochelp'>
                                        <p>Push</p>
                                        <img src='assets/img/promotion.png' class='iconhelp'/>
                                    </div>
                                </div>
                                <div class='payment blochelp'>
                                    <div class='center-blochelp'>
                                        <p>Payment</p>
                                        <img src='assets/img/credit-card.png' class='iconhelp'/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class='team-container2'>
                        <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                        <h3>Invite a new team member</h3>
                        <p class='explain-grey'>The invitation will be sent by email, permitting to join your team. The link will be available for 48 hours.</p>
                        <input type='email' id='email_member' placeholder='His/her work email' />
                        <ins class='error_invit error'></ins>
                        <span id='submit_invit'>Send an invitation</span>
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
                <div class="result" height="auto" width="100%">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id='avortcrop'>Cancel</button>
                <button type="button" class="btn btn-primary" id="crop">Save</button>
              </div>
            </div> 
            <div class='darkness'></div>
            </section>
            <footer></footer>

            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
            <script src="js/header_private_comp2.js"></script>
            <script src="js/professional_profile.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}