<?php
$datei = fopen("countlog.txt","r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;
$datei = fopen("countlog.txt","w");
fwrite($datei, $count);
fclose($datei);
?>
<footer class="clear">
<p>&copy; 2010 - <?php echo date("Y"); ?> Movies. Designed by <a href="#">Joshua Fernandes</a>&nbsp&nbspVistis <?php echo $count ?></p>
</footer>