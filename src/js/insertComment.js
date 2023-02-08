function inserisciCommento(form) {
    if(window.event.key === 'Enter' || window.event.type === 'click') {
        const input = form.commentText.value;
        const postId = form.postHidden.value;
        console.log(postId);
        if(input != "") {
            const formData = new FormData();
            formData.append('input', input);
            // formData.append('postId', postId);

            axios.post('./api/insertComment.php', formData).then(response => {
                getComments(1); //postId
            });

            document.getElementById("commentForm").reset();
        }
    }
}