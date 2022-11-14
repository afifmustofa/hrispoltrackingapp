<?php
session_start();
if ($_SESSION['level'] == "User") {
	include "../conn.php";
}
?>
