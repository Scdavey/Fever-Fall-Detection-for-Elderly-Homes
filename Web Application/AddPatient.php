<?php
session_start();

    include("Connect.php");
    include("Functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") //User submits form to add patient
    {
        //Assign input information to variables
        $PatientName = $_POST['PatientName'];
        $PatientAge = $_POST['PatientAge'];
        $PatientAddressHome = $_POST['PatientAddressHome'];
        $PatientAddressMailing = $_POST['PatientAddressMailing'];
        $PhoneNumber = $_POST['PhoneNumber'];
        $EmergTransport = $_POST['EmergTransport'];
        $EmergContact = $_POST['EmergContact'];
        $EmergePhoneNumber = $_POST['EmergePhoneNumber'];
        $MedicalHistory = $_POST['MedicalHistory'];
        $PersonalityNotes = $_POST['PersonalityNotes'];
        $Medications = $_POST['Medications'];
        $FamilyDoc = $_POST['FamilyDoc'];
        $FamilyDocPhoneNumber = $_POST['FamilyDocPhoneNumber'];
        $AssignedPSW = $_POST['AssignedPSW'];

        //Check for empty inputs
        if(!empty($PatientName) && !empty($PatientAge) && !empty($PatientAddressHome) && !empty($PatientAddressMailing) && !empty($PhoneNumber) && !empty($EmergTransport) && !empty($EmergContact) && !empty($EmergePhoneNumber) && !empty($MedicalHistory) && !empty($PersonalityNotes) && !empty($Medications) && !empty($FamilyDoc) && !empty($FamilyDocPhoneNumber) && !empty($AssignedPSW))
        {
            //Generate patientid
            $PatientID = random_num(20);
            //Update database with new patient information
            $query = "insert into patient (PatientID, patientName, age, homeAddressOfPatient, mailingAddress, phoneNumber, transportationOptionForEmergencyServices, emergencyContactName, emergencyContactPhoneNumber, medicalHistory, personalityNotes, currentAndRecentMedications, familyDoctorName, familyDoctorPhoneNumber, assignedWorker) 
                      values ('$PatientID', '$PatientName', '$PatientAge', '$PatientAddressHome', '$PatientAddressMailing', '$PhoneNumber', '$EmergTransport', '$EmergContact', '$EmergePhoneNumber', '$MedicalHistory', '$PersonalityNotes', '$Medications', '$FamilyDoc', '$FamilyDocPhoneNumber', '$AssignedPSW')";

            mysqli_query($con, $query); //Generate result

            header("Location: Patients.php"); //Go to patients page
            die;
        }
        else
        {
            echo "Information is invalid!"; //Notify user if information is invalid
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Style.css" type="text/css">
        <title>Add Patient</title> <!--Title for add patients-->
    </head>
    <body>
        <h1>Add Patient</h1> <!--Header for add patients-->
        <div class="addPatient-form"> 
            
            <form method="post">
                <!--Text inputs for patients information-->
                <input type="text" name="PatientName" placeholder="Patient Name">
                <input type="text" name="PatientAge" placeholder="Patient Age">
                <input type="text" name="PatientAddressHome" placeholder="Home Address">
                <input type="text" name="PatientAddressMailing" placeholder="Mailing Address">
                <input type="text" name="PhoneNumber" placeholder="Phone Number">
                <input type="text" name="EmergTransport" placeholder="Emergency Transport">
                <input type="text" name="EmergContact" placeholder="Emergency Contact">
                <input type="text" name="EmergePhoneNumber" placeholder="Phone Number">
                <input type="text" name="MedicalHistory" placeholder="Medical History">
                <input type="text" name="PersonalityNotes" placeholder="Notes">
                <input type="text" name="Medications" placeholder="Medications">
                <input type="text" name="FamilyDoc" placeholder="Family Doctor">
                <input type="text" name="FamilyDocPhoneNumber" placeholder="Phone Number">
                <input type="text" name="AssignedPSW" placeholder="Assigned PSW">
                
                <button type="submit"> Add </button> <!--Patient to add button-->
            </form>
        </div>
        <a href="javascript:history.back()" class="Logout">Back</a> <!--Create logout button-->
    </body>
</html>