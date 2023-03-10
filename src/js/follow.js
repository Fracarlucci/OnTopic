//get user id to follow by query param
const params = new URLSearchParams(window.location.search);
const userIdToFollow = params.get("id");

//check if user is already followed, if not follow it
const button = document.getElementById("seguiButton");
let formData = new FormData();
formData.append('userId', userIdToFollow);

axios.post('./api/checkSegui.php', formData).then(response => {
    if(response.data["followed"] == true){
        if(!button.classList.contains("followed")){
            button.classList.add("followed");
            button.innerHTML = "Segui già";
        }
    }
});

if(button != null)
    button.addEventListener("click", function() {
    segui(this);
});

function segui(button) {
    if(button.classList.contains("followed")){
        button.classList.remove("followed");
        formData = new FormData();
        formData.append('userId', userIdToFollow);
        formData.append('remove', true);
        follow(formData, button, "Segui", false)
    }
    else if(!button.classList.contains("followed")){
        button.classList.add("followed");
        formData = new FormData();
        formData.append('userId', userIdToFollow);
        follow(formData, button, "Segui già", true);
    }
}

function follow(formData, button, msg, needNotification) {
    const seguaci = document.getElementById("nSeguaci");

    axios.post('./api/follow.php', formData).then(response => {

        //send notification if needed
        if(needNotification) {
            let notificationFormData = new FormData();
            notificationFormData.append("type", "follow")
            notificationFormData.append("sender", response.data.senderId)
            notificationFormData.append("receiver", userIdToFollow)
            axios.post('./api/sendNotification.php', notificationFormData)
        }
        
        //update seguaci counter
        const nSeguaci = response.data["seguaci"];
        button.innerHTML = msg;
        seguaci.innerHTML = nSeguaci;
    });
}