<?php
session_start();

include("Connect.php");
include("Functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") //User clicks the login button
{
    $employeeUsername = $_POST['employeeUsername']; //Username taken from username text input
    $employeePassword = $_POST['employeePassword']; //password taken form password text input
    $typeOfWorker = 'Supervisor';

    if(!empty($employeeUsername) && !empty($employeePassword)) //Check if username and password were both entered
    {
        $query = "select * from employee where employeeUsername = '$employeeUsername' limit 1"; //Select all data for current employee

        $result = mysqli_query($con, $query); //Generate result

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $Employee_Data = mysqli_fetch_assoc($result);

                if($Employee_Data['employeePassword'] === $employeePassword) //Verify password
                {
                    $_SESSION['EmployeeID'] = $Employee_Data['EmployeeID'];

                    if($Employee_Data['typeOfWorker'] === $typeOfWorker) //Check users position
                    {
                        header("Location: IncidentsSupervisor.php"); //If supervisor go to supervisor page
                    }
                    else
                    {
                        header("Location: IncidentsPSW.php"); //if PSW go to PSW page
                    }
                    die;
                }
                else
                {
                    echo "Information is invalid!"; //Notify user if information is missing
                }
            }
        }
    }
    else
    {
        echo "Information is incomplete!"; //Notify user if login was successful
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Login</title> <!--Login page title-->
    </head>
    <body>
        <div class="login-form"> 
            <h1>Login</h1> <!--Login page header-->
            
            <form method="post">
                <p>User Name</p>
                <input type="text" name="employeeUsername" placeholder="User Name"> <!--Username text input-->
                <P>Password</P>
                <input type="password" name="employeePassword" placeholder="Password"> <!--Password text input-->
               
                <button type="submit"> Login </button> <!--Login button-->

                <a href="Register.php"> Register</a> <!--Go to registration page-->    

            </form>
        </div>
        <a href="javascript:history.back()" class="Logout">Back</a> <!--Create logout button-->
    </body>
</html>