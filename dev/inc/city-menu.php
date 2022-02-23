
<div class="city-menu">
	<div>
		<div>
		<a href="/"><img src="../images/back.svg" alt="" class="back" width="30" height="30"></a>
		<h1>
			<?php 
			if($page && $page=="home"){
				echo "Welcome $current_user";
			}else{
				echo $page; 
			}
			?>
		</h1>	
		</div>
		<ul class="menu-options" data-open="0">
			<li class="<?php if($_SERVER['PHP_SELF']=="desktop/city-shifts.php"){echo "current-page";} ?>"><a href="/desktop/city-shifts.php?state=<?php echo $_GET['state']; ?>">Shifts</a></li>
			<li class="<?php if($_SERVER['PHP_SELF']=="desktop/city-hr.php"){echo "current-page";} ?>"><a href="/desktop/city-hr.php?state=<?php echo $_GET['state']; ?>">HR</a></li>
			<li class="<?php if($_SERVER['PHP_SELF']=="desktop/students-list/"){echo "current-page";} ?>"><a href="#">Sales</a></li>
			<li class="<?php if($_SERVER['PHP_SELF']=="desktop/students-list/"){echo "current-page";} ?>"><a href="#">Reports</a></li>
		</ul>
	</div>
		<!-- MOBILE METRICS EXPAND TRIGGER -->
		<div class="mobile-icons">
			<div class="stats-icon icon-btn" onclick="filtersToggle('.state-metrics',this)"><img src="../images/stats.svg" alt=""></div>
			<div class="menu-icon icon-btn" onclick="filtersToggle('.city-menu .menu-options',this)"><img src="../images/menu.svg" alt=""></div>
		</div>
		<!-- MOBILE METRICS EXPAND TRIGGER -->
		<ul class="state-metrics" data-open="0">
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
