<?php
// Initialize the session
session_start();
 
 
// Include config file
 require_once "../config.php";

//declare all variables that need to be populated for the cat information
$date = $name = $age = $sex = $description = $sn = $shelterName = $shelterId = $petPointId = $image = $FIVTested = $FLVTested = $FVRCPDate = $rabiesDate = $medicalNotes = $behaviourNotes = $outcome = $intakeDate = $fosterPlacementDate = $location = $primaryBreed = $secondaryBreed = $size = $colourPrimary = $colourSecondary = $colourPattern = $microchipNumber = $microchipIssuer = $recordOwner = $intakeType = $jurisdiction = $transferReason = $fosterLocation = $pdfLocation = null;
$errorMessage = false;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //PRIMARY DETAILS

    //populate with a non-null date
    if (empty(trim($_POST["proposal_date"]))){
       $errorMessage = true;
    }
    else{
        $proposalDate = trim($_POST["proposal_date"]);
    }

    //populate with a non-null string
    if(empty(trim($_POST["name"]))){
        $errorMessage = true;
     }
     else{
         $name = trim($_POST["name"]);
     }

     //populate with a non-null integer
     if (!(empty(trim($_POST["age"])))){
        $age = "";
     }
     else{
        $age = trim($_POST["age"]);
     }

     //poulate with a boolean for the cats sex
     if(empty(trim($_POST["sex"]))){
        $errorMessage = true;
     }
     else{
         if (trim($_POST["sex"]) == "Male"){
            $sex = true;
         } 
         else {
             $sex = false;
         }
     }

     //populate with a non-null string
     if(empty(trim($_POST["description"]))){
        $errorMessage = true;
     }
     else{
         $description = trim($_POST["description"]);
     }

     //populate with a boolean if the cat was spayed or neutered
     if(isset($_POST["spay_neuter"])){
        $sn = true;
     }
     else{
         $sn = false;
     }

     //populate with a string
     if(empty(trim($_POST["shelter_name"]))){
       $shelterName = "";
     }
     else{
        $shelterName = trim($_POST["shelter_name"]);
     }

     //populate with a string
     if(empty(trim($_POST["shelter_id"]))){
        $shelterId = "";
     }
     else{
         $shelterId = trim($_POST["shelter_id"]);
     }

     //populate with a non-null string
     if(empty(trim($_POST["petpoint_id"]))){
        $errorMessage = true;
     }
     else{
         $petPointId = trim($_POST["petpoint_id"]);
     }

    //populate with a non-null string
    if(empty(trim($_POST["outcome"]))){
        $errorMessage = true;
    }
    else{
       $outcome = $_POST["outcome"];
    }

    //populate with a string
    if(empty(trim($_POST["flv_tested"]))){
        $FLVTested = "";
    }
    else{
        $FLVTested = $_POST["flv_tested"];
    }

    //populate with a string
    if(empty(trim($_POST["fiv_tested"]))){
        $FIVTested = "";
    }
    else{
        $FIVTested = $_POST["fiv_tested"];
    }

    //populate with a date
     if(empty(trim($_POST["fvcrp_date"]))){
        $FVRCPDate = "";
     }
     else{
        $FVRCPDate = $_POST["fvcrp_date"];
     }

     //populate with a date
     if(empty(trim($_POST["rabies_date"]))){
        $rabiesDate = "";
     }
     else{
        $rabiesDate = $_POST["rabies_date"];
     }

     //populate with a string
     if(empty(trim($_POST["med_notes"]))){
        $medicalNotes = "";
     }
     else{
        $medicalNotes = $_POST["med_notes"];
     }

     //populate with a string
     if(empty(trim($_POST["behaviour_notes"]))){
        $behaviourNotes = "";
     }
     else{
        $behaviourNotes = $_POST["behaviour_notes"];
     }

     //populate with a date
     if(empty(trim($_POST["intake_date"]))){
        $intakeDate = "";
     }
     else{
        $intakeDate = $_POST["intake_date"];
     }

     //populate with a date
     if(empty(trim($_POST["foster_date"]))){
        $fosterPlacementDate = "";
     }
     else{
        $fosterPlacementDate = $_POST["foster_date"];
     }

     //populate with a string
     if(empty(trim($_POST["location"]))){
        $fosterLocation = "";
     }
     else{
        $fosterLocation = $_POST["location"];
     }

     //populate with a non-null string
     if(empty(trim($_POST["prim_breed"]))){
        $errorMessage = true;
     }
     else{
        $primaryBreed = $_POST["prim_breed"];
     }

     //populate with a string
     if(empty(trim($_POST["sec_breed"]))){
        $secondaryBreed = "";
     }
     else{
        $secondaryBreed = $_POST["sec_breed"];
     }

     //populate with a non-null string
     if(empty(trim($_POST["size"]))){
        $errorMessage = true;
     }
     else{
        $size = $_POST["size"];
     }

     //populate with a non-null string
     if(empty(trim($_POST["prim_colour"]))){
        $errorMessage = true;
     }
     else{
        $colourPrimary = $_POST["prim_colour"];
     }

     //populate with a string
     if(empty(trim($_POST["sec_colour"]))){
        $colourSecondary = "";
     }
     else{
        $colourSecondary = $_POST["sec_colour"];
     }

     //populate with a string
     if(empty(trim($_POST["pattern_colour"]))){
        $colourPattern = "";
     }
     else{
        $colourPattern = $_POST["pattern_colour"];
     }

     //populate with a string
     if(empty(trim($_POST["chip_id"]))){
        $microchipNumber = "";
     }
     else{
        $microchipNumber = $_POST["chip_id"];
     }

     //populate with a string
     if(empty(trim($_POST["chip_issuer"]))){
        $microchipIssuer = "";
     }
     else{
        $microchipIssuer = $_POST["chip_issuer"];
     }

     //INTAKE DETAILS

     //populate with a string
     if(empty(trim($_POST["record_owner"]))){
        $recordOwner = "";
     }
     else{
        $recordOwner = $_POST["record_owner"];
     }

     //populate with a non-null string
     if(empty(trim($_POST["intake_type"]))){
        $errorMessage = true;
     }
     else{
        $intakeType = $_POST["intake_type"];
     }

     //populate with a non-null string
     if(empty(trim($_POST["jurisdiction"]))){
        $errorMessage = true;
     }
     else{
        $jurisdiction = $_POST["jurisdiction"];
     }

     //populate with a non-null string
     if(empty(trim($_POST["transfer_reason"]))){
        $errorMessage = true;
     }
     else{
        $transferReason = $_POST["transfer_reason"];
     }

     //populate with a string
     if(empty(trim($_POST["location_foster"]))){
        $recordOwner = "";
     }
     else{
        $recordOwner = $_POST["location_foster"];
     }
}
    
?>