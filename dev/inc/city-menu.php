<div class="city-menu">
	<div>
		<div>
		<a href="/"><img src="../images/back.svg" alt="" class="back" width="30" height="30"></a>
		<h1><?php echo strtolower(str_replace('-', ' ', $_GET['state'])); ?></h1>	
		</div>
		<ul class="menu-options">
			<li class="<?php if($_SERVER['PHP_SELF']=="/city-shifts.php"){echo "current-page";} ?>"><a href="/city-shifts.php?state=<?php echo $_GET['state']; ?>">Shifts</a></li>
			<li class="<?php if($_SERVER['PHP_SELF']=="/city-hr.php"){echo "current-page";} ?>"><a href="/city-hr.php?state=<?php echo $_GET['state']; ?>">HR</a></li>
			<li class="<?php if($_SERVER['PHP_SELF']=="/students-list/"){echo "current-page";} ?>"><a href="#">Sales</a></li>
			<li class="<?php if($_SERVER['PHP_SELF']=="/students-list/"){echo "current-page";} ?>"><a href="#">Reports</a></li>
		</ul>
	</div>
		<ul class="state-metrics">
			<li>
				<label>Total Shifts</label>
				<span>10</span>
			</li>
			<li>
				<label>Scheduled Hours</label>
				<span>20</span>
			</li>
			<li>
				<label>Hours Filled</label>
				<span>00:00:00</span>
			</li>
			<li>
				<label>Fill Rate</label>
				<span>0%</span>
			</li>
		</ul>
</div>
