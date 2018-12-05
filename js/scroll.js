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

function comment_pic(comment,success ){

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
    vars = "comment="+comment, 
    url = "../src/comment_photos.php" ; 
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(vars);
    return xhr;
}

window.addEventListener("DOMContentLoaded",function() {

    /*
    function addDomContent(data)
    {}
    */
    var onscroll = document.getElementById("onscroll"),
        page_no = 0,
        home_pics = document.getElementById("home_pics");
    if (page_no == 0){
        getAjax("../src/display_photos.php", function(data){
            home_pics.innerHTML = home_pics.innerHTML+data; 
            //Get entire picture group
            var comments =  document.querySelectorAll("i[name='comment']"),
                likes = document.querySelectorAll("i[name='like']"),
                textarea = "";
            //console.log(comments);
            for (var i = 0; i < comments.length; i++){
                comments[i].parentNode.onclick  = null;
                likes[i].parentNode.onclick  = null;
                comments[i].parentNode.addEventListener("click", function(){
         
                });
                likes[i].parentNode.addEventListener("click", function(){
                    // var text =  this.parentNode.querySelector("textarea");
                    // text.style = "block";
                    console.log(this.childNodes);
                    like_pic(this.childNodes[0].id,  function(data){ home_pics.innerHTML = home_pics.innerHTML+data; });
                    this.childNodes[0].setAttribute("style", "font-size:20px; color:pink;");
                });
            }
        }, page_no++);

    }
    //INFINITE SCROLL PAGINATION
    window.onscroll = function() {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
           // alert('At the bottom!');
            getAjax("../src/display_photos.php", function(data){
                
                home_pics.innerHTML = home_pics.innerHTML+data;
                var comments =  document.querySelectorAll("i[name='comment']"),
                    likes = document.querySelectorAll("i[name='like']"),
                    textarea = document.querySelectorAll("textarea[name='comments']");
                console.log(comments);
                for (var i = 0; i < comments.length; i++)
                {
                    comments[i].parentNode.onclick  = null;
                    likes[i].parentNode.onclick  = null;
                    comments[i].parentNode.addEventListener("click", function(){
             
                    });
                    likes[i].parentNode.addEventListener("click", function(){
                        // var text =  this.parentNode.querySelector("textarea");
                        // text.style = "block";
                        console.log(this.childNodes[0].id);
                        like_pic(this.childNodes[0].id,  function(data){ home_pics.innerHTML = home_pics.innerHTML+data; });
                        this.childNodes[0].setAttribute("style", "font-size:20px; color:pink;");
                    });
                }
            
            }, page_no++);
  
        }
    }

});


