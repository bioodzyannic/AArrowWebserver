<?php include 'inc/header.php'; ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 no-pad-row">
			<!--Menu-->
			<div class="menu-container">			
				<?php include 'inc/main-menu.php'; ?>
			</div>
			<!--End of Menu-->
			<div class="row main">
				<div class="col-md-3 main-content pattern-bg-dark">
					<div class="search-options">
						<h1>Some God view title</h1><br>
						<div class="btn-row">
							<input type="date" class="aa-btn aa-input" name="date" value="<?php echo date('Y-m-d'); ?>">
							<button class="aa-btn blue">Search Job</button>
						</div>
					</div>
					<?php 
						foreach ($states as $key => $value) {?>
						<a class="single" href="/city-shifts.php?state=<?php echo strtolower(str_replace(' ', '-', $value)); ?>">
							<h4><?php echo $value; ?></h4>
							<div class="specs">
								<div class="spec">
									<label># Spinners:</label><span class="value">10</span>
								</div>
								<div class="spec">
									<label>Total Scheduled Hours:</label><span class="value">120</span>
								</div>
								<div class="spec event-spec">
									<div class="event">
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
						</a>
					<?php }?>
				</div>
				<div id="map"></div>
			</div>			
		</div>
	</div>
</div>
<script type="text/javascript" src="js/map.js"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcfMA8gM8H9EFwRjon01dT63iN-7uI1a4&callback=initMap">
</script>

<?php include 'footer.php'; ?>