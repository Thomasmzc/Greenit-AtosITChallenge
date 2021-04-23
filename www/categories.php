<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_categories.css" rel="stylesheet" />
            <link href="css/style_footer.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>Green'IT</title>
        </head>

        <body>
            <header>
                <img src='assets/img/logo_black.png' alt='greenit' class='logo'/>
                <div class='bloc_btncenter'>
                    <button class='gotoperso'>Personal</button>
                    <button class='gotocompany'>Organization</button>
                </div>
                <div class='bloc_btn'>
                    <button class='gotolog'>Log in</button>
                    <button class='gotosign'>Take part in action</button>
                </div>
                <div class='burger hovereffect'>
                    <div class='line1'></div>
                    <div class='line2'></div>
                    <div class='line3'></div>
                </div>
                <ul class='nav-links'>
                    <div class='headernav'>
                        <img src='assets/img/logo_black.png' alt='greenit' class='logonav'/>
                        <div class='bloc_btncenternav'>
                            <button class='gotopersonav'>Personal</button>
                            <button class='gotocompanynav'>For companies</button>
                        </div>
                    </div>
                    <div class='blcnav1'>
                        <li class='nav-link hovereffect'>
                            <a href='login.php'>Log in</a>
                        </li>
                        <li class='nav-link hovereffect'>
                            <a href='signup.php'>Take part in action</a>
                        </li>
                    </div>
                </ul>
            </header>
            <section>
                <span class='return-container' data-state="0"><img src='assets/img/icon-back.png' /></span>
                <div class='navright'>
                    <ul>
                        <li class='navcatego activesub' id='navcat1' data-category='1'>My fridge</li>
                        <li class='navcatego' id='navcat2' data-category='2'>My bank account</li>
                        <li class='navcatego' id='navcat3' data-category='3'>My transport</li>
                        <li class='navcatego' id='navcat4' data-category='4'>My closet</li>
                        <li class='navcatego' id='navcat5' data-category='5'>My digital devices</li>
                        <li class='navcatego' id='navcat6' data-category='6'>My home</li>
                        <li class='navcatego' id='navcat7' data-category='7'>My waste</li>
                        <li class='navcatego' id='navcat8' data-category='8'>My beauty</li>
                        <li class='navcatego' id='navcat9' data-category='9'>My business</li>
                        <li class='navcatego' id='navcat10' data-category='10'>My entertainment</li>
                        <li class='navcatego' id='navcat11' data-category='11'>My health</li>
                        <li class='navcatego' id='navcat12' data-category='12'>My vacation</li>
                        <li class='navcatego' id='navcat13' data-category='13'>My sport</li>
                    </ul>
                </div>
                <div class="corpus">
                    <div class="slide" id='slide1' data-nbrslide='1'>
                        <div class='image-container'>
                            <img src='assets/img/fridgeimg.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My fridge</p>
                                    <img src='assets/img/apple.png' />
                                </div>
                                <h2>Eat healthy and eco-responsibly </h2>
                            </div>
                            <p class='explaingrey'>Today, more and more producers, agri-food industries, distributors and consumers are taking action to offer more sustainable food.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label1'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide2' data-nbrslide='2'>
                        <div class='image-container'>
                            <img src='assets/img/mybankimg.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My bank</p>
                                    <img src='assets/img/bank.png' />
                                </div>
                                <h2>Choose an ethical bank to support the ecological transition</h2>
                            </div>
                            <p class='explaingrey'>The purpose of these banks is to collect and use their clients' money for a social, environmental or cultural impact.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label2'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide3' data-nbrslide='3'>
                         <div class='image-container'>
                            <img src='assets/img/mytransport.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My transports</p>
                                    <img src='assets/img/eleccar.png' />
                                </div>
                                <h2>Make the right choice among the different modes of transportation</h2>
                            </div>
                            <p class='explaingrey'>Today, many solutions have been developed, allowing everyone to leave a smaller ecological footprint when traveling.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label3'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide4' data-nbrslide='4'>
                        <div class='image-container'>
                            <img src='assets/img/mycloset.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My closet</p>
                                    <img src='assets/img/cintre.png' />
                                </div>
                                <h2>Say no to fast fashion and yes to an eco-responsible fashion</h2>
                            </div>
                            <p class='explaingrey'>The quality of a clothing is not limited to its cut or its material, but also to the respect of the planet and the people around us.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label4'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide5' data-nbrslide='5'>
                        <div class='image-container'>
                            <img src='assets/img/mytechno.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My digital devices</p>
                                    <img src='assets/img/ddevices.png' />
                                </div>
                                <h2>Convert to green technology</h2>
                            </div>
                            <p class='explaingrey'>Extending the lifespan, recycling, switching off, all key solutions to reduce the ecological footprint of electronic equipment.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label5'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide6' data-nbrslide='6'>
                         <div class='image-container'>
                            <img src='assets/img/myhome.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My home</p>
                                    <img src='assets/img/brouette.png' />
                                </div>
                                <h2>A healthy lifestyle that does not negatively affect the environment</h2>
                            </div>
                            <p class='explaingrey'>The birth and expansion of ecological houses has many advantages both for nature and for the pleasure of people.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label6'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide7' data-nbrslide='7'>
                        <div class='image-container'>
                            <img src='assets/img/mywaste.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My waste</p>
                                    <img src='assets/img/trash.png' />
                                </div>
                                <h2>Taking action on a daily basis: reducing waste</h2>
                            </div>
                            <p class='explaingrey'>Whether in terms of production, sorting or reuse, there are multiple solutions to better manage waste.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label7'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide8' data-nbrslide='8'>
                        <div class='image-container'>
                            <img src='assets/img/mybeauty.png' />

                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My beauty</p>
                                    <img src='assets/img/cils.png' />
                                </div>
                                <h2>Protect your body by using natural products</h2>
                            </div>
                            <p class='explaingrey'>Choose more natural products to take care of your skin and makeup while preserving the planet.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label8'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide9' data-nbrslide='9'>
                        <div class='image-container'>
                            <img src='assets/img/mybusiness.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My business</p>
                                    <img src='assets/img/whiteshop.png' />
                                </div>
                                <h2>Reconciling economic activity and the environment</h2>
                            </div>
                            <p class='explaingrey'>The explicit desire to contribute to the preservation of environmental resources.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label9'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide10' data-nbrslide='10'>
                         <div class='image-container'>
                            <img src='assets/img/myentertainment.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My entertainment</p>
                                    <img src='assets/img/books.png' />
                                </div>
                                <h2>The climate and environmental crisis is everyone's business</h2>
                            </div>
                            <p class='explaingrey'>A lever for raising awareness, informing, creating links between the various components of society and supporting mobilization and awareness.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label10'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide11' data-nbrslide='11'>
                         <div class='image-container'>
                            <img src='assets/img/myhealth.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My health</p>
                                    <img src='assets/img/healthicon.png' />
                                </div>
                                <h2>The environment is the key to better health</h2>
                            </div>
                            <p class='explaingrey'>Acting on environmental factors makes it possible to prevent, preserve and improve the health of the population.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label11'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide12' data-nbrslide='12'>
                         <div class='image-container'>
                            <img src='assets/img/myvacation.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My vacation</p>
                                    <img src='assets/img/vacations.png' />
                                </div>
                                <h2>Go on vacation, go green</h2>
                            </div>
                            <p class='explaingrey'>There are solutions to travel in a more virtuous way.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label12'>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide" id='slide13' data-nbrslide='13'>
                         <div class='image-container'>
                            <img src='assets/img/mysport.png' />
                        </div>
                        <div class='explanationscontainer'>
                            <div class='flexertitle'>
                                <div class='littlecatego'>
                                    <p>My sports</p>
                                    <img src='assets/img/bycicle.png' />
                                </div>
                                <h2>Combine your sports resolutions with your ecological commitments</h2>
                            </div>
                            <p class='explaingrey'>Some sports pollute more than others, whether it is the equipment, the infrastructure or the practice itself.</p>
                            <div class='labelcontainer'>
                                <h3>Labels</h3>
                                <div class='flexerlabel' id='label13'>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer>
                <div class='fline_footer'>
                    <img src='assets/img/logo_black.png' alt='greenit' class='logo-footer'/>
                    <div class='language_change'>
                        <svg viewBox="0 0 24 24" size="24" color="#8B959E" class="icon-base__IconBase-sc-1efctcf-0 bFIjry"><g fill="currentColor"><path fill="currentColor" d="M0 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2h-2c-1.48 0-2.773.804-3.465 2H8V4a1 1 0 0 0-2 0v1H3a1 1 0 0 0 0 2h5v3c0 .743-.358 1.57-1 2.353-.642-.783-1-1.61-1-2.353a1 1 0 0 0-2 0c0 1.366.63 2.644 1.525 3.706-.813.573-1.707.982-2.535 1.173-.538.124-.99.569-.99 1.121s.45 1.005.995.916c1.397-.23 2.826-.912 4.005-1.813.317.243.652.47 1 .675V19H2a2 2 0 0 1-2-2V3zM18.333 15L17 11l-1.333 4h2.666z"></path><path fill="currentColor" d="M10 21a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H12a1.999 1.999 0 0 0-2 2v14zm6.72-13h.56a1 1 0 0 1 .948.684l3.356 10.067a.949.949 0 0 1-1.8.6L19 17h-4l-.784 2.351a.949.949 0 1 1-1.8-.6l3.356-10.067A1 1 0 0 1 16.721 8z"></path></g></svg>
                        <p>English</p>
                    </div>
                </div>
                <div class='page-container'>
                    <ul>
                        <p class='pfootactive'>Personal</p>
                        <li><a href="#" class='aactive'>Home</a></li>
                        <li><a href="#">Log in</a></li>
                        <li><a href="#">Sign up</a></li>
                    </ul>
                    <ul>
                        <p>For organizations</p>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Log in</a></li>
                        <li><a href="#">Sign up</a></li>
                    </ul>
                </div>
                <div class='bottom-footer'>
                    <div class='flexer-bottom_footer'>
                        <p class='allrightreserved'>© 2021 green'it</p>
                        <a href="terms.php">Website Terms</a>
                        <a href="privacy.php">Privacy policy</a>
                        <a href="#">Help</a>
                        <a href="legal.php">Legal</a>
                        <a href="charter.php">Our Charter</a>
                    </div>
                    <div class='location'><img src='assets/img/france.png' alt='france'/><p>Paris, France</p></div>
                </div>
            </footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/public.js"></script>
            <script src="js/categories.js"></script>
        </body>
    </div>
</html>