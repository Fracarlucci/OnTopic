
function elimina() {
    if(confirm("Sei sicuro di voler eliminare il post?")) {
        const formData = new FormData();
        const postId = document.getElementById("elimina").value;
        formData.append('postId', postId)

        axios.post('./api/deletePost.php', formData).then(response => {
            // alert("Post eliminato");
            location.reload();
        });
    }
}
