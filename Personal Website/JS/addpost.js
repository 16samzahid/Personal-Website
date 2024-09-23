
let clearButton = document.getElementById("clear");


clearButton.addEventListener("click", function(e){
    e.preventDefault();

    let confirmed = window.confirm("Are you sure you want to clear the form?");
    if(confirmed){
        let form = document.getElementById("addPostForm");
        form.reset();
    }

});



const form = document.getElementById("addPostForm");
const title = document.getElementById("title");
const content = document.getElementById("content");

form.addEventListener("submit", submitEvent);

function submitEvent(e){
    if(validateInputs() === false){
        e.preventDefault();
    }
    else{
        form.submit();
    }
}

function validateInputs(){

    // let isValid = true;
    // let fields = 0;

    let titleValue = title.value.trim(); //get the value of the title input and remove any whitespace
    let contentValue = content.value.trim(); //get the value of the content input and remove any whitespace
    if(titleValue === ""){
        title.style.border = "2px solid red";
        return false;
    }
    else{
        title.style.border = "1px solid black";
    }
    if(contentValue === ""){
        content.style.border = "2px solid red";
        return false;
    }
    else{
        content.style.border = "1px solid black";
    }

    return true;
        
}
// Add event listener to form submission
document.getElementById('preview').addEventListener('click', preview);

function preview(event) {
    event.preventDefault();
    // Store title and content in local storage
    localStorage.setItem('title', title.value);
    localStorage.setItem('content', content.value);
    window.location.href = "previewPost.html";
};

