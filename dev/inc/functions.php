<?php 

function radialProgress($per){
	$radius=105;
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

$states = array(
	'AL'=>'ALABAMA',
	'AK'=>'ALASKA',
	'AZ'=>'ARIZONA',
	'AR'=>'ARKANSAS',
	'CA'=>'CALIFORNIA',
	'CO'=>'COLORADO',
	'CT'=>'CONNECTICUT',
	'DE'=>'DELAWARE',
	'FL'=>'FLORIDA',
	'GA'=>'GEORGIA',
	'GU'=>'GUAM GU',
	'HI'=>'HAWAII',
	'ID'=>'IDAHO',
	'IL'=>'ILLINOIS',
	'IN'=>'INDIANA',
	'IA'=>'IOWA',
	'KS'=>'KANSAS',
	'KY'=>'KENTUCKY',
	'LA'=>'LOUISIANA',
	'ME'=>'MAINE',
	'MH'=>'MARSHALL ISLANDS',
	'MD'=>'MARYLAND',
	'MA'=>'MASSACHUSETTS',
	'MI'=>'MICHIGAN',
	'MN'=>'MINNESOTA',
	'MS'=>'MISSISSIPPI',
	'MO'=>'MISSOURI',
	'MT'=>'MONTANA',
	'NE'=>'NEBRASKA',
	'NV'=>'NEVADA',
	'NH'=>'NEW HAMPSHIRE',
	'NJ'=>'NEW JERSEY',
	'NM'=>'NEW MEXICO',
	'NY'=>'NEW YORK',
	'NC'=>'NORTH CAROLINA',
	'ND'=>'NORTH DAKOTA',
	'OH'=>'OHIO',
	'OK'=>'OKLAHOMA',
	'OR'=>'OREGON',
	'PW'=>'PALAU',
	'PA'=>'PENNSYLVANIA',
	'PR'=>'PUERTO RICO',
	'RI'=>'RHODE ISLAND',
	'SC'=>'SOUTH CAROLINA',
	'SD'=>'SOUTH DAKOTA',
	'TN'=>'TENNESSEE',
	'TX'=>'TEXAS',
	'UT'=>'UTAH',
	'VT'=>'VERMONT',
	'VI'=>'VIRGIN ISLANDS',
	'VA'=>'VIRGINIA',
	'WA'=>'WASHINGTON',
	'WV'=>'WEST VIRGINIA',
	'WI'=>'WISCONSIN',
	'WY'=>'WYOMING',
);

 ?>