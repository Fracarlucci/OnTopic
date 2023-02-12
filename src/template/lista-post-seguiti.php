<div id="postContainer">
    <?php if(!$templateParams["loggedUserSeguiti"]): ?>
        <h1 class="noPost">Coming soon...</h1>
    <?php endif;?>
    <?php foreach($templateParams["loggedUserSeguiti"] as $seguito):
        $posts = $dbh->getPostsById($seguito["id"]);
        foreach($posts as $post):
            require($templateParams["post"]);    
        endforeach;
    endforeach; ?>
</div>