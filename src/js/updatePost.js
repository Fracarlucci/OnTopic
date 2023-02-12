xhrPost = new XMLHttpRequest();
xhrTitle = new XMLHttpRequest();
xhrTema = new XMLHttpRequest();
methodPost = "GET";
urlPost = "./api/currentPost.php";
urlTitle = "./api/currentTopic.php";
urlTema = "./api/getCurrentThemePosts.php";

function updateCurrentPost(){
    xhrPost.onreadystatechange = function(){
        document.getElementById("updatePost").innerHTML = this.response;
    }
    xhrPost.open(methodPost, urlPost, true);
    xhrPost.send();
}

function updateCurrentTitle(){
    xhrTitle.onreadystatechange = function(){
        document.getElementById("topic").innerHTML = this.response;
    }
    xhrTitle.open(methodPost, urlTitle, true);
    xhrTitle.send();
}

function updateTema(){
    xhrTema.onreadystatechange = function(){
        document.getElementById("updatePost").innerHTML = this.response;
    }
    xhrTema.open(methodPost, urlTema, true);
    xhrTema.send();
}