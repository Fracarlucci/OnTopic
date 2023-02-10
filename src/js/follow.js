//get user id to follow by query param
const params = new URLSearchParams(window.location.search)
userIdToFollow = params.get("id")

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

function segui(button) {
    if(button.classList.contains("followed")){
        button.classList.remove("followed");
        formData = new FormData();
        formData.append('userId', userIdToFollow);
        formData.append('remove', true);
        follow(formData, button, "Segui")
    }
    else if(!button.classList.contains("followed")){
        button.classList.add("followed");
        formData = new FormData();
        formData.append('userId', userIdToFollow);
        follow(formData, button, "Segui già");
    }
}

function follow(formData, button, msg) {
    const seguaci = document.getElementById("nSeguaci");

    axios.post('./api/follow.php', formData).then(response => {
        const nSeguaci = response.data["seguaci"];
        button.innerHTML = msg;
        seguaci.innerHTML = nSeguaci;
    });
}