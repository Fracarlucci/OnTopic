<?php foreach($templateParams["seguiti"] as $seguito):
    $posts = $dbh->getPostsById($seguito["id"]);
    foreach($posts as $post):
        require($templateParams["post"]);    
    endforeach;
endforeach; ?>