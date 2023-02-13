const userId = new URLSearchParams(window.location.search).get("id");
const profileImg = document.getElementById("img");
const inputImg = document.getElementById("upload-image");
const username = document.getElementById("username");
const email = document.getElementById("email");
const nome = document.getElementById("nome");
const cognome = document.getElementById("cognome");
const formData = new FormData();
formData.append('userId', userId)

axios.post("./api/getUser.php", formData).then(response => {
    console.log(response.data);
    img.setAttribute("src", "./img/" + response.data[0].imgProfilo);
    document.getElementById("image").appendChild(img);

    username.value = response.data[0].username;
    email.value = response.data[0].email;
    nome.value = response.data[0].nome;
    cognome.value = response.data[0].cognome;
});

inputImg.addEventListener("change", event => {
    if(inputImg.files[0] == null) {
        alert("l'immagine di profilo non può essere rimossa");
    } else {
        var output = document.getElementById('img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    }
});

document.getElementById("salva").addEventListener("click", () => {
    const formData = new FormData();
    const newImg = inputImg.files[0];

    formData.append('userId', userId);
    formData.append('username', username.value);
    formData.append('email', email.value);
    formData.append('nome', nome.value);
    formData.append('cognome', cognome.value);

    if(newImg != null) {
        const formDataImage = new FormData();
        formDataImage.append('image', newImg);

        axios.post('./api/uploadImage.php', formDataImage).then(responseUpload => {
            if (!responseUpload.data["uploadEseguito"]) {
                console.log(responseUpload.data["erroreUpload"]);
            } else {
                formData.append('immagine', responseUpload.data["fileName"]);

                axios.post('./api/options.php', formData).then(() => {
                    alert("Impostazioni salvate con successo!");
                    window.location.href = "./profilo.php?id=" + userId;
                });
            }
        });
    } else {
        axios.post('./api/options.php', formData).then(() => {
            alert("Impostazioni salvate con successo!");
            window.location.href = "./profilo.php?id=" + userId;
        });
    }
});