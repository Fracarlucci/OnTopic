<?php if($templateParams["isAuth"]): ?>
    <?php if(!$templateParams["notifiche"]): ?>
        Nessuna nuova notifica...
    <?php else: ?>
    <?php foreach($templateParams["notifiche"] as $notifica): ?>
        <li class="mb-2">
            <div class="container">
                <div class="row">
                    <div class="col-11">
                        <?php if(isset($notifica["postId"]) && $notifica["postId"]): ?>
                            <a href="profilo.php?id=<?php echo $notifica["idUtenteRiceve"] ?>#post<?php echo $notifica["postId"] ?>">
                        <?php else: ?>
                            <a href="profilo.php?id=<?php echo $notifica["userId"] ?>">
                        <?php endif; ?>
                        <?php echo $notifica["testo"]; ?></a>
                    </div>
                    <div class="col-1">
                        <a href="#" notificationId="<?php echo $notifica["notificationId"] ?>" class="deleteNotificationImg">
                            <img src="https://cdn-icons-png.flaticon.com/512/3405/3405244.png" alt="Delete Notification" width="20px" height="20px" />
                        </a>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; endif; ?>
<?php else: ?>
    <li>
        <a href="#" data-bs-toggle="modal" data-bs-target="#signin-modal">
            Iscriviti per ricevere tutte le notifiche!
        </a>
    </li>    
<?php endif; ?>