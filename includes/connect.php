<?php
error_reporting(0);
@$con = new mysqli($sqlip,$sqlid,$sqlpass,$sqlname,$sqlport);

if(mysqli_connect_errno())
{
    die("Cannot connect to MySQL,,bad,:".mysqli_connect_error());
}


mysqli_query($con,"SET NAMES utf8");

?>
