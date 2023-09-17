<style>
/*Styling for subincidents form*/
#Subincidents-form
{
    border: 5px solid black;
    text-align: center;
    position: relative;
    width: 70%;
    height: 74.5%;
    left: 15%;
    top: 0%;
}

tr 
{
    line-height: fixed;
    line-height: 50px;
}

a 
{
    font-size: 12;
}

#scroll-div 
{
    position: absolute;
    height: 100%;
    width: 100%;
    overflow:scroll;
}
</style>

<!DOCTYPE html>
<html>
    <!--Creating subincidents form-->
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Sub Incidents</title> <!--Page title-->
    </head>
    <body>
        <h1>Sub Incidents<h1> <!--Page header-->
        <div id="Subincidents-form"> 
            <div id="scroll-div">
            <form method="post">
                <table>
<?php
    include("Connect.php"); //connection to database

    $IncidentIDForSub = implode($_GET); //Recieve Id of original incident

    $query = "SELECT SubincidentID, IncidentID, temperature, dateOfSubincident, timeOfSubincident, subincidentNumber FROM subincidents WHERE IncidentID = '$IncidentIDForSub'"; //Select the subincident information
    $result = mysqli_query($con, $query); //Create results
    
    //Display subincident information to user
    if (mysqli_num_rows($result) > 0) {
        
        echo "   
            <tr>
                <th>SubncidentID</th>
                <th>IncidentID</th>
                <th>Temperature</th>
                <th>Date</th>
                <th>Time</th>
                <th>Subincident Number</th>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            
            $SubincidentID = $row['SubincidentID'];
            $IncidentID = $row['IncidentID'];
            $Temperature = $row['temperature'];
            $Date = $row['dateOfSubincident'];
            $Time = $row['timeOfSubincident'];
            $SubincidentNumber = $row['subincidentNumber'];
    
        echo "
            <tr>
                <td>$SubincidentID</td>
                <td>$IncidentID</td>
                <td>$Temperature</td>
                <td>$Date</td>
                <td>$Time</td>
                <td>$SubincidentNumber</td>           
            </tr>";      
        }
    }

?> 
                </table>
            </div>
            </div> 
        </form>
        <a href="javascript:history.back()" class="Logout">Back</a> <!--Create logout button-->
    </body>
</html>