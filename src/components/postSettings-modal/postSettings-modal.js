let dotsButtons = document.querySelectorAll(".dots")

dotsButtons.forEach(element => element.addEventListener("click", event => {
    let postId = event.currentTarget.getAttribute("data-postid")
    document.getElementById("elimina").value = postId
}));
