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
    //var element = document.getElementById(elementId);
    elementId.parentNode.removeChild(element);
}

function hideElement(elementId){
    //var element = document.getElementById(elementId);
    elementId.style.display = "none";
}

function showElement(elementId){
    //var element = document.getElementById(elementId);
    elementId .style.display = "block";
}

window.addEventListener("DOMContentLoaded", function(){
    var video = document.getElementById("video");
    var up_btn =document.getElementById("upload_button");
    var vid_btn = document.getElementById("video_button");
    var up_pic = document.getElementById("upload_2");
    //var up_pic = document.querySelector("#upload_2");
    
    document.getElementById("video_click").addEventListener("click",function(){
        hideElement(vid_btn), 
        showElement(video), 
        showElement(up_btn),
        hideElement(up_pic)
    });

   
    //console.log(video);
    
    document.getElementById("upload_click").addEventListener("click",function(){
        
        hideElement(video), 
        showElement(up_pic), 
        hideElement(up_btn), 
        showElement(vid_btn)
    });

    document.getElementById('upload_button').addEventListener("change",function(){
        document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0]);
    });
    


});

