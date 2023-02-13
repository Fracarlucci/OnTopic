let heart = document.querySelectorAll(".heart");

const callBackFunctionLike = () => {
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
    });
}

heart.forEach((element) => element.addEventListener("click", function() {
    const postId = element.getAttribute("data-postid");
    miPiace(this, postId);
}));

    
function miPiace(button, postId){
    const formData = new FormData();
    formData.append('postId', postId);

    if(button.classList.contains("liked")){
        button.classList.remove("liked");
        formData.append('remove', true);
        like(formData, postId, true);
    }
    else if(!button.classList.contains("liked")){
        button.classList.add("liked");
        like(formData, postId, false);
    }
}

function like(formData, postId, isRemoved) {
    axios.post('./api/miPiace.php', formData).then(response => {

        //send notification if like not removed
        if(!isRemoved) {
            let notificationFormData = new FormData();
            notificationFormData.append("type", "like")
            notificationFormData.append("sender", response.data.senderId)
            notificationFormData.append("receiver", response.data.receiverId)
            notificationFormData.append("post", postId)
            axios.post('./api/sendNotification.php', notificationFormData)
        }

        //increment likes counter
        const nLikes = response.data["likes"][0].mipiace;
        const likesCounter = "p[data-postid=\"" + postId + "\"]";
        document.querySelector(likesCounter).innerHTML = nLikes;
    });
}

/**
 * Observer to check updatePost container changes and then trigger callback 
 */
const postContainerLike = document.getElementById('postContainer');
callBackFunctionLike()

var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
var observerLike = new MutationObserver(callBackFunctionLike);
observerLike.observe(postContainerLike, {
    childList: true
});

    