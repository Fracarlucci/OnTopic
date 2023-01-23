
document.querySelector("#login-form").addEventListener("submit", function (event) {
    event.preventDefault();
    const username = document.querySelector("#login-input-username").value;
    const password = document.querySelector("#login-input-password").value;
    login(username, password);
});

function login(username, password) {
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    axios.post('./api/login.php', formData).then(response => {
        console.log(response);
        if (response.data["logineseguito"]) {
            alert("logged in")
        } else {
            document.querySelector("#login-form > p").innerText = response.data["errorelogin"];
        }
    });
}
