<?php
    
    $conn = new mysqli('localhost', 'root', '', 'fileupload');

    if ($conn->connect_error) {
        die(" Connection Failed: " . $conn->connect_error);
    }

?>