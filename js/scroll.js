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
function delete_photo(pic_num,success ){

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
    vars = "pic_num="+pic_num, 
    url = "../src/delete_photo.php" ; 
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(vars);
    return xhr;
}
function get_comments(pic_num,success ){

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
    vars = "pic_num="+pic_num, 
    url = "../src/get_comments.php" ; 
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
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
function comment_pic(pic_id,comment,success ){

    var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'),
    vars = "pic_num="+pic_id+"&comment="+comment, 
    url = "../src/comment_photos.php" ; 
    xhr.open("POST", url);
    xhr.onreadystatechange = function() {
        if (xhr.readyState>3 && xhr.status==200) success(xhr.responseText);
    };
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send(vars);
    return xhr;
}
function add_click_events(){
    var comments =  document.querySelectorAll("i[name='comment']"),
    likes = document.querySelectorAll("i[name='like']"),
    post_comment = document.querySelectorAll("b[name='post_comment']"),
    delete_pic = document.querySelectorAll("i[name='delete']");
    for (var i = 0; i < likes.length; i++){
        likes[i].parentNode.onclick  = null;            
        likes[i].parentNode.addEventListener("click", function(){
        like_pic(this.childNodes[0].id,  function(data){ home_pics.innerHTML = home_pics.innerHTML+data; });
        this.childNodes[0].setAttribute("style", "font-size:20px; color:pink;");
        });
    }
    for (var i = 0; i < comments.length; i++){
        comments[i].parentNode.onclick  = null;
        comments[i].parentNode.addEventListener("click", function(){
            var disp_style = this.parentNode.querySelector("textarea").style.display,
                    output = this.parentNode.querySelector("textarea"),
                    output_id = this.parentNode.querySelectorAll("i[name='like']")[0].id;
            if (disp_style == "none"){
                this.parentNode.querySelector("textarea").style.display = "block";
                get_comments(output_id,function(data){ output.innerHTML = output.innerHTML+data;});
            }
            else{
                this.parentNode.querySelector("textarea").style.display = "none";
                output.innerHTML = "";
            }
        });
    }
    for (var i = 0; i < post_comment.length; i++){
        post_comment[i].parentNode.onclick  = null;            
        post_comment[i].parentNode.addEventListener("click", function(){
            var pic_send = this.parentNode.querySelectorAll("a")[1].childNodes[0].id,
            comment_send = this.parentNode.querySelector("input").value;
        if (comment_send){
            comment_pic(pic_send,comment_send,function(data){ home_pics.innerHTML = home_pics.innerHTML+data; });
       }
        });
    }
    for (var i = 0; i < delete_pic.length; i++){
        delete_pic[i].parentNode.onclick  = null;       
        delete_pic[i].parentNode.addEventListener("click", function(){
            var del = this.parentNode;
            delete_photo(del.querySelectorAll("a")[1].childNodes[0].id, function(data){ del.innerHTML = del.innerHTML+data; });
            this.parentNode.innerHTML = "";
        });
    }
}
window.addEventListener("DOMContentLoaded",function() {

    var page_no = 0,
        home_pics = document.getElementById("home_pics");
    if (page_no == 0){
        getAjax("../src/display_photos.php", function(data){
            home_pics.innerHTML = home_pics.innerHTML+data; 
            add_click_events();
        }, page_no++);

    }
    //INFINITE SCROLL PAGINATION
    window.onscroll = function() {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            getAjax("../src/display_photos.php", function(data){
                home_pics.innerHTML = home_pics.innerHTML+data;
                add_click_events();
            }, page_no++);
        }
    }

});


