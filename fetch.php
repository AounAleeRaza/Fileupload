<?php
//fetch.php
include 'connection.php';
if(isset($_POST["query"]))
{
 $request = mysqli_real_escape_string($conn, $_POST["query"]);
 $query = "
  SELECT * FROM uploading 
  WHERE name LIKE '%".$request."%' 
  OR email LIKE '%".$request."%' 
  OR file_name LIKE '%".$request."%'
 ";
 $result = mysqli_query($conn, $query);
 $data =array();
 $html = '';
 $html .= '
  <table class="table table-bordered table-striped">
   <tr>
    <th>Name</th>
    <th>Email</th>
    <th>File Name</th>
   </tr>
  ';
 if(mysqli_num_rows($result) > 0)
 {
  while($row = mysqli_fetch_array($result))
  {
   $data[] = $row["name"];
   $data[] = $row["email"];
   $data[] = $row["file_name"];
   $html .= '
   <tr>
    <td>'.$row["name"].'</td>
    <td>'.$row["email"].'</td>
    <td>'.$row["file_name"].'</td>
   </tr>
   ';
  }
 }
 else
 {
  $data = 'No Data Found';
  $html .= '
   <tr>
    <td colspan="3">No Data Found</td>
   </tr>
   ';
 }
 $html .= '</table>';
 if(isset($_POST['typehead_search']))
 {
  echo $html;
 }
 else
 {
  $data = array_unique($data);
  echo json_encode($data);
 }
}

?>
