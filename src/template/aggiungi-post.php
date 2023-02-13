<script src="./js/addPost.js" defer></script>

<div id="slider container" class="m-2 py-2 slider">
    <section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
       <!-- Add image -->
        <form id="addPostForm" action="#" method="post">
            <header class="d-flex justify-content-center">
                <!-- Topic of the day -->
                <div id="topic" class="col-12 px-2 topic">
                    <h1 id="title"><?php 
                            if(isset($templateParams["temaDelGiorno"][0])){
                                echo $templateParams["temaDelGiorno"][0]["nome"];
                            }else{
                                echo "";
                            }
                        ?>
                    </h1>
                </div>
            </header>

            <!-- Divider -->
            <div class="d-flex justify-content-center col-12">
                <hr class="#000" width="90%" />
            </div>
                        
            <div class="container">
                <!-- Post image -->
                <div class="row">
                    <div class="post d-flex justify-content-center">
                        <div id="addImage" class="addImage">
                            <img id="preview">
                            <i id="cameraIcon" class="fa fa-camera fa-5x" aria-hidden="true"></i>
                        </div>
                    </div>
                            
                    <div class="fil d-flex justify-content-center">
                        <input type="file" id="photoElem" accept="image/*">
                    </div>
                </div> 

                <!-- Divider -->
                <div class="d-flex justify-content-center col-12">
                    <hr class="#000" width="90%" />
                </div>

                <!-- Add text -->
                <div class="row">
                    <textarea id="textElem" class="w-100 rounded" rows="5" placeholder="Scrivi qui il testo!"></textarea>
                </div> 
            </div>

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