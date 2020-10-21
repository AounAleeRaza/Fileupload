
<!DOCTYPE html>
<html>
<head lang="en">
<meta charset="utf-8">
<title>File Upload System</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript" src="js/jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<?php 
include 'navbar.php';
?>

</head>
<body>
<div class="container">
<div class="row">

<div class="col-md-8">

<h1><img src="logo.png" width="80px"/>&nbsp &nbsp File Uploading System</h1>
<hr> 

<form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="name">NAME</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
</div>
<div class="form-group">
<label for="email">EMAIL</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required />
</div>
<br />
<input id="uploadImage" type="file" accept="image/*" name="image" />
<br />
<div id="preview"><img src="filed.png" width="100px"/></div><br>
<br />
<input class="btn btn-success" type="submit" value="Upload">

</form>



<div id="err"></div>
<hr>

</div>
</div>
</div>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "ajaxupload.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
     // view uploaded file.
     $("#preview").html(data).fadeIn();
     $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});

</script>

</html>


