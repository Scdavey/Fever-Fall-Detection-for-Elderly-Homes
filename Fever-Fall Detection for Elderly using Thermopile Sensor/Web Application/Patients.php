<?php
include("Connect.php"); //Connection to database

if(array_key_exists('addPatient',$_POST)) //User clicks add patient
{
    header("Location: AddPatient.php"); //Go to addpatient page
}

else if(array_key_exists('delete',$_POST)) //User clicks delete patient
{
    $PatientID = $_POST['PatientID']; //Given patientID is passed
    deletePatient($PatientID, $con); //Call delete patient function with patientID
}

//Function for deleteing patient
function deletePatient($PatientID, $con)
{
    $query = "DELETE patient FROM patient WHERE PatientID = '$PatientID'";
    mysqli_query($con, $query);
}
?>

<style>
/*Styling for patients page*/
#Patients-form
{
    border: 5px solid black;
    text-align: center;
    position: relative;
    width: 70%;
    height: 74.5%;
    left: 15%;
    top: 0%;
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
        <title>Patients</title> <!--Patients title-->
    </head>
    <body>
        <h1>Patients<h1> <!--Patients header-->
        <div id="Patients-form"> 
            <div id="scroll-div">
            <form method="post">
                <table>
<?php
    $query = "SELECT * FROM patient"; //Selecting patients information
    $result = mysqli_query($con, $query); //Get results from database
    
    if (mysqli_num_rows($result) > 0) { //Check if no results were returned
        
        //Display patient information to user
        echo "   
            <tr>
                <th>PatientID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Home Address</th>
                <th>Mailing Address</th>
                <th>Phone Number</th>
                <th>Transport Method</th>
                <th>Emergency Contact</th>
                <th>Contact Number</th>
                <th>Family Doctor</th>
                <th>Doctor Number</th>
            </tr>";
        while($row = mysqli_fetch_assoc($result)) {
            
            $PatientID = $row['PatientID'];
            $PatientName = $row['patientName'];
            $Age = $row['age'];
            $HomeAddress = $row['homeAddressOfPatient'];
            $MailingAddress = $row['mailingAddress'];
            $PhoneNumber = $row['phoneNumber'];
            $TransportMethod = $row['transportationOptionForEmergencyServices'];
            $EmergContact = $row['emergencyContactName'];
            $ContactNumber = $row['emergencyContactPhoneNumber'];
            $FamilyDoctor = $row['familyDoctorName'];
            $DoctorNumber = $row['familyDoctorPhoneNumber'];
    
        echo "
            <tr>
                <td>$PatientID</td>
                <td>$PatientName</td>
                <td>$Age</td>
                <td>$HomeAddress</td>
                <td>$MailingAddress</td>
                <td>$PhoneNumber</td> 
                <td>$TransportMethod</td>  
                <td>$EmergContact</td>
                <td>$ContactNumber</td>
                <td>$FamilyDoctor</td>
                <td>$DoctorNumber</td>
            </tr>";      
        }
    }

?> 
                </table>
                </div>
                </div> 
                <div id="search">
                    <div class="search">
                        <p>Enter PatientID</p>
                        <input type="text" name="PatientID" placeholder="Patient ID"> <!--Input for patientID-->
                        <button type="submit" name="delete">Delete</button> <!--Delete button-->
                        <button type="submit" name="addPatient">Add Patient</button> <!--Add patient button-->
                    </div>
                </div>
            </form>  
        <a href="javascript:history.back()" class="Logout">Back</a> <!--Create login button-->
    </body>
</html>