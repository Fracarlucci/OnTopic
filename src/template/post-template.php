<section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
    <header>
        <div id="post<?php echo $post['id'] ?>" class="d-flex flex-row">
            <!-- User icon -->
            <div class="d-flex col-1 prova" id="userIcon">
                <a href="profilo.php?id=<?php echo $post["userId"] ?>">
                    <img id="profilePic" src="./img/<?php echo $post["imgProfilo"]; ?>" alt="profile image"/>                    
                </a>
            </div>
            <!-- Username -->
            <div class="d-flex col-3 prova">
                <a href="profilo.php?id=<?php echo $post["userId"] ?>">
                    <h2><?php echo $post["username"]; ?></h2>
                </a>
            </div>
            <!-- Theme -->
            <div class="d-flex justify-content-center col-4">
                <a href="tema.php">
                    <h2 id="tema"><?php echo $post["nome"]; ?></h2>
                </a>
            </div>
            <!-- Dots icon -->
            <?php if($templateParams["isAuth"] && $post["userId"] == $loggedUserId): ?>
                <div class="d-flex justify-content-end col-4">
                    <button class="dots mb-3" type="button" data-bs-toggle="modal" data-bs-target="#postSettings-modal" data-postid=<?php echo $post["id"]; ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                        </svg>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <p><?php echo $post["dataora"]; ?></p>
    </header>
    <?php if(isset($post["immagine"])): ?>
        <img src="./img/<?php echo $post["immagine"]; ?>" class="img-fluid" alt="Post image">
    <?php endif; ?>
    <article><?php echo $post["testo"]; ?></article>
    
    <footer class="my-1">
        <div class="d-flex justify-content-end">
            <?php if($templateParams["isAuth"]): ?>
            <!-- Comment icon -->
            <div class="mx-1">
                <button class="comment" type="button" data-bs-toggle="modal" data-bs-target="#comments-modal" data-postid=<?php echo $post["id"]; ?>>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                </button>
            </div>
            <!-- Heart icon -->
            <div class="mx-1">
                <button class="heart" type="button" data-postid=<?php echo $post["id"]; ?>>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </button>
            </div>
            <div class="mx-1">
                <p id="like" data-postid=<?php echo $post["id"]; ?>><?php echo $post["mipiace"]; ?></p>
            </div>
            <?php endif; ?>
        </div>
    </footer>
</section>