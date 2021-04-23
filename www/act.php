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
            <link href="css/style_act.css" rel="stylesheet" />
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
                            <li class='active navact' data-color='#00B34B'><a href='act.php'><img src='assets/img/iconhandsdouble.png' data-on='assets/img/iconhandsdouble_w.png' data-out='assets/img/iconhandsdouble.png'/><p>Act for the future</p></a></li>
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
                <h1>Act for the future</h1>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
            </header>
            <section>
                <div class='corpus'>
                    <div class='searchnav-container'>
                        <div class='browse-container'>
                            <h2>Browse all</h2>
                            <div class='flexer-browse'>
                                <div class='category-container' data-terms="0" data-active="0">
                                    <p>Sport event</p>
                                    <img src='assets/img/handsup.png' />
                                    <span>Sweat for the green cause</span>
                                </div>
                                <div class='category-container' data-terms="1" data-active="0">
                                    <p>Show</p>
                                    <img src='assets/img/popcorn.png' />
                                    <span>Support artistry that supports the planet</span>
                                </div>
                                <div class='category-container' data-terms="3" data-active="0">
                                    <p>Challenge</p>
                                    <img src='assets/img/puzzle.png' />
                                    <span>Bring eco-friendly ideas to the table</span>
                                </div>
                                <div class='category-container' data-terms="4" data-active="0">
                                    <p>Volunteer</p>
                                    <img src='assets/img/linkedhands.png' />
                                    <span>Be an active part of the ecosystem</span>
                                </div>
                                <div class='category-container' data-terms="5" data-active="0">
                                    <p>Meeting</p>
                                    <img src='assets/img/meeting.png' />
                                    <span>Join to get to know and discuss green ideas</span>
                                </div>
                                <div class='category-container' data-terms="6" data-active="0">
                                    <p>Fair</p>
                                    <img src='assets/img/plume.png' />
                                    <span>A whole schedule for change</span>
                                </div>
                                <div class='category-container' data-terms="7" data-active="0">
                                    <p>Giveaway</p>
                                    <img src='assets/img/clothes.png' />
                                    <span>Choose to reuse</span>
                                </div>
                                <div class='category-container' data-terms="8" data-active="0">
                                    <p>Festival</p>
                                    <img src='assets/img/banderole.png' />
                                    <span>Your favorite artists with less emissions</span>
                                </div>
                                <div class='category-container' data-terms="9" data-active="0">
                                    <p>Exhibition</p>
                                    <img src='assets/img/exhibit.png' />
                                    <span>Gain awareness through culture</span>
                                </div>
                                <div class='category-container' data-terms="10" data-active="0">
                                    <p>Other</p>
                                    <span>Oh yes there's more</span>
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
                                    <input type='text' id='searcher' placeholder="Search for an event's name, location ..." />
                                    <img src='assets/img/icon-loupe.png' alt='search' />
                                </div>
                                <img src='assets/img/settings.png' class='filters'/>
                                <span id='getonline' class='onlinebtn'>Online</span>
                                <span id='getcloser' class='closerbtn'>Near me</span>
                            </div>
                            <div class='ffcontainer'>
                                <div class='filters-container'>
                                    <div class='left-filter-blc'>
                                        <div class='typeblc'>
                                            <p class='filtertitle'>Type</p>
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
                                        </div>
                                        <div class='priceblc'>
                                            <p class='filtertitle'>Price</p>
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
                                        </div>
                                        <div class='timeblc'>
                                            <p class='filtertitle'>Reccurence</p>
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
                                    </div>
                                    <div class='middle-filter-blc'>
                                        <div class='dateblc'>
                                            <p class='filtertitle2'>Date</p>
                                            <div class='inputblc'>
                                                <input class='datetime datepickiing' id='datefilter' placeholder='02/11/2021' maxlength="10"/>
                                                <img src='assets/img/icon-calendar.png' />
                                            </div>
                                        </div>
                                        <div class='phiscalblc'>
                                            <p>Physical effort: </p>
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
                                    <div class='right-filter-blc'>
                                        <p class='righttitle'>Duration </p>
                                        <div class='durationcarac lcarac2'>
                                                <div class='hours divcarac2' data-color="#00B34B" data-selec="0">
                                                    <p>Hours</p>
                                                    <img src='assets/img/sacfeuillecolor.png' data-out="assets/img/sacfeuillecolor.png" data-on="assets/img/sacfeuille.png" class='imgcarac'/>
                                                </div>
                                                <div class='days divcarac2' data-color="#00B34B" data-selec="0">
                                                    <p>Days</p>
                                                    <img src='assets/img/plantitcolor.png' data-out="assets/img/plantitcolor.png" data-on="assets/img/plantit.png" class='imgcarac'/>
                                                </div>
                                                <div class='month divcarac2' data-color="#00B34B" data-selec="0">
                                                    <p>Month</p>
                                                    <img src='assets/img/arbreitcolor.png' data-out="assets/img/arbreitcolor.png" data-on="assets/img/arbreit.png" class='imgcarac'/>
                                                </div>
                                                <div class='year divcarac2' data-color="#00B34B" data-selec="0">
                                                    <p>Year</p>
                                                    <img src='assets/img/worldwidecolor.png' data-out="assets/img/worldwidecolor.png" data-on="assets/img/worldwide.png" class='imgcarac'/>
                                                </div>
                                            </div>
                                    </div>
                                    <div class='flexer-btnfilter'>
                                        <button id='delfilter'>Delete</button>
                                        <button id='applyfilter'>Apply</button>
                                    </div>
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
            <script src="js/act.js"></script>
        </body>

    </div>
</html>
<?php
}
else{
    header('Location: index.html');
}