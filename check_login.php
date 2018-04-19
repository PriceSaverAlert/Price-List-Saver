<?php
if(!isset($_SESSION['uid']) OR (isset($_SESSION['uid']) and $_SESSION['uid']=='')){
	header('Location: index.php');
}