(function() {
    var video = document.getElementById("video"),
        canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        photo = document.getElementById("photo"),

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
        context.drawImage(video, 0, 0, 400, 300);
        photo.setAttribute("src", canvas.toDataURL("image/jpg"));
    });
})();

function create_roll(){
    'use strict';

    var newElement = document.createElement('li');
    newElement.textContent = 'I am a new Element';
    var list = document.getElementById('camera_roll');
    //list.appendChild(newElement);
    list.insertBefore(newElement, camera_roll.firstElementChild);
    console.log(newElement);

};

