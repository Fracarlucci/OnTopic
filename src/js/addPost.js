const photoElem = document.querySelector("#photoElem");
var uploaded_image = "";

// stampo l'immagine selezionata
// photoElem.addEventListener("change", function(){
//     const reader = new FileReader();
//     reader.addEventListener("load", () => {
//         uploaded_image = reader.result;
//         document.querySelector("#addImage").style.backgroundImage = `url(${uploaded_image})`;
//     });
//     reader.readAsDataURL(this.files[0]);
// }, true);
    let imgInput = document.getElementById('photoElem');
        imgInput.addEventListener('change', function (e) {
            if (e.target.files) {
                let imageFile = e.target.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
                    var img = document.createElement("img");
                    img.onload = function (event) {
                        // Dynamically create a canvas element
                        var canvas = document.createElement("canvas");

                        // var canvas = document.getElementById("canvas");
                        var ctx = canvas.getContext("2d");

                        // Actual resizing
                        ctx.drawImage(img, 0, 0, 300, 150);

                        // Show resized image in preview element
                        var dataurl = canvas.toDataURL(imageFile.type);
                        document.getElementById("preview").src = dataurl;
                    }
                    img.src = e.target.result;
                }
                reader.readAsDataURL(imageFile);
            }
        });


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