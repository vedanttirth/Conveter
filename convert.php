<?php 

//import the converter class
require('image_converter.php');

$imageType = '';
$download = false;

//handle get method, when page redirects
if($_GET){	
	$imageType = urldecode($_GET['imageType']);
	$imageName = urldecode($_GET['imageName']);
}else{
	header('Location:index.php');
}

//handle post method when the form submitted
if($_POST){
	
	$convert_type = $_POST['convert_type'];
	
	//create object of image converter class
	$obj = new Image_converter();
	$target_dir = 'uploads';
	//convert image to the specified type
	$image = $obj->convert_image($convert_type, $target_dir, $imageName);
	
	//if converted activate download link 
	if($image){
		$download = true;
	}
}


//convert types
$types = array(
	'png' => 'PNG',
	'jpg' => 'JPG',
	'gif' => 'GIF',
);
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
	<title>Online Image Converter | PNG to JPG</title>
	<meta charset="utf-8" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<meta name="description" content="">
	<meta name="Keywords" content="" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body style="background-image: url(assets/images/bg3.jpg);">

	<?php 

	include 'Header.php';

	?><br><br><br>

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner">

				
				<!-- Banner -->
				<section id="banner">
					<div class="content"><br><br>
						<?php if(!$download) {?>
							<center><h2 style="font-family:serif; color:black;">Here is Your Selected Image</h2></center>
							
							<form method="post" action="">
								
								<tr><Br>	
									
									<center>
										
										<h3 style="font-family:serif; color:black">File Uploaded, Select below option to convert!</h3>
									</center>
									
									<img src="uploads/<?=$imageName; ?>"
									/>
									<center>
									Convert To: 
									<select name="convert_type">
										<?php foreach($types as $key=>$type) {?>
											<?php if($key != $imageType){?>
												<option value="<?=$key;?>"><?=$type;?></option>
											<?php } ?>
										<?php } ?>
									</select>
									<br /><br />
									
									<td align="center"><input type="submit" value="convert" /></td>
									</center>
									
								<?php } ?>
								<?php if($download) {?>
									<center><h2 style="font-family: serif; color: black;">Here is Your Converted Image</h2></center>
									<Center>
										Image Converted to <?php echo ucwords($convert_type); ?>
										<img src="<?=$target_dir.'/'.$image;?>"  /></Center>
										
										<center><h3 style="font-family:serif; color:black">Clicl Here To Download Image</h3></center><br><br>
										<a class="button icon solid fa-download" href="download.php?filepath=<?php echo $target_dir.'/'.$image; ?>" /><button style="background-color: black;"><h6 style="font-family:serif; color:black;">Download Converted Image</h6></button></a>
										<br><br><br>
										<a href="index.php"><button style="background-color:black; color: black;"><h6 style="font-family:serif; color:black;">Convert Another</h6></button></a>
									<?php } ?>
								</div>
							</section>

							

						</div>
					</div>

					<!-- Sidebar -->
					

					<!-- Scripts -->
					<script src="assets/js/jquery.min.js"></script>
					<script src="assets/js/browser.min.js"></script>
					<script src="assets/js/breakpoints.min.js"></script>
					<script src="assets/js/util.js"></script>
					<script src="assets/js/main.js"></script>

				</body>
				</html>