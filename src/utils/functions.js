function createList(ul, response) {
    ul.innerHTML = "";
    if(response.data == false) {
        const li = document.createElement("li");

        li.appendChild(document.createTextNode("Nessun risultato"));
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

            if(element.testo != null) {
                li.appendChild(document.createTextNode(" " + element.dataOra));
                const p = li.appendChild(document.createElement("p"));
                p.appendChild(document.createTextNode(element.testo));
            } else {
               li.appendChild(document.createTextNode(row));
            }
            a.appendChild(li);
            ul.appendChild(a);
        });
    }
}