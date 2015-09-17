<?php
session_start();
unset($_SESSION["userSet"]);
session_destroy(); 
?>