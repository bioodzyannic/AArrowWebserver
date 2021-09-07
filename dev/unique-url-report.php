<?php include 'inc/header.php'; ?>

<img class="star-decor" src="images/star.svg">
<img class="star-decor" src="images/star.svg" style="right:-5%;animation-delay: 5s;width: 20vw;left:unset;">
<div class="container-fluid dotted-bg">
	<div class="row" style="height: 100%;">
		<div class="col-md-3 report-left-col">
			<div class="title">
				<img src="../images/logo.png" class="logo">
				<h1>SHIFT REPORT</h1>
				<div class="shift-info">					
					<p><b>Total Hours:</b> 120</p>
					<p><b>Total Charges:</b> 120</p>
					<p><b>Start Date:</b> 09/02/2021</p>
					<p><b>End Date:</b> 09/25/2021</p>
				</div>
			</div>				
		</div>
		<div class="col-md-8 report">
			<!--Client's Name-->
			<div class="locations-container">				
			<h2>Client 01</h2>
				<!--<img src="../images/logo.png" class="logo">-->
				<div class="locations">
				<?php 
				$count = 1;
				while($count<5){ ?>
				<div class="location">
					<h3>Location <?php echo $count; ?></h3>
					<!--Spinner 01-->
					<div class="spinner">
						<div class="spinner-spec">							
							<div class="spec-title">Date</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Start</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">End</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Name of Spinner</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Total Hours</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">location Name</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Charges</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Feedback</div>
							<div class="">
								<form action="" method="POST" class="feedback">
										<textarea></textarea><br>
										<button type="submit" class="aa-btn blue">Send Feedback</button>
								</form>
							</div>
						</div>
					</div>
					<!--Spinner 02-->
					<div class="spinner">
						<div class="spinner-spec">							
							<div class="spec-title">Date</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Start</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">End</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Name of Spinner</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Total Hours</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">location Name</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Charges</div>
							<div class="">01</div>
						</div>
						<div class="spinner-spec">							
							<div class="spec-title">Feedback</div>
							<div class="">
								<form action="" method="POST" class="feedback">
										<textarea></textarea><br>
										<button type="submit" class="aa-btn blue">Send Feedback</button>
								</form>
							</div>
						</div>
					</div>

					<!--Gallery-->
					<br>
					<h3>See them in action!</h3>
					<div class="location-gallery">
						<?php 
						$imageCount = 0;
						while($imageCount<10){
						 ?>
						 <img src="https://aarrowsignspinners.com/wp-content/uploads/2021/05/Jimmel-Big-Tex-Martin-Spinning-Signs-in-Houston.jpg">
						<?php 
						$imageCount+=1;
						}
						 ?>
					</div>
				</div>
				<?php $count+=1;} ?>
				</div>			
			</div>		
		</div>
		<div class="col-md-1 report-right-col"></div>
	</div>
</div>


<?php include 'inc/footer.php'; ?>
