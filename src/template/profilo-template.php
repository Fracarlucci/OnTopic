<div class="container my-2">
    <header>
        <div class="row">
            <div class="col-2 align-self-center">
                <?php if(isset($templateParams["utenteProfilo"][0]["imgProfilo"])): ?>
                    <img class="profilePic" src="./img/<?php echo $templateParams["utenteProfilo"][0]["imgProfilo"]; ?>" alt="profile image"/>
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
                            <button id="seguaci" class="profileHead" type="button" data-bs-toggle="modal" data-bs-target="#usersList-modal">
                                Seguaci <span id="nSeguaci"><?php echo count($templateParams["seguaci"]); ?></span>
                            </button>
                        </div>
                        <div class="col-4 align-self-center">
                            <button id="seguiti" class="profileHead" type="button" data-bs-toggle="modal" data-bs-target="#usersList-modal">
                                Seguiti <span id="nSeguiti"><?php echo count($templateParams["seguiti"]); ?></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-1">
                            <h1 id="profileName"><?php echo $templateParams["utenteProfilo"][0]["username"]; ?></h1>
                        </div>
                        <?php if($loggedUserId != $templateParams["utenteProfilo"][0]["id"]): ?>
                            <div class="col-6 align-self-center">
                                <button id="seguiButton" type="button">Segui</button>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h2 id="completeName"><?php echo $templateParams["utenteProfilo"][0]["nome"], " ", $templateParams["utenteProfilo"][0]["cognome"]; ?></h2>
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
            <div class="d-flex col-12 justify-content-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-grid-fill" viewBox="0 0 16 16">
                    <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z"/>
                </svg>
            </div>
        </div>
    </section>
    <section>
        <div id="postContainer">
            <?php foreach($templateParams["posts"] as $post):
                require($templateParams["post"]);
            endforeach; ?>
        </div>
    </section>
</div>

<?php require_once './components/usersList-modal/usersList-modal.php'; ?>
