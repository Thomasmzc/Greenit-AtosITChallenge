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
            <link href="css/style_header_private_comp2.css" rel="stylesheet" />
            <link href="css/style_companypage.css" rel="stylesheet" />
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
                    <h1>Organization's page</h1>
                </div>
            </header>
            <section>
                <nav>
                    <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                    <ul>
                        <li class='navhome navli' data-color='#000000'><a href='mycompany.php'><img src='assets/img/iconhome.png' data-on='assets/img/iconhome_w.png' data-out='assets/img/iconhome.png'/><p>Home</p></a></li>
                        <li class=' navevent navli' data-color='#00B34B'><a href='ourevents.php'><img src='assets/img/iconevent.png' data-on='assets/img/iconevent_w.png' data-out='assets/img/iconevent.png'/><p>Events</p></a></li>
                        <li class='active navcomp ' data-color='#027DFC'><a href='companypage.php'><img src='assets/img/iconshop.png' data-on='assets/img/iconshop_w.png' data-out='assets/img/iconshop.png'/><p>Organization's page</p></a></li>
                        <li class='navdash navli' data-color='#69AFEA'><a href='dashboard.php'><img src='assets/img/icondash.png' data-on='assets/img/icondash_w.png' data-out='assets/img/icondash.png'/><p>Dashboard</p></a></li>
                        <li class='navparameters navli' data-color='#7B7B7B'><a href='parameters.php'><img src='assets/img/iconsettings.png' alt='parameters' class='parameters' data-on='assets/img/iconsettings_w.png' data-out='assets/img/iconsettings.png'/><p>Settings</p></a></li>
                    </ul>
                </nav>
                <div class='corpus'>
                    <div class='bg_tochange'>
                        <span id='gotoedit'>Edit</span>
                        <div class='containerbtneditor'>
                            <span id='gotodiscard'>Discard changes</span>
                            <button id='savetopeditor'>Save</button>
                        </div>
                        <div class='flexer-top'> 
                            <div class='bloc_logo'><p>Add a logo</p></div>
                            <input type='file' id='imgprofil_container' accept="image/*"/>
                            <div class='text-top-container'>
                                <div class='bloc_title-container'>
                                    <h1 class='companyname'></h1>
                                </div>
                                <p class='location'></p>
                                <p class='secteur'></p>
                                <p class='keywords'></p>
                            </div>
                            <div class='text-top-editor'>
                                <h1 class='companyname'></h1>
                                <div class='blc-input'>
                                    <label for='location'>Location:</label>
                                    <input type='text' id='location' />
                                </div>
                                <div class='blc-input'>
                                    <label>Industry:</label>
                                    <span id='typeof' class='spansector' data-val=''>Choose your industry</span>
                                    <div class='choice-typeof'>
                                        <ul>
                                            
                                        </ul>
                                    </div>
                                </div>
                                <div class='blc-inputntflex'>
                                    <label for='keywords'>Keywords:</label>
                                    <div class='flexerinteresteditor'>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class='description-container'>
                            <div class='bloc_title-container'>
                                <h3>Description</h3>
                            </div>
                            <div class='description-text'>
                                <p class='description-content'></p>
                            </div>
                            <div class='description-text-editor'>
                                <div id='description' class='description-content-edit' contenteditable="true" placeholder ='Describing your organization, environnemental engagements and activities here...'></div>
                            </div>
                        </div>
                        <div class='contact-container'>
                            <div class='bloc_title-container'>
                            <h3>Contact</h3>
                            </div>
                            <div class='contact-flex'>
                                <p class='website-content'></p>
                                <p class='mail-content'></p>
                            </div>
                            <div class='contact-editor'>
                                 <div class='blc-input'>
                                    <label for='website'>Website:</label>
                                    <input type='text' id='website' />
                                </div>
                                <div class='blc-input'>
                                    <label for='email'>Email:</label>
                                    <input type='text' id='email' />
                                </div>
                            </div>
                        </div>
                        <div class='reseau-container'>
                            <div class='bloc_title-container'>
                                <h3>Social networks</h3>
                            </div>
                            <div class='reseau-flex'>
                                <img src='assets/img/linkedin.png' alt='linkedin' class='linkedin imglink'/>
                                <img src='assets/img/instagram.png' alt='instagram' class='instagram imglink'/>
                                <img src='assets/img/facebook.png' alt='facebook' class='facebook imglink'/>
                            </div>
                             <div class='reseau-editor'>
                                <div class='blc-input'>
                                    <label for='linkedin'>Linkedin:</label>
                                    <input type='text' id='linkedin' />
                                </div>
                                <div class='blc-input'>
                                    <label for='instagram'>Instagram:</label>
                                    <input type='text' id='instagram' />
                                </div>
                                 <div class='blc-input'>
                                    <label for='facebook'>Facebook:</label>
                                    <input type='text' id='facebook' />
                                </div>
                            </div>
                        </div>
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
            <script src="js/header_private_comp2.js"></script>
            <script src="js/companypage.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}