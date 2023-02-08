function getUsersList(listType) {
    let username = window.location.pathname;
    username = username.split("=").pop();
    username = "Ciccio";

    document.getElementById("list-type").innerHTML = listType;

    const formData = new FormData();
    formData.append('username', username);
    formData.append('listType', listType);

    axios.post('./api/usersList.php', formData).then(response => {
        const ul = document.getElementById("usersList");
        createList(ul, response);
    });
}
