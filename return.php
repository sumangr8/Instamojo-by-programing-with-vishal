<?php
session_start();
echo $_SESSION["id"]."<br>";
echo "<pre>";
print_r($_REQUEST);
?>
