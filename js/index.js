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
function add_click_events(){
    var comments =  document.querySelectorAll("i[name='comment']"),
    likes = document.querySelectorAll("i[name='like']"),
    post_comment = document.querySelectorAll("b[name='post_comment']"),
    delete_pic = document.querySelectorAll("i[name='delete']");
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
}
window.addEventListener("DOMContentLoaded",function() {

    var page_no = 0,
        home_pics = document.getElementById("home_pics");
    if (page_no == 0){
        getAjax("src/display_all.php", function(data){
            home_pics.innerHTML = home_pics.innerHTML+data; 
            add_click_events();
        }, page_no++);

    }
    //INFINITE SCROLL PAGINATION
    window.onscroll = function() {
        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            getAjax("src/display_all.php", function(data){
                home_pics.innerHTML = home_pics.innerHTML+data;
                add_click_events();
            }, page_no++);
        }
    }

});


