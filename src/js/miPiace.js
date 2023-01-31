let heart = document.querySelectorAll(".heart");

heart.forEach(element => {
        const postId = element.dataset.postid;
        const formData = new FormData();
        formData.append('postId', postId);
    
        axios.post('./api/checkMiPiace.php', formData).then(response => {
            if(response.data["isLiked"] == true){
                if(!element.classList.contains("liked")){
                    element.classList.add("liked");
                }
            }
        });

    element.addEventListener("click", function(event){
        const postId = event.currentTarget.dataset.postid;
        const formData = new FormData();
        formData.append('postId', postId);

        if(element.classList.contains("liked")){
            element.classList.remove("liked");
            formData.append('remove', true);
            like(formData, postId);
        }
        else if(!element.classList.contains("liked")){
            element.classList.add("liked");
            like(formData, postId);
        }
    })
});

function like(formData, postId) {
    axios.post('./api/miPiace.php', formData).then(response => {
        const nLikes = response.data["likes"][0].mipiace;
        const likesCounter = "p[data-postid=\"" + postId + "\"]";
        document.querySelector(likesCounter).innerHTML = nLikes;
    });
}
