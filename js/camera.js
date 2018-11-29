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

/*
    -----Drag Element Section-----
    */
   function dragElement(elmnt) {
    var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
    if (document.getElementById(elmnt.id + "header")) {
        // if present, the header is where you move the DIV from:
        document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
    } else {
        // otherwise, move the DIV from anywhere inside the DIV:
        elmnt.onmousedown = dragMouseDown;
        //console.log(elmnt);
    }

    function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
        // get the mouse cursor position at startup:
        pos3 = e.clientX;
        pos4 = e.clientY;
        elmnt.onmouseup = closeDragElement;
        // call a function whenever the cursor moves:
        elmnt.onmousemove = elementDrag;
    }

    function elementDrag(e) {
        e = e || window.event;
        e.preventDefault();
        // calculate the new cursor position:
        pos1 = pos3 - e.clientX;
        pos2 = pos4 - e.clientY;
        pos3 = e.clientX;
        pos4 = e.clientY;
        // set the element's new position:
        elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
        elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
        //console.log("I am dragged");

    }

    function closeDragElement() {
        // stop moving when mouse button is released:
        elmnt.onmouseup = null;
        elmnt.onmousemove = null;
    }
}

function addFilter(parentId, elementTag, elementId, src) {
    var newElement = document.createElement(elementTag);
    newElement.setAttribute('id', elementId);
    newElement.setAttribute('src', src);
    newElement.style.position = "absolute";
    parentId = document.getElementById(parentId);
    parentId.insertBefore(newElement, parentId.firstElementChild);
    newElement.style.zindex = "5000";
    dragElement(newElement);
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
        // video = document.getElementById("video"),
        up_btn =document.getElementById("upload_button"),
        vid_btn = document.getElementById("video_button"),
        cap_btn = document.getElementById("capture"),
        up_pic = document.getElementById("upload_2"),
        has_webcam = true,
        arr_json, 

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


    //AJAX FUNCTIONALITY
    function ajaxpost(_1,_2,_3,_4,_5, _6,_7, currentpic, photo){
        // Create our XMLHttpRequest object
        var hr = new XMLHttpRequest();
        // Create some variables we need to send to our PHP file
        var url = "../src/merge.php";
        //var userType = userIsYoungerThan18 ? "Minor" : "Adult";
        var filt_1 = _1 ? "../filters/101.png" : "",
        filt_2 = _2 ? "../filters/102.png" : "",
        filt_3 = _3 ? "../filters/103.png" : "",
        filt_4 = _4 ? "../filters/104.png" : "",
        filt_5 = _5 ? "../filters/105.png" : "",
        filt_6 = _6 ? "../filters/106.png" : "",
        filt_7 = _7 ? "../filters/107.png" : "";
        //console.log("Inside ajax bind: "+ this);
        /*
        switch(expression) {
            case x:
                code block
                break;
            case y:
                code block
                break;
            default:
                code block
        }
        */
       //console.log(encodeURIComponent(currentpic));
       //console.log(currentpic);
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
                else
                {
                    window.alert(arr["status"]);
                }
                var return_data = hr.responseText;
                document.getElementById("status").innerHTML = arr_json["status"];
            } else  {
                //console.log("error: " + this.responseText);
            }
            //bind responsetext event to photo. Fred is a G
        }.bind(hr, photo);
    
        // Send the data to PHP now... and wait for response to update the status div
        hr.send(vars); // Actually execute the request
        //console.log(vars);
        document.getElementById("status").innerHTML = "processing...";
    }
    
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
        count = 0;
    }
    );    
    //TAKE PICTURE
    document.getElementById("capture").addEventListener("click", function(){
        //Create new DOM images in camera roll
        var photo_container = document.createElement('div'),
        currentpic = "",
        photo_id = Date.now(),  
        _1 = document.getElementById("filter_1").checked,
        _2 = document.getElementById("filter_2").checked,
        _3 = document.getElementById("filter_3").checked,
        _4 = document.getElementById("filter_4").checked,
        _5 = document.getElementById("filter_5").checked,
        _6 = document.getElementById("filter_6").checked,
        _7 = document.getElementById("filter_7").checked;

        photo_container.setAttribute("class", "camera_roll_pic");
        context.drawImage(video, 0, 0, 400, 300); //Image from webcam
        photo = document.createElement('img');
     if (isHidden(up_pic)){
            //video
            currentpic = canvas.toDataURL();
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
        //Set upa a reader that converts media to base64
        var reader =  new FileReader();

        reader.addEventListener("load", function(){
            up_pic.src = reader.result;
        }), false;
        if (this.files[0]){
            reader.readAsDataURL(this.files[0]);
        }
    });

    document.getElementById("filter_1").addEventListener('change', function(){
        var filter_1 = document.getElementById("filter_1").checked;
        if (filter_1) {
            addFilter("filter_overlay", "img", "filter_1_pic", "../filters/101.png");
        } else {
            removeElement( "filter_1_pic");
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
