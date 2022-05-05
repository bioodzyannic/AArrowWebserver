<?php 
$page = strtolower(str_replace('-', ' ', $_GET['state']));
include '../inc/header.php';
$json = file_get_contents('shifts.json');
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
						<h1>The #s</h1>
						<?php include 'admin-shift-filter.php'; ?>
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
    let queryResult = '[{"date":"2022-03-28","location":"AA - Sick Leave","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569578","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":5},{"date":"2022-03-28","location":"Account Mangement","status":"6. On-Site Confirmation","startTime":"00:00:00","endTime":"00:00:00","clockInTime":"06:52:00","clockOutTime":"00:00:00","employeeName":"Michael McCullough","latitude":33.215738,"longitude":-116.1610838,"id":"566276","images":[{"shift_id":566276,"path":""}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":5},{"date":"2022-03-28","location":"ASS - Outgoing Sales","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"15:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Michael Kenny","latitude":33.215738,"longitude":-116.1610838,"id":"566265","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":13},{"date":"2022-03-28","location":"INC - HR & Training Development","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569580","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":1},{"date":"2022-03-29","location":"ASS - Outgoing Sales","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569579","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":11},{"date":"2022-03-29","location":"INC - Payroll","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"17:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Geoff Genereaux","latitude":33.215738,"longitude":-116.1610838,"id":"566261","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":2},{"date":"2022-03-29","location":"INC - Sales System Management","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"15:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Joseph Ambert","latitude":33.215738,"longitude":-116.1610838,"id":"566262","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":10},{"date":"2022-03-30","location":"FAM - Operations and QC","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"15:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Bryan Sanchez","latitude":33.215738,"longitude":-116.1610838,"id":"566259","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":3},{"date":"2022-03-30","location":"FAM - Operations and QC","status":"6. On-Site Confirmation","startTime":"07:00:00","endTime":"09:00:00","clockInTime":"06:58:00","clockOutTime":"00:00:00","employeeName":"Michael Kenny","latitude":33.215738,"longitude":-116.1610838,"id":"566264","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":16},{"date":"2022-03-30","location":"INC - Gbase & IT Development","status":"7. Shift Completed","startTime":"10:00:00","endTime":"11:00:00","clockInTime":"08:06:00","clockOutTime":"10:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"566277","images":[{"shift_id":566277,"path":"https://aarrow.app/development/secure/userUploads/shiftPhotos/7628-1648738969-.jpeg"}],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":16},{"date":"2022-03-30","location":"INC - Gbase & Workato Management","status":"6. On-Site Confirmation","startTime":"09:00:00","endTime":"17:00:00","clockInTime":"07:19:00","clockOutTime":"00:00:00","employeeName":"Geoff Genereaux","latitude":33.215738,"longitude":-116.1610838,"id":"566260","images":[{"shift_id":566260,"path":"https://drive.google.com/uc?id=1WgihimMbkCdx42cKTUFmOeFA4FfPsP_U"}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":12},{"date":"2022-03-30","location":"INC - Practice","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569581","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":11},{"date":"2022-03-31","location":"INC - Sick Leave","status":"FIX: Unmatched shift from Yannics App","startTime":"09:15:00","endTime":"11:30:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569582","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":2},{"date":"2022-03-31","location":"INC - Web Marketing","status":"6. On-Site Confirmation","startTime":"09:00:00","endTime":"17:00:00","clockInTime":"08:59:00","clockOutTime":"00:00:00","employeeName":"Max Durovic","latitude":33.215738,"longitude":-116.1610838,"id":"566263","images":[{"shift_id":566263,"path":"https://aarrow.app/development/secure/userUploads/shiftPhotos/7632-1648742347-.jpeg"}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":16},{"date":"2022-03-31","location":"Location Name","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":"36.0893162","longitude":"-95.9038706","id":"569583","images":[],"locationPhone":"Location Phone","employeePhone":"(1763) 015-2555","address":"Location Address","revenue":7},{"date":"2022-03-31","location":"Recruiting","status":"6. On-Site Confirmation","startTime":"00:00:00","endTime":"00:00:00","clockInTime":"07:56:00","clockOutTime":"00:00:00","employeeName":"John AArrow","latitude":33.215738,"longitude":-116.1610838,"id":"569565","images":[{"shift_id":569565,"path":"https://drive.google.com/uc?id=1YVGvdIUCEEndDYA2TO9r8P1R7W7-DREl"}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":4},{"date":"2022-04-04","location":"Recruiting","status":"6. On-Site Confirmation","startTime":"00:00:00","endTime":"00:00:00","clockInTime":"07:56:00","clockOutTime":"00:00:00","employeeName":"John AArrow","latitude":33.215738,"longitude":-116.1610838,"id":"569565","images":[{"shift_id":569565,"path":"https://drive.google.com/uc?id=1YVGvdIUCEEndDYA2TO9r8P1R7W7-DREl"}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":11}]';
    let queryResult2 = '[{"date":"2022-03-28","location":"AA - Sick Leave","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569578","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":5},{"date":"2022-03-28","location":"Account Mangement","status":"6. On-Site Confirmation","startTime":"00:00:00","endTime":"00:00:00","clockInTime":"06:52:00","clockOutTime":"00:00:00","employeeName":"Michael McCullough","latitude":33.215738,"longitude":-116.1610838,"id":"566276","images":[{"shift_id":566276,"path":""}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":5},{"date":"2022-03-28","location":"ASS - Outgoing Sales","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"15:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Michael Kenny","latitude":33.215738,"longitude":-116.1610838,"id":"566265","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":13},{"date":"2022-03-28","location":"INC - HR & Training Development","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569580","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":1},{"date":"2022-03-29","location":"ASS - Outgoing Sales","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569579","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":11},{"date":"2022-03-29","location":"INC - Payroll","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"17:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Geoff Genereaux","latitude":33.215738,"longitude":-116.1610838,"id":"566261","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":2},{"date":"2022-03-29","location":"INC - Sales System Management","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"15:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Joseph Ambert","latitude":33.215738,"longitude":-116.1610838,"id":"566262","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":10},{"date":"2022-03-30","location":"FAM - Operations and QC","status":"6. CALL to VERIFY","startTime":"09:00:00","endTime":"15:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Bryan Sanchez","latitude":33.215738,"longitude":-116.1610838,"id":"566259","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":3},{"date":"2022-03-30","location":"FAM - Operations and QC","status":"6. On-Site Confirmation","startTime":"07:00:00","endTime":"09:00:00","clockInTime":"06:58:00","clockOutTime":"00:00:00","employeeName":"Michael Kenny","latitude":33.215738,"longitude":-116.1610838,"id":"566264","images":[],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":16},{"date":"2022-03-30","location":"INC - Gbase & IT Development","status":"7. Shift Completed","startTime":"10:00:00","endTime":"11:00:00","clockInTime":"08:06:00","clockOutTime":"10:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"566277","images":[{"shift_id":566277,"path":"https://aarrow.app/development/secure/userUploads/shiftPhotos/7628-1648738969-.jpeg"}],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":16},{"date":"2022-03-30","location":"INC - Gbase & Workato Management","status":"6. On-Site Confirmation","startTime":"09:00:00","endTime":"17:00:00","clockInTime":"07:19:00","clockOutTime":"00:00:00","employeeName":"Geoff Genereaux","latitude":33.215738,"longitude":-116.1610838,"id":"566260","images":[{"shift_id":566260,"path":"https://drive.google.com/uc?id=1WgihimMbkCdx42cKTUFmOeFA4FfPsP_U"}],"locationPhone":"","employeePhone":"","address":", ,  ","revenue":12},{"date":"2022-03-30","location":"INC - Practice","status":"FIX: Unmatched shift from Yannics App","startTime":"12:00:00","endTime":"12:00:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569581","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":11},{"date":"2022-03-31","location":"INC - Sick Leave","status":"FIX: Unmatched shift from Yannics App","startTime":"09:15:00","endTime":"11:30:00","clockInTime":"00:00:00","clockOutTime":"00:00:00","employeeName":"Yannic Niessen","latitude":33.215738,"longitude":-116.1610838,"id":"569582","images":[],"locationPhone":"","employeePhone":"(1763) 015-2555","address":", ,  ","revenue":2}]';
	let queryResults3 = JSON.parse(<?php echo $json; ?>).map((shift,i) => {
            shift.startTime = shift["start_time"];
            shift.endTime = shift["end_time"];
            shift.clockInTime = shift["clock_in_time"];
            shift.clockOutTime = shift["clock_out_time"];
			// if(i%2==0){
			// 	shift["region"]='FL';
			// }

            return shift;

        });
	queryResults3 = JSON.stringify(queryResults3);

	let dash = new AAMetrics(queryResults3);
	dash.graph();
</script>


<?php include '../inc/footer.php'; ?>
