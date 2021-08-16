<?php

include "connectionsting.php";
session_destroy();
header("location: login.php");
?>