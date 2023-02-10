<div id="slider container" class="m-2 py-2 slider">
    <section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
    
    <form id="modifyPostForm" method="post">
        <!-- Add image -->
        <header class="d-flex justify-content-center" id="header">
            <label for="upload-image" class="form-label">Immagine del post</label>
            <input type="file" class="form-control" id="upload-image">
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
                <button type="button" id="updateButton">
                    Aggiorna Post
                </button>
            </div>   
        </footer>
    </form>
        
    </section>
</div>