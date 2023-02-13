<div class="container my-2 py-2">
    <form action="#" id="searchForm">
        <div class="row">
            <div class="d-flex justify-content-center col-11">
                <input type="text" id="searchBar" aria-label="Cerca" placeholder="Cerca..." required/>
            </div>
            <div class="d-flex justify-content-center col-1">
                <button id="searchButton" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>
        <div id="display"></div>
    </form>
    <div class="row my-2">
        <div class="d-flex col-11">
            <div id="result-container" class="bg-light border border-dark py-2 px-3 my-1 rounded w-100">
                <ul id="result"></ul>
            </div>
        </div>
    </div>
</div>