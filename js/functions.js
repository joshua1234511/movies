function search1(str,x,y,z){
var httpxml;
try{
httpxml=new XMLHttpRequest();
}
catch (e){
try{
httpxml=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e){
try{
httpxml=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e){
alert("Your browser does not support AJAX!");
return false;
}
}
}
function stateChanged() {
if(httpxml.readyState==4){
document.getElementById("content_article").innerHTML=httpxml.responseText;
document.getElementById("msg").style.display='none';
}
}
var url="http://movies.sj/Search/search_result.php";
url=url+"?txt="+str+"&x="+x+"&y="+y+"&page="+z;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='inline';
}
$(document).ready(function(){
$('.sort').select(function(){   
})
});



