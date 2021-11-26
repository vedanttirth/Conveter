<?php

//import the converter class
require('image_converter.php');

if($_FILES){
	$obj = new Image_converter();
	
	//call upload function and send the $_FILES, target folder and input name
	$upload = $obj->upload_image($_FILES, 'uploads', 'fileToUpload');
	if($upload){
		$imageName = urlencode($upload[0]);
		$imageType = urlencode($upload[1]);
		
		if($imageType == 'jpeg'){
			$imageType = 'jpg';
		}
		header('Location: convert.php?imageName='.$imageName.'&imageType='.$imageType);
	}
}	
?>


<style>
@import url('https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap');
</style>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Converter</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script>
	function checkEmpty(){
		var img = document.getElementById('fileToUpload').value;
		if(img == ''){
			alert('Please upload an image');
			return false;
		}
		return true;
	}
		</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>

  </head>

  <body style="background-image:url(images/bg4.jpg); background-repeat: no-repeat; background-size: cover; height: 100%;>
<?php 

  	include 'Header.php';

  	?><br><br><br><br><br>
<center>
	 <h2 style="color: black; font-family: 'Kaushan Script', cursive;">Convert Any image to JPG, PNG, GIF</h2><br>
		 <td align="center">
				<form action="" enctype="multipart/form-data" method="post" onsubmit="return checkEmpty()" />
					<label><h2 style="color: black; font-family: 'Kaushan Script', cursive;">Click here to Choose Image: </h2></label><br><br>
					<button>

						<input type="file" name="fileToUpload" id="fileToUpload" /></button><br><br>
					<!-- <a href="contact.php"><img src="images/logo10.2.png" style="width: 40%" class="center"></a> -->
					<input type="image" src="images/logo10.2.png" name="submit" value="Upload" width="30%" >
					<!-- <input type="submit" value="Upload" /><br><br> -->
					 	
				</form></td>
</body>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>