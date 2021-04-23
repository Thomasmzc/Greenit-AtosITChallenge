<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_legal.css" rel="stylesheet" />
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
                <div class="corpus">
                    <div class='banner-legal'>
                        <div class='titlelegal'>
                            <h1>green'it Legal</h1>
                            <h2>Find legal information and resources for green'it services</h2>
                        </div>
                    </div>
                        <div class='flexer-legalblock'>
                            <div class='legalbig-block'>
                                <img src='assets/img/compliance.png' alt='Our charter'/>
                                <h3>Our charter</h3>
                                <p>By using green'it, you agree to correspond to our charter, in full compliance with the law and especially with our environment standards.</p>
                                <a href="#">Read green'it's Charter ></a>
                            </div>
                            <div class='legallittle-block'>
                                <img src='assets/img/privacy.png' alt='Privacy Policy'/>
                                <h3>Privacy Policy</h3>
                                <p>We are committed to your privacy. Read our Privacy Policy for a clear explanation of how we collect, use, disclose, transfer, and store your information. Learn how to review any information that may be associated with you.</p>
                                <a href="privacy.php">Read green'it's Privacy Policy ></a>
                            </div>
                            <div class='legallittle-block'>
                                <img src='assets/img/contract.png' alt='Term of Use'/>
                                <h3>Terms of Use</h3>
                                <p>Terms covering use of green'it websites, including linking to portions of the site.</p>
                                <a href="terms.php">Read green'it's Term of Use ></a>
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
                        <li><a href="login.php">Log in</a></li>
                        <li><a href="signup.php">Sign up</a></li>
                    </ul>
                    <ul>
                        <p>For organizations</p>
                        <li><a href="company.php">Home</a></li>
                        <li><a href="logincompany.php">Log in</a></li>
                        <li><a href="signupcompany.php">Sign up</a></li>
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