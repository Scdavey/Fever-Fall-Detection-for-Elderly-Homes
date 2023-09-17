<?php
//Page for commonly used functions

//Function for checking login information
function check_login($con)
{
    if(isset($_SESSION['EmployeeID']))
    {
        $id = $_SESSION['EmployeeID'];
        $query = "select * from employee where EmployeeID = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
           $Account_data = mysqli_fetch_assoc($result);
           return $Account_data; 
        }
    }

    header("Location: Login.php");
    die;
}

//Generate random number
function random_num($length)
{
    $text = "";
    if($length < 5)
    {
        $length = 5;
    }

    $len = rand(4, $length);

    for ($i=0; $i < $len; $i++) 
    {
        $text .= rand(0,9);
    }

    return $text;
}
?>