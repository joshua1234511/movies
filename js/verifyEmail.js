function verifyEmail(str)
{
var httpxml;
try
{
httpxml=new XMLHttpRequest();
}
catch (e)
{
try
{
httpxml=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
httpxml=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
alert("Your browser does not support AJAX!");
return false;
}
}
}
function stateChanged() 
{
if(httpxml.readyState==4)
{
var goodColor = "#66cc66";
var badColor = "#ff6666";
if(httpxml.responseText === 'Email Valid'){
document.getElementById("email").style.backgroundColor = goodColor;
document.getElementById("email_label").style.color = goodColor;
}
else{
document.getElementById("email").style.backgroundColor = badColor;
document.getElementById("email_label").style.color = badColor;
}

document.getElementById("email_label").innerHTML=httpxml.responseText;
document.getElementById("msg").style.display='none';
}
}
var url="http://movies.sj/Verify/email.php";
url=url+"?txt="+str;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='inline';
}