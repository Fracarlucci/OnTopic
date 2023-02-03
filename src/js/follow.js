let username = window.location.pathname;
username = username.split("=").pop();
username = "Ciccio";
const button = document.getElementById("seguiButton");
let formData = new FormData();
formData.append('username', username);

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
        formData.append('username', username);
        formData.append('remove', true);
        follow(formData, button, "Segui")
    }
    else if(!button.classList.contains("followed")){
        button.classList.add("followed");
        formData = new FormData();
        formData.append('username', username);
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