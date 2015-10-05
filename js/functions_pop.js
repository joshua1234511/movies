function search2(id){
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
function stateChanged1() {
if(httpxml.readyState==4){
document.getElementById("id1").innerHTML=httpxml.responseText;
document.getElementById("msg").style.display='none';
}
}
var url="http://movies.sj/Search/pop_search.php";
url=url+"?id="+id;
url=url+"&sid="+Math.random();
httpxml.onreadystatechange=stateChanged1;
httpxml.open("GET",url,true);
httpxml.send(null);
document.getElementById("msg").innerHTML="Please Wait ...";
document.getElementById("msg").style.display='inline';
}
$(document).ready(function(){
$('.sort').select(function(){   
})
});
