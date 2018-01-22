<?php
session_start();
	error_reporting( ~E_NOTICE );
	
	require_once 'dbconfig.php';
	
	if(isset($_GET['3v3nt5']) && !empty($_GET['3v3nt5']))
	{
		$id = $_GET['3v3nt5'];
		$stmt_edit = $DB_con->prepare('SELECT * FROM tbl_users WHERE id =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Facebook -->
<meta property="og:url"           content="http://technoexperience.net/events/detail_event.php?3v3nt5=<?=$id;?>" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Techno Experience Event <?=$title; ?>" />
  <meta property="og:description"   content="Check the event <?=$title; ?>. <?=$description; ?>" />
  <meta property="og:image"         content="http://technoexperience.net/events/user_images/<?=$flyer;?>" />
<script>
window.fbAsyncInit = function(){
FB.init({
    appId: '1388926721142892', status: true, cookie: true, xfbml: true }); 
};
(function(d, debug){var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
    if(d.getElementById(id)) {return;}
    js = d.createElement('script'); js.id = id; 
    js.async = true;js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
    ref.parentNode.insertBefore(js, ref);}(document, /*debug*/ false));
function postToFeed(title, desc, url, image){
var obj = {method: 'feed',link: url, picture: 'http://technoexperience.net/events/user_images/<?=$flyer;?>'+image,name: title,description: desc};
function callback(response){}
FB.ui(obj, callback);
}
</script>
<title>Events | Techno Experience</title>



<!-- custom stylesheet -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>

<script src="jquery-1.11.3-jquery.min.js"></script>

<link rel="stylesheet" href="bootstrap/css/style-custom.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>



		<!-- GOOGLE FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900' rel='stylesheet' type='text/css'> 
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

		<!-- STYLESHEETS -->
		<link href="assets/css/bootstrap.css" rel="stylesheet">
		<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/flexslider.css" rel="stylesheet" >
		<link href="assets/css/superslides.css" rel="stylesheet" type="text/css">
		<link href="assets/css/animate.css" rel="stylesheet">
		<link href="assets/css/schedule.css" rel="stylesheet">
		<link href="assets/css/gridgallery.css" rel="stylesheet" type="text/css"  />
		<link href="assets/css/venobox.css" rel="stylesheet" type="text/css"/>
		<link href="assets/css/panel.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/styles.css" rel="stylesheet"/>
		<link href="assets/css/queries.css" rel="stylesheet"/>

<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
        stLight.options({
                publisher:'12345',
        });
</script>



</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
       <div class="navbar-header navbar-header2 ">
            <a class="navbar-brand" href="http://www.technoexperience.net" title='Back to Techno Experience'>Back to / TECHNO EXPERIENCE</a>
            <a class="navbar-brand" href="addnew.php" title='Create events'> / Create Events /</a>
            <a class="navbar-brand" href="index.php" title='Create events'> View Events /</a>
            <a class="navbar-brand side" href="admin.php" title='Back to Techno Experience'> Admin section</a>
        </div>
 
    </div>
</div>


<!--HOME-->		
		<section id="sec_1" class="autoheight">
		
		<!--SLIDER-->
		<div id="slides">
			<div class="slides-container">
			  <img src="user_images/<?=$flyer; ?>" alt="<?=$title; ?>">
			  <img src="user_images/<?=$flyer; ?>" alt="<?=$title; ?>">
			  <!--<img src="assets/img/slider/3.jpg" alt="Cinelli">-->
			  
			</div>
			<nav class="slides-navigation">
			  <a href="#" class="next  fa fa-2x fa-chevron-right"></a>
			  <a href="#" class="prev  fa fa-2x fa-chevron-left"></a>
			</nav>
		</div>
		<!--/SLIDER-->
		
			<div class="home-bg"></div>
			<div class="col-lg-12 landing-text-pos align-center">
				<h1 class="wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="1s"> <?=$title; ?> </h1>
				<hr id="title_hr"/>
				<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="1s"><?=$region; ?> / <?=$location; ?></p>
				<p class="wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="1s"><?=$start_date; ?>|<?=$end_date; ?></p>
				<br>
				<p class="wow animated fadeInUp" data-wow-duration="2s" data-wow-delay="2s"><?php if($promoter != ''){ ?>Promoter / <?=$promoter; }?></p>
				<!-- Load Facebook SDK for JavaScript -->
				  <div id="fb-root"></div>
				<br><br>
				  <p>
				 
				  <a href="https://www.facebook.com/sharer/sharer.php?u=http://technoexperience.net/events/detail_event.php?3v3nt5=<?=$id;?>" target="_blank">
				  <i class="fa fa-facebook" aria-hidden="true" > </i> Share on Facebook</a></p>


			</div>
		</section>
		<!--/HOME-->
		
		<!--ABOUT-->	
        <?php if($description != ''){ ?><section class="intro text-center section-padding" id="intro">
			<div class="container wow animated fadeInLeft animated" data-wow-duration="1s" data-wow-delay="0.5s">
				<div class="row">
					<div class="col-lg-8 align-center about">
						<h1 class="arrow">ABOUT THE EVENT</h1>
						<hr>
						<p style="font-size: 24px;"><?=$description; ?>
							<br>
							<?php if($age != ''){ ?>Age stimated / <?=$age; }?>
						</p>

					</div>
				</div>
			</div>
        </section><?PHP }?>
		<!--/ABOUT-->
        
       
        <!--FEATURES-->	
       <!-- <section class="features text-center" id="features">
			<div class="row">
				<div id="grid-gallery" class="grid-gallery">
					<section class="grid-wrap">
						<div class="grid-gal">						
							<figure class="block-hover 3d-gallery col-lg-3 col-sm-12">
								<a href="#"><img src="assets/img/gallery/gal-icn.png" alt="img1">
									<span>GALLERY</span>
								</a>                            
							</figure>
						</div> 
					</section>
					<!--grid wrap-->

					<!-- slideshow -->
					<!--<section class="slideshow">
						<ul>
							<li>
								<figure>											
									<img src="assets/img/gallery/1.jpg" alt="img01"/>
									<figcaption>
										<hr/>
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
									</figcaption>
								</figure>
							</li>
							<li>
								<figure>											
									<img src="assets/img/gallery/2.jpg" alt="img02"/>
									<figcaption>
										<hr/>
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
									</figcaption>
								</figure>
							</li>
							<li>
								<figure>
									<img src="assets/img/gallery/3.jpg" alt="img03"/>
									<figcaption>
										<hr/>
										<p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>
									</figcaption>
								</figure>
							</li>

						</ul>
						<nav>
							<span class="nav-prev fa-chevron-left fa fa-2x "></span>
							<span class="nav-next fa-chevron-right fa fa-2x"></span>
							<span class="close nav-close"><i class="fa fa-times"></i></span>
						</nav>
					</section>
					<!-- /slideshow -->
				</div>
				<!-- /grid-gallery -->

				<!--<div class="container col-lg-6 col-md-12 features-md">          
					<div class="row">
						<div class="col-md-12">
							<div class="features-wrapper">
								<div class="col-md-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
									<div class="icon">
									  5
									</div>
									<h2>Days</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis interdum.</p>
								</div>
							  
								<div class="col-md-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
									<div class="icon">
									 6
									</div>
									<h2>stages</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis interdum.</p>
								</div>
							  
								<div class="col-md-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
									<div class="icon">
									  80
									</div>
									<h2>artists</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis interdum.</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>

				<!-- Vimoe Video-->	
				<!--<div class="grid-gal">
				  <figure class="block-hover vimeo-video col-lg-3 col-sm-12">
					<a class="venoboxvid" data-type="vimeo"  href="http://vimeo.com/75976293" target="_self">
						<img src="assets/img/vdo-icn.png" alt="video_hover">
						<span>VIDEO</span>
					</a>
				  </figure>
				</div>

			</div><!--row ends here-->
        </section>
        <!--/FEATURES-->	
		
		<!--LINE UP-->        
        <section class="text-center section-padding" id="responsive">
			<div class="container wow animated fadeInLeft bottom-spacing">
				<div class="row">
					<div class="col-md-8 align-center wow animated fadeInLeft">
						<h1 class="arrow">LINE UP</h1><hr>
						<p style="font-size: 24px;"><?=$lineup; ?></p>
						<p><br><br></p>
					</div>
				</div>
			</div>
			
			<!--
			LINE UP POR DÍAS
			<div class="container-schedule container wow animated fadeInDown animated" data-wow-duration="1s" data-wow-delay="1s">
				<div id="tabs-ui" class="tabs">
					<nav>
						<ul>
							<li><a href="#section-1"><span>Day 1</span></a></li>
							<li><a href="#section-2"><span>Day 2</span></a></li>
							<li><a href="#section-3"><span>Day 3</span></a></li>
							<li><a href="#section-4"><span>Day 4</span></a></li>
							<li><a href="#section-5"><span>Day 5</span></a></li>
						</ul>
					</nav>
					<div class="content">
						<section id="section-1">
							<div class="container">
								<div class="accordion">
									<div class="day">September 15, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">
												Welcome speech and Overview<br/>
												<span class="name">Andrew Yang - </span>
												<span class="speaker-designaition">CEO, Microsoft</span>
											</div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">The Standardistas are lecturers in interactive design<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Proin gravida nibh vel velit auctor aliquet<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>        
							</div><CONTAINER ENDS-->
						<!--</section>
						<section id="section-2">
							<div class="container">
								<div class="accordion">
									<div class="day">September 16, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Overview - Nisi elit consequat<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Aenean sollicitudin quis bibendum auctor<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Sagittis sem nibh id elit<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>        
							</div>
						</section>
						<section id="section-3">
							<div class="container">
								<div class="accordion">
									<div class="day">September 17, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Welcome speech and Overview<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">The Standardistas are lecturers in interactive design<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Proin gravida nibh vel velit auctor aliquet<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>        
							</div>
						</section>
						<section id="section-4">
							<div class="container">
								<div class="accordion">
									<div class="day">September 18, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Overview - Nisi elit consequat<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Aenean sollicitudin quis bibendum auctor<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Sagittis sem nibh id elit<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>        
							</div>   
						</section>
						<section id="section-5">
							<div class="container">
								<div class="accordion">
									<div class="day">September 19, 2014</div>
									<div class="item clearfix">
										<div class="heading clearfix">
											<div class="time col-md-3 col-sm-12 col-xs-12">9:30am - 11:30am</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Welcome speech and Overview<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">11:30am - 1:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">The Standardistas are lecturers in interactive design<br/><span class="name">Andrew Yang - </span><span class="speaker-designaition">CEO, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">1:00pm - 2:00pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Catered Lunch<br/><span class="name">Sponsered </span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								  
									<div class="item clearfix">
										<div class="heading">
											<div class="time col-md-3 col-sm-12 col-xs-12">3:00pm - 4:30pm</div>
											<div class="e-title col-md-9 col-sm-12 col-xs-12">Proin gravida nibh vel velit auctor aliquet<br/><span class="name">Mary Doe - </span><span class="speaker-designaition">Lead Designer, Microsoft</span></div>
										</div>
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="content venue col-md-3 col-sm-12 col-xs-12">
												Venue: Auditorium 1
											</div>
											<div class="content details col-md-9 col-sm-12 col-xs-12">
											This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. The Standardistas are lecturers in interactive design.
											</div>
										</div>
									</div>
								</div>        
							</div>
						</section>
					</div><
				</div><!-- /tabs -->
			</div>
        </section>
		
		
		<!-- Event social links and download-->
		<section class="event-download-social-link section-padding">
			<div class="col-lg-6 col-md-12 align-center event-download-padding">
<!--				<a class="d-sch text-right" href="https://www.facebook.com/technoexperience/" target="_blank"><i class="fa fa-bath"></i>Visit our Facebook</a>-->
				<?php if($website != ''){ ?><a class="fb " href="http://<?=$website; ?>" target="_blank"><h2>GO TO THE EVENT WEBPAGE</h2></a><?PHP }?>
			</div>
		</section>
		<!--/SCHEDULE-->
        
        <!--SPEAKERS-->
        <!--<section class="team text-center section-padding" id="team">
			<div class="container">
				<div class="row">
				  <div class="col-lg-8 wow animated fadeInUp align-center" data-wow-duration="1s" data-wow-delay="1s">
					<h1 class="arrow">Speakers</h1><hr>
					<p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
				  </div>
				</div>
				<div class="row">
					<div class="speakers-wrap">
						<div id="portfolioSlider">
							<ul class="slides">
								<li>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
											  <img src="assets/img/team/team1.jpg" alt="Portfolio Item">
											  <div class="overlay">
												<button class="md-trigger expand" data-modal="modal-1"><i class="fa fa-search"></i><br>View More</button>
											  </div>
											</div>
										</div>
										<h2>Mark Anderson</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>

									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
												<img src="assets/img/team/team2.jpg" alt="Portfolio Item">
												<div class="overlay">
													<button class="md-trigger expand" data-modal="modal-2"><i class="fa fa-search"></i><br>View More</button>
												</div>
											</div>
										</div>
										<h2>Mary Doe</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>

									<div class="col-md-4 col-sm-4 wow animated fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
										<div class="overlay-effect effects clearfix">
											<div class="img">
												<img src="assets/img/team/team3.jpg" alt="Portfolio Item">
												<div class="overlay">
													<button class="md-trigger expand" data-modal="modal-3"><i class="fa fa-search"></i><br>View More</button>
												</div>
											</div>
										</div>
										<h2>John Thomson</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
								</li>
								<!-- <li> Second Set of Speakers -->
							<!--	<li>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp">
										<div class="overlay-effect effects clearfix">
										<div class="img">
										  <img src="assets/img/team/team1.jpg" alt="Portfolio Item">
										  <div class="overlay">
											<button class="md-trigger expand" data-modal="modal-4"><i class="fa fa-search"></i><br>View More</button>
										  </div>
										</div>
										</div>
										<h2>Mark Anderson</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp">
										<div class="overlay-effect effects clearfix">
											<div class="img">
											  <img src="assets/img/team/team2.jpg" alt="Portfolio Item">
											  <div class="overlay">
												<button class="md-trigger expand" data-modal="modal-5"><i class="fa fa-search"></i><br>View More</button>
											  </div>
											</div>
										</div>
										<h2>Mary Doe</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
									<div class="col-md-4 col-sm-4 wow animated fadeInUp">
										<div class="overlay-effect effects clearfix">
											<div class="img">
											  <img src="assets/img/team/team3.jpg" alt="Portfolio Item">
											  <div class="overlay">
												<button class="md-trigger expand" data-modal="modal-6"><i class="fa fa-search"></i><br>View More</button>
											  </div>
											</div>
										</div>
									  <h2>John Thomson</h2>
									  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc ultricies nulla non metus pulvinar imperdiet.</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div> <!--Row Ends Here-->
			<!--</div>-->
			<!-- Example Speaker -->
			<!--<div class="md-modal md-effect-9" id="modal-1">
				<div class="md-content">
					<div class="folio">
						<div class="avatar1"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div> 
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
			<!-- Example Speaker -->
			<!--<div class="md-modal md-effect-9" id="modal-2">
				<div class="md-content">
					<div class="folio">
						<div class="avatar2"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div> 
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
			<!-- Example Speaker -->
			<!--<div class="md-modal md-effect-9" id="modal-3">
				<div class="md-content">
					<div class="folio">
						<div class="avatar3"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div> 
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
			<!-- Example Speaker -->
			<!--<div class="md-modal md-effect-9" id="modal-4">
				<div class="md-content">
					<div class="folio">
						<div class="avatar4"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div> 
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
			<!-- Example Speaker -->
			<!--<div class="md-modal md-effect-9" id="modal-5">
				<div class="md-content">
					<div class="folio">
						<div class="avatar5"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div> 
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
			<!-- Example Speaker -->
			<!--<div class="md-modal md-effect-9" id="modal-6">
				<div class="md-content">
					<div class="folio">
						<div class="avatar6"></div>
						<div class="sp-name"><strong>Mark Anderson</strong><br/>Director, ABC</div>
						<div class="sp-dsc">
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.
							<blockquote>
							<p>Here is a long quotation here is a long quotation proin gravida nibh vel velit auctor aliquet aenean sollicitudin.</p>
							</blockquote>
						This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
						</div>
						<div class="sp-social">
							<ul>
								<li><a href="#" class="social-btn"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="social-btn"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
						<button class="md-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div> 
			<div class="md-overlay"></div>
			<!-- /Example Speaker -->
        </section>
		<!--/SPEAKER-->
		
		 <!--TICKETS-->        
		<section id="portfolio" class="portfolio text-center section-padding">
			<div class="container">
				<div class="row">
				  <div class="col-md-12">
					<h1 class="arrow">TICKETS</h1><hr><p>See what you get during the event.</p>
				  </div>
				</div>
				<div class="row">
					<div class="pricing-wrap">                
						<ul class="slides">
							<li>
								<div class="col-md-12 col-sm-12 col-xs-12 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
									<ul class="planContainer">
										<li class="title"><h2><?=$cost; ?></h2></li>
										<li class="price"><p>General</p></li>
										<li>
											<!--<ul class="options">
												<li>2x option 1</li>
												<li>Free option 2</li>
												<li>Unlimited option 3</li>
												<li>Unlimited option 4</li>
												<li>1x option 5</li>
										   </ul>-->
										</li>
										<li class="button"><a data-scroll class="btn-effect" href="#swag">Get Info</a></li>
									</ul>             
								</div>
							  
								<!--<div class="col-md-3 col-sm-6 col-xs-6 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
									<ul class="planContainer">
										<li class="title"><h2 class="bestPlanTitle">$125</h2></li>
										<li class="price"><p class="bestPlanPrice">VIP</p></li>
										<li>
											<ul class="options">
												<li>2x option 1</li>
												<li>Free option 2</li>
												<li>Unlimited option 3</li>
												<li>Unlimited option 4</li>
												<li>1x option 5</li>
											</ul>
										</li>
										<li class="button"><a data-scroll class="bestPlanButton btn-effect" href="#swag">Book Now</a></li>
									</ul>
								</div>
								
								<div class="col-md-3 col-sm-6 col-xs-6 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.7s">
									<ul class="planContainer">
										<li class="title"><h2>$100</h2></li>
										<li class="price"><p>SUPER VIP</p></li>
										<li>
											<ul class="options">
												<li>2x option 1</li>
												<li>Free option 2</li>
												<li>Unlimited option 3</li>
												<li>Unlimited option 4</li>
												<li>1x option 5</li>
										   </ul>
										</li>
										<li class="button"><a data-scroll class="btn-effect " href="#swag">Book Now</a></li>
									</ul>
								</div>
								<div class="col-md-3 col-sm-6 col-xs-6 wow animated fadeInRight" data-wow-duration="1s" data-wow-delay="0.9s">
									<ul class="planContainer">
										<li class="title"><h2>$150</h2></li>
										<li class="price"><p>GROUP</p></li>
										<li>
											<ul class="options">
												<li>2x option 1</li>
												<li>Free option 2</li>
												<li>Unlimited option 3</li>
												<li>Unlimited option 4</li>
												<li>1x option 5</li>
										   </ul>
										</li>
										<li class="button"><a data-scroll class="btn-effect " href="#swag">Book Now</a></li>
									</ul>
								</div>-->
							</li>
						</ul>                
					</div>
				</div>
			</div>
        </section>
		<!--/PRICING-->
        
        <!--REGISTER FORM-->	
        <section id="swag" class="swag text-center">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 align-center">
						<!--<form id="nl-form contact_form" class="nl-form">
							Hi! My name is 
							<input id="name" type="text" name="name" placeholder="Enter your name" data-subline="Enter your name"/>
							.
							I would like information for the 
							<select id="field_1">
								<option value="1" selected>General</option>
								<option value="2">Vip</option>
								<option value="3">Other</option>
								<option value="4">Groups</option>
							</select> pack
							
							.
							Contact me on 
							<input id="email1" type="text" name="email1" placeholder="My Email address" data-subline="Enter your email address"/>									
							<div class="nl-submit-wrap">
								<button class="nl-submit btn-effect" type="submit" id="submit_btn">Submit</button>
							</div>				
							<div id="result"></div>
							<div class="nl-overlay"></div>
						</form>-->
						<div id="frmContact" class="nl-form">
							<div id="mail-status"></div>
								<span id="userName-info" class="info"></span><br/>
								Hi! My name is 
								<input type="text" name="userName" id="userName" class="demoInputBox" placeholder="Enter your name" data-subline="Enter your name">
								Contact me on
								<span id="userEmail-info" class="info"></span><br/>
								<input type="text" name="userEmail" id="userEmail" class="demoInputBox" placeholder="My Email address" data-subline="Enter your email address">
								.
								I would like information regarding 
								<span id="subject-info" class="info"></span><br/>
								<input type="text" name="subject" value="<?=$title; ?>" id="subject" class="demoInputBox" size="25">
								My question is 
								<span id="content-info" class="info"></span><br/>
								<input name="content" id="content" class="demoInputBox" placeholder="Ask a question" data-subline="Ask a question"></textarea>
						
								<br><br>
								<button name="submit" class="nl-submit btn-effect" onClick="sendContact();">Send</button>
							
						</div>

							<div class="md-modal md-effect-9" id="modal-10">
							<div class="md-content padding-none">
								<div class="folio">
									
									<div class="sp-name disclaimer"><strong>Terms and Conditions</strong></div>
									<div class="sp-dsc disclaim-border">
									<ul>
										<li>Actually we are not offering selling service, it's only information about the event.</li>
										<li>Your information introduced on the form will be used in our database for information purposes.</li>
										<li>You can send an email to info@technoexperience.net for any incovenience found.</li>
									</ul>
									</div>
									
									<button class="md-close"><i class="fa fa-times"></i></button>
								</div>
							</div>
						</div> 
						<div class="col-md-12 tc">Please read the<button class="md-trigger" data-modal="modal-10">Terms & Conditions</button>carefully.</div>
						<!-- the overlay element -->
						<div class="md-overlay"></div>
					</div>
				</div>
			</div>
        </section>
		<!-- /REGISTER FORM -->

       <!--SPONSORS-->	
        <div id="sponsers" class="ignite-cta text-center section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-8 align-center wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
						<h1 class="arrow">Our Sponsors</h1><hr>
						<p>Would you like to be part of our sponsors? send an email to info@technoexperience.net and let's work together!</p>
					</div>
					<!-- Jssor Slider Begin -->
					<div class="col-md-8 align-center wow animated fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s" style="margin-top: 30px;">
						<img alt="sp1" src="assets/img/sponsor/sp1.png" />
							<img alt="sp3" src="assets/img/sponsor/sp3.png" />
							<img alt="sp2" src="assets/img/sponsor/sp2.png" />
							<img alt="sp4" src="assets/img/sponsor/sp4.png" />
							<img alt="sp5" src="assets/img/sponsor/sp5.png" />
							<img alt="sp6" src="assets/img/sponsor/sp6.png" />
							<!--<div><img alt="sp7" src="assets/img/sponsor/sp7.png" /></div>-->
					</div>

					<!--<div id="slider1_container" style=" ">
						<div class="inner_carousal" data-u="slides" style="">
							<div><img alt="sp1" src="assets/img/sponsor/sp1.png" /></div>
							<div><img alt="sp3" src="assets/img/sponsor/sp3.png" /></div>
							<div><img alt="sp2" src="assets/img/sponsor/sp2.png" /></div>
							<div><img alt="sp4" src="assets/img/sponsor/sp4.png" /></div>
							<div><img alt="sp5" src="assets/img/sponsor/sp5.png" /></div>
							<div><img alt="sp6" src="assets/img/sponsor/sp6.png" /></div>
							<!--<div><img alt="sp7" src="assets/img/sponsor/sp7.png" /></div>
						</div>
					</div>-->
					<!-- Jssor Slider End -->
				</div>
			</div>
		</div>
		 <!-- /SPONSORS -->	

		<!--SUBSCRIBE-->	
        <section class="subscribe text-center">
			<div class="subscribe-overlay"></div>
			<div class="container wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s">
				<h1 class="arrow">Contact</h1><hr>
				<form action="#" id="notifyMe" method="POST" class="center-block align-center col-lg-5 col-md-5 col-sm-10 col-xs-10">
					<div class="input-group col-lg-12 align-center">
					<label class="form-control email-add">INFO@TECHNOEXPERIENCE.NET</label>
					</div>
				</form>
			</div>
        </section>
		<!-- /SUBSCRIBE -->

		<!--CONTACT-->	
        <section class="text-center section-padding contact-wrap" id="contact">
			<div class="container">
				<!--<div class="row">
					<div class="col-md-8 wow animated fadeInLeft align-center" data-wow-duration="1s" data-wow-delay="0.3s">
						<h1 class="arrow">Contact</h1><hr>
						<p>Lorem ipsum dolor sit amet, alia honestatis an qui, ne soluta nemore eripuit sed. Falli exerci aperiam ut his, prompta feugiat usu minimum delicata.</p>
					</div>
				</div>
				<div class="row contact-details">
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
						<div class="light-box box-hover">
							<h2><span>Address</span></h2>
							<p>Level 5,<br> 245 Quigley Bvld,<br>Azuire</p>
						</div>
					</div>
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.7s">
						<div class="light-box box-hover">
							<h2><span>Phone</span></h2>
							<p>+61 9 211 3747<br>+61 3 075 8371</p>
						</div>
					</div>
					<div class="col-md-4 wow animated fadeInDown" data-wow-duration="1s" data-wow-delay="0.9s">
						<div class="light-box box-hover">
							<h2><span>Email</span></h2>
							<p><a href="#">mievent@reach.fr</a><br><a href="#">support@reach.com</a><br><a href="#">contact@mievent.com</a></p>
						</div>
					</div>
				</div>-->
				<div class="row">
					<a id="get_directions" class="learn-more-btn btn-effect" href="#"><i class="fa fa-map-marker"></i><span>Get Directions</span></a>
				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="social-buttons">
							<li><a href="https://twitter.com/TecnoExperience" class="social-btn"><i class="fa fa-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/technoexperience/" class="social-btn"><i class="fa fa-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/technoexperience/" class="social-btn"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
        </section>
		<!-- /CONTACT -->	

		<!--FOOTER-->	
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-6 align-center">
						<ul class="legals">
							<li><button class="md-trigger " data-modal="modal-11">Disclaimer</button></li>
							
						</ul>
					</div>
					<div class="md-modal md-effect-9" id="modal-11">
						<div class="md-content padding-none">
							<div class="folio">
								<div class="sp-name disclaimer"><strong>Disclaimer</strong></div>
								<div class="sp-dsc disclaim-border">
									The information contained in this website is for general information purposes only. The information is provided by techno experience and while we endeavour to keep the information up to date and correct, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.

									In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.

									Through this website you are able to link to other websites which are not under the control of techno experience. We have no control over the nature, content and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.

									Every effort is made to keep the website up and running smoothly. However, techno experience takes no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.
								</div>
								<button class="md-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
					</div> 
					<div class="md-overlay"></div>
				</div>
			</div>
        </footer>
		<!-- /FOOTER -->
		<!--<div class="panel">
			
			<div class="panel-container">
				<div class="options">
				
					<ul class="color-switch first">
					<p class="panel-head first">XMAS</p>					
					<li><a href="../../xmas/snowfall/index.html" target="_self"><span class="links">Snowfall Effect
					<sup class="new">new</sup></span></a></li>
					<li><a href="../../xmas/triangle/index.html" target="_self"><span class="tube">Triangle Effect
					<sup class="new">new</sup></span></a></li>			
					
					<p class="panel-head first">Corporate</p>					
					<li><a href="../../corporate/image/index.html" target="_self"><span class="links">Static Background</span></a></li>
					<li><a href="../../corporate/slider/index.html" target="_self"><span class="links">Slider Background</span></a></li>
					<li><a href="../../corporate/html5-video/index.html" target="_self"><span class="links">Html5 Video</span></a></li>
					<li><a href="../../corporate/youtube-video/index.html" target="_self"><span class="tube">Youtube Video</span></a></li>
					
					<p class="panel-head first">Music</p>
					<li><a href="../image/index.html" target="_self"><span class="links">Static Background</span></a></li>
					<li><a class="active2"><span class="links">Slider Background</span></a></li>
					<li><a href="../html5video/index.html" target="_self"><span class="links">Html5 Video</span></a></li>
					<li><a href="../youtube-video/index.html" target="_self"><span class="tube">Youtube Video</span></a></li>					
					
					</ul>	

					<ul class="color-switch last">					
					
					<p class="panel-head last">Coming Soon</p>
					<li><a href="../../xmas/astronomy/index.html" target="_self"><span class="links">Astronomy Effect<sup class="new">new</sup></span></a></li>
					<li><a href="../../xmas/rainy/index.html" target="_self"><span class="tube">Rainy Effect<sup class="new">new</sup></span></a></li>	
					
					<p class="panel-head last">Coming Soon</p>
					<li><a href="../../corporate/quickregistration/index.html" target="_self"><span class="links">Quick Register</span></a></li>
					<li><a href="../../corporate/comingsoon-image/index.html" target="_self"><span class="links">Static Image</span></a></li>
					<li><a href="../../corporate/comingsoon-html5video/index.html" target="_self"><span class="links">Html5 Video</span></a></li>
					<li><a href="../../corporate/comingsoon-youtubevideo/index.html" target="_self"><span class="tube">youtube video</span></a></li>
					
					<p class="panel-head last">Coming Soon</p>					
					<li><a href="../quickregistration/index.html" target="_self"><span class="links">Quick Register</span></a></li>
					<li><a href="../comingsoon-image/index.html" target="_self"><span class="links">Static Image</span></a></li>
					<li><a href="../comingsoon-html5video/index.html" target="_self"><span class="links">Html5 Video</span></a></li>
					<li><a href="../comingsoon-youtubevideo/index.html" target="_self"><span class="tube">youtube video</span></a></li>
					
					</ul>	
				</div>
			</div>
		</div>	
		<!--SCRIPTS-->	
		
		<script type="text/javascript" src="assets/js/jquery-1.11.0.min.js"></script>
		<script type="text/javascript" src="assets/js/jquery-ui-1.10.4.min.js"></script>
		
		<!--VIMEO VIDEO-->     
        <script type="text/javascript" src="assets/js/venobox.js"></script>

        <!--3D GALLERY-->
        <script type="text/javascript" src="assets/js/classie.grid.gallery.js"></script>
		<script type="text/javascript" src="assets/js/modernizr.gridgallery.js"></script>		
		<script type="text/javascript" src="assets/js/cbpGridGallery.js"></script>
 
		<script type="text/javascript" src="assets/js/classie.js" ></script>
		<script type="text/javascript" src="assets/js/modalEffects.js" ></script>
       
	    <script type="text/javascript" src="assets/js/nlform.js" ></script>
		<script>var nlform = new NLForm( document.getElementById( 'nl-form' ) );</script>
        <script type="text/javascript" src="assets/js/bootstrap.min.js" ></script>
        
		<!-- TEAM SLIDER  -->
		<script type="text/javascript" src="assets/js/jquery.flexslider.js" ></script>
		
		<!-- SCHEDULE TABS  -->
        <script type="text/javascript" src="assets/js/modernizr.js" ></script>
		<script type="text/javascript" src="assets/js/cbpFWTabs.js" ></script>		
		
		<!--SPONSOR SLIDER-->
		<script type="text/javascript" src="assets/js/jssor.core.js"></script>
		<script type="text/javascript" src="assets/js/jssor.utils.js"></script>
		<script type="text/javascript" src="assets/js/jssor.slider.js"></script>
		<script type="text/javascript" src="assets/js/sponsor_init.js"></script>
		
		<!-- SMOOTH SCROLL  -->
		<script type="text/javascript" src="assets/js/smooth-scroll.js"></script>
		
		<!-- NICE SCROLL  -->
		<script type="text/javascript" src="assets/js/jquery.nicescroll.js"></script>
	
		
		<script type="text/javascript" src="assets/js/jquery.placeholder.js"></script>
		
		<!-- ANIMATION  -->
		<script type="text/javascript" src="assets/js/wow.min.js"></script>
		
		<!-- LANDINGPAGE SLIDER  -->
		<script type="text/javascript" src="assets/js/hammer.min.js"></script>	
		<script type="text/javascript" src="assets/js/jquery.superslides.js"></script>
		
		<!-- INITIALIZATION  -->
		<script type="text/javascript" src="assets/js/init.js"></script>


<script>
function sendContact() {

	var valid;	
	valid = validateContact();
	if(valid) {
		jQuery.ajax({
		url: "contact_me.php",
		data:'userName='+$("#userName").val()+'&userEmail='+$("#userEmail").val()+'&subject='+$("#subject").val()+'&content='+$(content).val(),
		type: "POST",
		success:function(data){
		$("#mail-status").html(data);
		},
		error:function (){}
		});
	}
}

function validateContact() {
	var valid = true;	
	$(".demoInputBox").css('background-color','');
	$(".info").html('');
	
	if(!$("#userName").val()) {
		$("#userName-info").html("(required)");
		$("#userName").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val()) {
		$("#userEmail-info").html("(required)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#userEmail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#userEmail-info").html("(invalid)");
		$("#userEmail").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#subject").val()) {
		$("#subject-info").html("(required)");
		$("#subject").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#content").val()) {
		$("#content-info").html("(required)");
		$("#content").css('background-color','#FFFFDF');
		valid = false;
	}
	
	return valid;
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-104385197-1', 'auto');
  ga('send', 'pageview');

</script>


</body>
</html>