<?PHP
require_once 'dbconfig.php';
$region = $_POST['region'];
$date = $_POST['date'];
$key=$_POST['key'];
$unique_date=$_POST['datepicker'];
// echo $unique_date;


	if($region === '0' && $date === '0' && empty($key) && $unique_date =='')
	{
		$PleaseSelect = "Please Select a Region and Date or Specific date for the Event.";
		echo json_encode($PleaseSelect);
	}
	/*else if($region != '0' && $date === '0' && empty($key))
	{
		$PleaseSelect = "Please Select a date.";
		echo json_encode($PleaseSelect);
	}*/
	else if($region == '0' && $date != '0' && empty($key) && $unique_date =='')
	{
		$PleaseSelect = "Please Select a region.";
		echo json_encode($PleaseSelect);
	}
	else if($region != '0' && $date != '0' && $unique_date !='')
	{
		$PleaseSelect = "Please unmark date dropdown, only region and calendar.";
		echo json_encode($PleaseSelect);
	}
	else
	{
		if($date == 'all' && $region == 'all')
		{
			$monthStart = date('Y-m-d'); 
			$monthEnd = date('Y-m-t', strtotime('+1 years'));
			$query = "SELECT * FROM tbl_users WHERE status = 1 AND start_date between '$monthStart' and '$monthEnd 23:59:50' ORDER BY start_date LIMIT 30";
		}
		else if($region != '0' && $date === '0' && empty($key) && $unique_date =='')
		{
			$monthStart = date('Y-m-d');
			$monthEnd = date('Y-m-t', strtotime('+1 years'));
			$query= "SELECT * FROM tbl_users WHERE region = '$region' AND status = 1 AND start_date between '$monthStart' and '$monthEnd 23:59:50' ORDER BY start_date LIMIT 30";
		}
		else if($key == 'initial')
		{
			$monthStart = date('Y-m-d'); 
			$monthEnd = date('Y-m-t', strtotime('+1 years'));
			$query = "SELECT * FROM tbl_users WHERE status = 1 AND start_date between '$monthStart' and '$monthEnd 23:59:50' ORDER BY start_date LIMIT 70";
		}
		else if($date == 'all' && $region != 'all' && $unique_date =='')
		{
			$monthStart = date('Y-m-d');
			$monthEnd = date('Y-m-t', strtotime('+1 years'));
			$query= "SELECT * FROM tbl_users WHERE region = '$region' AND status = 1 AND start_date between '$monthStart' and '$monthEnd 23:59:50' ORDER BY start_date LIMIT 30";
		}
		else if($date == 'Week' )
		{
			$weekStart = date("Y-m-d", strtotime('monday this week'));   
			$weekEnd = date("Y-m-d", strtotime('sunday this week'));
			$query = "SELECT * FROM tbl_users WHERE region = '$region' AND status = 1 AND start_date between '$weekStart' and '$weekEnd 23:59:50' ORDER BY start_date";
		}
		else if ($date == 'Month')
		{
			$monthStart = date('Y-m-d');
			$monthEnd = date('Y-m-t');
			$query = "SELECT * FROM tbl_users WHERE region = '$region' AND status = 1 AND start_date between '$monthStart' and '$monthEnd 23:59:50' ORDER BY start_date";
		}
		else if($region == '0' && $date == '0' && $unique_date !='')
		{
			$query = "SELECT * FROM tbl_users WHERE status = 1 AND start_date LIKE '$unique_date%' ORDER BY start_date";
		}
		else if($region != '0' && $date == '0' && $unique_date !='')
		{
			$query = "SELECT * FROM tbl_users WHERE region = '$region' AND status = 1 AND start_date LIKE '$unique_date%' ORDER BY start_date";
		}
		else
		{
			$query = "SELECT * FROM tbl_users WHERE region = '$region' AND status = 1 AND start_date LIKE '$date%' ORDER BY start_date";
		}
		$stmt = $DB_con->prepare($query);
		$stmt->execute();
		if($stmt->rowCount() > 0)
		{
			$result = array();
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				
				  array_push($result, $row);
			}
			echo json_encode($result);
		}
		else
		{
			$noEvents = "No Events Found.";
			echo json_encode($noEvents);

		}
		
	}

?>