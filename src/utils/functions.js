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

            span.appendChild(document.createTextNode(element.username));
            li.appendChild(span);

            if(element.testo != null) {
                li.appendChild(document.createTextNode(" " + element.dataOra));
                const p = li.appendChild(document.createElement("p"));
                p.appendChild(document.createTextNode(element.testo));
                a.setAttribute("href", "profilo.php?id=" + element.userId);
            } else {
               li.appendChild(document.createTextNode(row));
               a.setAttribute("href", "profilo.php?id=" + element.id);
            }
            a.appendChild(li);
            ul.appendChild(a);
        });
    }
}