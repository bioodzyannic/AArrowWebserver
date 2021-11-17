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
					<h1>Location name</h1>
					<div class="spinformation">
						<div class="aa-carousel">

							<div class="pics-container">
								<img class="spinner-pic" src="https://aarrowsignspinners.com/wp-content/uploads/2021/05/Jimmel-Big-Tex-Martin-Spinning-Signs-in-Houston.jpg">
								<img class="spinner-pic" src="https://aarrowsignspinners.com/wp-content/uploads/2021/05/Sign-Spinner-in-Los-Angeles.jpg">
								<img class="spinner-pic" src="https://aarrowsignspinners.com/wp-content/uploads/2021/05/Grand-Opening-Sign-Spinners-in-California.jpg">
							</div>
							<div class="controlers">
								<div class="l" onclick='carousel(this,-1)'><img src="../images/drop.svg" alt=""></div>
								<div class="r" onclick='carousel(this,1)'><img src="../images/drop.svg" alt=""></div>
							</div>
						</div>

				        <div class="marker-spinner-info">
					        <div class="spec">
								<div>
									<span class="value employee-name"><b>John Miller</b></span>
								</div>
								<div>
									<label>Status:</label><span class="value">
										<div>
											<img src="../images/shiftjohnny.png" alt="" style="margin: 0 auto; display: block;">
											<span>Status Name</span>
										</div>
									</span>
								</div>
							</div>
							<div class="spec">
									<label>Employee Phone:</label><span class="value"><b>(678) 887-8309</b></span>
							</div>
							<div class="spec">
									<label>Location Phone:</label><span class="value"><b>(678) 887-8309</b></span>
							</div>
							
							<div class="spec">
								<div>
									<label>Schd Start:</label><span class="value"><b>7:30 AM</b></span>
								</div>
								<div>
									<label>Schd End:</label><span class="value"><b>11:30 AM</b></span>
								</div>
							</div>
							<div class="spec">
								<div>
									<label>T-In:</label><span class="value"><b>7:30 AM</b></span>
								</div>
								<div>
									<label>T-Out:</label><span class="value"><b>11:30 AM</b></span>
								</div>
							</div>
							<div class="spec">
								<div>
									<label>Break Start:</label><span class="value"><b>7:30 AM</b></span>
								</div>
								<div>
									<label>Break End:</label><span class="value"><b>11:30 AM</b></span>
								</div>
							</div>
							<div class="spec">
								<label>Break Times:</label><span class="value"><b>7:30 AM</b></span>
							</div>
							<div  class="spec full-spec">
								<label>Manager Notes:</label>
								<span class="value">
									Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt voluptatum animi praesentium officiis cumque saepe, quo exercitationem culpa? Quo soluta nemo delectus magni mollitia ratione dolores quis ex minima cupiditate.
								</span>
							</div>

				        </div>
					</div>
								
					
					
				</div>
				<div id="map"></div>
				<div class="map-controlers">
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
					<div class="video-timer">
						<span id="current-time">00:00:00</span>
						<span id="remaining-time">00:15:00</span>
					</div>
					<input type="range">
					<div class="buttons">						
						<img class="flip" src="../images/play3.svg" onclick="select(this,true)">
						<img class="flip" src="../images/play2.svg" onclick="select(this,true)">
						<img class="flip" src="../images/play.svg" onclick="select(this,true)">
						<img src="../images/pause.svg" onclick="select(this,true)">
						<img src="../images/play.svg" onclick="select(this,true)">
						<img src="../images/play2.svg" onclick="select(this,true)">
						<img src="../images/play3.svg" onclick="select(this,true)">
					</div>
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