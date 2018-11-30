//var status_bar = document.getElementById("status");
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
function removeFilters(){
    var filter_ = "",
    overlay = document.getElementById("filter_overlay");
    for (k = 1; k < 8 ; k++){
       filter_ = "filter_"+k;
        document.getElementById(filter_).checked = false;  
    }
    overlay.innerHTML = "";
}

function addFilter(parentId, elementTag, elementId, src) {
    var newElement = document.createElement(elementTag);
    newElement.setAttribute('id', elementId);
    newElement.setAttribute('src', src);
    newElement.style.position = "absolute";
    parentId = document.getElementById(parentId);
    parentId.insertBefore(newElement, parentId.firstElementChild);
    newElement.style.zindex = "5000";
    
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

 //AJAX FUNCTIONALITY
 function ajaxpost(_1,_2,_3,_4,_5, _6,_7, currentpic, photo){
    // Create our XMLHttpRequest object
    var hr = new XMLHttpRequest();
    // Create some variables we need to send to our PHP file
    var url = "../src/merge.php";
    var filt_1 = _1 ? "../filters/101.png" : "",
    filt_2 = _2 ? "../filters/102.png" : "",
    filt_3 = _3 ? "../filters/103.png" : "",
    filt_4 = _4 ? "../filters/104.png" : "",
    filt_5 = _5 ? "../filters/105.png" : "",
    filt_6 = _6 ? "../filters/106.png" : "",
    filt_7 = _7 ? "../filters/107.png" : "",
    //console.log("Inside ajax bind: "+ this);

    // encodeURIComponent preserves URLs, Kay saved my life
    vars = "filter_1="+filt_1+"&filter_2="+filt_2+"&filter_3="+filt_3+"&filter_4="+filt_4
    +"&filter_5="+filt_5+"&filter_6="+filt_6+"&filter_7="+filt_7+"&current="+encodeURIComponent(currentpic)+"&photo_id="+photo.getAttribute("id");
    
    
    hr.open("POST", url, true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    // Access the onreadystatechange event for the XMLHttpRequest object

    hr.onreadystatechange = function(image)
    {
        if(hr.readyState == 4 && hr.status == 200) {
            //alert(this.responseText);
             arr_json = JSON.parse(this.responseText);
            if (arr_json["status"] == "success"){
                
               image.setAttribute("id", arr_json["username"] + "_"+image.getAttribute("id"));
               image.setAttribute("src", "data:image/png;base64,"+arr_json["src"]);
            }
            else{
                window.alert(arr_json["status"]);
            }
            var return_data = hr.responseText;
            status_bar.innerHTML = arr_json["status"];
        } else  {
            //console.log("error: " + this.responseText);
        }
        //bind responsetext event to photo. Fred is a G
    }.bind(hr, photo);

    // Send the data to PHP now... and wait for response to update the status div
    hr.send(vars); // Actually execute the request
    //console.log(vars);
    //status_bar.innerHTML = "processing...";
}


//ONLY run if entire DOM is loaded

//$(document).ready(function());
window.addEventListener("DOMContentLoaded",function() {

     var video = document.getElementById("video"),
        canvas = document.getElementById("canvas"),
        context = canvas.getContext("2d"),
        // video = document.getElementById("video"),
        up_btn =document.getElementById("upload_button"),
        vid_btn = document.getElementById("video_button"),
        cap_btn = document.getElementById("capture"),
        clear_btn = document.getElementById("clear_all"),
        del_btn = document.getElementById("delete"),
        filt_btns = document.getElementById("filter_buttons"),
        filter_1 = document.getElementById("filter_1"),
        filter_2 = document.getElementById("filter_2"),
        filter_3 = document.getElementById("filter_3"),
        filter_4 = document.getElementById("filter_4"),
        filter_5 = document.getElementById("filter_5"),
        filter_6 = document.getElementById("filter_6"),
        filter_7 = document.getElementById("filter_7"),
        vid_click = document.getElementById("video_click"),
        up_click = document.getElementById("upload_click"), 
        save_click = document.getElementById("save"),
        up_pic = document.getElementById("upload_2"),
        camera_roll = document.getElementById("camera_roll"),
        has_webcam = true,
        arr_json,  
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
    clear_btn.addEventListener('click', function(){
        removeFilters();
    });
    //SWITCH TO CAMERA
    vid_click.addEventListener("click",function(){
        hideElement(vid_btn),
        showElement(video),
        showElement(up_btn),
        hideElement(up_pic),
        removeSauce(up_pic);
        filt_btns.setAttribute("style", "display: ;");
        if (has_webcam == false){
            cap_btn.hidden = true;
        }
 
    });
    //SWITCH TO PICTURE UPLOAD
    up_click.addEventListener("click",function(){
        hideElement(video),
        showElement(up_pic), 
        hideElement(up_btn),
        showElement(vid_btn),
        cap_btn.hidden = false;
        removeFilters(),
        hideElement(filt_btns);
    });
    //DELETE CAMERA ROLL
    del_btn .addEventListener("click", function(){
        
        camera_roll.innerHTML="";
        count = 0;
    }
    );    
    //TAKE PICTURE
    cap_btn.addEventListener("click", function(){
        //Create new DOM images in camera roll
        var photo_container = document.createElement('div'),
        currentpic = "",
        photo_id = Date.now(),  
        _1 = filter_1.checked,
        _2 = filter_2.checked,
        _3 = filter_3.checked,
        _4 = filter_4.checked,
        _5 = filter_5.checked,
        _6 = filter_6.checked,
        _7 = filter_7.checked;

        photo_container.setAttribute("class", "camera_roll_pic");
        context.drawImage(video, 0, 0, 400, 300); //Image from webcam
        photo = document.createElement('img');
     if (isHidden(up_pic)){
            //video
            currentpic = canvas.toDataURL();
            photo.setAttribute("style", "transform: rotateY(180deg);-webkit-transform:rotateY(180deg); /* Safari and Chrome */-moz-transform:rotateY(180deg); /* Firefox */");
       
           // photo.setAttribute("src", currentpic); 
        } else{
            //upload
            context.drawImage(up_pic, 0, 0, 400, 300);
            //photo.setAttribute("src", up_pic.src);
            currentpic = up_pic.src;
        } 
        //photo.setAttribute("width", "80");
        photo.setAttribute("height", "60");
        photo.setAttribute("class", "camera_roll_pic");
        photo.setAttribute("style", "    transform: rotateY(180deg);-webkit-transform:rotateY(180deg); /* Safari and Chrome */-moz-transform:rotateY(180deg); /* Firefox */")
        photo.setAttribute("id", photo_id);
        camera_roll.insertBefore(photo, camera_roll.firstElementChild);
        photo = camera_roll.firstElementChild;
        //AJAX POST

        ajaxpost(_1,_2,_3,_4,_5, _6,_7, currentpic, photo);
             
        
    });   
    up_btn.addEventListener("change",function(){
        //Set upa a reader that converts media to base64
        var reader =  new FileReader();

        reader.addEventListener("load", function(){
            up_pic.src = reader.result;
        }), false;
        if (this.files[0]){
            reader.readAsDataURL(this.files[0]);
        }
    });

    filter_1.addEventListener('change', function(){
        var checked_1 = filter_1.checked;
        if (checked_1) {
            addFilter("filter_overlay", "img", "filter_1_pic", "../filters/101.png");
        } else {
            removeElement( "filter_1_pic");
        }
    });
    filter_2.addEventListener('change', function(){
        var checked_2 = filter_2.checked;
        if (checked_2) {
            addFilter("filter_overlay", "img", "filter_2_pic", "../filters/102.png")
        } else {
            removeElement( "filter_2_pic");
        }
    });
    filter_3.addEventListener('change', function(){
        var checked_3 = filter_3.checked;
        if (checked_3) {
            addFilter("filter_overlay", "img", "filter_3_pic", "../filters/103.png")
        } else {
            removeElement( "filter_3_pic");
        }
    });
    filter_4.addEventListener('change', function(){
        var checked_4 = filter_4.checked;
        if (checked_4) {
            addFilter("filter_overlay", "img", "filter_4_pic", "../filters/104.png")
        } else {
            removeElement( "filter_4_pic");
        }
    });
    filter_5.addEventListener('change', function(){
        var checked_5 = filter_5.checked;
        if (checked_5) {
            addFilter("filter_overlay", "img", "filter_5_pic", "../filters/105.png")
        } else {
            removeElement( "filter_5_pic");
        }
    });
    filter_6.addEventListener('change', function(){
        var checked_6 = filter_6.checked;
        if (checked_6) {
            addFilter("filter_overlay", "img", "filter_6_pic", "../filters/106.png")
        } else {
            removeElement( "filter_6_pic");
        }
    });
    filter_7.addEventListener('change', function(){
        var checked_7 = filter_7.checked;
        if (checked_7) {
            addFilter("filter_overlay", "img", "filter_7_pic", "../filters/107.png")
        } else {
            removeElement( "filter_7_pic");
         }
    });
});
