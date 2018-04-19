<?php
//Database Connection
$con=mysqli_connect('localhost','root','','price');
if(!$con){
	die("Connection failed ".mysqli_connect_error());
}
session_start();