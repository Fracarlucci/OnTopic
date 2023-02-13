//const photoElem = document.querySelector("#photoElem");
const imgInput = document.getElementById('photoElem');
const camera = document.getElementById("cameraIcon");
const postImg = document.getElementById("img");
const removeImgButton = document.getElementById("removeImgButton");

postImg.style.display = "none";
removeImgButton.style.display = "none";

imgInput.addEventListener('change', (e) => {
    if(imgInput.files[0] == null) {
        postImg.style.display = "none";
        removeImgButton.style.display = "none";
        camera.style.display = "block";
    } else {
        postImg.style.display = "block";
        removeImgButton.style.display = "block";
        camera.style.display = "none";
        var output = document.getElementById('img');
        output.src = URL.createObjectURL(e.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src)
        }
    }
});

removeImgButton.addEventListener("click", event => {
    imgInput.value = "";
    postImg.style.display = "none";
    removeImgButton.style.display = "none";
    camera.style.display = "block";
});

// aggiungo il post
document.querySelector("#addPostForm").addEventListener("submit", function (event) {
    event.preventDefault()
    
    const formData = new FormData();
    const img = imgInput.files[0];
    const text = document.getElementById("textElem").value;
    const topic = document.getElementById('title').innerText;

    formData.append('tema', topic);
    formData.append('testo', text);
    
    if(img != null) {
        const formDataImage = new FormData();
        formDataImage.append('image', img);
        axios.post('./api/uploadImage.php', formDataImage).then((responseUpload) => {
            if (!responseUpload.data["uploadEseguito"]) {
                alert("Qualcosa è andato storto :/");
                window.location.href = "./aggiuntaPost.php";
            }else{
                formData.append('image', responseUpload.data["fileName"]);
                axios.post('./api/addPost.php', formData).then((response) => {
                    alert("Post aggiunto con successo!");     
                    window.location.href = "./profilo.php?id=" + response.data;
                });
            }    
        });
    }else{
        if(text.length === 0){
            alert("Parametri assenti!");
            window.location.href = "./aggiuntaPost.php";
        }else{
            axios.post('./api/addPost.php', formData).then((response) => {
                alert("Post aggiunto con successo!");
                console.log(response.data);
                window.location.href = "./profilo.php?id=" + response.data;
            });
        }
    }
});