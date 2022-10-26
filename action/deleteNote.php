<?php

require "../config/config.php";

$callId = $_GET['id'];

mysqli_query(connectBd::connect(), "DELETE FROM `calls` WHERE `id` = $callId");

header('Location: ../index.php')






?>