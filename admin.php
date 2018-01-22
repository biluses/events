<?php
session_start();
require_once('connect.php');
$_SESSION["action"] = false;
if(isset($_POST) & !empty($_POST)){
	$username = mysqli_real_escape_string($connection, $_POST['username']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM `login` WHERE username='$username' AND password='$password'";
	$result = mysqli_query($connection, $sql);
	$count = mysqli_num_rows($result);
	if($count == 1){
		$_SESSION['username'] = $username;
		$_SESSION["action"] = true;
	}else{
		$errorMsg = "Invalid Username/Password";
		$_SESSION["action"] = false;
	}
}
if(isset($_SESSION['username'])){
	$errorMsg = "User already logged in";
	$_SESSION["action"] = true;
}


	require_once 'dbconfig.php';
	
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT flyer FROM tbl_users WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['flyer']);
		
		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM tbl_users WHERE id =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();
		
		header("Location: admin.php");
	}

	if(isset($_GET['accept_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT flyer FROM tbl_users WHERE id =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['accept_id']));
		//$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		//unlink("user_images/".$imgRow['flyer']);
		
		// it will delete an actual record from db
		$stmt_accept = $DB_con->prepare('UPDATE `tbl_users` SET `status`=1 WHERE id =:uid');
		$stmt_accept->bindParam(':uid',$_GET['accept_id']);
		$stmt_accept->execute();
		
		header("Location: admin.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<title>Events | Techno Experience</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="bootstrap/css/style-custom.css">

<link href="assets/css/styles.css" rel="stylesheet"/>
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header navbar-header2 ">
            <a class="navbar-brand" href="http://www.technoexperience.net" title='Back to Techno Experience'>Back to / TECHNO EXPERIENCE</a>
             <a class="navbar-brand" href="addnew.php" title='Create events'> / Create Events /</a>
             <a class="navbar-brand" href="index.php" title='Create events'> View Events </a>
             <?PHP if($_SESSION["action"] == false){ ?><a class="navbar-brand side" href="admin.php" title='Admin section'>Admin section</a><?PHP }?>
            <?PHP if($_SESSION["action"] == true){ ?> <a class="navbar-brand side" href="logout.php" title='logout'>Logout</a><?PHP }?>
        </div>
 
    </div>
</div>
<?PHP
if($_SESSION["action"] ==false)
	{
		?>
<div class="container">
<?PHP if($errorMsg != '')
{?>
 <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?= $errorMsg ?>
            </div>
        </div>
        <?}?>
	<form method="POST" action="" id="adminForm">
		<table class="table table-responsive addnew_background" border='0'>
	<!--title-->
		    <tr>
				<td><label class="control-label">User <span class="star">*</span></label></td>
		        <td><input class="form-control" type="text" name="username" placeholder="Enter username"  /></td>
		    </tr>
		    <tr>
		        <td><label class="control-label">Password <span class="star">*</span></label></td>
		        <td><input class="form-control" type="password" name="password" placeholder="Enter password" /></td>
		    </tr>
		    <tr>
		        <input type="submit" class="black rounded" style="border:0;border: 0;
    background-color: #ff8c00;font-size: 25px;" id="find" name="submit" value="Enter">
		    </tr>
	    </table>
	</form>
</div>
<?PHP
}
		?>

<?PHP
if($_SESSION["action"] == true)
	{
			?>

<div class="container">

	<div class="page-header">
    	<h1 class="h2">all events. / <a class="" href="addnew.php"> <span class=" glyphicon-plus"></span>  add new </a></h1> 
    </div>
    
<br />

<div class="row">
<?php
	
	$stmt = $DB_con->prepare('SELECT * FROM tbl_users ORDER BY id DESC');
	$stmt->execute();
	
	if($stmt->rowCount() > 0)
	{
		while($row=$stmt->fetch(PDO::FETCH_ASSOC))
		{
			extract($row);
			?>
			<div class="col-xs-3">
				<p class="page-header star"><?php echo $title." / ";?></p>
				<img src="user_images/<?php echo $row['flyer']; ?>" class="img-rounded" width="250px" height="250px" />
				<p class="page-header">
				<span >
				<a style="color:white !important;" class="btn btn-info" href="editform.php?edit_id=<?php echo $row['id']; ?>" title="click for edit" onclick="return confirm('sure to edit ?')"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
				<?PHP if($status == 0){ ?><a style="color:white !important;" class="btn btn-success" href="?accept_id=<?php echo $row['id']; ?>" title="click for acept" onclick="return confirm('sure to acept ?')"><span class="glyphicon glyphicon-ok-circle"></span> Accept</a><?PHP } ?>
				<a style="color:white !important;" class="btn btn-danger" href="?delete_id=<?php echo $row['id']; ?>" title="click for delete" onclick="return confirm('sure to delete ?')"><span class="glyphicon glyphicon-remove-circle"></span> Delete</a>

				</span>
				</p>
			</div>       
			<?php
		}
	}
	else
	{
		?>
        <div class="col-xs-12">
        	<div class="alert alert-warning">
            	<span class="glyphicon glyphicon-info-sign"></span> &nbsp; No event Found ...
            </div>
        </div>
        <?php
	}
	
?>
</div>	



<!-- <div class="alert alert-info">
    <strong>tutorial link !</strong> <a href="http://www.codingcage.com/2016/02/upload-insert-update-delete-image-using.html">Coding Cage</a>!
</div> -->

</div>

<?PHP 
 }
?>


<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>