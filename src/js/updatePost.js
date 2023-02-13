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

let updateLeftTitle = document.getElementById("prevDay");
updateLeftTitle.addEventListener("click", function() {
    updateCurrentTitle();
    updateTema();
});

let updateRightTitle = document.getElementById("nextDay");
updateRightTitle.addEventListener("click", function() {
    updateCurrentTitle();
    updateTema();
});

function updateCurrentTitle(){
    xhrTitle.onreadystatechange = function(){
        document.getElementById("topic").innerHTML = this.response;
    }
    xhrTitle.open(methodPost, urlTitle, true);
    xhrTitle.send();
}

function updateTema(){
    xhrTema.onreadystatechange = function(){
        document.getElementById("postContainer").innerHTML = this.response;
    }
    xhrTema.open(methodPost, urlTema, true);
    xhrTema.send();
}