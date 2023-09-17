<?php
//function for connecting to database

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'databasefordegreeproject';

    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))

        {
            die("failed to connect to database!");
        }
?>