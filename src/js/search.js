document.getElementById("searchForm").addEventListener("submit", event => {
    event.preventDefault()
    const formData = new FormData();
    formData.append('input', document.getElementById("searchBar").value)
    document.getElementById("result-container").style.display = "block";

    axios.post('./api/search.php', formData).then(response => {
        const ul = document.getElementById("result");
        createList(ul, response);
    });
});
