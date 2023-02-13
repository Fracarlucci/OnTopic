<script src="./js/addPost.js" defer></script>

<div id="slider container" class="m-2 py-2 slider">
    <section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
        <header>
            <div id="topic" class="col-12 px-2 topic">
                <h2 id="title"><?php 
                        if(isset($templateParams["temaDelGiorno"][0])){
                            echo $templateParams["temaDelGiorno"][0]["nome"];
                        }else{
                            echo "";
                        }
                    ?>
                </h2>
            </div>
        </header>
        <!-- Divider -->
        <div class="d-flex justify-content-center col-12">
            <hr class="#000" width="90%" />
        </div>
        <form id="addPostForm" action="#" method="post">
            <!-- Post image -->
            <div id="addImage" class="d-flex justify-content-center">
                <i id="cameraIcon" class="fa fa-camera fa-5x" aria-hidden="true"></i>
                <img id="img" class="img-fluid" alt="Post image">
            </div>
            <div class="d-flex justify-content-center m-2">
                <button type="button" id="removeImgButton" class="btn btn-primary">Rimuovi immagine</button>
            </div> 
            <div class="fil d-flex justify-content-center">
                <input type="file" id="photoElem" accept="image/*"/>
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
            
            <!-- Send post -->
            <footer class="my-1">
                <div class="d-flex justify-content-center">
                    <button type="submit" id="sendPostButton" class="btn btn-primary">
                        Pubblica
                    </button>
                </div>   
            </footer>
        </form>
        
    </section>
</div>