
<?php 
$page = "Shift View";
include '../inc/header.php'; 
?>

<div class="container-fluid shift-view">
	<div class="row">
		<div class="col-md-12 no-pad-row">
			<!--Menu-->
			<div class="menu-container">			
				<?php include '../inc/main-menu.php'; include '../inc/city-menu.php'; ?>
			</div>
			<!--End of Menu-->
			<!-- MAP CONTROLLERS -->
				<div class="map-controllers">
					<div id="local-time">
						<span id="time">04:32:00pm</span>
						<!-- <span id="time-zone">PST</span> -->
					</div>
					<input type="range">
					<!-- <div class="video-timer">
						<span id="current-time">00:00:00</span>
						<span id="remaining-time">00:15:00</span>
					</div> -->
					<div class="buttons">						
						<img class="flip" src="../images/play3.svg" onclick="select(this,true)">
						<img class="flip" src="../images/play2.svg" onclick="select(this,true)">
						<img class="flip" src="../images/play.svg" onclick="select(this,true)">
						<img src="../images/pause.svg" onclick="select(this,true)">
						<img src="../images/play.svg" onclick="select(this,true)">
						<img src="../images/play2.svg" onclick="select(this,true)">
						<img src="../images/play3.svg" onclick="select(this,true)">
					</div>
					<div class="event-filter">
						<div class="option text-event" onclick="select(this)">
							<span class="value">Path</span>
						</div>
						<div class="option text-event" onclick="select(this)">
							<span class="value">Path length short</span>
						</div>
						<div class="option text-event" onclick="select(this)">
							<span class="value">Traffic</span>
						</div>
						<div class="option text-event" onclick="select(this)">
							<span class="value">Go-To</span>
						</div>
						<div class="option text-event" onclick="select(this)">
							<span class="value">Heatmap</span>
						</div>
					</div>
				</div>
			<!-- END OF MAP CONTROLLERS -->
			<div class="row main">
				
				
				<div class="col-md-3 main-content pattern-bg-dark">
					<div class="">
						<!-- MOBILE EXPAND TRIGGER -->
						<div class="expand-trigger" onclick="colExpand(this,'.main-content')"><img src="../images/drop.svg" alt=""></div>
						<!-- MOBILE EXPAND TRIGGER -->
						<h1>Spinner Name</h1>
						<?php 
						$json = '
						{"_id":"449954","date":"2021-11-23","location":"Wehner Multifamily - Starburst","startTime":"11:00:00","endTime":"19:00:00","status":"5. CALL to CONFIRM","clockInTime":"13:00:00","clockOutTime":"18:30:00","hasStarted":false,"hasEnded":false,"isSigned":false,"gpsData":[],"breakStartTime":"14:30:00","breakEndTime":"15:20:00","breakTimes":"","locationPhone":"123-456-789","employeePhone":"(512) 564-0740","employeeName":"Missy Gonzalez","images":[{"path":"https://aarrowsignspinners.com/wp-content/uploads/2021/05/Jimmel-Big-Tex-Martin-Spinning-Signs-in-Houston.jpg"},{"path":"https://aarrowsignspinners.com/wp-content/uploads/2021/05/Sign-Spinner-in-Los-Angeles.jpg"},{"path":"https://aarrowsignspinners.com/wp-content/uploads/2021/05/Grand-Opening-Sign-Spinners-in-California.jpg"}],"latitude":30.3522149,"longitude":-97.6928411,"timezone":"America/Chicago"}
							';
							$query = json_decode($json);
							$card = new SpinnerCard($query);
							$card->render();
							
							?>
					</div>
				</div> 
				<div id="map"></div>
				
			</div>			
		</div>
	</div>
</div>
<script type="text/javascript" src="../js/map.js"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcfMA8gM8H9EFwRjon01dT63iN-7uI1a4&callback=initMap">
</script>

<?php include '../inc/footer.php'; ?>