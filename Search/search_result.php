<?php
require "../Config/config.php";
$in=$_GET['txt'];
$x = $_GET['x'];
$limit = $_GET['y'];
if(!ctype_alnum($limit)){
    $limit = 3;
    }
if(!ctype_alnum($in)){
//echo "<article>Enter Movie name/year/ID</article>";
//exit;
    $in="test1";
}
$offset = 0;
$offset1 = 0;
if (isset($_GET["page"]))
{
    $offset1 = $_GET['page']*1;
    $offset = $_GET['page']*$limit;
}
if(strlen($in)>0 and strlen($in) <15 ){
if($in==="test1"){
$sql="select * from movies ORDER BY id DESC LIMIT $limit OFFSET $offset";
}
else{
$sql="SELECT * FROM movies where name like '%$in%' OR year like '%$in%' OR id like '%$in%' ORDER BY id DESC LIMIT $limit OFFSET $offset"; 
}
$cookie_name = "page";
$cookie_value = $offset1;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
foreach ($dbo->query($sql) as $row) {
    if($x === '1')
{
?>

<div style="display:inline-block;">
<?php
}
?>
<a data-title="Name: <?php echo $row[name] ?>&#13;
Genre: <?php echo $row[genre] ?>&#13;
Rating: <?php echo $row[rating] ?>&#13;
Year: <?php echo $row[year] ?>"
data-html="true" href="<?php echo $display ?>?image=<?php echo $row["id"] ?><?php echo $row[poster] ?>" >
<img  src="<?php echo $site ?>thumnails/<?php echo $row["id"] ?><?php echo $row[poster] ?>"/></a>
<?php
if($x === '1')
{
 ?> 
 <br /><center>
<div  style="display:inline;"><form method="POST" action="<?php echo $site ?>Delete/"  style="display:inline-block;">
<input type="hidden" value="<?php echo $row["id"] ?>" name="id"/>
<input type="submit" value="Delete" onclick="return confirm('Are you sure?')" />
</form>
<form method="POST" action="<?php echo $site ?>Update/"  style="display:inline-block;">
<input type="hidden" value="<?php echo $row["id"] ?>" name="id"/>
<input type="submit" value="Update"  onclick="return confirm('Are you sure?')"/>
</form></div></div></center>
<?php
}
}
if($x !== '1')
{
if($in==="test1"){
$sql = "SELECT * FROM movies"; 
}
else
{
 $sql =" SELECT * FROM movies where name like '%$in%' OR year like '%$in%' OR id like '%$in%' "; 
}
$rs_result = mysql_query($sql); 
$total_records = mysql_num_rows($rs_result); 
$total_pages = ceil($total_records / $limit)*1; 
?>
<br/>
<?php
$r=$offset1 -1;
if($offset1!==0){
    ?>
<a href='#' onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,<?php echo $r ?>);">&lt;&lt;</a>
 <?php
}
?>
<a href='#'  <?php if($offset1===0){?> style="color:red;" <?php }else{
    ?> onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,0);"
    <?php
}
?>>First</a>
<?php
$i1=$offset1;
if($offset1===0){
    $i1=1;
}
if(($total_pages-1)<($offset1+3)){
    $n=$total_pages-1;
}
else{
    $n=$offset1+3;
}
for ($i=$i1; $i<$n; $i++) { 
    ?>
    <a href='#'  <?php if($offset1===$i){?> style="color:red;" <?php }else{
    ?> onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,<?php echo $i ?>);"
    <?php
}
?>><?php  echo $i+1 ?></a>
    <?php
}; 
?>
<a href='#'  <?php if($offset1==$total_pages-1){?> style="color:red;" <?php }else{
    ?> onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,<?php echo $total_pages-1 ?>);"
    <?php
}
?>>Last</a>

<?php
$r=$offset1 +1;
if($offset1<($total_pages-1)){
    ?>
<a href='#' onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,<?php echo $r ?>);">&gt;&gt;</a>
 <?php
}
?>
<?php
}
else
{
    if($in==="test1"){
$sql = "SELECT * FROM movies"; 

}
else
{
 $sql =" SELECT * FROM movies where name like '%$in%' OR year like '%$in%' OR id like '%$in%' "; 
}
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $limit)*1; 
?>
<br/>
<?php
$r=$offset1 -1;
if($offset1!==0){
    ?>
<a href='#' onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,<?php echo $r ?>);">&lt;&lt;</a>
 <?php
}
?>
<a href='#'  <?php if($offset1===0){?> style="color:red;" <?php }else{
    ?> onclick="ajaxFunction1('<?php echo $in ?>',1,<?php echo $limit ?>,0);"
    <?php
}
?>>First</a>

<?php
$i1=$offset1;
if($offset1===0){
    $i1=1;
}
if(($total_pages-1)<($offset1+3)){
    $n=$total_pages-1;
}
else{
    $n=$offset1+3;
}
for ($i=$i1; $i<$n; $i++) { 
    ?>
    <a href='#'  <?php if($offset1===$i){?> style="color:red;" <?php }else{
    ?> onclick="ajaxFunction1('<?php echo $in ?>',1,<?php echo $limit ?>,<?php echo $i ?>);"
    <?php
}
?>><?php  echo $i+1 ?></a>
    <?php
}; 
?>
<a href='#' <?php if($offset1==$total_pages-1){?> style="color:red;" <?php }else{
    ?> onclick="ajaxFunction1('<?php echo $in ?>',1,<?php echo $limit ?>,<?php echo $total_pages-1 ?>);" 
    <?php
}
?>>Last</a>
<?php
$r=$offset1 +1;
if($offset1<($total_pages-1)){
    ?>
<a href='#' onclick="ajaxFunction1('<?php echo $in ?>',0,<?php echo $limit ?>,<?php echo $r ?>);">&gt;&gt;</a>
 <?php
}
?>
<?php 
}
}
mysql_close($link);
?>