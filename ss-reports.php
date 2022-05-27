<?php 
$page = strtolower(str_replace('-', ' ', $_GET['state']));
include '../inc/header.php';

$json2 = file_get_contents('employeeShifts.json');

?>


<div class="container-fluid the-numbers">
	<div class="row">
		<div class="col-md-12 no-pad-row">
			<!--Menu-->
			<div class="menu-container">			
				<?php include '../inc/main-menu.php'; include '../inc/city-menu.php'; ?>
			</div>
			<!--End of Menu-->
			<div class="row main">
				<div class="col-md-2 main-content pattern-bg-dark">
					<div class="search-options">
						<!-- MOBILE EXPAND TRIGGER -->
							<div class="expand-trigger" onclick="colExpand(this,'.main-content')"><img src="../images/drop.svg" alt=""></div>
						<!-- MOBILE EXPAND TRIGGER -->
						<h1>My #s</h1>
						<?php include 'admin-shift-filter-ss.php'; ?>
					</div>
				</div>
				<div class="container-fluid dotted-bg admin-report">
                    <div id="aa-metrics">
						<div class="inline-info options" onclick="this.setAttribute('data-open', this.getAttribute('data-open') === '1' ? '0' : '1');">
							<div class="inline-info event-filter" id="global-regions"></div>
						</div>
						<div id="general-info" class="inline-info">
							<div class="inline-info" id="global-info"></div>
						</div>
						<div class="inline-info options" onclick="this.setAttribute('data-open', this.getAttribute('data-open') === '1' ? '0' : '1');">
							<div class="inline-info event-filter" id="global-date-range"></div>
							<div class="inline-info event-filter" id="global-chart-type"></div>
							<div class="inline-info event-filter" id="global-metric"></div>
							<div class="inline-info event-filter" id="global-extra"></div>
						</div>
						<br>
						<div class="mobile-assist">
							<div class="chart-container">
								<canvas id="myChart"></canvas>
							</div>
						</div>
                    </div>

                </div>
			</div>			
		</div>
	</div>
</div>




<script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"></script>
<script type="text/javascript" src="../js/aametrics.js"></script>
<script>
    let queryResults2 = JSON.parse(<?php echo $json2; ?>).map((shift,i) => {
            shift.startTime = shift["start_time"];
            shift.endTime = shift["end_time"];
            shift.clockInTime = shift["clock_in_time"];
            shift.clockOutTime = shift["clock_out_time"];
            return shift;
        });

        queryResults2 = JSON.stringify(queryResults2);

	let dash = new AAMetrics(queryResults2,true);
	dash.graph();
</script>


<?php include '../inc/footer.php'; ?>
