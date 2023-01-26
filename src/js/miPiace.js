let heart = document.querySelectorAll("#heart");

heart.forEach(element => {
    element.addEventListener("click", function(event){
        if(element.classList.contains("liked")){
            element.classList.remove("liked");
        }
        else if (!element.classList.contains("liked")){
            element.classList.add("liked");
        }
    })
});