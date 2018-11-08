function hideElement(elementId){
    elementId.style.display = "none";
}
function showElement(elementId){
    elementId.style.display = "block";
}
function removeSauce(elementId){
    elementId.setAttribute('src', "");
}
function addElement(parentId, elementTag, elementId, html) {
    var newElement = document.createElement(elementTag);
    newElement.setAttribute('id', elementId);
    newElement.innerHTML = html;
    parentId.appendChild(newElement);
}
function removeElement(elementId) {
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}
function addFilter(parentId, elementTag, elementId, src) {
    var newElement = document.createElement(elementTag);
    newElement.setAttribute('id', elementId);
    newElement.setAttribute('src', src);
    newElement.style.position = "absolute";
    parentId = document.getElementById(parentId);
    parentId.insertBefore(newElement, parentId.firstElementChild);
}
function clickme($element, $value){
    $el = document.getElementById($element);
    if ($el.disabled){
        $el.disabled = false;
        $el.style.backgroundColor = "rgb(82, 88, 108)";
        $el.value = $value;
    }
        
    else{
        $el.disabled = true;
        $el.style.backgroundColor = "#1F222B";
        $el.value = $value;
    }
}
//ONLY run if entire DOM is loaded

//$(document).ready(function());
window.addEventListener("DOMContentLoaded",function() {
     var video = document.getElementById("video"),
        canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        filter = document.getElementById("new_filter"),
        video = document.getElementById("video"),
        up_btn =document.getElementById("upload_button"),
        vid_btn = document.getElementById("video_button"),
        up_pic = document.getElementById("upload_2"),
        camera_roll = document.getElementById("camera_roll"); 
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
        var photo_container = document.createElement('div');
        photo_container.setAttribute("class", "camera_roll_pic");
        photo = document.createElement('img');
        photo.setAttribute("src", canvas.toDataURL("image/jpg"));
        photo.setAttribute("width", "80");
        photo.setAttribute("height", "70");
        photo.setAttribute("class", "camera_roll_pic");
        photo.setAttribute("id", count++);
        camera_roll.insertBefore(photo, camera_roll.firstElementChild);
        console.log(count);
    });   
    //DELETE CAMERA ROLL
    document.getElementById("delete").addEventListener("click", function(){
        var deleteme = document.getElementById("camera_roll");
        deleteme.innerHTML="";
        count = 0
    }
    );
    document.getElementById("video_click").addEventListener("click",function(){
        hideElement(vid_btn), 
        showElement(video), 
        showElement(up_btn),
        hideElement(up_pic),
        removeSauce(up_pic)
    });

    //console.log(video);
    document.getElementById("upload_click").addEventListener("click",function(){
        hideElement(video), 
        showElement(up_pic), 
        hideElement(up_btn), 
        showElement(vid_btn)
    });

    document.getElementById("save").addEventListener("click",function(){
        var gal = document.querySelector("#camera_roll"),

            child = gal.children,
            k = 0;

            //document.getElementById('gender_Male').checked
            console.log(filter_1);
            console.log(filter_2);
            console.log(filter_3);
            console.log(filter_4);
            console.log(filter_5);
            console.log(filter_6);
            console.log(filter_7);
            
            camera_roll.innerHTML = "";
            count = 0;
        //access each child node
        while (typeof child[k] !== 'undefined'){
            console.log(child[k]);
            k++;
        }

    });
    document.getElementById('upload_button').addEventListener("change",function(){
        document.getElementById('upload_2').src = window.URL.createObjectURL(this.files[0])
        //console.log(this.files[0])
    });

    document.getElementById("filter_1").addEventListener('change', function(){
        var filter_1 = document.getElementById("filter_1").checked;
        if (filter_1) {
            addFilter("filter_overlay", "img", "filter_1", "../filters/101.png")
        } else {
            removeElement( "filter_1");
        }
    });
    document.getElementById("filter_2").addEventListener('change', function(){
        var filter_2 = document.getElementById("filter_2").checked;
        if (filter_2) {
            addFilter("filter_overlay", "img", "filter_2", "../filters/102.png")
        } else {
            removeElement( "filter_2");
        }
    });
    document.getElementById("filter_3").addEventListener('change', function(){
        var filter_3 = document.getElementById("filter_3").checked;
        if (filter_3) {
            addFilter("filter_overlay", "img", "filter_3", "../filters/103.png")
        } else {
            removeElement( "filter_3");
        }
    });
    document.getElementById("filter_4").addEventListener('change', function(){
        var filter_4 = document.getElementById("filter_4").checked;
        if (filter_4) {
            addFilter("filter_overlay", "img", "filter_4", "../filters/104.png")
        } else {
            removeElement( "filter_4");
        }
    });
    document.getElementById("filter_5").addEventListener('change', function(){
        var filter_5 = document.getElementById("filter_5").checked;
        if (filter_5) {
            addFilter("filter_overlay", "img", "filter_5", "../filters/105.png")
        } else {
            removeElement( "filter_5");
        }
    });
    document.getElementById("filter_6").addEventListener('change', function(){
        var filter_6 = document.getElementById("filter_6").checked;
        if (filter_6) {
            addFilter("filter_overlay", "img", "filter_6", "../filters/106.png")
        } else {
            removeElement( "filter_6");
        }
    });
    document.getElementById("filter_7").addEventListener('change', function(){
        var filter_7 = document.getElementById("filter_7").checked;
        if (filter_7) {
            addFilter("filter_overlay", "img", "filter_7", "../filters/107.png")
        } else {
            removeElement( "filter_7");
         }
    });
    //This shit executes twice, wtf
    document.getElementById("clear_all").addEventListener('click', function(){

        var filts = document.querySelector("#filter_overlay"),
            child = filts.children,
            k = 0;
            
        //access each child node
        while (typeof child[k] !== 'undefined'){
            console.log(child[k]);
            k++;
        }
    });

});
