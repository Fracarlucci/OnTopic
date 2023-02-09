
document.getElementById("commentForm").addEventListener("submit", event => {
    event.preventDefault()
    const formData = new FormData();
    formData.append('input', document.getElementById("commentText").value)
    formData.append('postId', document.getElementById("postHidden").value)

    axios.post('./api/insertComment.php', formData).then(response => {
        //getComments(1); //postId
        alert("ok")
    });

    document.getElementById("commentForm").reset()
})