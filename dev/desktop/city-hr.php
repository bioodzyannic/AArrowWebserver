<?php include '../inc/header.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 no-pad-row">
			<!--Menu-->
			<div class="menu-container">			
				<?php include '../inc/main-menu.php'; include '../inc/city-menu.php'; ?>
			</div>
			<!--End of Menu-->
			<div class="row main">
				<div class="col-md-3 main-content pattern-bg-dark">
					<h1>Active Spinners</h1>
					
					<?php 
						echo filterByStatus(); 
						echo filterByDay();
						echo filterByData();
					?>

					<?php 
						$c = 5;
						$la = 0;
						while($la<$c) {?>
						<a class="single location" href="/">
							<div class="">
								<div class="event">
									<img src="../images/shiftjohnny.png" alt="">
								</div>									
							</div>
							<div class="specs">
								<h4>Name of the Spinner <img class="profile-pic" src="../images/profile.svg" alt=""></h4>
								<div class="spec">
									<label>Total hours:</label><span class="value"><b>10:00am</b></span>
								</div>
								<div class="spec">
									<label>Avg Audit:</label><span class="value"><b>10:00am</b></span>
								</div>
								<div class="spec">
									<label>Phone Number:</label><span class="value"><b>+353 123456789</b></span>
								</div>
								<div class="spec">
									<label>OTA rate:</label><span class="value"><b></b></span>
								</div>
							</div>
						</a>
					<?php $la++; }?>
				</div>
				<div id="map"></div>
				<div class="col-md-3 extra-info-col dotted-bg">
					<h2>Recruits</h2>
					<?php echo filterByStatus(); ?>
					
					<?php 
						$c = 5;
						$la = 0;
						while($la<$c) {?>
						<a class="single location" href="/">
							<div class="">
								<div class="event">
									<img src="../images/shiftjohnny.png" alt="">
								</div>									
							</div>
							<div class="specs">
								<h4>Name of the Spinner<img class="profile-pic" src="../images/profile.svg" alt=""></h4>
								<div class="spec">
									<label>Current Status:</label><span class="value"></span>
								</div>
								<div class="spec">
									<label>Phone Number:</label><span class="value"></span>
								</div>
								<div class="spec">
									<label>Last contacted:</label><span class="value"></span>
								</div>
							</div>
						</a>
					<?php $la++; }?>

				</div>
			</div>			
		</div>
	</div>
</div>
<script type="text/javascript" src="../js/map.js"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcfMA8gM8H9EFwRjon01dT63iN-7uI1a4&callback=initMap">
</script>

<?php include '../inc/footer.php'; ?>