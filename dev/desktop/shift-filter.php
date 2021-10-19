<!--
-Change form's method as you see fit.
-
-->
<div class="search-bar stripeBG">
	<div>
		<img src="../images/logo.svg" class="logo">	
		<h2>SHIFT REPORT</h2>
	</div>
	<form action="#" class="" method="GET">
		<div style="width:100%;">	
			<label>Client name:</label><br>
			<select name="client_name" id="">
				<option value="">Client01</option>
				<option value="">Client01</option>
				<option value="">Client01</option>
				<option value="">Client01</option>
				<option value="">Client01</option>
			</select>
		</div>
		<div id="campaing-selector">
			<label for="">Campaigns:</label>
			<input type="checkbox" onclick="disable(this)" checked>
			<input type="hidden" name="campaigns" class="multi-values">
			<div class="multi-option-drop" onclick="multiDrop(this,1);event.stopPropagation();">
			<input type="text" class="s-filter" id="s-filter" placeholder="Search" oninput="searchFilter(event.target.value,'campaing-selector');">
				<div class="blocker hide" onclick="multiDrop(this,0);event.stopPropagation();"></div>
				<div class="multi-option-container hide">

				<?php $count = 1;
					while($count<5){ ?>
					<div class="option">
						<input type="checkbox" value="<?php echo $count; ?>" onclick="multi(this,'campaing-selector')"><label>AArrow Campaign #<?php echo $count; ?> Lorem ipsum dolor sit amet consectetur adipisicing elit.</label>
					</div>

				<?php  $count+=1;} ?>
				</div>			
			</div>
			<small>Selected: <span class="counter">0</span></small>
		</div>

		<div id="region-selector">
			<label for="">Regions:</label>
			<input type="checkbox" onclick="disable(this)" checked>
			<input type="hidden" name="regions" class="multi-values">
			<div class="multi-option-drop" onclick="multiDrop(this,1);event.stopPropagation();">
			<input type="text" class="s-filter" id="s-filter" placeholder="Search" oninput="searchFilter(event.target.value,'region-selector');">
				<div class="blocker hide" onclick="multiDrop(this,0);event.stopPropagation();"></div>
				<div class="multi-option-container hide">

				<?php $count = 1;
					while($count<5){ ?>
					<div class="option">
						<input type="checkbox" value="<?php echo $count; ?>" onclick="multi(this,'region-selector')"><label>AArrow Campaign #<?php echo $count; ?></label>
					</div>

				<?php  $count+=1;} ?>
				</div>			
			</div>
			<small>Selected: <span class="counter">0</span></small>
		</div>
		
		<div>
			<label for="">Start Date:</label><br>
			<input name="start_date" type="date">
		</div>
		<div>
			<label for="">End Date:</label><br>
			<input name="end_date" type="date">
		</div>
		<div>
			<input name="shift_links" type="checkbox">
			<label for="">Include Shift links</label>
		</div>
		<button type="submit" class="aa-btn blue">Search</button>
	</form>
</div>

		
<script>

	function disable(elem){
		var input = elem.parentElement.querySelector('.s-filter');
		var realInput = elem.parentElement.querySelector('.multi-values');
		if(input.disabled){input.disabled=false;realInput.disabled=false;}else{input.disabled=true;realInput.disabled=true;}
	}
	function multiDrop(elem,dir){
		var parent = elem.parentElement;
		var sFilter=parent.querySelector('.s-filter');
		var dropContainer=parent.querySelector('.multi-option-container');
		var blocker=parent.querySelector('.blocker');
		if(sFilter.disabled){return;}
		if(dir==1){
			dropContainer.classList.remove('hide');
			blocker.classList.remove('hide');
		}else{
			dropContainer.classList.add('hide');
			blocker.classList.add('hide');
		}
	}
	function multi(elem,super_container){
		var parent = document.getElementById(super_container);
		var input = parent.querySelector('.multi-values');
		var dropContainer=parent.querySelector('.multi-option-container');
		var options = dropContainer.querySelectorAll('input[type="checkbox"]');
		var newValues = Array.from(options).filter((box)=>{
			return box.checked;
		});
		var finalValues = newValues.map((val)=>{return val.value;})
		//console.log(finalValues);
		input.value = finalValues.join(',');
		parent.querySelector('.counter').innerText=finalValues.length.toString();
	}
	function searchFilter(search,super_container){
		var parent = document.getElementById(super_container);
		var options = parent.querySelectorAll('.option');
		for(var i=0;i<options.length;i++){
				options[i].classList.remove('hide');
			if(!options[i].innerText.toLowerCase().includes(search.toString().toLowerCase())){
				options[i].classList.add('hide');
			}
		}
	}	
</script>