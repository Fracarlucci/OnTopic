
document.querySelector("#login-form").addEventListener("submit", function (event) {
    event.preventDefault()
    login()
    event.target.reset()
});

function login() {
    const formData = new FormData()
    formData.append('username', document.querySelector("#login-input-username").value)
    formData.append('password', document.querySelector("#login-input-password").value)
    axios.post('./api/login.php', formData).then(response => {
        if (response.data["logineseguito"]) {
            document.querySelector("#login-form > p").innerText = "Login eseguito con seuccesso!"
            setTimeout(() => document.location.href = "", 2000);
        } else {
            document.querySelector("#login-form > p").innerText = response.data["errorelogin"]
        }
    });
}
