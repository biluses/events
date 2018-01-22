<?php
session_start();
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
		
		header("Location: index.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />

<title>Events | Techno Experience</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link href="assets/css/styles.css" rel="stylesheet"/>
		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="bootstrap/css/style-custom.css">
<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
<script src="./jquery.js"></script>

<!-- Date picker -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
	<script src="datepicker/moment-with-locales.min.js"></script>
	<script src="datepicker/bootstrap-datetimepicker.min.js"></script>
	

<script type="text/javascript">
	 $(function () {
   var bindDatePicker = function() {
		$(".date").datetimepicker({
		useCurrent: false,
        format:'YYYY-MM-DD',
			icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('YYYY-MM-DD');
			}

			$(this).val(date);
		});

		 // here show dateTimePicker via js
        $('.date').data("DateTimePicker").show();
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();




 });


</script>


<style>

  .full button span {
    background-color: limegreen;
    border-radius: 32px;
    color: black;
  }
  .partially button span {
    background-color: orange;
    border-radius: 32px;
    color: black;
  }
/* .datpicker .text-info contains text for today's date but
   it dosn't work when we are not showing the current month */
.datepicker .text-info {
    font-size: 14px;
    color: black;
}
/* .datpicker .btn-info contains selected date */
.datepicker .btn-info {
    font-size: 14px;
    font-weight: bold;
    background-color: #39b3d7;
}
.datepicker .btn:disabled  {
    font-size: 14px;
    font-weight: normal;
    color: gray;
}
.datepicker .btn:disabled>.text-muted  {
    font-size: 14px;
    font-weight: normal;
    color: gray;
}
.datepicker .text-muted  {
    font-size: 14px;
    font-weight: bold;
    color: black;
}
.datepicker .btn:enabled  {
    font-size: 14px;
    font-weight: bold;
    color: black;
}

	ul {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	}

	li {
	    float: left;
	}

	li a {
	    display: block;
	    color: white;
	    text-align: center;
	    padding: 16px;
	    text-decoration: none;
	}

	li a:hover {
	    background-color: #111111;
	}
	.styled-select {
	   /*background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;*/
	   height: 41px;
	   overflow: hidden;
	   width: 341px;
	}

	.styled-select select {
	   background: rgba(242, 138, 49, 0.25);
	   border: none;
	   font-size: 29px;
	   height: 41px;
	   padding: 5px; /* If you add too much padding here, the options won't show in IE */
	   width: 344px;
	}

	.styled-select.slate {
	   /*background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;*/
	   height: 35px;
	   width: 240px;
	}

	.styled-select.slate select {
	   border: 1px solid #ccc;
	   font-size: 16px;
	   height: 35px;
	   width: 268px;
	}

	.event-item {
    	position: relative;
    	border-bottom: 1px solid #ccc;
    	padding: 8px 0;
	}
	/*.tickets-bkg-logo {
	    background-image: url(user_images/te-ticket.png);
	    background-size: 40px 23px;
	    background-position: 100% 1px;
	    background-repeat: no-repeat;
	}*/

	.event-item>a {
	    float: left;
	    margin-right: 8px;
	}

	.event-item>div {
    	width: 100%;
	}

	.bbox {
    	box-sizing: border-box;
    	z-indexmoz-box-sizing: border-box;
     -webkit-box-sizing: border-box; 
	}

	.date {
	    bottom: 0;
	    left: 0;
	    width: 100%;
	    padding-top: 0;
	    font-size: 28px;
	    border-bottom: 2px solid #ff8c00;
	    padding: 35px 0 4px 0;
	    margin: 0;
	}

	.datepicker table tr td.active:active, 
.datepicker table tr td.active.highlighted:active, 
.datepicker table tr td.active.active, 
.datepicker table tr td.active.highlighted.active {
  background-color: green;
}

.ui-datepicker { 
  margin-left: 100px;
  z-index: 1000;
}

.bootstrap-datetimepicker-widget {
	left:auto !important;
	right:20% !important;
	top: 300px !important;
}
	
</style>
</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header navbar-header2 ">
            <a class="navbar-brand back_to" href="http://www.technoexperience.net" title='Back to Techno Experience'>Back to / TECHNO EXPERIENCE</a>
            <a class="navbar-brand side admin_section" href="admin.php" title='Back to Techno Experience'>Admin section</a>
        </div>
 
    </div>
</div>

<div class="container">

	<div class="page-header">
    	<h1 class="h2">find events. / <a class="" href="addnew.php"> <span class="glyphicon-plus"></span> add new </a></h1> 
    </div>
    
<br />
<div class="row">
	
	



</div>
<div class="row">

	<div class="col-5">
			 	<div class="container">
		    <div class="row">
		    	<div class='col-sm-8 col-lg-8'>
		    		<form method="POST" action="/" id="searchForm">
					<ul>
						<li class="styled-select black rounded region_select">
							<select  name="region" id="region" class="region_select">
					        	<option value="0" selected>REGION </option>
					        	<option value="all">All</option>
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
							</select>
						</li>
						<li class="styled-select black rounded region_select" style="width: 180px;">
							<select  name="date" class="region_select" style="width: 180px;">
								<option value="0" selected>DATE</option>
								<option value="all">All</option>
					        	<option value="<?=$date = date('Y-m-d');?>">Today</option>
								<option value="Week">Week</option>
								<option value="Month">Month</option>
							</select>
						</li>
						<li class="find_find">
							<input type="submit" class="black rounded find_find" style="border:0;border: 0;
				    background-color: #ff8c00;font-size: 25px;" id="find" value="FIND EVENT">
						</li>
					</ul>
		    	</div>
		        <div class='col-sm-4 col-lg-4'>
		            <div class="form-group">
		                <div class='input-group date' id='datetimepicker1'>
		                    <input type='text' name="datepicker" autocomplete="off" class="form-control" id="datepicker" />
		                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
		                    </span>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</div>

	</form>
<!-- INFO GOES HERE -->
	<!-- <table style="width: 70%;">
	    <tbody id="items">

	    </tbody>
	</table> -->



 <div class="container">
		<div class="row">
			<div class="[ col-xs-12 col-sm-8 ]" >
				<ul class='event-list' id="items">
				</ul>
			</div>
		</div>
	</div>


</div>



<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" >
// Attach a submit handler to the form
$( document ).ready(function() {

var url = "find_events.php"; // the script where you handle the form input.
	  var html = "";
	    $.ajax({
	       type: "POST",
	       dataType: "json",
	       url: url,
	       data: {key:'initial'}, // serializes the form's elements.
	       success: function(data) 
	       {
	      //WORKS
	      //console.log(data);
				if(data === 'No Events Found.')
				{
					html +="<tr>";
			        html += "<td > <span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else if(data === 'Please Select a Region and Date or Specific date for the Event.')
				{
					html +="<tr>";
			        html += "<td><span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else if(data === 'Please unmark date dropdown, only region and calendar.')
				{
					html +="<tr>";
			        html += "<td><span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else 
				{
					for(var h =0;h < data.length;h++)
					{
						var uniqueDates = [];
						$.each(data, function(i, el){
						    if($.inArray(el.start_date.substring(0,10), uniqueDates) === -1) uniqueDates.push(el.start_date.substring(0,10));

							});
					}
					for(var i =0;i < uniqueDates.length;i++)
					{
						var MONTHS = ["January","February","March","April","May","June","July","August","September","October","November","December"];
						var myDate, myFormatDate;
						var date_str =uniqueDates[i];
						var t = date_str.split("-");
					
						myDate = new Date(t[0], t[1]-1, t[2]);
						myFormatDate = myDate.getFullYear() +" / " +MONTHS[myDate.getMonth()] + " - " + myDate.getDate() ;
			
						html +="<tr>";
					    html += "<td><p class='eventDate date'><span class='orange_is'>"+myFormatDate+"</span></p> </td>" ;
					    html +="</tr>";


						for(var j =0;j < data.length;j++)
						{
							var item2 = data[j];
							var date_get = item2.start_date;
							var second_date =date_get.substring(0,10);

							//console.log(second_date);
							if(second_date == uniqueDates[i])
							{
						        html +="<tr>";
						        html += "<td><article class='event-item  clearfix  tickets-bkg-logo' itemscope=''>"+
						        "<span style='display:none;'><time itemprop='startDate' datetime='2017-07-27T00:00'>2017-07-27T00:00</time></span>"+
						        "<a href='detail_event.php?3v3nt5="+item2.id+"'><img id='image_ev' src='user_images/"+item2.flyer+"' width='155' height='80'></a>"+
						        "<div class='bbox'><h1 class='event-title' style='margin:0px; !important' itemprop='summary'>"+
						        "<a href='detail_event.php?3v3nt5="+item2.id+"' itemprop='url' title='"+item2.title+"'>"+
						        	""+item2.title+"</a>"+
						        "<span> at <a href='#' style='color: rgb(239, 255, 0);'>"+item2.region+"</a></span></h1>"+
						        "<div class='grey event-lineup'>"+item2.lineup+"</div>"+
						        "</div></article></td>";
						        html +="</tr>";
						        
							}
						}    
					}
					$("#items").html(html);
				}

	       }
	     });


var form = $("#searchForm");
  form.submit(function(ev) {
    ev.preventDefault();
	  var url = "find_events.php"; // the script where you handle the form input.
	  var html = "";
	    $.ajax({
	       type: "POST",
	       dataType: "json",
	       url: url,
	       data: $("#searchForm").serialize(), // serializes the form's elements.
	       success: function(data)
	       {
	      //WORKS
	      //console.log(data);
				if(data === 'No Events Found.')
				{
					html +="<tr>";
			        html += "<td > <span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else if(data === 'Please Select a Region and Date or Specific date for the Event.')
				{
					html +="<tr>";
			        html += "<td><span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else if(data === 'Please Select a date.')
				{
					html +="<tr>";
			        html += "<td><span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else if(data === 'Please Select a region.')
				{
					html +="<tr>";
			        html += "<td><span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else if(data === 'Please unmark date dropdown, only region and calendar.')
				{
					html +="<tr>";
			        html += "<td><span class='orange_is'>" + data + "</span></td>" ;
			        html +="</tr>";
			        $("#items").html(html);
				}
				else 
				{
					for(var h =0;h < data.length;h++)
					{
						var uniqueDates = [];
						$.each(data, function(i, el){
						    if($.inArray(el.start_date.substring(0,10), uniqueDates) === -1) uniqueDates.push(el.start_date.substring(0,10));

							});
					}
					for(var i =0;i < uniqueDates.length;i++)
					{
						var MONTHS = ["January","February","March","April","May","June","July","August","September","October","November","December"];
						var myDate, myFormatDate;
						var date_str = uniqueDates[i];
						var t = date_str.split("-");
					
						myDate = new Date(t[0], t[1]-1, t[2]);
						myFormatDate = myDate.getFullYear() +" / " +MONTHS[myDate.getMonth()] + " - " + myDate.getDate() ;
			
						html +="<tr>";
					    html += "<td><p class='eventDate date'><span class='orange_is'>"+myFormatDate+"</span></p> </td>" ;
					    html +="</tr>";


						for(var j =0;j < data.length;j++)
						{
							var item2 = data[j];
							var date_get = item2.start_date;
							var second_date =date_get.substring(0,10);

							//console.log(second_date);
							if(second_date == uniqueDates[i])
							{
						        html +="<tr>";
						        html += "<td><article class='event-item  clearfix  tickets-bkg-logo' itemscope=''>"+
						        "<span style='display:none;'><time itemprop='startDate' datetime='2017-07-27T00:00'>2017-07-27T00:00</time></span>"+
						        "<a href='detail_event.php?3v3nt5="+item2.id+"'><img id='image_ev' src='user_images/"+item2.flyer+"' width='155' height='80'></a>"+
						        "<div class='bbox'><h1 class='event-title' style='margin:0px; !important' itemprop='summary'>"+
						        "<a href='detail_event.php?3v3nt5="+item2.id+"' itemprop='url' title='"+item2.title+"'>"+
						        	""+item2.title+"</a>"+
						        "<span> at <a href='#' style='color: rgb(239, 255, 0);'>"+item2.region+"</a></span></h1>"+
						        "<div class='grey event-lineup'>"+item2.lineup+"</div>"+
						        "</div></article></td>";
						        html +="</tr>";
						        
						   
						        
							}
						}    
					}
					$("#items").html(html);
				}

	       }
	     });
	}); 


});
</script>


</body>
</html>