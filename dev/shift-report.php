<?php include 'inc/header.php'; ?>

<div class="main-container pattern-bg mobile">
	<div class="info-container">
		<!-- Client's name & Date -->
		<div class="shift-header">
			<h1>INC - Corporate Team Management</h1>
			<h3>10/08/2021</h3>
		</div>
		<!-- TIMER WHEEL IS COMPLETELY REFERENTIONAL. REPLACE -->
		<div class="wheel-container">
			<?php echo radialProgress(40); ?>
			<div class="timer-wheel">
				<div>
					<medium>Completed Time</medium>
					<p>04:40:00</p>
				</div>
				<hr>
				<div>
					<medium>Shift Duration</medium>
					<p>00:00:00</p>
				</div>
				
			</div>
		</div>

		<div class="grid-2 shift-specs">
			<!-- Shift specs -->
			<div class="spec">
				<div class="title green">Shift Start</div>
				<div class="data">9:30am</div>
			</div>
			<!-- Shift specs -->
			<div class="spec">
				<div class="title red">Shift End</div>
				<div class="data">9:30am</div>
			</div>
			<!-- Shift specs -->
			<div class="spec">
				<div class="title dark-grey">Clocked in</div>
				<div class="data">9:30am</div>
			</div>
			<!-- Shift specs -->
			<div class="spec">
				<div class="title dark-grey">Clocked out</div>
				<div class="data">9:30am</div>
			</div>
		</div>

		<!-- Buttons -->
		<div class="btn-row">
			<button type="button" class="aa-btn blue">
				<img class="icon" src="images/plus.svg"><span>Photos</span>
			</button>
			<button type="button" class="aa-btn blue">
				<img class="icon" src="images/plus.svg"><span>Notes</span>
			</button>
		</div>

		<button type="button" class="aa-btn red caps">
			<span>Clock Out</span><img class="icon" src="images/warning.svg">
		</button>
	</div>
	<!-- POP-UPS -->
	<?php include 'shift-pop-01.php'; ?>
</div>
<?php include 'inc/footer.php'; ?>
