const params = new URLSearchParams(window.location.search)
const postId = params.get("postId");
let userId;

const formData = new FormData();
formData.append('postId', postId);

axios.post('./api/getPost.php', formData).then(response => {
    if(response != null) {
        if(response.data[0].immagine != null) {
            const img = document.createElement("img");
            img.setAttribute("src", response.data[0].immagine);
            document.getElementById("header").appendChild(img);
        }
        userId = response.data[0].userId;
        document.getElementById("textElem").innerHTML = response.data[0].testo;
    }
});

document.getElementById("updateButton").addEventListener("click", event => {
    const img = document.getElementsByClassName("upload-image").value;

    const formData = new FormData();
    formData.append('postId', postId);
    formData.append('testo', document.getElementById("textElem").value);
    if(img != null) {
        formData.append('immagine', img);
    }
    console.log("dchi");
    axios.post('./api/modificaPost.php', formData).then(response => {
        alert("Post modificato con successo!");
        window.location.href = "./profilo.php?id=" + userId;
    });
});