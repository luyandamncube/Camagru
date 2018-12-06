window.addEventListener("DOMContentLoaded",function() {

    document.getElementById("forgot_pass").addEventListener('click', function(){
        var username = document.querySelector("textarea[name='loginname']");
        if(username.value.length < 3)
        {
      
            username.style.border = "1px solid red";
        }
        else
        {
            username.style.border ="0 ";
            var request = new XMLHttpRequest();
            FD = new FormData();
            FD.append("user", username.value);
            request.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200)
                {
                    console.log(this.responseText);
                    var resp = JSON.parse(this.responseText);
                    if (resp["status"] == "failure")
                        console.log(resp["message"]);
                    /*if (resp["status"] == "success")
                    {

                    }
                    else
                    {

                    }*/
                }
            }

            request.open("POST", "../class/forgot_gen.php", true);
            request.send(FD);
        }
    });
});