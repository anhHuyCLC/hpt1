<?php
$con = mysqli_connect('localhost', 'root', '', 'duangiuaky');
if (!$con) {
    echo "fail";
    die(mysqli_error($con));
}
?>