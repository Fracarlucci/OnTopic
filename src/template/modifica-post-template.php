<div id="slider container" class="m-2 py-2 slider">
    <section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
        <div class="container">
            <div class="topic">
                <h1 id="title"></h1>
            </div>
            <!-- Divider -->
            <div class="d-flex justify-content-center col-12">
                <hr class="#000" width="90%" />
            </div>
            <form id="modifyPostForm" action="#" method="post">
                <div id="image" class="d-flex justify-content-center">
                    <i id="noImg" class="fa fa-camera fa-5x" aria-hidden="true"></i>
                    <img src="" id="img" class="img-fluid" alt="Post image">
                </div>
                <div class="d-flex justify-content-center m-2">
                    <button type="button" id="removeImgButton" class="btn btn-primary">Rimuovi immagine</button>
                </div>
                <div class="d-flex justify-content-center">
                    <label for="upload-image" class="form-label"></label>
                    <input type="file" class="mt-1" id="upload-image" accept="image/*"/>
                </div>

                <!-- Divider -->
                <div class="d-flex justify-content-center col-12">
                    <hr class="#000" width="90%" />
                </div>

                <!-- Add text -->
                <textarea id="textElem" class="w-100 rounded" rows="5" placeholder="Scrivi qui il testo!"></textarea>
                
                <!-- Divider -->
                <div class="d-flex justify-content-center col-12">
                    <hr class="#000" width="90%" />
                </div>
                
                <!-- Update post -->
                <footer class="my-1">
                    <div class="d-flex justify-content-center">
                        <button type="button" id="updateButton" class="btn btn-primary">
                            Aggiorna Post
                        </button>
                    </div>   
                </footer>
            </form>
        </div>    
    </section>
</div>