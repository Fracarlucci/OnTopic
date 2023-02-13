<section class="bg-light border border-dark my-4 px-4 pt-3 pb-1 rounded">
    <div class="container slider">
        <header>
            <div class="topic">
                <h1 id="title">Impostazioni</h1>
            <div class="topic">
        </header>
        <!-- Divider -->
        <div class="d-flex justify-content-center col-12">
            <hr class="#000 w-100" />
        </div>
        <form id="modifyPostForm" action="#" method="post">
            <div id="image" class="d-flex justify-content-center">
                <img src="./img/<?php echo $templateParams["utente"][0]["imgProfilo"] ?>" id="img" class="img-fluid w-25" alt="Profile image">
            </div>
            <div class="d-flex justify-content-center">
                <input type="file" class="mt-1" id="upload-image" aria-label="Cambia immagine" accept="image/*"/>
            </div>
            <label for="username" class="mt-2">Username</label>
            <input type="text" class="form-control mt-1" id="username" value="<?php echo $templateParams["utente"][0]["username"] ?>" required />
            <label for="nome" class="mt-2">Nome</label>
            <input type="text" class="form-control mt-1" id="nome" value="<?php echo $templateParams["utente"][0]["nome"] ?>" required />
            <label for="cognome" class="mt-2">Cognome</label>
            <input type="text" class="form-control mt-1" id="cognome" value="<?php echo $templateParams["utente"][0]["cognome"] ?>" required />
            <label for="email" class="mt-2">Email</label>
            <input type="email" class="form-control mt-1" id="email" value="<?php echo $templateParams["utente"][0]["email"] ?>" required />
            <footer class="my-2">
                <div class="d-flex justify-content-center">
                    <input type="submit" id="salva" class="btn btn-primary" value="Salva" />
                </div>   
            </footer>
        </form>
    </div>    
</section>
