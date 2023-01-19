<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title><?php echo $templateParams["titolo"]; ?></title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <!-- Javascript -->
        <?php
        if(isset($templateParams["js"])):
            foreach($templateParams["js"] as $script):
        ?>
            <script src="<?php echo $script; ?>"></script>
        <?php
            endforeach;
        endif;
        ?>
    </head>
    <body class="bg-secondary bg-gradient">
        <header class="bg-dark py-2">

            <!-- Logo -->
            <div id="logoMobile" class="text-center">
                <a text href="#"><img src="../../img/OnTopic_logo.png" alt="OnTopic"/></a>
            </div>

            <!-- Divider -->
            <div class="d-flex justify-content-center col-12">
                <hr class="dividerClass text-light" width="70%" />
            </div>  

            <!-- Menu -->
            <div class="container">
                <div class="row">
                    <nav>   
                        <ul class="nav nav-pills" role="tablist">
                            <!-- Bell icon -->
                            <div class="d-flex justify-content-start col-3">
                                <li>
                                    <!-- Logo Desktop-->
                                    <div id="logoDesktop" class="text-left">
                                        <a text href="#"><img src="../../doc/img/OnTopic_logo.png" alt="OnTopic"/></a>
                                    </div>
                                    
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-bell-fill" id="bell" viewBox="0 0 16 16">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                        </svg>
                                    </a>
                                </li>
                            </div>

                            <!-- Link -->
                            <div id="link" class="d-flex justify-content-center col-6">
                                <li class="nav-item mx-1"><a class="nav-link" data-bs-toggle="pill" href="#">Home</a></li>
                                <li class="nav-item mx-1"><a class="nav-link" data-bs-toggle="pill" href="#">Tema</a></li>
                                <li class="nav-item mx-1"><a class="nav-link" data-bs-toggle="pill" href="#">Cerca</a></li>
                            </div>
                            
                            <!-- Profile icon -->
                            <div id="icon" class="d-flex justify-content-end col-3">
                                <li class="d-flex align-items-center">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        </svg>
                                    </a>
                                    <!-- UserName Desktop -->
                                    <div id="userName" class="d-flex align-items-center">
                                        <a id="userName" href="#">UserName</a>
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </nav>
                </div>
            </div> 
        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <aside class="m-2 px-2 py-3">
                        <!-- Bell icon -->
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                            </svg>
                            <h2>Notifiche</h2>
                        </a>
                        <div class="bg-light border border-dark px-2 py-3 my-1">
                            <ul>
                                <?php foreach($templateParams["notifiche"] as $notifica): ?>
                                    <li>
                                        <?php if(isset($notifica["postId"])): ?>
                                            <a href="postlink">
                                        <?php else: ?>
                                            <a href="userlink">
                                        <?php endif; ?>
                                        <?php echo $notifica["username"], $notifica["testo"]; ?></a>
                                    </li>
                                <?php endforeach; ?>    
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="col-md-6 col-sm-12">
                    <main>
                        <?php
                        if(isset($templateParams["contenuto"])):
                            require($templateParams["contenuto"]);
                        endif; ?>
                    </main>
                </div>
                <div class="col-3">
                    <aside class="m-2 px-2 py-3">
                        <!-- Friends icon -->
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                            </svg>
                            <h2>Amici</h2>
                        </a>
                        <div class="bg-light border border-dark px-2 py-3 my-1">
                            <ul>
                                <?php foreach($templateParams["amici"] as $amico): ?>
                                    <li>    
                                        <a href="linkamico"><?php echo $amico["username"]; ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </aside>
                </div>
                <div class="p-5"></div>
            </div>
        </div>
        <footer class="bg-dark py-2">
            <!-- Add icon -->
            <div class="text-center addIcon">
                <a href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                    </svg>
                </a>
            </div>
            <div class="d-flex justify-content-end">
                <div class="form-group col-2 ">
                    <input type="email" class="form-control" id="sharePost" aria-describedby="emailHelp" placeholder="Condividi un post!">
                </div>
                <div id="addPostDesktop">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 20 20">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </footer>
    </body>
</html>
