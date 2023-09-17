<?php
session_start();

    include("Connect.php"); //Get connection to database
    include("Functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") //User submits registration information
    {
        //Set users input data to variables
        $employeeUsername = $_POST['employeeUsername']; 
        $employeePassword = $_POST['employeePassword'];
        $employeeName = $_POST['employeeName'];
        $typeOfWorker = $_POST['typeOfWorker'];

        if(!empty($employeeUsername) && !empty($employeePassword) && !empty($employeeName) && !empty($typeOfWorker)) //Check to see if any information is missing
        {
            $EmployeeID = random_num(20); //Generate employee id
            $query = "insert into employee (EmployeeID, employeeUsername, employeePassword, employeeName, typeOfWorker) values ('$EmployeeID', '$employeeUsername', '$employeePassword', '$employeeName', '$typeOfWorker')"; //Create new employee entry

            mysqli_query($con, $query);

            header("Location: Login.php"); //Go to login page
            die;
        }
        else
        {
            echo "Information is invalid!"; //Notify if information is missing
        }
    }
?>

<!DOCTYPE html>
<html>
    <!--Start of registration page-->
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Register</title> <!--Page title-->
    </head>
    <body>
        <div class="register-form"> 
            <h1>Register</h1> <!--Page header-->
            <form action="#" method="post">
                <p>User Name</p>
                <input type="text" name="employeeUsername" placeholder="User Name"> <!--Username text input-->
                <P>Password</P>
                <input type="text" name="employeePassword" placeholder="Password"> <!--Password text input-->
                <P>Legal Name</P>
                <input type="text" name="employeeName" placeholder="Name"> <!--Name text input-->
                <P>Position</P>
                <input type="text" name="typeOfWorker" placeholder="Position"> <!--Position text input-->
                
                <button type="submit"> Register </button> <!--Submit button-->
                <a href="Login.php">Login</a>  
            </form>
        </div>
        <a href="javascript:history.back()" class="Logout">Back</a> <!--Create back button-->
    </body>
</html>