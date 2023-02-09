
document.getElementById("commentForm").addEventListener("submit", event => {
    event.preventDefault()
    const formData = new FormData();
    const postId = document.getElementById("postHidden").value;
    formData.append('input', document.getElementById("commentText").value)
    formData.append('postId', postId)

    axios.post('./api/insertComment.php', formData).then(response => {
        getComments(postId);
    });

    document.getElementById("commentForm").reset()
})