<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title><?php echo $templateParams["titolo"]; ?></title>

        <!-- Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <!-- Custom Style -->
        <link rel="stylesheet" href="./components/login-modal/login-modal.css">
        <link rel="stylesheet" href="./components/signin-modal/signin-modal.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script src="./components/login-modal/login-modal.js" defer></script>
        <script src="./components/signin-modal/signin-modal.js" defer></script>
        
        <?php
        if(isset($templateParams["js"])):
            foreach($templateParams["js"] as $script):
        ?>
            <script defer src="<?php echo $script; ?>"></script>
        <?php
            endforeach;
        endif;
        ?>
    </head>
    <body class="bg-secondary">
        <header class="bg-dark py-2">

            <!-- Logo -->
            <div id="logoMobile" class="text-center">
                <a text href="#"><img src="./img/OnTopic_logo.png" alt="OnTopic"/></a>
            </div>

            <!-- Divider -->
            <div class="d-flex justify-content-center col-12">
                <hr class="dividerClass text-light" width="70%" />
            </div>  

            <!-- Menu -->
            <div class="container-fluid">
                <div class="row">
                    <nav>   
                        <ul class="nav nav-pills" role="tablist">
                            <div class="d-flex align-items-center col-3">
                                <li>
                                    <!-- Logo Desktop-->
                                    <div id="logoDesktop" class="text-left">
                                        <a text href="#"><img src="./img/OnTopic_logo.png" alt="OnTopic"/></a>
                                    </div>
                                    <!-- Bell icon -->
                                    <a data-bs-toggle="offcanvas" href="#notificationsDrawer" role="button" aria-controls="notificationsDrawer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-bell-fill" id="bell" viewBox="0 0 16 16">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                                        </svg>
                                    </a>
                                </li>
                            </div>

                            <!-- Link -->
                            <div id="link" class="d-flex justify-content-center col-6">
                                <nav>
                                    <ul class="menu">
                                        <a href="index.php"><li class="menuButton <?php isActive("index.php");?> col">Home</li></a>
                                        <a href="tema.php"><li class="menuButton <?php isActive("tema.php");?> col">Tema</li></a>
                                        <a href="cerca.php"><li class="menuButton <?php isActive("cerca.php");?> col">Cerca</li></a>
                                    </ul>
                                </nav>
                            </div>
                            
                            <?php 
                                    if($templateParams["isAuth"]): ?>
                                        <!-- Profile icon -->
                                        <div id="profileIcon" class="d-flex justify-content-end col-3">
                                            <li class="d-flex align-items-center">
                                            <?php if(isActive("profilo.php") && $loggedUserId == $templateParams["utenteProfilo"][0]["id"]): ?>
                                                <a href="impostazioni.php?id=<?php echo $loggedUserId ?>">    
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                                                    </svg>
                                                </a>
                                            <?php else: ?>
                                                <!-- UserName Desktop -->
                                                <a href="profilo.php?id=<?php echo $loggedUserId ?>">
                                                    <span id="userName">
                                                        <?php echo $templateParams["utente"][0]["username"]; ?>
                                                    </span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                                    </svg>
                                                </a>
                                            <?php endif; ?> 
                                            </li>
                                            
                                        </div>
                            <?php else: ?>
                                <!-- Login Button -->
                                <div class="d-flex justify-content-end col-3">
                                    <button type="button" id="loginButton" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login-modal">
                                        Login
                                    </button>
                                </div>
                            <?php endif; ?>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 21 21">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                        </svg>
                        <h2>Notifiche</h2>
                        <div class="bg-light border border-dark px-2 py-3 my-1 rounded">
                            <nav>
                                <ul class="notification">
                                    <?php require("./components/notifications/notifications.php"); ?>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>
                <div class="col-md-6 col-sm-12">
                    <main>
                        <?php if(isset($templateParams["contenuto"])):
                            require($templateParams["contenuto"]);
                        endif; ?>
                    </main>
                </div>
                <div class="col-3">
                    <aside class="m-2 px-2 py-3">
                        <!-- Follow icon -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 21 21">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        <h2>Seguiti</h2>
                        <div class="bg-light border border-dark px-2 py-3 my-1 rounded">
                            <nav>
                                <ul class="follow">
                                    <?php if($templateParams["isAuth"]): ?>
                                        <?php foreach($templateParams["loggedUserSeguiti"] as $seguito): ?>
                                            <a href="profilo.php?id=<?php echo $seguito["id"] ?>"><li><?php echo $seguito["username"]; ?></li></a>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#signin-modal">
                                                Iscriviti per vedere tutti i tuoi amici!
                                            </a>    
                                        </li>   
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
        <!-- Login Modal Include -->
        <?php require_once("./components/login-modal/login-modal.php") ?>
        <!-- SignIn Modal Include-->
        <?php require_once("./components/signin-modal/signin-modal.php") ?>
        <!-- Notifications Drawer -->
        <?php require_once("./components/notifications-drawer/notifications-drawer.php") ?>
        <!-- Comments Modal -->
        <?php require_once './components/comments-modal/comments-modal.php'; ?>
        <!-- Post Settings Modal -->
        <?php require_once './components/postSettings-modal/postSettings-modal.php'; ?>

        <footer class="bg-dark py-2">

            <?php if($templateParams["isAuth"]): ?>
                <!-- Add post -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="addIcon col-6 d-flex justify-content-center">
                            <a href="aggiunta-post.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle" id="addPost" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg>
                            </a>
                            <button type="button" id="addButtonDesktop" class="btn btn-outline-light"><a href="aggiunta-post.php">Condividi un post!</a></button>
                        </div>
                        <!-- Logout -->
                        <div class="logout col-3 d-flex flex-row-reverse">
                            <li class="d-flex align-items-center">
                                <a href="api/logout.php">
                                    <span id="logout">Logout</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 23 23" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-3"></div>
                        <div class="col-6 d-flex justify-content-center">
                            <button type="button" id="signButton" class="btnSign btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#signin-modal">
                                <a href="#">
                                    Iscriviti per pubblicare i tuoi pensieri!
                                </a>    
                            </button>
                        </div>
                        <div class="col-3"></div>
                    </div>
                </div>
            <?php endif; ?>
        </footer>
    </body>
</html>
