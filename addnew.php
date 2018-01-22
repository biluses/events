<?php
session_start();
	error_reporting( ~E_NOTICE ); // avoid notice
	
	require_once 'dbconfig.php';
	
	if(isset($_POST['btnsave']))
	{
		$title = $_POST['title'];// user name -> title *
		$region = $_POST['region'];// location *
		$location = $_POST['location'];// location *
		$startdate = $_POST['startdate'];//start date * 
		$enddate = $_POST['enddate'];//end date *
		$promoter = $_POST['promoter'];// user email -> promoter
		$lineup = $_POST['lineup'];//Line-up *
		$cost = $_POST['cost'];//cost *
		$description = $_POST['description'];//description
		$age = $_POST['age'];//age
		$website = $_POST['website'];//website
		$imgFile = $_FILES['user_image']['name'];//image flyer *
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		$status = '0';//status *
		
		
		if(empty($title)){
			$errMSG = "Please Enter Title.";
		}
		else if($region == '0'){
			$errMSG = "Please Enter Event Region.";
		}
		else if(empty($location)){
			$errMSG = "Please Enter Event Location.";
		}
		else if(empty($startdate)){
			$errMSG = "Please Enter Event Start Date.";
		}
		else if(empty($enddate)){
			$errMSG = "Please Enter Event End Date.";
		}
		else if(empty($lineup)){
			$errMSG = "Please Enter a Line-up for the event.";
		}
		else if(empty($imgFile)){
			$errMSG = "Please Select Image Flyer.";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory
	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
		
			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
		
			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;
				
			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){			
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Sorry, your file is too large.";
				}
			}
			else{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}
		}
		
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO tbl_users(title, region, location, start_date, end_date, promoter, lineup, cost, description, age, website, flyer,status) VALUES(:title, :region, :location, :start_date, :end_date, :promoter, :lineup, :cost, :description, :age, :website, :flyer, :status)');

			$stmt->bindParam(':title',$title);
			$stmt->bindParam(':region',$region);
			$stmt->bindParam(':location',$location);
			$stmt->bindParam(':start_date',$startdate);
			$stmt->bindParam(':end_date',$enddate);
			$stmt->bindParam(':promoter',$promoter);
			$stmt->bindParam(':lineup',$lineup);
			$stmt->bindParam(':cost',$cost);
			$stmt->bindParam(':description',$description);
			$stmt->bindParam(':age',$age);
			$stmt->bindParam(':website',$website);
			$stmt->bindParam(':flyer',$userpic);
			$stmt->bindParam(':status',$status);

			if($stmt->execute())
			{
				$successMSG = "New event succesfully inserted. Please wait for verification to submit.";
				header("refresh:5;index.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "Error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Events | Techno Experience</title>

<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./jquery.datetimepicker.css"/>
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/css/style-custom.css">


<link href="assets/css/styles.css" rel="stylesheet"/>
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<style type="text/css">
    .form_design {
	    display: block;
	    width: 100%;
	    height: 34px;
	    padding: 6px 12px;
	    font-size: 14px;
	    line-height: 1.42857143;
	    color: #555;
	    background-color: #fff;
	    background-image: none;
	    border: 1px solid #ccc;
	    border-radius: 4px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	}
</style>
</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header navbar-header2 ">
            <a class="navbar-brand" href="http://www.technoexperience.net" title='Back to Techno Experience'>Back to / TECHNO EXPERIENCE</a>
            <a class="navbar-brand side" href="admin.php" title='Back to Techno Experience'>Admin section</a>
        </div>
 
    </div>
</div>

<div class="container">


	<div class="page-header">
    	<h1 class="h2">add new event./ <a class="" href="index.php"> <span class="glyphicon glyphicon-eye-open"></span>  view all </a></h1>
    </div>
    

	<?php
	if(isset($errMSG)){
			?>
            <div class="alert alert-danger">
            	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
            </div>
            <?php
	}
	else if(isset($successMSG)){
		?>
        <div class="alert alert-success">
              <strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
        </div>
        <?php
	}
	?>   

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	    
	<table class="table table-responsive addnew_background" border='0'>
<!--title-->
    <tr>
    	<td><label class="control-label">Event title <span class="star">*</span></label></td>
        <td><input class="form-control" type="text" name="title" placeholder="Enter title" value="<?php echo $title; ?>" /></td>
    </tr>
<!--city-->
    <tr>
    	<td><label class="control-label">Event region <span class="star">*</span></label></td>
        <!--<td><input class="form-control" type="text" name="location" placeholder="Event location ex. Street, Avenue. Nº, CIP" value="<?php echo $location; ?>" /></td>-->
        <td><select name="region" id="region" class="form-control">
        	<option value="0" selected>Select region</option>
			<option value="Andalucía">Andalucía</option>
			<option value="Aragón">Aragón</option>
			<option value="Principado de Asturias">Principado de Asturias</option>
			<option value="Islas Baleares">Islas Baleares</option>
			<option value="País Vasco">País Vasco</option>
			<option value="Canarias">Canarias</option>
			<option value="Cantabria">Cantabria</option>
			<option value="Castilla-La Mancha">Castilla-La Mancha</option>
			<option value="Castilla y León">Castilla y León</option>
			<option value="Cataluña">Cataluña</option>
			<option value="Extremadura">Extremadura</option>
			<option value="Galicia">Galicia</option>
			<option value="Comunidad de Madrid">Comunidad de Madrid</option>
			<option value="Región de Murcia">Región de Murcia</option>
			<option value="Comunidad Foral de Navarra">Comunidad Foral de Navarra</option>
			<option value="La Rioja">La Rioja</option>
			<option value="Comunidad Valenciana">Comunidad Valenciana</option>
			<option value="Ceuta">Ceuta</option>
			<option value="Melilla">Melilla</option>
		</select></td>
    </tr>
<!--location-->
    <tr>
    	<td><label class="control-label">Event location <span class="star">*</span></label></td>
        <td><input class="form-control" type="text" name="location" placeholder="Event location ex. Club, Street/Avenue. Nº, CIP" value="<?php echo $location; ?>" /></td>
    </tr>
<!--start_date-->
    <tr>
    	<td><label class="control-label">Start Date <span class="star">*</span></label></td>
        <td><input class="some_class form_design"type="text" name="startdate" id="some_class_1" placeholder="Event Start Date" value="<?php echo $startdate; ?>" /></td>
    </tr>
<!--end_date-->
    <tr>
    	<td><label class="control-label">End Date <span class="star">*</span></label></td>
        <td><input class="some_class form_design" type="text" name="enddate" id="some_class_2" placeholder="Event End Date" value="<?php echo $enddate; ?>" /></td>
    </tr>
<!--promoter-->    
    <tr>
    	<td><label class="control-label">Promoters</label></td>
        <td><input class="form-control" type="text" name="promoter" placeholder="Promoters" value="<?php echo $promoter; ?>" /></td>
    </tr>
<!--line up-->
    <tr>
    	<td><label class="control-label">Line-up <span class="star">*</span></label></td>
        <td><input class="form-control" type="text" name="lineup" placeholder="Line-up" value="<?php echo $lineup; ?>" /></td>
    </tr>
<!--cost-->
    <tr>
    	<td><label class="control-label">Cost <span class="star">*</span></label></td>
        <td><input class="form-control" type="text" name="cost" placeholder="Cost ex. 20$" value="<?php echo $cost; ?>" /></td>
    </tr>
<!--description-->
    <tr>
    	<td><label class="control-label">Description </label></td>
        <td><textarea rows="4" cols="50" class="form-control" type="text" name="description" placeholder="Description" value="<?php echo $description; ?>" /></textarea></td>
    </tr>
<!--age-->
    <tr>
    	<td><label class="control-label">Age restriction </label></td>
        <td><input class="form-control" type="text" name="age" placeholder="Age restriction ex. +18 / +21" value="<?php echo $age; ?>" /></td>
    </tr>
<!--website-->
    <tr>
    	<td><label class="control-label">website link </label></td>
        <td><input class="form-control" type="text" name="website" placeholder="Website Link" value="<?php echo $website; ?>"/></td>
    </tr>
<!--event image-->
    <tr>
    	<td><label class="control-label">Event Img <span class="star">*</span></label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save event
        </button>  <span class="star">* required fields.</span>
        </td>
    </tr>
    
    </table>
    
</form>
<!-- <div class="alert alert-info">
    <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!
</div> -->

</div>

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="./jquery.js"></script>
<script src="build/jquery.datetimepicker.full.js"></script>
<script>/*
window.onerror = function(errorMsg) {
	$('#console').html($('#console').html()+'<br>'+errorMsg)
}*/
$.datetimepicker.setLocale('en');
$('.some_class').datetimepicker();
</script>

</body>
</html>