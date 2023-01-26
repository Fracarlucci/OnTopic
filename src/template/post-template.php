<section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
    <header>
        <div class="d-flex flex-row">
            <!-- User icon -->
            <div class="d-flex col-1 prova" id="userIcon">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                </a>
            </div>
            <!-- Username -->
            <div class="d-flex col-3 prova">
                <a href="#">
                    <h3><?php echo $post["username"]; ?></h3>
                </a>
            </div>
            <!-- Theme -->
            <div class="d-flex justify-content-center col-4">
                <a href="#">
                    <h3 id="tema"><?php echo $post["nome"]; ?></h3>
                </a>
            </div>
            <!-- Dots icon -->
            <div class="d-flex justify-content-end col-4">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                        <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                    </svg>
                </a>
            </div>
        </div>
        <p><?php echo $post["dataora"]; ?></p>
    </header>
    <article><?php echo $post["testo"]; ?></article>
    <footer class="my-1">
        <div class="d-flex justify-content-end">
            <!-- Comment icon -->
            <div id="comment" class="mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                </svg>
            </div>
            <!-- Heart icon -->
            <div class="heart mx-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                </svg>
            </div>
            <div class="mx-1 mt-1">
                <p id="like"><?php echo $post["mipiace"]; ?></p>
            </div>
        </div>
    </footer>
</section>