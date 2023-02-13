
const onReadyCallback = () => {
    Array.from(document.getElementsByClassName("deleteNotificationImg")).forEach(element => {
        element.addEventListener("click", event => {
            event.preventDefault()
        
            //get notification id to hide 
            let notificationId = event.currentTarget.getAttribute("data-notificationId")
        
            //prepare body
            let formData = new FormData()
            formData.append("id", notificationId)
        
            //send post request to hide notification
            axios.post('./api/deleteNotification.php', formData).then(Response => {
                window.location.reload()
            })
        })
    })
}

document.addEventListener("DOMContentLoaded", onReadyCallback);
