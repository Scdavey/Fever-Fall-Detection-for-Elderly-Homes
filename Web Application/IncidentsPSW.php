<?php
include("Connect.php");

if(array_key_exists('subincidents',$_POST)) //User selects subincidents
{
    $IncidentIDForSub = $_POST['IncidentID']; //Incident id given by user
    header("Location: Subincidents.php?IncidentID=".$IncidentIDForSub); //Go to subincidents page and pass incident id

}

else if(array_key_exists('capture',$_POST)) //User selects capture
{
    $IncidentIDForCapture = $_POST['IncidentID']; //Incident id given by user
    header("Location: Capture.php?IncidentID=".$IncidentIDForCapture); //Go to capture page and pass incident id
}
?>

<style>
/*Styling for incidents page*/
#incidentsPSW-form
{
    border: 5px solid black;
    text-align: center;
    position: relative;
    width: 70%;
    height: 74.5%;
    left: 15%;
    top: 0%;
}

#scroll-div 
{
    position: absolute;
    height: 100%;
    width: 100%;
    overflow:scroll;
}

#search 
{
    border: 5px solid black;
    text-align: center;
    background: #ffff;
    position: fixed;
    bottom: 0;
    left: 15%;
    height: 14%;
    width: 70%;
}
</style>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Incidents</title> <!--Title for incidents-->
    </head>
    <body>
    <h1>Incidents</h1> <!--Header for incidents-->
        <div id="incidentsPSW-form"> 
            <div id="scroll-div">
            <form method="post">
                <table>
<?php

$query = "SELECT IncidentID, patientName, fever, fall, temperature, age, dateOfIncident, timeOfIncident, location, specialNotes, critical, subincidents, cleared, incidentSC FROM incidents"; //Get all incident information from database
$result = mysqli_query($con, $query); //Generate result

//Display all incident information to user
if (mysqli_num_rows($result) > 0) {
    
    echo "   
        <tr>
            <th>IncidentID</th>
            <th>Patient Name</th>
            <th>Fever</th>
            <th>Fall</th>
            <th>Temperature</th>
            <th>Age</th>
            <th>Date</th>
            <th>Time</th>
            <th>Location</th>
            <th>Notes</th>
            <th>Critical</th>
            <th>Sub Incidents</th>
            <th>Cleared</th>
        </tr>";
    while($row = mysqli_fetch_assoc($result)) {
        
        $IncidentID = $row['IncidentID'];
        $patientName = $row['patientName'];
        $fever = 'no';
        if ($row['fever'] == true)
        {
            $fever = 'yes';
        }
        $fall = 'no';
        if ($row['fall'] == true)
        {
            $fall= 'yes';
        }
        $temperature = $row['temperature'];
        $age = $row['age'];
        $dateOfIncident = $row['dateOfIncident'];
        $timeOfIncident = $row['timeOfIncident'];
        $location = $row['location'];
        $specialNotes = $row['specialNotes'];
        $critical = 'no';
        if ($row['critical'] == true)
        {
            $critical = 'yes';
        }
        $subincidents = 'no';
        if ($row['subincidents'] == true)
        {
            $subincidents = 'yes';
        }
        $cleared = 'no';
        if ($row['cleared'] == true)
        {
            $cleared = 'yes';
        }
        $incidentSC = $row['incidentSC'];

    echo "
        <tr>
            <td>$IncidentID</td>
            <td>$patientName</td>
            <td>$fever</td>
            <td>$fall</td>
            <td>$temperature</td>
            <td>$age</td>
            <td>$dateOfIncident</td>
            <td>$timeOfIncident</td>
            <td>$location</td>
            <td>$specialNotes</td> 
            <td>$critical</td>
            <td>$subincidents</td>
            <td>$cleared</td>
        </tr>";
    }
}
?>
                </table>
        </div>
        </div>
        <div id="search">
            <div class="search">
                <p>Enter IncidentID</p>
                <input type="text" name="IncidentID" placeholder="Incident ID"> <!--Incident id text input-->
                <button type="submit" name="subincidents">Subincidents</button> <!--Go to subincidents button-->
                <button type="submit" name="capture">Capture</button> <!--Go to capture button-->
            </div>
        </div>
        </form>
        <a href="Logout.php" class="Logout">Logout</a> <!--Create logout button-->
    </body>
</html>