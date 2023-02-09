<?php

    //get theme of the day
    $theme = $dbh->getThemeOfTheDay(date("Y-m-d"));
    $themePosts = $dbh->getPostsbyTheme($theme[0]["nome"]);

    //print posts
    foreach($themePosts as $post):
        require($templateParams["post"]);
    endforeach;

?>