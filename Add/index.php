<?php
include ("../Config/config.php");
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
  header('Location: '.$login);
}
include ("../Header/header.php"); ?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {
  document.getElementById('latbox').value=latLng.lat();
  document.getElementById('lngbox').value=latLng.lng();
}

function updateMarkerAddress(str) {
  document.getElementById('address').value = str;
}
var ln=15.2855;
var lt=73.9867;
function initialize() {
  var latLng = new google.maps.LatLng(ln, lt);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 11,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });
  
  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);
  
  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
  
  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>


<section id="content" class="column-left">
<article id="content_article"><center>
<form action="<?php echo $site ?>Edit/" method="post" enctype="multipart/form-data">
<table class="table-responsive">
<tr>
<td>Name</td>
<td><input type="text" id="name"  name="name" required value="" maxlength="15"/></td>
</tr>
<tr>
<td>Genre</td>
<td><select id="genre" name="genre" >
<option value="Action" >Action</option>
<option value="Comedy" >Comedy</option>
</select></td>
</tr>
<tr>
<td>Rating:</td>
<td>1<input id="rating" name="rating" type="radio" value="1" checked/>&nbsp;
2<input id="rating" name="rating" type="radio" value="2" />&nbsp;
3<input id="rating" name="rating" type="radio" value="3" />&nbsp;
4<input id="rating" name="rating" type="radio" value="4" />&nbsp;
5<input id="rating" name="rating" type="radio" value="5"/></td>
</tr>
<tr>
<td>Year</td>
<td><input id="year"  name="year" type="date" required value="" /></td>
</tr>

<tr><td>Location</td><td> <select id="country" name="country[]" multiple>
<?php $sql = "SELECT id, name FROM location";
$result = mysql_query($sql);
if (mysql_num_rows($result) !== 0){
while ($row = mysql_fetch_assoc($result)) {
?>  
<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
<?php
}
}
?>
</select></td></tr>

<tr>
<td>Poster</td>
<td><input type="file" required name="image" id="image"  accept="image/jpeg" /></td>
</tr>
<tr><td><img src="captcha.php" alt="CAPTCHA Image" id="captcha" /></td><td>
<input type="text" id="captcha_code" name="captcha_code" value="" size="" maxlength="5"  />
</td>
</tr>
<tr><td>
<a href="javascript:void(0);" onclick="generate_captcha();" title="Refresh Captcha Image">Reload Image</a>
</td><td><input type="submit" value="Submit" class="btn" onClick="return validate_captcha()" /></td></tr>
</form>
<tr><td><br/></td></tr>
<form action="<?php echo $site ?>Edit/csv.php" method="post" enctype="multipart/form-data">
<tr><td>Csv Upload</td><td><input type="file" required name="filename" id="filename"  accept=".csv" /></td>
</tr>
<tr><td></td><td><input type="submit" value="Submit" class="btn" /></td></tr>
</form>
</table>
</center>
<div style="height:40%;width:30%;
position: absolute;
left: 68%;
top:20%;
z-index: 20;" id="mapCanvas">
</div>
<div  style="
position: absolute;
left: 68%;
top:60%;
z-index: 20;">
<span id="markerStatus"></span><br/>
<form method="post" action="location.php">
    Address:<input size="20" type="text" id="address" name="address" ><br/>
    Latitude: <input size="20" type="text" id="latbox" name="latbox" ><br/>
    Longitude: <input size="20" type="text" id="lngbox" name="lngbox" ><br/>
<input type="submit" value="Add Location">
    </form>
</div>

</article>
</section>
<script type="text/javascript">
function generate_captcha()
{
var random_text = "";
var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
for( var i=0; i < 5; i++ ) {
random_text += possible.charAt(Math.floor(Math.random() * possible.length));
}
document.getElementById("captcha").src = 'captcha.php?random_code='+random_text;
document.getElementById("captcha_code").focus();
}
function validate_captcha()
{
if(document.getElementById("captcha_code").value == '') {
alert("Please enter the Captcha code"); 
document.getElementById("captcha_code").focus();
return false;
}
return true;
}
</script>
<?php include ("../Footer/footer.php");

