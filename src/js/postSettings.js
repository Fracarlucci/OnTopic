document.getElementById("elimina").addEventListener("click", event => {
    if(confirm("Sei sicuro di voler eliminare il post?")) {
        const formData = new FormData();
        const postId = document.getElementById("elimina").value;
        formData.append('postId', postId)

        axios.post('./api/deletePost.php', formData).then(response => {
            location.reload();
        });
    }
});

document.getElementById("modifica").addEventListener("click", event => {
    window.location.href = "./modifica-post.php?postId=" + document.getElementById("modifica").value;
});