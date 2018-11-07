function clickme($element, $value){
    $el = document.getElementById($element);
    if ($el.disabled){
        $el.disabled = false;
        $el.style.backgroundColor = "rgb(82, 88, 108)";
        $el.value = $value;
        $new_pass = "yaaaay";
        if ($element == 'change_pass'){
            //document.getElementById($element).
            //$el.placeholder = "New Password";
            //echo "PASS SHOULD CHANGE";
        }
    }
        
    else{
        $el.disabled = true;
        //$el.setAttribute("background-color", "#1F222B");
        $el.style.backgroundColor = "#1F222B";
        $el.value = $value;
    }
}

function addElement(parentId, elementTag, elementId, html) {
    // Adds an element to the document
    var p = document.getElementById(parentId);
    var newElement = document.createElement(elementTag);
    newElement.setAttribute('id', elementId);
    newElement.innerHTML = html;
    p.appendChild(newElement);
}

function removeElement(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}

function hideElement(elementId){
    var element = document.getElementById(elementId);
    element.style.display = "none";
}

function showElement(elementId){
    var element = document.getElementById(elementId);
    element.style.display = "block";
}

document.getElementById("video_button").addEventListener("click",
hideElement(document.getElementById("video_button")), 
showElement(document.getElementById("video")), 
showElement(document.getElementById("upload_button")));

document.getElementById("upload_button").addEventListener("click",
hideElement(document.getElementById("video")), 
hideElement(document.getElementById("upload_button")), 
showElement(document.getElementById("video_button")));

