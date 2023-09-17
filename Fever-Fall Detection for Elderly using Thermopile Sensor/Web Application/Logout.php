<?php
//Function for the logout buttons
session_start();

if(isset($_SESSION['EmployeeID'])) //Check if current session has id of employee
{
    unset($_SESSION['EmployeeID']); //Clear current session id for user
}

header("Location: Login.php"); //Return user to login page
die;
?>