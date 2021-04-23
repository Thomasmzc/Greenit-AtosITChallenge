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
            <link href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" rel="stylesheet" />
            <link href="css/style_header_private_comp2.css" rel="stylesheet" />
            <link href="css/style_addevent.css" rel="stylesheet" />
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
                    <h1>Create a new event</h1>
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
                <div class='corpus0'>
                    <h4>Which type of event is it ?</h4>
                    <div class='flexer-type'>
                        <span class='onlinego fgo' data-type='online'>Online event</span>
                        <span class='physicgo fgo' data-type='physical'>Physical event</span>
                    </div>
                </div>
                <div class='corpus'>
                    <span class='return-container2'><img src='assets/img/icon-back.png' /></span>
                    <div class='fline-container'>
                        <div class='bloc_add_photo' data-img=''>
                            <img class='tohide' src='assets/img/plus-white.png' />
                        </div>
                        <input type='file' id='imgprofil_container' accept="image/*"/>
                        <div class='inputs-container'>
                            <h2 class='lttile'>Event's name</h2>
                            <input type='text' id='name' maxlength="60" placeholder="Event's name ..." />
                            <p class='explains'>60 characters remaining</p>
                            <h2 class='lttile'>Location</h2>
                            <input type='text' id='location' placeholder='Location' />
                        </div>
                    </div>
                    <div class='subflexercontainer'>
                        <h2>Date & Time</h2>
                        <div class='second-line-container linecontainer'>
                            <div class='flexer-inputs'>
                                <div class='inputblc'>
                                    <input class='datetime datepickiing' id='datestart' placeholder='04/27/2021' maxlength="10"/>
                                    <img src='assets/img/icon-calendar.png' />
                                </div>
                                <div class='inputblc hided' id='blcdateendt'>
                                    <input class='datetime datepickiing' id='dateendt' placeholder='02/15/2021' maxlength="10"/>
                                    <img src='assets/img/icon-calendar.png' />
                                </div>
                            </div>
                            <button id='addendD'>Add an end date</button> 
                            <div class='flexer-inputs'>
                                <div class='inputblc'>
                                    <input class='time' id='hourstart' placeholder='18:00' maxlength="5"/>
                                    <img src='assets/img/icon-clock.png' />
                                </div>
                                <div class='inputblc hided' id='blchourend'>
                                    <input class='time' id='hourend' placeholder='21:00' maxlength="5"/>
                                    <img src='assets/img/icon-clock.png' />
                                </div>
                            </div>
                            <button id='addendH'>Add an end hour</button>
                        </div>
                    </div>
                    <div class='fourth-line-container linecontainer'>
                        <h2>Description</h2>
                        <div id='description' contenteditable="true" placeholder="Describe your event, your program, who is it for..."></div>
                    </div>
                    <div class='fifth-line-container linecontainer'>
                        <h2>Topic</h2>
                        <span id='typeof' data-val=''>Choose a topic</span>
                        <div class='choice-typeof'>
                            <ul>
                                <li class='selectortypeof' data-form="Sport">Sport event</li>
                                <li class='selectortypeof' data-form="Show">Show</li>
                                <li class='selectortypeof' data-form="Online">Online</li>
                                <li class='selectortypeof' data-form="Challenge">Challenge</li>
                                <li class='selectortypeof' data-form="Volunteer">Volunteer</li>
                                <li class='selectortypeof' data-form="Meeting">Meeting</li>
                                <li class='selectortypeof' data-form="Fair">Fair</li>
                                <li class='selectortypeof' data-form="Giveaway">Giveaway</li>
                                <li class='selectortypeof' data-form="Festival">Festival</li>
                                <li class='selectortypeof' data-form="Exhibition">Exhibition</li>
                                <li class='selectortypeof' data-form="Other">Other</li>
                            </ul>
                        </div>
                    </div>
                    <ins class='error'></ins>
                    <button id='submit'>Next</button>
                </div>
                 <div class='corpus2'>
                    <span class='return-container'><img src='assets/img/icon-back.png' /></span>
                    <h2>We need a little more details ...</h2>
                    <div class='flex-link'>
                        <h3>Event's website: </h3>
                        <input type='text' id='linkwebsite' placeholder="Link to your event's website" />
                        <h3>Registration: </h3>
                        <input type='text' id='linkregis' placeholder="Link to your event's registration page" />
                    </div>
                    <div class='flex-cracateristics'>
                        <div class='left-carac'>
                            <div class='l1carac lcarac'>
                                <div class='private divcarac' data-color="#E0C94B" data-selec="0">
                                    <p>Private</p>
                                    <img src='assets/img/padlockcolor.png' data-out="assets/img/padlockcolor.png" data-on="assets/img/padlock.png" class='imgcarac' />
                                </div>
                                 <div class='public divcarac' data-color="#E0C94B" data-selec="0">
                                    <p>Public</p>
                                    <img src='assets/img/unlockcolor.png' data-out="assets/img/unlockcolor.png" data-on="assets/img/unlock.png"  class='imgcarac'/>
                                </div>
                            </div>
                            <div class='l2carac lcarac'>
                                <div class='paying divcarac' data-color="#E6573B" data-selec="0">
                                    <p>Paying</p>
                                    <img src='assets/img/moneycolor.png' data-out="assets/img/moneycolor.png" data-on="assets/img/money.png" class='imgcarac'/>
                                </div>
                                 <div class='free divcarac' data-color="#E6573B" data-selec="0">
                                    <p>Free</p>
                                    <img src='assets/img/growthcolor.png' data-out="assets/img/growthcolor.png" data-on="assets/img/growth.png" class='imgcarac'/>
                                </div>
                            </div>
                            <div class='l3carac lcarac'>
                                <div class='onetime divcarac' data-color="#7A61ED" data-selec="0">
                                    <p>One time</p>
                                    <img src='assets/img/hourglasscolor.png' data-out="assets/img/hourglasscolor.png" data-on="assets/img/hourglass.png" class='imgcarac'/>
                                </div>
                                 <div class='regular divcarac' data-color="#7A61ED" data-selec="0">
                                    <p>Regularly</p>
                                    <img src='assets/img/calendarcolor.png' data-out="assets/img/calendarcolor.png" data-on="assets/img/calendar.png" class='imgcarac'/>
                                </div>
                            </div>
                        </div>
                        <div class='right-carac'>
                            <h3>Physical effort: </h3>
                            <div class='flexcards'>
                                <div class='card-effort eff1' data-selec="0">
                                    <img src='assets/img/effort1.png'/>
                                    <div class='roundeff'></div>
                                </div>
                                 <div class='card-effort eff2' data-selec="0">
                                    <img src='assets/img/effort2.png'/>
                                    <div class='roundeff'></div>
                                </div>
                                <div class='card-effort eff3' data-selec="0">
                                    <img src='assets/img/effort3.png'/>
                                    <div class='roundeff'></div>
                                </div>
                                <div class='card-effort eff4' data-selec="0">
                                    <img src='assets/img/effort4.png'/>
                                    <div class='roundeff'></div>
                                </div>
                                <div class='card-effort eff5' data-selec="0">
                                    <img src='assets/img/effort5.png'/>
                                    <div class='roundeff'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id='submit2'>Let the magic happen</button>
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
            <div id='darkness'></div>
            <div class='darkness'></div>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.11/cropper.min.js"></script>
            <script src="js/header_private_comp2.js"></script>
            <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"   integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="   crossorigin="anonymous"></script>
            <script src="js/addevent.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}