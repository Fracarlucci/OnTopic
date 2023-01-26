
document.querySelector("#signin-form").addEventListener("submit", function (event) {
    event.preventDefault();
    let name = document.querySelector("#signin-input-name").value;
    let surname = document.querySelector("#signin-input-surname").value;
    let username = document.querySelector("#signin-input-username").value;
    let email = document.querySelector("#signin-input-email").value;
    let password = document.querySelector("#signin-input-password").value;
    signin(name, surname, username, email, password);
});

function signin(name, surname, username, email, password) {
    const formData = new FormData();
    formData.append('name', name);
    formData.append('surname', surname);
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

    const formDataImage = new FormData();
    formDataImage.append("image", document.querySelector("#signin-input-image").files[0])

    axios.post('./api/uploadImage.php', formDataImage).then(response => {
        if (!response.data["uploadEseguito"]) {
            document.querySelector("#signin-form > p").innerText = response.data["erroreSignin"];
        } else {
            formData.append('image', response.data["fileName"]);
            axios.post('./api/signin.php', formData).then(response => {
                console.log(response);
                if (response.data["signinEseguito"]) {
                    alert("signed in")
                } else {
                    document.querySelector("#signin-form > p").innerText = response.data["erroreSignin"];
                }
            });
        }
    });

    
}