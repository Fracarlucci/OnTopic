
document.getElementById("commentForm").addEventListener("submit", event => {
    event.preventDefault()
    const formData = new FormData();
    const postId = document.getElementById("postHidden").value;
    formData.append('input', document.getElementById("commentText").value)
    formData.append('postId', postId)

    axios.post('./api/insertComment.php', formData).then(response => {
        
        //send notification
        let notificationFormData = new FormData();
        notificationFormData.append("type", "comment")
        notificationFormData.append("sender", response.data.senderId)
        notificationFormData.append("receiver", response.data.receiverId)
        notificationFormData.append("post", postId)
        axios.post('./api/sendNotification.php', notificationFormData)
        
        getComments(postId);
    });

    document.getElementById("commentForm").reset()
});
