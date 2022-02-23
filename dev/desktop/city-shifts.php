<?php 
$page = strtolower(str_replace('-', ' ', $_GET['state']));
include '../inc/header.php'; ?>
<?php 
$json = '
	{"_id":"449954","date":"2021-11-23","location":"Wehner Multifamily - Starburst","startTime":"11:00:00","endTime":"19:00:00","status":"5. CALL to CONFIRM","clockInTime":"13:00:00","clockOutTime":"18:30:00","hasStarted":false,"hasEnded":false,"isSigned":false,"gpsData":[],"breakStartTime":"14:30:00","breakEndTime":"15:20:00","breakTimes":"","locationPhone":"123-456-789","employeePhone":"(512) 564-0740","employeeName":"Missy Gonzalez","images":[{"path":"https://aarrowsignspinners.com/wp-content/uploads/2021/05/Jimmel-Big-Tex-Martin-Spinning-Signs-in-Houston.jpg"},{"path":"https://aarrowsignspinners.com/wp-content/uploads/2021/05/Sign-Spinner-in-Los-Angeles.jpg"},{"path":"https://aarrowsignspinners.com/wp-content/uploads/2021/05/Grand-Opening-Sign-Spinners-in-California.jpg"}],"latitude":30.3522149,"longitude":-97.6928411,"timezone":"America/Chicago"}
	';
$query = json_decode($json);
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 no-pad-row">
			<!--Menu-->
			<div class="menu-container">			
				<?php include '../inc/main-menu.php'; include '../inc/city-menu.php'; ?>
			</div>
			<!--End of Menu-->
			<div class="row main">
				<div class="col-md-4 main-content pattern-bg-dark">
					<div class="search-options">
						<!-- MOBILE EXPAND TRIGGER -->
							<div class="expand-trigger" onclick="colExpand(this,'.main-content')"><img src="../images/drop.svg" alt=""></div>
						<!-- MOBILE EXPAND TRIGGER -->
						<h1>SHIFTS</h1>
						<div class="filter-btn" onclick="filtersToggle('.collapse',this)"><img src="../images/funnel.png" alt=""></div>
						<div class="collapse-filters">
							<div class="collapse" data-open="0">
								<div class="btn-row">
									<input type="date" class="aa-btn aa-input" name="date" value="<?php echo date('Y-m-d'); ?>">
									<div class="date-nav">
										<button class="up"><img src="../images/drop.svg" alt=""></button>
										<button class="down"><img src="../images/drop.svg" alt=""></button>
									</div>
								</div>
								<?php filter(array('status')); ?>
								<?php sortByData(array('Sch Start','Spinner','Location')); ?>
							</div>
						</div>
					</div>

					
					<?php 
						$c = 5;
						$la = 0;
						while($la<$c) {
							$card = new SpinnerCard($query);
							$card->quickCard();
						?>
						
					<?php $la++; }?>
				</div>
				<div id="map"></div>
			</div>			
		</div>
	</div>
</div>

<?php 
	$card = new SpinnerCard($query);
 ?>

<script>
	const data = `<h4 class='card-title'><?php $card->getLocation();?></h4><?php $card->render(); ?>`;
</script>
<script type="text/javascript" src="../js/map.js"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcfMA8gM8H9EFwRjon01dT63iN-7uI1a4&callback=initMap">
</script>

<?php include '../inc/footer.php'; ?>
