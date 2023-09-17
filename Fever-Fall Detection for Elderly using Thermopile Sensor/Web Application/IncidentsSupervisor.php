<?php
include("Connect.php");

if(array_key_exists('patients',$_POST)) //If user selects view patients
{
    header("Location: Patients.php"); //Go to patients page
}

else if(array_key_exists('subincidents',$_POST)) //If user selects view subincidents
{
    $IncidentIDForSub = $_POST['IncidentID']; //Get the id of the selected patient
    header("Location: Subincidents.php?IncidentID=".$IncidentIDForSub); //Go to subincidents page and pass patient id

}

else if(array_key_exists('clear',$_POST)) //If user selects clear incident
{
    $IncidentID = $_POST['IncidentID']; //Get incident id
    clearIncident($IncidentID, $con); //Call clear incident with incident id
}

else if(array_key_exists('capture',$_POST)) //If user selects view capture
{
    $IncidentIDForCapture = $_POST['IncidentID']; //Get selected incident id
    header("Location: Capture.php?IncidentID=".$IncidentIDForCapture); //Go to view capture page and pass incident id
}

function clearIncident($IncidentID, $con) //Function to clear an incident in the database when given its id
{
    $query = "UPDATE incidents SET cleared = NOT cleared WHERE IncidentID = '$IncidentID'"; //Query to update database
    mysqli_query($con, $query); //Update database
}
?>

<style>
/*Styling for supervisors incidents*/
#incidentsSupervisor-form
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
        <div id="incidentsSupervisor-form"> 
            <div id="scroll-div">
            <form method="post">
                <table>
<?php

$query = "SELECT IncidentID, patientName, fever, fall, temperature, age, dateOfIncident, timeOfIncident, location, specialNotes, critical, subincidents, cleared FROM incidents"; //Query to get all of the incidents
$result = mysqli_query($con, $query); //Create result with all the incident data

//Display all the incidents to the user
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
                    <input type="text" name="IncidentID" placeholder="Incident ID"> <!--Incident id input-->
                    <button type="submit" name="subincidents">Subincidents</button> <!--View subincidents-->
                    <button type="submit" name="clear">Clear</button> <!--Clear an incident-->
                    <button type="submit" name="patients">Patients</button> <!--View the patients-->
                    <button type="submit" name="capture">Capture</button> <!--View a capture-->
                </div>
            </div>
            </form>
        <a href="Logout.php" class="Logout">Logout</a> <!--Create logout button-->
    </body>
</html>