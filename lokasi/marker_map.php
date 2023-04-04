<?php
include("koneksi.php");
?>
<div id="dvMap" style="width: 100%; height: 100%"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYuzmVE58DHR88dJkWlJwaBltM8MNBRO0&libraries=drawing" async defer></script>
<script type="text/javascript">
var markers = [
<?php
$sql = mysqli_query($db, "SELECT * FROM lokasi");
while(($data =  mysqli_fetch_assoc($sql))) {
?>
{
		 "lat": '<?php echo $data['latitude']; ?>',
		 "long": '<?php echo $data['longitude']; ?>',
		 "keterangan": '<?php echo $data['keterangan']; ?>'
},
<?php
}
?>
];
</script>
<script type="text/javascript">
	window.onload = function () {	
		var mapOptions = {
			center: new google.maps.LatLng(-6.23191,106.979),
					zoom: 10,
					mapTypeId: google.maps.MapTypeId.ROADMAP
			}; 
			var infoWindow = new google.maps.InfoWindow();
			var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
			var drawingManager = new google.maps.drawing.DrawingManager({
				drawingControl: true,
				drawingControlOptions: {
						position: google.maps.ControlPosition.TOP_CENTER,
						drawingModes: [google.maps.drawing.OverlayType.MARKER]
				}
			});
			drawingManager.setMap(map);
		google.maps.event.addListener(drawingManager, 'markercomplete', function(marker){
			var lat = marker.getPosition().lat(); 
			var lng = marker.getPosition().lng();
			if (confirm('Anda ingin menyimpan marker ini?')){
				window.location.href = "simpan_marker.php?lat="+lat+"&lng="+lng;
			}
		});	
			for (i = 0; i < markers.length; i++) {
				var data = markers[i];
				var latnya = data.lat;
				var longnya = data.long;
				var myLatlng = new google.maps.LatLng(latnya, longnya);
					var marker = new google.maps.Marker({
							position: myLatlng,
							map: map,
							title: data.keterangan
					});
					(function (marker, data) {
							google.maps.event.addListener(marker, "click", function (e) {
									infoWindow.setContent('<b>Keterangan</b> :' + data.keterangan + '<br>');
									infoWindow.open(map, marker);
							});
					})(marker, data);
				}
		}
</script>		