<div class="col-3">
    <aside class="m-2 px-2 py-3">
        <!-- Friends icon -->
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 21 21">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
            </svg>
            <h2>Amici</h2>
        </a>
        <div class="bg-light border border-dark px-2 py-3 my-1 rounded">
            <nav>
                <ul>
                    <?php foreach($templateParams["amici"] as $amico): ?>
                        <li class="friends">    
                            <a href="linkamico"><?php echo $amico["username"]; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </div>
    </aside>
</div>