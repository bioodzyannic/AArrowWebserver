<?php 
class SpinnerCard{
	public $params= array("_id","date","startTime","endTime","status","clockInTime","clockOutTime","hasStarted","hasEnded","isSigned","breakStartTime","breakEndTime","breakTimes","employeePhone","employeeName","images","locationPhone","location");

	public $comments = 'no comments yet';

	public function __construct($kwargs=array()){
		// var_dump($kwargs);
		foreach ($kwargs as $key => $value) {
			if(in_array($key, $this->params)){
				$this->{$key} = $value;
			}
		}
	}
	public function getStatus(){
		return '
			<div>								
				<img src="../images/shiftjohnny.png" alt="" style="margin: 0 auto; display: block;">
				<span>'. explode('. ',$this->status)[1] .'</span>
			</div>
			';
	}

	public function getLocation(){
		echo $this->location;
	}

	public function getImages(){
		$output ='';
		foreach ($this->images as $key => $img) {
			$output.='<img class="spinner-pic" src="'. $img->path .'">';
		}
		return $output;
	}

	public function carousel(){
		return '
		<div class="aa-carousel">

				<div class="pics-container">
					'. $this->getImages() .'
				</div>
				<div class="controllers">
					<div class="l" onclick="carousel(this,-1);event.stopImmediatePropagation();"><img src="../images/drop.svg" alt=""></div>
					<div class="r" onclick="carousel(this,1);event.stopImmediatePropagation();"><img src="../images/drop.svg" alt=""></div>
				</div>
			</div>';
	}
	public function render(){
		echo 
		'<div class="spinformation">
			'. $this->carousel() .'
	        <div class="marker-spinner-info">
		        <div class="spec">
					<div>
						<span class="value employee-name"><b>'. $this->employeeName .'</b></span>
					</div>
					<div>
						<span class="value">'. $this->getStatus() .'</span>
					</div>
				</div>
				<div class="spec">
						<label>Employee Phone:</label><span class="value"><b>'. $this->employeePhone .'</b></span>
				</div>
				<div class="spec">
						<label>Location Phone:</label><span class="value"><b>'. $this->locationPhone .'</b></span>
				</div>
				
				<div class="spec">
					<div>
						<label>Schd Start:</label><span class="value"><b>'. date('h:i a', strtotime($this->startTime)) .'</b></span>
					</div>
					<div>
						<label>Schd End:</label><span class="value"><b>'. date('h:i a', strtotime($this->endTime)) .'</b></span>
					</div>
				</div>
				<div class="spec">
					<div>
						<label>T-In:</label><span class="value"><b>'. date('h:i a', strtotime($this->clockInTime)) .'</b></span>
					</div>
					<div>
						<label>T-Out:</label><span class="value"><b>'. date('h:i a', strtotime($this->clockOutTime)) .'</b></span>
					</div>
				</div>
				<div class="spec">
					<div>
						<label>Break Start:</label><span class="value"><b>'. date('h:i a', strtotime($this->breakStartTime)) .'</b></span>
					</div>
					<div>
						<label>Break End:</label><span class="value"><b>'. date('h:i a', strtotime($this->breakEndTime)) .'</b></span>
					</div>
				</div>
				<div class="spec">
					<label>Break Times:</label><span class="value"><b>'. $this->breakTimes .'</b></span>
				</div>
				<div  class="spec full-spec">
					<label>Manager Notes:</label>
					<span class="value">'. $this->comments .'</span>
				</div>

	        </div>
		</div>
	';										
	}

	public function quickCard(){
		echo '
		<div class="single location" >
			<div class="">
				<div class="event">
					<img src="../images/shiftjohnny.png" alt="">
				</div>									
			</div>
			<a class="specs" href="/">
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
				
			</a>
			'. $this->carousel() .'
		</div>';
	}
}

