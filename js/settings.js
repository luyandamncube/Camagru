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

window.addEventListener("DOMContentLoaded",function() {
    var upload_pic = document.getElementById('upload_1'),
        upload_in = document.getElementById('upload_some');

        upload_in.addEventListener("change",function(){
        upload_pic.setAttribute("src", window.URL.createObjectURL(this.files[0])); 
    });

});