<?php
require "../Config/config.php";
$id=$_GET['id'];
$sql="select * from movies where id =  $id";
foreach ($dbo->query($sql) as $row) {
	?>
	<p>Name: <?php echo $row['name'] ?></p>
  <p> Genre: <?php echo $row['genre'] ?></p>
   <p>Rating: <?php echo $row['rating'] ?></p>
   <p>Year: <?php echo $row['year'] ?></p>
 

 <div  style="height:60%; width:50%;
padding: 4px 8px;
position: absolute;
top:50%;
left:60%;
opacity:4;
z-index: 21;">

<a href="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>">More....</a>


</div>




	<?php } 
