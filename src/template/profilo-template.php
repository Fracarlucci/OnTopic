<div class="container my-2">
    <header>
        <div class="row">
            <div class="col-2">
                <?php if(isset($templateParams["utente"][0]["imgProfilo"])): ?>
                    <img id="profilePic" src=<?php echo $templateParams["utente"][0]["imgProfilo"]; ?> alt="profile image"/>
                <?php else: ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="130%" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                <?php endif; ?>
            </div>
            <div class="col-10 px-2">
                <div class="container">
                    <div class="row">
                        <div class="col-4 align-self-center">
                            <h3 class="profileHead">Post <span><?php echo count($templateParams["posts"]); ?></span></h3>
                        </div>
                        <div class="col-4 align-self-center">
                            <a href="#">
                                <h3 class="profileHead">Seguaci <span id="nSeguaci"><?php echo count($templateParams["seguaci"]); ?></span></h3>
                            </a>
                        </div>
                        <div class="col-4 align-self-center">
                            <a href="#">
                                <h3 class="profileHead">Seguiti <span><?php echo count($templateParams["seguiti"]); ?></span></h3>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">
                            <h1 id="profileName"><?php echo $templateParams["utente"][0]["username"]; ?></h1>
                        </div>
                        <?php #if($templateParams["utente"] != $_GET["username"]): ?>
                            <div class="col-6 align-self-center">
                                <button id="seguiButton" type="button" onclick="segui(this)">Segui</button>
                            </div>
                        <?php #endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 id="completeName"><?php echo $templateParams["utente"][0]["nome"], " ", $templateParams["utente"][0]["cognome"]; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="d-flex justify-content-center col-12">
        <hr class="text-dark" width="100%" />
    </div>

    <section>
        <div class="row">
            <div class="d-flex col-6 justify-content-end">
                <a href="#">    
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                    </svg>
                </a>
            </div>
            <div class="d-flex col-5 justify-content-start">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section>
        <?php foreach($templateParams["posts"] as $post):
            require($templateParams["post"]);
        endforeach; ?>
    </section>
</div>