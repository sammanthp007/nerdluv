<?php
$DISABLE_ALL_EXTRA = FALSE;
$EXTRA_FEATURE_PHOTOS     = isset($_REQUEST["extra"]) || (!$DISABLE_ALL_EXTRA && !isset($_REQUEST["nophotos"]));
$EXTRA_FEATURE_GAY        = isset($_REQUEST["extra"]) || (!$DISABLE_ALL_EXTRA && !isset($_REQUEST["republican"]));
$EXTRA_FEATURE_VALIDATION = isset($_REQUEST["extra"]) || (!$DISABLE_ALL_EXTRA && !isset($_REQUEST["novalid"]));;
$INPUT_FILENAME = $EXTRA_FEATURE_GAY ? "singles2.txt" : "singles.txt";

function validate($name, $gender, $age, $type, $os, $min_age, $max_age, $seek_gender) {
	return $name
			&& preg_match("/^[MF]$/", $gender)
			&& is_numeric($age) && 0 <= $age && $age <= 99
			&& preg_match("/^[IE][NS][TF][JP]$/", $type)
			&& preg_match("/^(Windows|Mac OS X|Linux)$/", $os)
			&& is_numeric($min_age) && 0 <= $min_age && $min_age <= 99
			&& is_numeric($max_age) && 0 <= $max_age && $max_age <= 99
			&& $min_age <= $max_age
			&& preg_match("/^[MF]{0,2}$/", $seek_gender);
}

function error_exit($message = "") {
	include("top.html");
	?>

	<h1>Error! Invalid data.</h1>
	
	<p>
		We're sorry.  You submitted invalid user information.
		<?= $message ?>
		Please go back and try again.
	</p>
	
	<?php

	include("bottom.html");
	exit(1);
}
?>
