const params = new URLSearchParams(window.location.search)
const postId = params.get("postId");
const removeImgButton = document.getElementById("removeImgButton");
let userId;

const formData = new FormData();
formData.append('postId', postId);

axios.post('./api/getPost.php', formData).then(response => {
    if(response != null) {
        if(response.data[0].immagine != null) {
            document.getElementById("noImg").innerHTML = "";
            const img = document.createElement("img");

            img.setAttribute("src", "./img/" + response.data[0].immagine);
            document.getElementById("img").appendChild(img);


            removeImgButton.addEventListener("click", event => {
                const formData = new FormData();
                formData.append('postId', postId);
               
                if(confirm("Sei sicuro di voler rimuovere l'immagine?")) {
                    axios.post('./api/removeImage.php', formData);
                }
            });
        }
        userId = response.data[0].userId;
        document.getElementById("textElem").innerHTML = response.data[0].testo;
    }
});

removeImgButton.addEventListener("click", event => {
    document.getElementById("upload-image").value = "";
});


document.getElementById("updateButton").addEventListener("click", event => {
    const formData = new FormData();
    const newImg = document.getElementById("upload-image").files[0];

    formData.append('postId', postId);
    formData.append('testo', document.getElementById("textElem").value);

    if(newImg != null) {
        const formDataImage = new FormData();
        formDataImage.append('image', newImg);

        axios.post('./api/uploadImage.php', formDataImage).then(responseUpload => {
            if (!responseUpload.data["uploadEseguito"]) {
                document.getElementById("img").innerText = responseUpload.data["erroreUpload"];
            } else {
                formData.append('immagine', responseUpload.data["fileName"]);

                axios.post('./api/modificaPost.php', formData).then(response => {
                    alert("Post modificato con successo!");
                    // window.location.href = "./profilo.php?id=" + userId;
                });
            }
        });
    } else {
        axios.post('./api/modificaPost.php', formData).then(() => {
            alert("Post modificato con successo!");
            // window.location.href = "./profilo.php?id=" + userId;
        });
    }
});