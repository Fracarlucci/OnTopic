let commentButtons = document.querySelectorAll(".comment")

commentButtons.forEach(element => element.addEventListener("click", event => {
    let postId = event.currentTarget.getAttribute("data-postid")
    document.getElementById("postHidden").value = postId
}))

console.log("ciao")