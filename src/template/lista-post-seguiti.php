<?php foreach($templateParams["seguiti"] as $seguito):
    $templateParams["posts"] = $dbh->getPostsById($seguito["id"]);
    foreach($templateParams["posts"] as $post):
        require($templateParams["post"]);    
    endforeach;
endforeach; ?>