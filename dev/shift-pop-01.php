<div class="pop-container">
	<div class="pop-info-container">
		<div class="exit">
			<img src="images/exit.svg">
		</div>
		<h3>You forgot to clock out</h3>
		<form></form>
		<!--Hours selector-->
		<div class="cell">
			<h4>Your worked times</h4>
			<h4>Client: INC Gbase & IT Dev</h4>
			<h4>Date: 09/01/2021</h4>
			<div class="grid-2">
				<div>
					<label>From:</label>
					<input type="time" name="from">
				</div>
				<div>
					<label>To:</label>
					<input type="time" name="from">
				</div>
			</div>
		</div>
		<!--Addbreaks-->
		<div class="cell">
			<h4>Your breaks</h4>
			<button type="button" class="aa-btn blue">
				<img class="icon" src="images/plus.svg"><span>Add Break</span>
			</button>
		</div>

		<!--Comments-->		
		<div class="cell">
			<h4>Your Comments</h4>
			<textarea name="" placeholder="Explanation / Comments"></textarea>
			<br><br>
			<h4>Signature</h4>
			<div class="signature-canvas"></div>
		</div>

		<!--Actions-->
		<div class="btn-row">
			<button type="button" class="aa-btn dark-grey caps">Clear pad</button>
			<button type="button" class="aa-btn caps green">Confirm Times</button>
		</div>
	</div>
</div>