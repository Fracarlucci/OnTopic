const photoElem = document.querySelector("#photoElem");
var uploaded_image = "";

// stampo l'immagine selezionata
photoElem.addEventListener("change", function(){
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        uploaded_image = reader.result;
        document.querySelector("#addImage").style.backgroundImage = `url(${uploaded_image})`;
    });
    reader.readAsDataURL(this.files[0]);
}, true);

// aggiungo il post
document.querySelector("#addPostForm").addEventListener("submit", function (event) {
    event.preventDefault()
    addPost();
    event.target.reset()
});

function addPost(){
    const textPost = new FormData();
    textPost.append('text', document.querySelector("#textElem").value)
    
    const imagePost = new FormData()
    imagePost.append("image", document.querySelector("#photoElem").files[0])
    
}