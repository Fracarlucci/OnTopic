document.getElementsByClassName("comment").addEventListener("click", (event) => {
    let postId = event.target.dataset.postid;
    document.getElementById("postHidden").value = postId;
});