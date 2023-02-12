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
        r = Math.min(w / iw, h / ih),
        //nw = iw * r,   // new prop. width
        //nh = ih * r,   // new prop. height
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
    addPost();
    event.target.reset()
});

function addPost(){
    const textPost = new FormData();
    textPost.append('text', document.querySelector("#textElem").value)
    
    const imagePost = new FormData()
    imagePost.append("image", document.querySelector("#photoElem").files[0])
    
}