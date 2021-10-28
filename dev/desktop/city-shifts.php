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
					<h1>SHIFTS</h1>
					<div class="search-options">
						<input type="text" placeholder="Search...">
						<label>Filter by status:</label>
						<div class="event-filter">
									<div class="event active-filter">
										<img src="../images/shiftjohnny.png" alt="">
										<span class="value">2</span>
									</div>

									<div class="event">
										<img src="../images/emergencyred.png" alt="">
										<span class="value">2</span>
									</div>

									<div class="event">
										<img src="../images/greenphone.png" alt="">
										<span class="value">2</span>
									</div>

									<div class="event">
										<img src="../images/yellowphone.png" alt="">
										<span class="value">2</span>
									</div>
								</div>
					</div>

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
								<h4>Name of the location goes here</h4>
								<div class="spec name">
									<span class="value"><b>Arnaldo Acosta Zampaglioni</b></span>
								</div>
								<div class="spec">
									<div>
										<label>Schd Times:</label><span class="value"><b>10:00am</b></span>
									</div>
									<div>
										<label>Schd Times:</label><span class="value"><b>10:00am</b></span>
									</div>
								</div>

								<div class="spec">
									<div>
										<label>T In:</label><span class="value"><b>10:00am</b></span>
									</div>
									<div>
										<label>T Out:</label><span class="value"><b>10:00am</b></span>
									</div>
								</div>
								
							</div>
						</a>
					<?php $la++; }?>
				</div>
				<div id="map"></div>
			</div>			
		</div>
	</div>
</div>


<?php include '../inc/footer.php'; ?>
