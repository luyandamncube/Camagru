/*
function create_roll(){
    'use strict';

    var newElement = document.createElement('img');
    newElement.src = '../resources/placeholder.jpg';
    newElement.height = "30";
    newElement.width = "40";
    //newElement.textContent = 'I am a new Element';
    var list = document.getElementById('camera_roll');
    //list.appendChild(newElement);
    list.insertBefore(newElement, camera_roll.firstElementChild);
    console.log(newElement);
};
*/

/* apply filter */
function apply_filter(filter_name){
    var filter = document.getElementById("new_filter");
    filter.src = filter_name;
    if (filter_name == "")
        filter.hidden = true;
    else
        filter.hidden = false;
}

(function() {
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
        video.src = vendorUrl.createObjectURL(stream);
        video.play();
    }, function(error) {
           //an error occured
           //error.code
    }); 

    document.getElementById("capture").addEventListener("click", function(){
        context.drawImage(video, 0, 0, 400, 300); //Image from webcam
        context.drawImage(filter, 0, 0, 400, 300); //png overlay

        var photo_container = document.createElement('div');
        photo_container.setAttribute("class", "camera_roll_pic");
       // document.getElementById('lc').appendChild(element);
        photo = document.createElement('img');
        //photo.setAttribute("src", canvas.toDataURL("image/jpg"));
        photo.setAttribute("src", "../resources/ph.jpg");
        //Camera roll
        photo.setAttribute("width", "80");
        photo.setAttribute("height", "60");
        photo.setAttribute("class", "camera_roll_pic");
        photo.setAttribute("id", "0" + count++);
        list.insertBefore(photo, camera_roll.firstElementChild);
    });
})();