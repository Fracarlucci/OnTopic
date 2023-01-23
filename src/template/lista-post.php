<?php foreach($templateParams["amici"] as $amico):
    $templateParams["posts"] = $dbh->getPostsById($amico["id"]);
    foreach($templateParams["posts"] as $post):
        require($templateParams["post"]);    
    endforeach;
endforeach; ?>