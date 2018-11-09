function isHidden(el) {
    var style = window.getComputedStyle(el);
    return (style.display === 'none')
}
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
        video = document.getElementById("video"),
        up_btn =document.getElementById("upload_button"),
        vid_btn = document.getElementById("video_button"),
        cap_btn = document.getElementById("capture"),
        up_pic = document.getElementById("upload_2"),
        has_webcam = true,
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
        has_webcam = false;
        cap_btn.hidden = true;
           //an error occured
           //error.code
    });
    
    //REMOVE FILTERS
    document.getElementById("clear_all").addEventListener('click', function(){
       
        var filter_ = "";
        for (k = 1; k < 8 ; k++){
           filter_ = "filter_"+k;
            document.getElementById(filter_).checked = false;  
        }
        document.getElementById("filter_overlay").innerHTML = "";
    });
    //SWITCH TO CAMERA
    document.getElementById("video_click").addEventListener("click",function(){
        hideElement(vid_btn), 
        showElement(video), 
        showElement(up_btn),
        hideElement(up_pic),
        removeSauce(up_pic);
        if (has_webcam == false){
            cap_btn.hidden = true;
        }
 
    });
    //SWITCH TO PICTURE UPLOAD
    document.getElementById("upload_click").addEventListener("click",function(){
        hideElement(video), 
        showElement(up_pic), 
        hideElement(up_btn), 
        showElement(vid_btn),
        cap_btn.hidden = false;
    });
    //DELETE CAMERA ROLL
    document.getElementById("delete").addEventListener("click", function(){
        var deleteme = document.getElementById("camera_roll");
        deleteme.innerHTML="";
        count = 0
    }
    );    
    //TAKE PICTURE
    document.getElementById("capture").addEventListener("click", function(){
        context.drawImage(video, 0, 0, 400, 300); //Image from webcam
        var photo_container = document.createElement('div');
        photo_container.setAttribute("class", "camera_roll_pic");
        photo = document.createElement('img');
        if (isHidden(up_pic)){
            //console.log();
            photo.setAttribute("src", canvas.toDataURL("image/jpg"));
        } else{
            photo.setAttribute("src", up_pic.src);
        }
        photo.setAttribute("width", "80");
        photo.setAttribute("height", "70");
        photo.setAttribute("class", "camera_roll_pic");
        photo.setAttribute("id", count++);
        camera_roll.insertBefore(photo, camera_roll.firstElementChild);
        console.log(count);
    });   
    //SAVE ALL PICTURES
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
        up_pic.src = window.URL.createObjectURL(this.files[0])
        //console.log(this.files[0])
    });

    document.getElementById("filter_1").addEventListener('change', function(){
        var filter_1 = document.getElementById("filter_1").checked;
        if (filter_1) {
            addFilter("filter_overlay", "img", "filter_1_pic", "../filters/101.png");
            console.log(filter_1);
        } else {
            removeElement( "filter_1_pic");
            console.log(filter_1);
        }
    });
    document.getElementById("filter_2").addEventListener('change', function(){
        var filter_2 = document.getElementById("filter_2").checked;
        if (filter_2) {
            addFilter("filter_overlay", "img", "filter_2_pic", "../filters/102.png")
        } else {
            removeElement( "filter_2_pic");
        }
    });
    document.getElementById("filter_3").addEventListener('change', function(){
        var filter_3 = document.getElementById("filter_3").checked;
        if (filter_3) {
            addFilter("filter_overlay", "img", "filter_3_pic", "../filters/103.png")
        } else {
            removeElement( "filter_3_pic");
        }
    });
    document.getElementById("filter_4").addEventListener('change', function(){
        var filter_4 = document.getElementById("filter_4").checked;
        if (filter_4) {
            addFilter("filter_overlay", "img", "filter_4_pic", "../filters/104.png")
        } else {
            removeElement( "filter_4_pic");
        }
    });
    document.getElementById("filter_5").addEventListener('change', function(){
        var filter_5 = document.getElementById("filter_5").checked;
        if (filter_5) {
            addFilter("filter_overlay", "img", "filter_5_pic", "../filters/105.png")
        } else {
            removeElement( "filter_5_pic");
        }
    });
    document.getElementById("filter_6").addEventListener('change', function(){
        var filter_6 = document.getElementById("filter_6").checked;
        if (filter_6) {
            addFilter("filter_overlay", "img", "filter_6_pic", "../filters/106.png")
        } else {
            removeElement( "filter_6_pic");
        }
    });
    document.getElementById("filter_7").addEventListener('change', function(){
        var filter_7 = document.getElementById("filter_7").checked;
        if (filter_7) {
            addFilter("filter_overlay", "img", "filter_7_pic", "../filters/107.png")
        } else {
            removeElement( "filter_7_pic");
         }
    });
});
