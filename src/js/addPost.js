function drawImageProp(ctx, img, x, y, w, h, offsetX, offsetY) {

    if (arguments.length === 2) {
        x = y = 0;
        w = ctx.canvas.width;
        h = ctx.canvas.height;
    }

    // default offset is center
    offsetX = typeof offsetX === "number" ? offsetX : 0.5;
    offsetY = typeof offsetY === "number" ? offsetY : 0.5;

    // keep bounds [0.0, 1.0]
    if (offsetX < 0) offsetX = 0;
    if (offsetY < 0) offsetY = 0;
    if (offsetX > 1) offsetX = 1;
    if (offsetY > 1) offsetY = 1;

    var iw = img.width,
        ih = img.height,
        nw = w,
        nh = h,
        cx, cy, cw, ch, ar = 1;

    // decide which gap to fill    
    if (nw < w) ar = w / nw;                             
    if (Math.abs(ar - 1) < 1e-14 && nh < h) ar = h / nh;  // updated
    nw *= ar;
    nh *= ar;

    // calc source rectangle
    cw = iw / (nw / w);
    ch = ih / (nh / h);

    cx = (iw - cw) * offsetX;
    cy = (ih - ch) * offsetY;

    // make sure source rectangle is valid
    if (cx < 0) cx = 0;
    if (cy < 0) cy = 0;
    if (cw > iw) cw = iw;
    if (ch > ih) ch = ih;

    // fill image in dest. rectangle
    ctx.drawImage(img, cx, cy, cw, ch,  x, y, w, h);
}

//const photoElem = document.querySelector("#photoElem");
let imgInput = document.getElementById('photoElem');
imgInput.addEventListener('change', function (e) {
    if (e.target.files) {
        var camera = document.getElementById("cameraIcon");
        camera.style.display = "none";

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
                drawImageProp(ctx, img, 0, 0, 300, 150, 0.5, 0.5);

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
    
    const formData = new FormData();
    const formDataImage = new FormData();
    const text = document.getElementById("textElem").value;
    const topic = document.getElementById('title').innerText;

    formData.append('tema', topic);
    formData.append('testo', text);
    
    img = document.getElementById("photoElem").files[0];
    if(img != null) {
        formDataImage.append('image', img);
        axios.post('./api/uploadImage.php', formDataImage).then((responseUpload) => {
            if (!responseUpload.data["uploadEseguito"]) {
                alert("Qualcosa è andato storto :/");
            }else{
                formData.append('image', responseUpload.data["fileName"]);
                axios.post('./api/addPost.php', formData).then(() => {
                    alert("Post aggiunto con successo!");
                });
            }    
        });
    }else{
        if(text.length === 0){
            alert("Parametri assenti!");
        }else{
            axios.post('./api/addPost.php', formData).then(() => {
                alert("Post aggiunto con successo!");
            });
        }
    }
    
    window.location.href = "./aggiunta-post.php";
    event.target.reset()
});