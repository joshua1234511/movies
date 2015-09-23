function checkPass()
{
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('cpassword');
    var message = document.getElementById('message');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  

function checkPass1()
{
    var pass1 = document.getElementById('password');
    var message = document.getElementById('message1');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
     var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{8,}$/;
    if(pass1.value.length >= 8)
    {
        if(pass1.value.match(re))   
        {  
        pass1.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Accepted";
        }
        else{
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "At least one number, one lowercase and one uppercase letter";
            }
    }
    else{
        pass1.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Mininum Length 8";
    }
}  