function cerca(form) {
    if(window.event.key === 'Enter' || window.event.type === 'click') {
        const input = form.searchBar.value;
        if(input != "") {
            const formData = new FormData();
            formData.append('input', input);

            document.getElementById("result-container").style.display = "block";

            axios.post('./api/search.php', formData).then(response => {
                const ul = document.getElementById("result");
                createList(ul, response);
            });
        }
    }
}
