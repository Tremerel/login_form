<?php

$sname= "localhost";
$unmae="id17451623_vinkeke";
$password = "19gF8/UhY8i403u)";

$db_name = "id17451623_test";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn){
    echo "connection failed";
}