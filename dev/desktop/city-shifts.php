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
					<?php filter(array('status')); ?>
					<?php sortByData(array('Sch Start','Spinner','Location')); ?>

					
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



<script>
	const data = `
	    <div class='aa-marker-info'>
	        <h4>Location Name</h4>
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
						<label>Employee:</label><span class="value"><b>John Miller</b></span>
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
						<label>Shift Start:</label><span class="value"><b>7:30 AM</b></span>
				</div>
				<div class="spec">
						<label>Shift End:</label><span class="value"><b>11:30 AM</b></span>
				</div>
				<div class="spec">
						<label>Employee Phone:</label><span class="value"><b>(678) 887-8309</b></span>
				</div>
				<div class="spec">
						<label>Location Phone:</label><span class="value"><b>(678) 887-8309</b></span>
				</div>
	        </div>	       
	    </div>`;
</script>
<script type="text/javascript" src="../js/map.js"></script>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcfMA8gM8H9EFwRjon01dT63iN-7uI1a4&callback=initMap">
</script>

<?php include '../inc/footer.php'; ?>
