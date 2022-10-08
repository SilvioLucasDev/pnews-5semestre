<?php
	 require_once 'includes/header.php';
?>

<main style="height: 85vh">
	<div class="container h-100 pt-md-3 pb-5">
		<div class="row justify-content-center h-100">
			<div class="col">

				<!-- API do maps -->
				<div id="map" style="width:100%;height: 100%;"></div>
				<script>
					function myMap() {
						var mapCanvas = document.getElementById("map");
						var mapOptions = {
							center: new google.maps.LatLng(-23.667141962399672, -46.42199768678884),
							zoom: 13
						};
						var map = new google.maps.Map(mapCanvas, mapOptions);
					}
				</script>
				<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9IWlEU_CZQqtyGqSr-lvN25n43fW6f2g&callback=myMap"></script>

			</div>
		</div>
	</div>
</main>

<?php 
	include_once 'includes/footer.php';
?>