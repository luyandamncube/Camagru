//getAjax(pph script , where to output ajaxinfo)
function getAjax(url, success, page_no) {
    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
        vars = "pages="+page_no;  
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    /*
        DOESNT WORK, use method from camera.js
        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    */
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(vars);
    return xhr;
}

function like_pic(pic_num,success ){

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
    vars = "pic_num="+pic_num, 
    url = "../src/like_photos.php" ; 
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(vars);
    return xhr;
}


window.addEventListener("DOMContentLoaded",function() {
    var onscroll = document.getElementById("onscroll"),
        page_no = 0,
        home_pics = document.getElementById("home_pics");
    if (page_no == 0){
        getAjax("../src/display_photos.php", function(data){ home_pics.innerHTML = home_pics.innerHTML+data; }, page_no++);
    }
    //INFINITE SCROLL PAGINATION
    window.onscroll = function() {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
           // alert('At the bottom!');
            getAjax("../src/display_photos.php", function(data){ home_pics.innerHTML = home_pics.innerHTML+data; }, page_no++);
        }
    }

    //Creates event listeners for children i.e. DOM objects
    document.getElementById("home_pics").addEventListener("click", function(e) {

        
        if(e.target && e.target.nodeName == "I" && e.target.getAttribute("name") === "like"){
            //like button event
            like_pic(e.target.id,  function(data){ home_pics.innerHTML = home_pics.innerHTML+data; });
            e.target.setAttribute("style", "font-size:30px; color:pink;");
        }else if (e.target && e.target.nodeName == "I" && e.target.getAttribute("name") === "like"){
            //comment button event
            
        }
       
        /*
        if(e.target && e.target.nodeName == "I"){
            //console.log(e.target.id);
            like_pic(e.target.id,  function(data){ home_pics.innerHTML = home_pics.innerHTML+data; });
            console.log(e.target.getAttribute("style"));
            e.target.setAttribute("style", "font-size:20px; color:pink;");
        }*/
    });
});
