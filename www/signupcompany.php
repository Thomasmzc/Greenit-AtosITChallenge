<!DOCTYPE html>
<html>
    <div id="bloc_page">
        <head>
            <!-- En-tête de la page -->
            <link href="css/style_signupcompany.css" rel="stylesheet" />
            <link rel="icon" type="image/png" href="img/favicon.png" />
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta charset="utf-8" />
            <title>Green'IT - Sign up</title>
        </head>

        <body>
            <header>
                <span class='return-container' data-state="0"><img src='assets/img/icon-back.png' /></span>
                <button class='gotolog'>Log in</button>
            </header>
            <section>
                <div class='left_container1 left_container'>
                    <div class='marger-container'>
                        <h1>Open a new green'it account</h1>
                        <p class='explain-signup'>Select your account type: </p>
                        <div class='bloc_selected' data-type='company'>
                            <div class='flex-topline'>
                               <div class='pointselect'></div>
                            </div>
                            <div class='flex-explainline'>
                                <p class='title-card'>I want to create an organization account</p>
                                <p class='explain-card'>The company has a registration number and operates as a legal entity.</p>
                            </div>
                        </div>
                        <div class='bloc_selected' data-type='join'>
                            <div class='flex-topline'>
                                <div class='pointselect'></div>
                            </div>
                            <div class='flex-explainline'>
                                <p class='title-card'>I was invited to join an organization</p>
                                <p class='explain-card'>You received an invitation to join a company's account.</p>
                            </div>
                        </div>
                        <ins class='error1'></ins>
                        <button class='submit' id='submit1'>Continue</button>
                    </div>
                </div>
                <div class='left_container2 left_container'>
                    <div class='marger-container2'>
                        <h1>New organization account</h1>
                        <p class='explaining-signup'>We need some informations about your business</p>
                        <input type='email' id='email' placeholder='Your work email'/>
                        <input type='text' id='raison' placeholder="Organization's name"/>
                        <span id='typeof' data-val=''>Type of organization</span>
                        <div class='choice-typeof'>
                            <ul>
                                <li class='selectortypeof' data-form="siret">Company</li>
                                <li class='selectortypeof' data-form="rna">Association</li>
                                <li class='selectortypeof' data-form="siret">Public organization</li>
                            </ul>
                        </div>
                        <input type='text' id='siret' class='hiddeninput' placeholder="SIRET number"/>
                        <input type='text' id='rnaorsiret' class='hiddeninput' placeholder="RNA number or SIRET number"/>
                        <ins class='error2'></ins>
                        <button class='submit' id='submit2'>Continue</button>
                    </div>
                </div>
                <div class='left_container3 left_container'>
                    <div class='marger-container3'>
                        <h1>New organization account</h1>
                        <p class='explaining-signup'>Last step, just few informations about yourself</p>
                        <input type='text' id='fname' placeholder='Your firstname'/>
                        <input type='text' id='lname' placeholder="Your lastname"/>
                        <input type='text' id='phone' placeholder="+33 6 74 95 12 32"/>
                        <input type='password' id='password' placeholder="Password"/>
                        <p class='little-explain'>At least 8 characters, containing numbers and letters.</p>
                        <ins class='error3'></ins>
                        <button class='submit' id='submit3'>Create the account</button>
                    </div>
                </div>
                <div class='left_container4 left_container'>
                    <div class='marger-container2'>
                        <h1>Join an existing team</h1>
                        <p class='explaining-signup'>You’ve been invited to join your teammates on green'it. Just need some informations to get started.</p>
                        <input type='email' id='emailjoin' placeholder='Your work email'/>
                        <p class='explain-signup'>Enter code from email</p>
                        <div class='flexer-code-container'>
                            <div class='bloc_container_onecode'>
                                <input type='text' class='inputs' id='cd1' maxlength='1'/>
                                <div class='border-bottom-onecode'></div>
                            </div>
                            <div class='bloc_container_onecode'>
                                <input type='text' class='inputs' id='cd2' maxlength='1'/>
                                <div class='border-bottom-onecode'></div>
                            </div>
                            <div class='bloc_container_onecode'>
                                <input type='text' class='inputs' id='cd3' maxlength='1'/>
                                <div class='border-bottom-onecode'></div>
                            </div>
                            <div class='bloc_container_onecode'>
                                <input type='text' class='inputs' id='cd4' maxlength='1'/>
                                <div class='border-bottom-onecode'></div>
                            </div>
                            <div class='bloc_container_onecode'>
                                <input type='text' class='inputs' id='cd5' maxlength='1'/>
                                <div class='border-bottom-onecode'></div>
                            </div>
                            <div class='bloc_container_onecode'>
                                <input type='text' class='inputs' id='cd6' maxlength='1'/>
                                <div class='border-bottom-onecode'></div>
                            </div>
                        </div>
                        <ins class='error4'></ins>
                        <button class='submit' id='submit4'>Continue</button>
                    </div>
                </div>
                <div class='left_container5 left_container'>
                    <div class='marger-container3'>
                        <h1>New organization account</h1>
                        <p class='explaining-signup'>Last step, just few informations about yourself</p>
                        <input type='text' id='fnamej' placeholder='Your firstname'/>
                        <input type='text' id='lnamej' placeholder="Your lastname"/>
                        <input type='text' id='phonej' placeholder="+33 6 74 95 12 32"/>
                        <input type='password' id='passwordj' placeholder="Password"/>
                        <p class='little-explain'>At least 8 characters, containing numbers and letters.</p>
                        <ins class='error5'></ins>
                        <button class='submit' id='submit5'>Create the account</button>
                    </div>
                </div>
                <div class='right_container'>
                </div>
            </section>
            <footer></footer>
            <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
            <script src="js/signupcompany.js"></script>

        </body>

    </div>
</html>