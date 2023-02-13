document.querySelectorAll(".comment")
    .forEach((element) => element.addEventListener("click", function() {
        const postId = element.getAttribute("data-postid");
        getComments(postId);
    }));


function getComments(postId) {
    const formData = new FormData();
    formData.append('postId', postId);

    axios.post('./api/commentsList.php', formData).then(response => {
        const ul = document.getElementById("commentsList");
        createList(ul, response);
    });
}
