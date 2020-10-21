<?php
include_once 'connection.php';

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>File Uploading System</title>



<?php 
include 'navbar.php';
 
?>



<style>

@charset "utf-8";
/* CSS Document */

*
{
 padding:0;
 margin:0;
}
body
{
 
 font-family: sans-serif;
 text-align:center;
}

.search-box{
        width: 300px;
        position: relative;
        display: inline-block;
        font-size: 14px;
    }
    .search-box input[type="text"]{
        height: 32px;
        padding: 5px 10px;
        border: 1px solid #CCCCCC;
        font-size: 14px;
    }
    .result{
        position: absolute;        
        z-index: 999;
        top: 100%;
        left: 0;
    }
    .search-box input[type="text"], .result{
        width: 100%;
        box-sizing: border-box;
    }
    /* Formatting result items */
    .result p{
        margin: 0;
        padding: 7px 10px;
        border: 1px solid #CCCCCC;
        border-top: none;
        cursor: pointer;
    }
    .result p:hover{
        background: #f2f2f2;
    }



table
{
    background:white;
    text-align:center;
}




</style>


</head>
<body>
<br />
<div class="container">
<div class="row">

 <table class="table">
    <thead>
    <tr>
      <th scope="col" style="text-align:center">Uploader Name</th>
      <th scope="col" style="text-align:center">Uploader Email</th>
      <th scope="col" style="text-align:center">File Name</th>
      <th scope="col" style="text-align:center">Download</th>
    </tr>
  </thead>
    <?php
 $sql="SELECT * FROM uploading";
 $query = $conn->query($sql);
 while( $row = $query->fetch_assoc() )
 {
  ?>
   <tbody>
        <tr>
        <td><?php echo $row['name'] ?></td>
        <td><?php echo $row['email'] ?></td>
        <td><?php echo $row['file_name'] ?></td>
        <td><button type="button" class="btn btn-success"><i class="fa fa-download"></i><a href="<?php echo $row['file_name'] ?>" target="_blank"> Download</a></button></td>
        </tr>
        
        <?php
 }
 ?>
 </tbody>
    </table>
    </div>
</div>
</body>
</html>