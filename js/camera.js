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

/* apply filter */
function apply_filter(filter_name){
    var filter = document.getElementById("new_filter");
    filter.src = filter_name;
    if (filter_name == "")
        filter.hidden = true;
    else
        filter.hidden = false;
}
var count = 0;

//ONLY run if entire DOM is loaded

//$(document).ready(function());
window.addEventListener("DOMContentLoaded",function() {
    count++;

    var video = document.getElementById("video"),
        canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        filter = document.getElementById("new_filter"),
        //photo = document.getElementById("photo"),
        list = document.getElementById("camera_roll"), 
        count = 0, 
        vendorUrl = window.URL || window.webkitURL;

    navigator.getMedia =    navigator.getUserMedia || 
                            navigator.webkitGetUserMedia || 
                            navigator.mozGetusermedia ||
                            navigator.msGetUserMedia;
    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.srcObject = stream;
        video.play();
    }, function(error) {
           //an error occured
           //error.code
    }); 
        //TAKE PICTURE
        document.getElementById("capture").addEventListener("click", function(){
            context.drawImage(video, 0, 0, 400, 300); //Image from webcam
            //context.drawImage(filter, 0, 0, 400, 300); //png overlay
    
            var photo_container = document.createElement('div');
            photo_container.setAttribute("class", "camera_roll_pic");
           // document.getElementById('lc').appendChild(element);
            photo = document.createElement('img');
            photo.setAttribute("src", canvas.toDataURL("image/jpg"));
            //photo.setAttribute("src", "../resources/ph.jpg");
            //Camera roll
            photo.setAttribute("width", "80");
            photo.setAttribute("height", "70");
            photo.setAttribute("class", "camera_roll_pic");
            photo.setAttribute("id", count++);
            list.insertBefore(photo, camera_roll.firstElementChild);
            /*
            if (count > 4)
                document.getElementById("capture").setAttribute("class", "disabled");
            */
            /* logging */
            //echo output of count to console
            console.log(count);
        });   
        //DELETE CAMERA ROLL
        document.getElementById("delete").addEventListener("click", function(){
            var deleteme = document.getElementById("camera_roll");
            deleteme.innerHTML="";
            count = 0;
        });
        

});


