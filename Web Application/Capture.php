<style>
/*Styling for capture page*/
#Capture-form 
{
    border: 5px solid black;
    position: absolute;
    width: 80%;
    height: 80%;
    left: 10%;
    top: 10%;
}

</style>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Capture</title> <!--Title for capture page-->
    </head>
    <body>
        <h1>Capture</h1> <!--Header for capture page-->
        <div id="Capture-form"> 
            <form method="post">
<?php
    include("Connect.php");

    $IncidentIDForCapture = implode($_GET); //Reciever incident id

    $query = "SELECT incidentSc  FROM incidents WHERE IncidentID = '$IncidentIDForCapture'"; //Get capture from input incident
    $result = mysqli_query($con, $query); //Generate result
    
    if (mysqli_num_rows($result) > 0) {

        //Display capture to user
        while($row = mysqli_fetch_assoc($result)) {
            $Capture = $row['incidentSc'];
            echo '<img src="data:image/jpeg;base64,'.base64_encode($Capture). '"width=100% height=100%/>';           
        }
    }   

?> 
            </form>
        </div>   
        <a href="javascript:history.back()" class="Logout">Back</a> <!--Create logout button-->
    </body>
</html>