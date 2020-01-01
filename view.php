<?php
include_once("class/boldclass.php");
$id = "";
if(isset($_GET['id']) && $_GET['id'] != ""){
    $id = $_GET['id'];
}
$viewobj = new employ();
$view = $viewobj->viewer($id); 

?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
<link  rel="stylesheet" href="css/mystyle2.css"/>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
<title>View</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body class="profile-page">
    <nav class="navbar navbar-color-on-scroll navbar-transparent    fixed-top  navbar-expand-lg "  color-on-scroll="100"  id="sectionsNav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="show.php">Dashboard </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                      <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false">
                          <i class="material-icons">apps</i> Components
                      </a>
                      <div class="dropdown-menu dropdown-with-icons">
                        <a href="../index.html" class="dropdown-item">
                            <i class="material-icons">layers</i> All Components
                        </a>
                        
                        <a href="http://demos.creative-tim.com/material-kit/docs/2.0/getting-started/introduction.html" class="dropdown-item">
                            <i class="material-icons">content_paste</i> Documentation
                        </a>
                      </div>
                    </li>
      				<li class="nav-item">
      					<a class="nav-link" href="javascript:void(0)">
      						<i class="material-icons">cloud_download</i> Download
      					</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="https://twitter.com/CreativeTim" target="_blank">
      						<i class="fa fa-twitter"></i>
      					</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link" href="https://www.facebook.com/CreativeTim" target="_blank">
      						<i class="fa fa-facebook-square"></i>
      					</a>
      				</li>
      				<li class="nav-item">
      					<a class="nav-link"  href="https://www.instagram.com/CreativeTimOfficial" target="_blank">
      						<i class="fa fa-instagram"></i>
      					</a>
      				</li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="page-header header-filter" data-parallax="true" style="background-image:url('http://wallpapere.org/wp-content/uploads/2012/02/black-and-white-city-night.png');"></div>
    <div class="main main-raised">
		<div class="profile-content">
            <div class="container">
                <div class="row">
	                <div class="col-md-6 ml-auto mr-auto">
        	           <div class="profile">
                       <?php
                            if(!empty($view)){
                            ?>
                            <?php
                                echo "<script>
                                function preview_img(event){
                                var reader = new FileReader();
                                reader.onload = function(){
                                var output = document.getElementById('show_img');
                                output.src = reader.result;
                                }
                                 reader.readAsDataURL(event.target.files[0]);
                                 }
                                    </script>";
                            ?>
	                        <div class="name">
	                            <h3 class="title"><?=$view[0]['fName']?>&nbsp;<?=$view[0]['lName']?></h3>
                                <div style="margin-top:75px;height: 70px">
                                <img src="images/<?=$view[0]['image']?>" onchange="preview_img(event)" style="border-radius:5px;height:150px;"/>
                                </div>
								<h6><?=$view[0]['position']?></h6>
		
	                        </div>
                                    <div class="profile" >
									  <h3>Address</h3>	 &nbsp; <?=$view[0]['address']?></a><br />
									  <h3>Age</h3>	 &nbsp; <?=$view[0]['age']?></a><br />
									  <h3>Phone</h3>	 &nbsp; <?=$view[0]['phone']?></a><br />
									  <h3>Gender</h3>	 &nbsp; <?=$view[0]['sex']?></a><br />
                                      <h3>Experience</h3>	 &nbsp; <?=$view[0]['experience']?></a>
								</div>    
	                    </div>
    	            </div>
                </div>
                
                <?php
                }
                ?>
				

    
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
<script src="js/myjsss.js"></script>

</body>
</html>