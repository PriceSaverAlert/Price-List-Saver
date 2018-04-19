<?php
if(!isset($_SESSION['aid']) OR (isset($_SESSION['aid']) and $_SESSION['aid']=='')){
	header('Location: index.php');
}