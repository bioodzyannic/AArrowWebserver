<?php include '../inc/header.php'; ?>
<?php include 'shift-filter.php'; ?>
	

<img class="star-decor" src="images/star.svg">
<img class="star-decor" src="images/star.svg" style="right:-5%;animation-delay: 5s;width: 20vw;left:unset;">
<div class="container-fluid dotted-bg">
	<div class="row">
		<div class="col-md-1 report-left-col">
			<div class="title">
				
			</div>				
		</div>
		<div class="col-md-10 report">
			<!--Client's Name-->
			<div class="locations-container">	
				<h1>Client Name</h1>
				<div class="inline-info">					
					<p><b>Total Hours:</b> 120</p>
					<p><b>Total Charges:</b> 120</p>
					<p><b>Start Date:</b> 09/02/2021</p>
					<p><b>End Date:</b> 09/25/2021</p>
				</div>
				<!-- Market -->
				<div class="market">
					<h2>Market name</h2>
					<div class="locations">
					<?php 
					$count = 1;
					while($count<5){ ?>
					<div class="box-collapse" data-open="0" onclick="this.setAttribute('data-open', this.getAttribute('data-open') === '1' ? '0' : '1');">
					<div class="inline-info">
						<h3>Address <?php echo $count; ?></h3>
						<p><b>Total Hours:</b> <span>120hrs</span></p>
						<p><b>Total Charges:</b> <span>$1200</span></p>					
						<p><b># Shifts:</b> <span>1</span></p>					
					</div>
						<!--Address 01-->
					<div class="spinners-container info-collapse" onclick="event.stopImmediatePropagation();">
						<div class="spinner">
							<div class="spinner-spec">							
								<div class="spec-title">Date</div>
								<div class="">07/15/2021</div>
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
								<div class="spec-title">Charges</div>
								<div class="">01</div>
							</div>
							<div class="spinner-spec">							
								<div class="spec-title">See them in action</div>
								<div class="">
									<img class="spinner-pic" src="https://aarrowsignspinners.com/wp-content/uploads/2021/05/Jimmel-Big-Tex-Martin-Spinning-Signs-in-Houston.jpg">
									<a href="#">Image01.jpg</a>
									<a href="#">Image01.jpg</a>
									<a href="#">Image01.jpg</a>
								</div>
							</div>
							<div class="spinner-spec">							
								<div class="spec-title">Feedback</div>
								<div class="">
									<form action="" method="POST" class="feedback">
									<input type="hidden" name="stars">
									<div class="star-rating">
										<?php 
											for($i=1;$i<=5;$i++){?>
												<svg version="1.1" id="Layer_1" class="star" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
												 viewBox="0 0 76.1 72.4" style="enable-background:new 0 0 76.1 72.4;" xml:space="preserve" onclick="rate(this);" data-rate="<?php echo $i; ?>">

											<path class="st0" d="M37.2,61l-19.8,9.7c-1.4,0.7-3-0.5-2.8-2l3.1-21.8c0.1-0.6-0.1-1.2-0.5-1.6L1.9,29.5c-1.1-1.1-0.5-3,1.1-3.3
												l21.7-3.8c0.6-0.1,1.1-0.5,1.4-1L36.3,2c0.7-1.4,2.7-1.4,3.4,0L50,21.5c0.3,0.5,0.8,0.9,1.4,1l21.7,3.8c1.5,0.3,2.1,2.1,1.1,3.3
												L58.8,45.3c-0.4,0.4-0.6,1-0.5,1.6l3.1,21.8c0.2,1.5-1.4,2.7-2.8,2L38.9,61C38.4,60.7,37.7,60.7,37.2,61z"/>
											</svg>
										<?php }	?>						
									</div>
											
											<button type="submit" class="aa-btn blue">View Shift</button>
									</form>
								</div>
							</div>
						</div>
						
					</div>
					<!--Extra Sections-->
					<div>
					</div>
					
					<div>
					</div>

						<!--Gallery
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
						-->
					</div>
					<?php $count+=1;} ?>
					</div>			
				</div>			
			</div>		
		</div>
		<div class="col-md-1 report-right-col"></div>
	</div>
</div>


