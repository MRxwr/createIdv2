<?php
$mainColors = ["#EE7752", "#E73C7E", "#23A6D5", "#23D5AB"];
$accountColors = [$account["fourColors1"],$account["fourColors2"],$account["fourColors3"],$account["fourColors4"]];
for( $i = 0; $i < sizeof($accountColors); $i++ ){
	$accountColors[$i] = ( isset($accountColors[$i]) && !empty($accountColors[$i]) ) ? $accountColors[$i] : $mainColors[$i] ;
}
if( $account["bgType"] == 1 ){
	$backgroundCSS = "background: linear-gradient(-45deg,{$accountColors[0]},{$accountColors[1]},{$accountColors[2]},{$accountColors[3]});background-size: 400% 400%;";
}elseif($account["bgType"] == 2 ){
	$backgroundCSS = "background-color:{$account["singleColor"]};background-size: 400% 400%;";
}else{
	$backgroundCSS = "background-size: {$account["bgSize"]};background-repeat: {$account["bgRepeat"]};background-image: url(logos/{$account["bgImage"]});";
}

// Compute an inverted text color based on the background when possible.
function invert_hex_color($hex){
	$hex = trim($hex);
	if(strlen($hex) == 0) return '#ffffff';
	if ($hex[0] === '#') $hex = substr($hex,1);
	if (!preg_match('/^[0-9a-fA-F]{3}$|^[0-9a-fA-F]{6}$/', $hex)) return '#ffffff';
	if (strlen($hex) === 3) {
		$hex = $hex[0].$hex[0].$hex[1].$hex[1].$hex[2].$hex[2];
	}
	$r = 255 - hexdec(substr($hex,0,2));
	$g = 255 - hexdec(substr($hex,2,2));
	$b = 255 - hexdec(substr($hex,4,2));
	return sprintf('#%02X%02X%02X', $r, $g, $b);
}

$baseColor = null;
if( $account["bgType"] == 1 ){
	// For gradient choose the first gradient color as the base for inversion
	$baseColor = $accountColors[0];
}elseif($account["bgType"] == 2 ){
	$baseColor = $account["singleColor"];
}

if( !empty($baseColor) && preg_match('/^#?[0-9a-fA-F]{3}([0-9a-fA-F]{3})?$/', $baseColor) ){
	$textColor = invert_hex_color($baseColor);
}else{
	// Fallback: for background images or unknown colors use white
	$textColor = '#ffffff';
}
?>
<style>
body {
	min-height: 90vh;
	display: flex;
	flex-direction: column;
	color: <?php echo $textColor; ?>;
	-webkit-animation: Gradient 15s ease infinite;
	-moz-animation: Gradient 15s ease infinite;
	animation: Gradient 15s ease infinite;
	<?php echo $backgroundCSS; ?>
}

.page-content {
	flex: 1 0 auto;
}

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

h1,h6 {
	font-family: 'Open Sans';
	font-weight: 300;
	text-align: center;
	position: absolute;
	top: 45%;
	right: 0;
	left: 0;
}

.shake {
	animation: shake-animation 4.72s ease infinite;
	transform-origin: 50% 50%;
}
.element {
    margin: 0 auto;
    width: 150px;
    height: 150px;
    background: red;
}
@keyframes shake-animation {
        0% { transform:translate(0,0) }
    1.78571% { transform:translate(5px,0) }
    3.57143% { transform:translate(0,0) }
    5.35714% { transform:translate(5px,0) }
    7.14286% { transform:translate(0,0) }
    8.92857% { transform:translate(5px,0) }
    10.71429% { transform:translate(0,0) }
    100% { transform:translate(0,0) }
}

.backdrop {
    -moz-box-shadow: 0px 6px 5px #3b3b3b; 
    -webkit-box-shadow: 0px 6px 5px #3b3b3b; 
    box-shadow: 0px 0px 10px #3b3b3b; 
    -moz-border-radius:20px; 
    -webkit-border-radius:20px; 
    border-radius:20px;
	border: 1px solid white;
}

.linktree {
    width: 120px;
    height: 120px;
    background-image: url("<?php echo "logos/{$account["logo"]}" ?>");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: 50% 50%;
} 
  </style>