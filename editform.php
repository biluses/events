<?php
session_start();
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT id, title, location, start_date, end_date, promoter, lineup, cost, description, age, website, flyer FROM tbl_users WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
	
	
	
	if(isset($_POST['btn_save_updates']))
	{
		$title = $_POST['title'];// user name -> title *
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
					
		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory	
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['flyer']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Sorry, your file is too large it should be less then 5MB";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";		
			}	
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['flyer']; // old image from fbsql_database(link_identifier)
		}	
						
		
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE tbl_users 
									     SET 
										     title=:title,
										     location=:location,
										     start_date=:start_date,
										     end_date=:end_date,
										     promoter=:promoter,
										     lineup=:lineup,
										     cost=:cost,
										     description=:description,
										     age=:age,
										     website=:website,
										     flyer=:flyer
								       WHERE id=:uid');
			/*$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);*/

			$stmt->bindParam(':title',$title);
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
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated ...');
				window.location.href='admin.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Event Could Not Updated !";
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

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/style-custom.css">
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
    	<h1 class="h2">update event. / <a class="" href="index.php"> all events </a></h1>
    </div>

<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">
	
    
    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>
   
    
	<table class="table table-responsive">

    <!--title-->
    <tr>
    	<td><label class="control-label">Event title *</label></td>
        <td><input class="form-control" type="text" name="title" value="<?php echo $title; ?>" required /></td>
    </tr>
<!--location-->
    <tr>
    	<td><label class="control-label">Event location *</label></td>
        <td><input class="form-control" type="text" name="location" value="<?php echo $location; ?>" required/></td>
    </tr>
<!--start_date-->
    <tr>
    	<td><label class="control-label">Start Date *</label></td>
        <td><input class="form-control" type="text" name="startdate" value="<?php echo $start_date; ?>" required/></td>
    </tr>
<!--end_date-->
    <tr>
    	<td><label class="control-label">End Date *</label></td>
        <td><input class="form-control" type="text" name="enddate" value="<?php echo $end_date; ?>" required/></td>
    </tr>
<!--promoter-->    
    <tr>
    	<td><label class="control-label">Promoters</label></td>
        <td><input class="form-control" type="text" name="promoter" value="<?php echo $promoter; ?>" /></td>
    </tr>
<!--line up-->
    <tr>
    	<td><label class="control-label">Line-up *</label></td>
        <td><input class="form-control" type="text" name="lineup" value="<?php echo $lineup; ?>" /></td>
    </tr>
<!--cost-->
    <tr>
    	<td><label class="control-label">Cost *</label></td>
        <td><input class="form-control" type="text" name="cost" value="<?php echo $cost; ?>" /></td>
    </tr>
<!--description-->
    <tr>
    	<td><label class="control-label">Description </label></td>
        <td><input class="form-control" type="text" name="description" value="<?php echo $description; ?>" /></td>
    </tr>
<!--age-->
    <tr>
    	<td><label class="control-label">Age restriction </label></td>
        <td><input class="form-control" type="text" name="age" value="<?php echo $age; ?>" /></td>
    </tr>
<!--website-->
    <tr>
    	<td><label class="control-label">website link </label></td>
        <td><input class="form-control" type="text" name="website" value="<?php echo $website; ?>"/></td>
    </tr>
<!--event image-->
     <tr>
    	<td><label class="control-label">Event Img *</label></td>
        <td>
        	<p><img src="user_images/<?php echo $flyer; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>
    
    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> Update
        </button>
        
        <a class="btn btn-default" href="admin.php"> <span class="glyphicon glyphicon-backward"></span> cancel </a>
        
        </td>
    </tr>
    
    </table>
    
</form>


<!--<div class="alert alert-info">
    <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!
</div>-->

</div>
</body>
</html>