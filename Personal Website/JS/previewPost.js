// Retrieve title and content from local storage

const title = localStorage.getItem('title');
const content = localStorage.getItem('content');

let titleElement = document.getElementById('previewTitle');
let contentElement = document.getElementById('previewContent');

window.addEventListener('load', loadPost);

function loadPost(e){
    let titleElement = document.getElementById('previewTitle');
    titleElement.innerText = localStorage.getItem('title');

    let contentElement = document.getElementById('previewContent');
    contentElement.innerText = localStorage.getItem('content');
}

// Function to submit post to PHP
function submitPost() {
    // Redirect to submitpost.php with title and content as URL parameters
    window.location.href = "submitpost.php?title=" + encodeURIComponent(title) + "&content=" + encodeURIComponent(content); //pass the items from local storage as parameters to the url so that the php can access it
}

function editPost() {
    console.log("Edit post");
    //title = document.getElementById('previewTitle');
    //content = document.getElementById('previewContent');
    window.history.back();
}


