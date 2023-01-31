function cerca(form) {
    if(window.event.key === 'Enter' || window.event.type === 'click') {
    const input = form.searchBar.value;
    if(input != "") {
        const formData = new FormData();
        formData.append('input', input);

        document.getElementById("result-container").style.display = "block";

        axios.post('./api/search.php', formData).then(response => {
            const ul = document.getElementById("result");
            ul.innerHTML = "";
            if(response.data["user"] == false) {
                const li = document.createElement("li");

                li.appendChild(document.createTextNode("Nessun risultato"));
                ul.appendChild(li);
            } else {
                response.data["user"].forEach(element => {
                    const li = document.createElement("li");
                    const a = document.createElement("a");
                    const span = document.createElement("span");
                    const row =" " + element.nome + " " + element.cognome;

                    a.setAttribute("href", "profile.php?user=" + element.username);
                    span.appendChild(document.createTextNode(element.username));
                    li.appendChild(span);
                    li.appendChild(document.createTextNode(row));
                    a.appendChild(li);
                    ul.appendChild(a);
                });
            }
        });
    }
}
 }