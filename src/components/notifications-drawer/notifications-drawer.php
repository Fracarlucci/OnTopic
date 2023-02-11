
<div class="offcanvas offcanvas-start" tabindex="-1" id="notificationsDrawer" aria-labelledby="notificationsDrawerLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="notificationsDrawerLabel">Notifiche</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div>
        <nav>
            <ul class="notification">
                <?php require("./components/notifications/notifications.php"); ?>
            </ul>
        </nav>
    </div>
  </div>
</div>