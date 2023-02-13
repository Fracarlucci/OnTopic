const userId = new URLSearchParams(window.location.search).get("id");
const profileImg = document.getElementById("img");
const inputImg = document.getElementById("upload-image");
const username = document.getElementById("username");
const email = document.getElementById("email");
const nome = document.getElementById("nome");
const cognome = document.getElementById("cognome");
const oldImage = document.getElementById("img").getAttribute("src").split("/")[2]

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

document.getElementById("modifyPostForm").addEventListener("submit", (event) => {
    event.preventDefault()
    const formData = new FormData();
    const newImg = inputImg.files[0];

    formData.append('userId', userId);
    formData.append('username', username.value);
    formData.append('email', email.value);
    formData.append('nome', nome.value);
    formData.append('cognome', cognome.value);

    if(newImg !== undefined) {
        const formDataImage = new FormData();
        formDataImage.append('image', newImg);

        axios.post('./api/uploadImage.php', formDataImage).then(responseUpload => {
            console.log(responseUpload.data)
            if (!responseUpload.data["uploadEseguito"]) {
                console.log(responseUpload.data["erroreUpload"]);
            } else {
                formData.append('immagine', responseUpload.data["fileName"]);

                axios.post('./api/options.php', formData).then(() => {
                    alert("Impostazioni salvate con successo!");
                    window.location.href = "./profilo.php?id=" + userId;
                });

                //delete old user image
                const formDataDelete = new FormData()
                formDataDelete.append("image", oldImage)
                axios.post('./api/deleteUserImage.php', formDataDelete)
            }
        });
    } else {
        axios.post('./api/options.php', formData).then((response) => {
            alert("Impostazioni salvate con successo!");
            window.location.href = "./profilo.php?id=" + userId;
        });
    }
});