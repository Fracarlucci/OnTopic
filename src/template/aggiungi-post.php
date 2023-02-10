<script src="./js/addPost.js" defer></script>
<?php require_once './aggiunta-post.php' ?>

<div id="slider container" class="m-2 py-2 slider">
    <section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
    
    <form id="addPostForm" action="#" method="post">
        <!-- Add image -->
        <header class="d-flex justify-content-center">
            <div id="addImage" class="addImage">
                <label class="upload" for="upload">
                    <i class="fa fa-camera fa-5x" aria-hidden="true"></i>
                        <!-- <a class="overlay">
                            <i class="fa fa-plus fa-5x" aria-hidden="true"></i>  
                        </a> -->
                </label>
            </div>

        </header>

        <div class="fil d-flex justify-content-center">
            <input type="file" id="photoElem" accept="image/png, image/jpg">
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
        <p></p>
    </form>
        
    </section>
</div>