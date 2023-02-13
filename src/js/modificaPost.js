const params = new URLSearchParams(window.location.search);
const postId = params.get("postId");
const noImgLabel = document.getElementById("noImg");
const postImg = document.getElementById("img");
const inputImg = document.getElementById("upload-image");
const removeImgButton = document.getElementById("removeImgButton");
let removeOldImg = false;
let userId;

const formData = new FormData();
formData.append('postId', postId);

axios.post('./api/getPost.php', formData).then(response => {
    if(response != null) {
        if(response.data[0].immagine != null) {
            noImgLabel.style.display = "none";
            img.setAttribute("src", "./img/" + response.data[0].immagine);
            document.getElementById("image").appendChild(img);

            removeImgButton.addEventListener("click", () => {
                removeOldImg = true;
            });
        } else {
            postImg.style.display = "none";
            removeImgButton.style.display = "none";
        }
        userId = response.data[0].userId;
        document.getElementById("title").innerHTML = response.data[0].nome;
        document.getElementById("textElem").innerHTML = response.data[0].testo;
    }
});

removeImgButton.addEventListener("click", event => {
    inputImg.value = "";
    postImg.style.display = "none";
    removeImgButton.style.display = "none";
    noImgLabel.style.display = "block";
});

inputImg.addEventListener("change", event => {
    if(inputImg.files[0] == null) {
        postImg.style.display = "none";
        removeImgButton.style.display = "none";
        noImgLabel.style.display = "block";
    } else {
        postImg.style.display = "block";
        removeImgButton.style.display = "block";
        noImgLabel.style.display = "none";
        let output = document.getElementById('img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    }
});

document.getElementById("updateButton").addEventListener("click", () => {
    const formData = new FormData();
    const newImg = inputImg.files[0];

    formData.append('postId', postId);

    if(removeOldImg) {
        axios.post('./api/removeImage.php', formData);
    }
    formData.append('testo', document.getElementById("textElem").value);               

    if(newImg != null) {
        const formDataImage = new FormData();
        formDataImage.append('image', newImg);

        axios.post('./api/uploadImage.php', formDataImage).then(responseUpload => {
            if (!responseUpload.data["uploadEseguito"]) {
                console.log(responseUpload.data["erroreUpload"]);
            } else {
                formData.append('immagine', responseUpload.data["fileName"]);

                axios.post('./api/modificaPost.php', formData).then(() => {
                    alert("Post modificato con successo!");
                    window.location.href = "./profilo.php?id=" + userId;
                });
            }
        });
    } else {
        axios.post('./api/modificaPost.php', formData).then(() => {
            alert("Post modificato con successo!");
            window.location.href = "./profilo.php?id=" + userId;
        });
    }
});
