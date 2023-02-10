function getUsersList(listType) {
    //get user id to follow by query param
    const params = new URLSearchParams(window.location.search)
    userId = params.get("id")

    document.getElementById("list-type").innerHTML = listType;

    const formData = new FormData();
    formData.append('userId', userId);
    formData.append('listType', listType);

    axios.post('./api/usersList.php', formData).then(response => {
        const ul = document.getElementById("usersList");
        createList(ul, response);
    });
}
