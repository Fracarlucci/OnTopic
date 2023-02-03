function getList(listType) {
    let username = window.location.pathname;
    username = username.split("=").pop();
    username = "Ciccio";

    document.getElementById("list-type").innerHTML = listType;

    const formData = new FormData();
    formData.append('username', username);
    formData.append('listType', listType);

    axios.post('./api/usersList.php', formData).then(response => {
        const ul = document.getElementById("usersList");
        ul.innerHTML = "";

        if(response.data == false) {
            const li = document.createElement("li");

            li.appendChild(document.createTextNode("Nessun utente"));
            ul.appendChild(li);
        } else {
            response.data.forEach(element => {
                const li = document.createElement("li");
                const a = document.createElement("a");
                const span = document.createElement("span");
                const row =" " + element.nome + " " + element.cognome;

                a.setAttribute("href", "profilo.php?user=" + element.username);
                span.appendChild(document.createTextNode(element.username));
                li.appendChild(span);
                li.appendChild(document.createTextNode(row));
                a.appendChild(li);
                ul.appendChild(a);
            });
        }
    });
}
