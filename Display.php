<?php
$x=0;
include ("Config/config.php");
include ("Header/header.php"); ?>
<section id="content" class="column-left">
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() { FB.init({appId: '', status: true, cookie: true, xfbml: true}); };
(function() { var e = document.createElement('script'); e.async = true; e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js'; document.getElementById('fb-root').appendChild(e); }());
</script>
<script type="text/javascript">
(function() { var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true; po.src = 'https://apis.google.com/js/plusone.js?onload=onLoadCallback'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s); })();
</script>
<script type="text/javascript">
(function(d){ var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT'); p.type = 'text/javascript'; p.async = true; p.src = '//platform.twitter.com/widgets.js'; f.parentNode.insertBefore(p, f); }(document));
</script>
<script type="text/javascript">
(function(d){ var f = d.getElementsByTagName('SCRIPT')[0], p = d.createElement('SCRIPT'); p.type = 'text/javascript'; p.async = true; p.src = '//assets.pinterest.com/js/pinit.js'; f.parentNode.insertBefore(p, f); }(document));
</script>
<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
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
   Set Radius (Kms)<input type="number" onkeyup="initMap(this.value);" placeholder="15" onchange="initMap(this.value);" style="width:4em;">
</div>

<div style="height:50%;width:40%;
position: absolute;
left: 87%;
top:21%;
z-index: 21;">

<input type="range" name="grade" orient="vertical" step="50" value ="15" min="0" max="1000" onkeyup="initMap(this.value);" onchange="initMap(this.value);"
  style="width: 20px; height: 100px;
  -webkit-appearance: slider-vertical;
  writing-mode: bt-lr;">
</div>

<?php
$details = "Movie Name: ".$row['name']." Genre: ".$row['genre']." Rating: ".$row['rating']." Released Date: ".$row['year'];
$loc=$row['address'];
$sql1="select * from location where id =  $loc LIMIT 1";
foreach ($dbo->query($sql1) as $row1) {
$ln = $row1['ln'];
$lt = $row1['lt'];
}

?>
<script>


function initMap(x) {
  if(!x){
x=15;
  }
if(x<=15) { y=11;}
else if(x <=50){ y=10;}
else if(x <=100){ y=9;}
else if(x <=150){ y=8;}
else if(x <=200){ y=7;}
else if(x <=250){ y=6;}
else if(x <=500){ y=5;}
else { y=4;}
  var lati;
  var lon;
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: y
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

if(!!navigator.geolocation) {
        
          navigator.geolocation.getCurrentPosition(function(position) {
          
            
         dis=  distance(position.coords.latitude,  position.coords.longitude
, <?php echo  $row11['lt'] ?>, <?php echo $row11['ln'] ?>,'K');
            
           if(dis<x)
           {

             var marker = new google.maps.Marker({
    position: {lat: <?php echo  $row11['lt'] ?>, lng: <?php echo $row11['ln'] ?>},
    map: map
  });

           }
            
          });
        } 

function distance(lat1, lon1, lat2, lon2, unit) {
  var radlat1 = Math.PI * lat1/180
  var radlat2 = Math.PI * lat2/180
  var radlon1 = Math.PI * lon1/180
  var radlon2 = Math.PI * lon2/180
  var theta = lon1-lon2
  var radtheta = Math.PI * theta/180
  var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
  dist = Math.acos(dist)
  dist = dist * 180/Math.PI
  dist = dist * 60 * 1.1515
  if (unit=="K") { dist = dist * 1.609344 }
  if (unit=="N") { dist = dist * 0.8684 }
  return dist
}
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
<div style="display:inline;"  class="fb-like" data-href="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>" data-send="false" data-layout="box_count" data-show-faces="false"></div>
  <a rel="nofollow" href="http://twitter.com/share" data-url="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>" data-text="<?php echo $details ?>" data-count="vertical" class="twitter-share-button">Tweet</a>
  <div class="g-plus" data-action="share" data-annotation="vertical-bubble" data-height="60" data-href="https://plus.google.com/share?url=<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>"></div>
  <a class="pin" href="http://www.pinterest.com/pin/create/button/?url='<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>'&description=<?php echo $details ?>" data-pin-do="buttonPin" count-layout="vertical" data-pin-config="above">PinIt</a>
    <script type="IN/Share" data-url="<?php echo $displaySingle ?>?id=<?php echo $row['id'] ?>" data-counter="right"></script>
</div>
 <?php } ?>
</article>
</section>
<?php include ("Footer/footer.php");

