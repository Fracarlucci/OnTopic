<div id="postContainer">
    <?php
        //get theme of the day
        $theme = $dbh->getThemeOfTheDay(date("Y-m-d"));
        $themePosts = $theme ? $dbh->getPostsbyTheme($theme[0]["nome"]) : [];

        if(!$themePosts): ?>
            <h1 class="noPost">Nessun Post...</h1>
        <?php endif;

        //print posts
        foreach($themePosts as $post):
            require($templateParams["post"]);
        endforeach;
    ?>
</div>