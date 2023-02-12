
const callBackFunctionComments = () => {
    let commentButtons = document.querySelectorAll(".comment")

    commentButtons.forEach(element => element.addEventListener("click", event => {
        let postId = event.currentTarget.getAttribute("data-postid")
        document.getElementById("postHidden").value = postId
    }))
}

/**
 * Observer to check updatePost container changes and then trigger callback 
 */
const containerComments = document.getElementById('postContainer');
callBackFunctionComments()

var MutationObserver = window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver;
var observerComments = new MutationObserver(callBackFunctionComments);
observerComments.observe(containerComments, {
    childList: true
});

    