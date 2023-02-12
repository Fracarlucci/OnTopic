
document.querySelector("#signin-form").addEventListener("submit", function (event) {
    event.preventDefault()
    signin()
    event.target.reset()
});

function signin() {

    //form data for user post req
    const formDataUser = new FormData()
    formDataUser.append('name', document.querySelector("#signin-input-name").value)
    formDataUser.append('surname', document.querySelector("#signin-input-surname").value)
    formDataUser.append('username', document.querySelector("#signin-input-username").value)
    formDataUser.append('email', document.querySelector("#signin-input-email").value)
    formDataUser.append('password', document.querySelector("#signin-input-password").value)

    //form data for upload image req
    const formDataImage = new FormData();
    formDataImage.append("image", document.querySelector("#signin-input-image").files[0]);

    //make post req to upload image, if ok send post req to signin endpoint
    axios.post('./api/uploadImage.php', formDataImage).then(responseUpload => {
        if (!responseUpload.data["uploadEseguito"]) {
            document.querySelector("#signin-form > p").innerText = responseUpload.data["erroreUpload"]
        } else {
            formDataUser.append('image', responseUpload.data["fileName"])
            axios.post('./api/signin.php', formDataUser).then(responseSignin => {
                if (responseSignin.data["signinEseguito"]) {
                    document.querySelector("#signin-form > p").innerText = "Registrazione eseguita con seuccesso!"
                    setTimeout(() => document.location.href = "", 2000);
                } else {
                    //delete user image and view error
                    const formDataDelete = new FormData()
                    formDataDelete.append("image", responseUpload.data["fileName"])
                    axios.post('./api/deleteUserImage.php', formDataDelete)
                    document.querySelector("#signin-form > p").innerText = responseSignin.data["erroreSignin"]
                }
            });
        }
    });

    
}
