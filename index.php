<?php
include_once ("class/boldclass.php");
if(isset($_POST['submit'])){
   
    $saveObject = new employ(); // class instantiation

    $saverecs   = $saveObject->createData($_POST);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/> 
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/mystyle.css"/>
 </head>
<body>
    <div class="container">
       <div class="Back">
            <i class="fa fa-arrow-left" onclick="Back()"></i>
        </div>
        <p class="h2 text-center">Application Form</p>
        <form name="myForm" action="index.php" method="POST" enctype="multipart/form-data">
            <div class="preview text-center">
                <img class="preview-img" src="job4.png" width="200" height="200"/>
               
                <span class="Error"></span>
            </div>
            
            <div class="form-group">
                <label>First Name:</label>
                <input class="form-control" type="text" name="fname" value=""  placeholder="First Name"/>
                
            </div>
            <div class="form-group">
                <label>Last Name:</label>
                <input class="form-control" type="text" name="lname" value="" placeholder="Last Name"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input class="form-control" type="text" name="email" value="" placeholder="Email"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Phone:</label>
                <input class="form-control" type="text" name="phone" value="" placeholder="Phone"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Age:</label>
                <input class="form-control" type="text" name="age" value="" placeholder="Age"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Address:</label>
                <input class="form-control" type="text" name="address" value="" placeholder="Address"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Experience:</label>
                <input class="form-control" type="text" name="experience" value="years" placeholder="Experience"/>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Position:</label>
                <select class="form-control" name="position" value="">
                <option>Select a Position</option>
                <option>Graphics Artists</option>
                <option>Secretary</option>
                <option>Software Engineer</option>
                </select>
                <span class="Error"></span>
            </div>
            <div class="form-group">
                <label>Gender:</label><br/>
                <label><input type="radio" name="gender" value="Male" checked /> Male</label>
                <label><input type="radio" name="gender" value="Female" /> Female</label>
                <span class="Error"></span>
            </div>
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
            <div class="form-group">
            <label>Upload:</label><br/>
             <input type="file" name="fileupload" id="fileupload" onchange="preview_img(event)"/>
            <img  id="show_img" height="100px" width="100px"/>
            </div>
            
                        

                            
            <div class="form-group">
                <input class="btn btn-primary btn-block" type="submit" value="submit" name="submit"/>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    function Back()
{
    window.history.back();
}
    </script>
</body>
</html>


