
<?php
	// requires php5
	
	$img = $_POST['photo'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$file = 'IMG.'. uniqid() . '.png';
	$success = file_put_contents($file, $data);
	print $success ? $file : 'Unable to save the file.';
?>