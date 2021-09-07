<?php 

function radialProgress($per){
	$radius=150;
	if($per){
		$percent = intval($per);		
	}else{
		$percent = 0;		
	}
	$circumference = $radius * 2 * pi();
	$offset =$circumference - $percent/100 * $circumference;
	$diameter = ($radius * 2) + 15;
	$transformOrigin = strval($radius +10).'px';
	$height = strval($diameter).'px';

	$radial = " <div class='progress-ring-container' style='height:$height;'>
				<svg
				   class='progress-ring'
				   width='$diameter'
				   height='$diameter'>
				  <circle
				    style='stroke:#". $color .";transform-origin: $transformOrigin 0px;stroke-dasharray:$circumference $circumference; stroke-dashoffset: $offset;'
				    class='progress-ring__circle'
				    
				    fill='transparent'
				    r='$radius'
				    cx='0'
				    cy='0'/>
				</svg>

				<svg
				   class='track'
				   width='$diameter'
				   height='$diameter'>
				  <circle
				    style='transform-origin: $transformOrigin 0px;''
				    class='progress-ring__circle'
				    fill='transparent'
				    r='$radius'
				    cx='0'
				    cy='0'/>
				</svg>
				</div>
";
	return $radial;
}

 ?>