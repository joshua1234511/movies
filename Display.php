<?php
$x=0;
include ("Config/config.php");
include ("Header/header.php"); ?>
<section id="content" class="column-left">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
<script async defer src="//assets.pinterest.com/js/pinit.js"></script>
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>


<article id="content_article" >
<?php 
$id=$_GET['id'];
$sql="select * from movies where id =  $id";
foreach ($dbo->query($sql) as $row) {
	?>
	<img id="displayImg" src="thumnails/<?php echo $row['id'] ?>.jpg" 
style="height:20%; width:20%;
position: absolute;
left: 27%;
top:20%;
z-index: 20;">
<div style="
position: absolute;
left: 27%;
top:43%;
z-index: 20;">
	<p>Name: <?php echo $row['name'] ?></p>
  <p> Genre: <?php echo $row['genre'] ?></p>
   <p>Rating: <?php echo $row['rating'] ?></p>
   <p>Year: <?php echo $row['year'] ?></p>
</div>

<?php
$loc=$row['address'];
$sql1="select * from location where id =  $loc LIMIT 1";
foreach ($dbo->query($sql1) as $row1) {
$ln = $row1['ln'];
$lt = $row1['lt'];
}

?>
<script>



function initMap() {

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10
  });


if(!!navigator.geolocation) {
        
          navigator.geolocation.getCurrentPosition(function(position) {
          
            var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            

var marker1 = new google.maps.Marker({
    position: {lat: position.coords.latitude, lng: position.coords.longitude},
    map: map,
    icon: 'blue_dot_mylocation.gif'
  });
            map.setCenter(geolocate);
            
          });

        } 

  var layer = new google.maps.visualization.DynamicMapsEngineLayer({
    layerId: '06673056454046135537-08896501997766553811',
    map: map,
    suppressInfoWindows: true,
    clickable: true
  });

  layer.addListener('mouseover', function(event) {
    var style = layer.getFeatureStyle(event.featureId);
    style.fillColor = colors[event.featureId - 1];
    style.fillOpacity = '0.8';
  });

  layer.addListener('mouseout', function(event) {
    layer.getFeatureStyle(event.featureId).resetAll();
  });

<?php
$sql1="select location_id  from movies_running where movies_id =  $id ";
foreach ($dbo->query($sql1) as $row1) {
$loc1=$row1['location_id'];
$sql11="select * from location where id =  $loc1 LIMIT 1";
foreach ($dbo->query($sql11) as $row11) {
 ?>
 var marker = new google.maps.Marker({
    position: {lat: <?php echo  $row11['lt'] ?>, lng: <?php echo $row11['ln'] ?>},
    map: map
  });
<?php }
}
?>


 
  
}
var colors = ['red', 'blue', 'yellow', 'green'];

    </script>
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&libraries=visualization&callback=initMap">
    </script>



<div style="height:50%;width:40%;
position: absolute;
left: 50%;
top:20%;
z-index: 20;" id="map">
</div>
<div style="
position: absolute;
left: 50%;
top:73%;
z-index: 20;">
	<a class="twitter-share-button" target="_blank" style="color: red;"
  href="https://twitter.com/intent/tweet" >
Tweet</a>
<script type="IN/Share" data-url="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>" data-counter="right"></script>
<a data-pin-do="buttonBookmark" null href="//www.pinterest.com/pin/create/button/" >
<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>

<div class="g-plusone" data-size="tall" data-annotation="inline" data-width="300" data-href="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>"></div>

<div class="fb-like" data-href="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>

</div>
 <?php } ?>

</article>
</section>
<?php include ("Footer/footer.php");

