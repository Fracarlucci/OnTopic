<div id="slider container" class="m-2 py-2 slider">
    <section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
    
    <form id="modifyPostForm" method="post">
        <!-- Add image -->
        <header>
            <div class="container">
                <div class="row">
                    <div id="img" class="d-flex justify-content-center">
                        <h1 id="noImg">Nessuna Immagine</h1>
                    </div>
                </div>
                <div class="row">
                    <button type="button" id="removeImgButton" class="modalButton">Rimuovi immagine</button>
                </div>
                <div class="row">
                    <label for="upload-image" class="form-label">Scegli un'immagine:</label>
                    <input type="file" class="form-control" id="upload-image">
                </div>
            </div>
        </header>

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
                <button type="button" id="updateButton" class="modalButton">
                    Aggiorna Post
                </button>
            </div>   
        </footer>
    </form>
        
    </section>
</div>