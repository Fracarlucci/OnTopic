function cerca(form) {
    const input = form.searchBar.value;
    console.log(input);
    const formData = new FormData();
    formData.append('input', input);

    axios.post('./api/search.php', formData).then(response => {
        console.log(response);
        console.log(response.data["user"]);
        if(response.data["user"] == false) {
            document.querySelector(".result").innerHTML = "Nessun risultato";
        } else {
            const username = response.data["user"][0].username;
            document.querySelector(".result").innerHTML = username;
            document.querySelector(".result").href = "profile.php?user=" + username;
        }
    });
 }