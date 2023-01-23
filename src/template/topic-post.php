        <div id="slider" class="row m-2 py-2 slider">
            <div class="row wrapper rounded">
                <div id="slides" class="slides">
                    <span class="slide">data giorno mese</span>
                    <span class="slide">data giorno mese</span>
                    <span class="slide">data giorno mese</span>
                    <span class="slide">data giorno mese</span>
                    <span class="slide">data giorno mese</span>
                    <span class="slide">data giorno mese</span>
                    <span class="slide">data giorno mese</span>
                </div>
            <a id="prev" class="control prev"></a>
            <a id="next" class="control next"></a>
            </div>
        </div>
        <div class="d-flex justify-content-center col-12">
            <div class="col-6 px-2 topic">
                <h1><?php echo $templateParams["postOTD"][0]["nome"];?></h1>
            </div>
            <div class="col-6 px-2 d-flex align-items-center">
                <button class=" btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-fill" id="topicCalendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </button>
            </div>
        </div>
        <?php foreach($templateParams["postOTD"] as $post): ?>
            <section class="bg-light border border-dark my-4 px-4 py-3 rounded">
                <header>
                    <div class="d-flex flex-row">
                        <!-- User icon -->
                        <div class="d-flex justify-content-center col-1 prova">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                </svg>
                            </a>
                        </div>
                        <!-- Username -->
                        <div class="d-flex justify-content-center col-3 prova">
                            <a href="#">
                                <h3><?php echo $post["username"]; ?></h3>
                            </a>
                        </div>
                        <!-- Theme -->
                        <!-- <div class="d-flex justify-content-center col-4">
                            <a href="#">
                                <h2><?php echo $post["nome"]; ?></h2>
                            </a>
                        </div> -->
                        <!-- Dots icon -->
                        <div class="d-flex justify-content-end col-8">
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
                        <div class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat" viewBox="0 0 16 16">
                                <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                            </svg>
                        </div>
                        <!-- Heart icon -->
                        <div class="mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                            </svg>
                        </div>
                    </div>
                </footer>
            </section>
        <?php endforeach;?>