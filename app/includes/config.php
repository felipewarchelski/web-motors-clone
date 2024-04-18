<?php 

    $con = mysqli_connect('localhost:3500', 'root', '');
    $database = mysqli_select_db($con,'web_motors_project');

    if (!$con || !$database) echo mysqli_error($con);

?>